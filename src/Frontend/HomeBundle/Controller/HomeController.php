<?php

namespace Frontend\HomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\HttpFoundation\Session\Session;
use Backend\CustomerAdminBundle\Entity\Favorito;
use Backend\CustomerAdminBundle\Entity\Sucursal;
use Backend\CustomerBundle\Entity\Customer;
/**
 * Home controller.
 *
 */
class HomeController extends Controller
{

   
    public function indexAction(Request $request)
    {

        $session = $this->getRequest()->getSession();
        $session->remove('categoria');
        return $this->render('FrontendHomeBundle:Home:index.html.twig');
    }
    
    public function faqAction(Request $request)
    {    
        return $this->render('FrontendHomeBundle:Home:faqs.html.twig');
                
    }
    
    public function terminosAction(Request $request)
    {    
        return $this->render('FrontendHomeBundle:Home:terminos.html.twig');
                
    }
    
    public function politicasAction(Request $request)
    {    
        return $this->render('FrontendHomeBundle:Home:privacidad.html.twig');
                
    }
	
	
    //obtener listado de zonas y barrios 
    public function menuZonaAction(Request $request)
    {

        /*
        $zonas = $this->getDoctrine()->getRepository('BackendAdminBundle:Zona')->findAll();

        $listado=array();
        foreach($zonas as $z){
              $record=array();
              $record["id"]=$z->getId();
              $record["name"]=$z->getName();
              $record["barrios"]=$this->getBarrios($z->getId());
              $listado[] = $record;
         }
         $response = new Response(json_encode($listado));

         $response->headers->set('Content-Type', 'application/json');

         return $response;
      }

      //obtener listado de los barrios según la zona
      private function getBarrios($zonaId){
        $barrios = $this->getDoctrine()->getRepository('BackendAdminBundle:Barrio')->findBy(array("zona"=>$zonaId));

        $resultado=array();
        foreach($barrios as $b){
              $record=array();
              $record["id"]=$b->getId();
              $record["name"]=$b->getName();
              $resultado[] = $record;
         }

         return $resultado;
      }
      */

        $search = trim(mb_convert_case($request->get("q"), MB_CASE_LOWER));

        $listado = array();

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT b FROM BackendAdminBundle:Barrio b where ";
        $search = mb_convert_case($search, MB_CASE_LOWER);

        if ($search)

            $dql .= "b.name like '%$search%'";

            $dql .= " order by b.name";

            $query = $em->createQuery($dql);

            $resultados = $query->getResult();

        //if(!is_empty($resultados)) {

        foreach ($resultados as $resultado) {

            $barrio = array();

            $barrio['id'] = $resultado->getId();
            $barrio['name'] = $resultado->getName();
            $barrio['zona'] = $resultado->getZona()->getName();
            $barrio['zonaId'] = $resultado->getZona()->getId();
            $listado[] = $barrio;
        }

        //}
        $response = new Response(json_encode($listado));

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
     //obtener listado de categorias y subcategorias
    /*
    public function menuCategoriaAction(Request $request){
    
      $categorias = $this->getDoctrine()->getRepository('BackendAdminBundle:Categoria')->findAll();
     
      $listado=array();
      foreach($categorias as $c){
            $record=array();
            $record["id"]=$c->getId();
            $record["name"]=$c->getName();
            $record["subcategorias"]=$this->getSubcategorias($c->getId());
            $listado[] = $record;
       }
       $response = new Response(json_encode($listado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    }

    */

    public function menuCategoriaAction(Request $request){

        $search = trim(mb_convert_case($request->get("q"),MB_CASE_LOWER));

        $listado = array();

        $em = $this->getDoctrine()->getManager();

        $dql="SELECT s FROM BackendAdminBundle:Subcategoria s where " ;
        $search=mb_convert_case($search,MB_CASE_LOWER);

        if ($search)

            $dql.="s.name like '%$search%'";

        $dql.=" order by s.name";

        $query = $em->createQuery($dql);

        $resultados = $query->getResult();

        //if(!is_empty($resultados)) {

            foreach ($resultados as $resultado) {

                $subcategoria = array();

                $subcategoria['id'] = $resultado->getId();
                $subcategoria['name'] = $resultado->getName();
                $subcategoria['category'] = $resultado->getCategoria()->getName();
                $subcategoria['catId'] = $resultado->getCategoria()->getId();
                $subcategoria['restrict'] = $resultado->getCategoria()->getIsRestrict();
                $listado[] = $subcategoria;
            }

        //}
        $response = new Response(json_encode($listado));

        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }



    //obtener listado de las subtacategorias a partir de la categoria

    private function getSubcategorias($categoriaId){
      $subcategorias = $this->getDoctrine()->getRepository('BackendAdminBundle:Subcategoria')->findBy(array("categoria"=>$categoriaId));
     
      $resultado=array();
      foreach($subcategorias as $s){
            $record=array();
            $record["id"]=$s->getId();
            $record["name"]=$s->getName();
            $record["category"] = $s->getCategoria()->getName();
            $resultado[] = $record;
       }
       
       return $resultado;
    }

    // devuelve las tiendas según barrio y subcategoria devolver con status

    public function getTiendasAction(Request $request){
        
        $barrioId =trim(mb_convert_case($request->get("barrio"),MB_CASE_LOWER));
		$time = trim(mb_convert_case($request->get("time"),MB_CASE_LOWER)); 
   		$dia = trim(mb_convert_case($request->get("day"),MB_CASE_LOWER));
        $subId = trim(mb_convert_case($request->get("cat"),MB_CASE_LOWER));


		$time_array = explode(":",$time);
		$ahora = $time_array[0]*60 + $time_array[1];

        $dql= "SELECT u FROM BackendCustomerAdminBundle:Sucursal u JOIN u.direccion d"; // where d.barrio = ".$barrioId;

        if($subId){

            $dql.= " JOIN u.subcategorias s where s.id =".$subId." and d.barrio = ".$barrioId;

            $session = $this->getRequest()->getSession();
            $session->set('categoria',$subId);

        }else{

            $dql.= " where d.barrio = ".$barrioId;
        }
        $em = $this->getDoctrine()->getManager();
		$query = $em->createQuery($dql);
		$tiendas = $query->getResult();
        
        $listado=array();
        
        foreach ($tiendas as $tienda) {
			  
			  $open = false;
			  $horarios = $tienda->getHorarios();
			  $horarios_tienda = array(); 	
			
			  foreach($horarios as $horario) {

                  if ($horario->getCerrado()) {
                      $horarios_tienda[] = $horario->getDia()->getName() . ": Cerrado";
                  } else {

                      $horarios_tienda[] = $horario->getDia()->getName() . ":" . $horario->getDesde() . "-" . $horario->getHasta() . " hs.";

                      if($horario->getDesdeT() != null && $horario->getHastaT() != null){

                          $horarios_tienda[] = $horario->getDia()->getName() . ":" . $horario->getDesdeT() . "-" . $horario->getHastaT() . " hs.";
                      }
                  }
              }

              $open = $this->checkOpenNow($horarios,$dia,$time);
			  $cierra = null; // para validar si está abierto al momento de comprar. 	
			  $record=array();
              $record["id"]=$tienda->getId();
              $record["name"]=$tienda->getName();              
			  if($tienda->getWebPath()){
              	$record["imagen"]=$tienda->getWebPath();
		  	  }else{		  	  	
				$record["imagen"]="images/home/shop_default.png";
		  	  }
              $record["horario"] = $horarios_tienda; 
              
              if($open){				  
				  $record["promo"] = "images/home/tienda_open.png";
				  $record["title"] = "Abierto";
			 
			  }else{
				  
				  if($tienda->getOpen()){
					  $record["promo"] = "images/home/tienda_pedido.png";
					  $record["title"] = "Toma pedidos"; 					   
				  
				  }else{
					  $record["promo"] = "images/home/tienda_close.png";
					  $record["title"] = "Cerrado";					  
				  }				  
			  }
			  $record["dia"] = $dia;

			  $record["cierra"] = $cierra;
			  $record["link"] = $this->generateUrl('frontend_show_products', array('id' =>$tienda->getId()));
              $record["favorito"]=$this->isFavorito($tienda);
              $listado[] = $record;

       
		} 
		
       $response = new Response(json_encode($listado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    
    }
    
    public function getTiendasPremiumAction(Request $request){

        $time = trim(mb_convert_case($request->get("time"),MB_CASE_LOWER));
        $dia = trim(mb_convert_case($request->get("day"),MB_CASE_LOWER));
        //mostrar en el slider principal sucursales premium activas
        $tiendas = $this->getDoctrine()->getRepository('BackendCustomerAdminBundle:Sucursal')
                  ->findBy(array("is_active"=>true,"premium"=>true));        
        
        $listado=array();
        
        foreach ($tiendas as $tienda) {
			  
			  $open = false;
			  $horarios = $tienda->getHorarios();
              $open = $this->checkOpenNow($horarios,$dia,$time);
			  $horarios_tienda = array(); 	
			
			  foreach($horarios as $horario) {

                  if ($horario->getCerrado()) {
                      $horarios_tienda[] = $horario->getDia()->getName() . ": Cerrado";
                  } else {
                      $horarios_tienda[] = $horario->getDia()->getName() . ":" . $horario->getDesde() . "-" . $horario->getHasta() . " hs.";
                  }
              }
			  $record=array();
              $record["id"]=$tienda->getId();
              $record["name"]=$tienda->getName();
			  if($tienda->getWebPath()){
              	$record["imagen"]=$tienda->getWebPath();
		  	  }else{		  	  	
				$record["imagen"]="images/home/shop_default.png";
		  	  }
              $record["horario"] = $horarios_tienda; 
              
              if($open){				  
				  $record["promo"] = "images/home/tienda_open.png";
				  $record["title"] = "Abierto";
			  }else{
				  
				  if($tienda->getOpen()){
					  $record["promo"] = "images/home/tienda_pedido.png";
					  $record["title"] = "Toma pedidos";
				  }else{
					  $record["promo"] = "images/home/tienda_close.png";
					  $record["title"] = "Cerrado";					  
				  }				  
			  }
			  
         $record["favorito"]=$this->isFavorito($tienda);
         $record["link"] =$this->generateUrl('frontend_show_products', array('id' => $tienda->getId()));
            $listado[] = $record;

	   }
       $response = new Response(json_encode($listado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    
    }
    
    private function isFavorito($tienda){
       $session = $this->getRequest()->getSession();
       $customer=$session->get("customer");
       if (!$customer){
         return false;
       }
       else{
        $customer_id=$customer->getId();
        $sucursal_id=$tienda->getId();
        $em = $this->getDoctrine()->getManager();
        $favorito = $em->getRepository('BackendCustomerAdminBundle:Favorito')->findOneBy(array("customer"=>$customer_id,"sucursal"=>$sucursal_id));
        if ($favorito){
          return true;
        }else{
          return false;
        }  
       
       }
    
    }

    /* Devuelve el header de la tienda
    *  en un futuro permitirá asignar header personalizado
    */

    /*
    public function getHeaderTienda(Request $request){

        $id = trim(mb_convert_case($request->get("tienda"),MB_CASE_LOWER));

        $em = $this->getDoctrine()->getManager();
        $sucursal = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($id);

        $header = $sucursal->getHeaderPath();

        $data['header'] = $header;

        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }
*/
    public function resetFiltroAction(Request $request,$id){

        $session = $this->getRequest()->getSession();
        $session->remove('categoria');

        return $this->getProductsByTiendaAction($request,$id);
    }


    /**
     * @param Request $request
     * @param $id
     * @return Response
     */

    public function getProductsByTiendaAction(Request $request, $id){

        $search = " ";
        $session = $this->getRequest()->getSession();
        $subId = $session->get('categoria');
        $filter = trim(mb_convert_case($request->get("filter"),MB_CASE_LOWER));
        $resultado = array();

		if($id) {
            $em = $this->getDoctrine()->getManager();
            $sucursal = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($id);
            $productos = $sucursal->getProductos();
            $horarios = $sucursal-> getHorarios();

            if ($subId) {

                $subcategoria = $em->getRepository('BackendAdminBundle:Subcategoria')->find($subId)->getName();

                foreach ($productos as $prod) {

                    if ($prod->getSubcategoria()->getId() == $subId) {

                        $resultado[] = $prod;
                    }
                }

            }else{
                $resultado = $productos;
                $subcategoria = "Todos";
            }

            $count = count($resultado);


            return $this->render('FrontendHomeBundle:Shop:index.html.twig', array(

                'tienda' => $sucursal,
                'productos' => $resultado,
                'subcategoria' => $subcategoria,
                'count' => $count,
                'search'=>$search,
                'horarios'=>$horarios
            ));

		}else{
			
			return $this->render('FrontendHomeBundle:Home:index.html.twig');
		}
	}



    /**
     * @param Request $request
     * @return Response
     */
    
    public function addFavoritoAction(Request $request){
      $session = $this->getRequest()->getSession();
      $resultado=array("status"=>1,"message"=>'');
      $customer=$session->get("customer");
      if ($customer){
          $sucursal_id = $request->request->get("sucursal");
          $customer_id = $customer->getId();    
                    
          $em = $this->getDoctrine()->getManager();
    
          $favorito = $em->getRepository('BackendCustomerAdminBundle:Favorito')->findOneBy(array("customer"=>$customer_id,"sucursal"=>$sucursal_id));
           if ($favorito){
              $em->remove($favorito);
              $em->flush();
              $resultado["status"]=1;
              $resultado["message"]="Se quito el favorito";
              
           }else{
              $favorito = new Favorito();
              $favorito->setCustomer($em->getRepository('BackendCustomerBundle:Customer')->find($customer_id));
              $favorito->setSucursal($em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($sucursal_id));
              $em->persist($favorito);
              $em->flush();
              $resultado["status"]=0;
              $resultado["message"]="Agregado como favorito";
           }
       }else{
          $resultado["message"]="Debe logearse para agregar la sucursal como favorita";
       }
       $response = new Response(json_encode($resultado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
      
    
    }
	
	private function checkOpenNow($horarios,$dia,$time){
		
		$open = false;
        $h_partido = false;
		
		$time_array = explode(":",$time);		
		$ahora = $time_array[0]*60 + $time_array[1];		
		
		foreach($horarios as $horario){
			
			if($horario->getDia()->getId() == $dia){
				
				if($horario->getCerrado()){ // esta cerrado 
					
					$open = false;
				
				}else{						

                  $h_partido = false;

				  if($horario->getDesde()){
			
					$desde_array = explode(":",$horario->getDesde());					
					$desde = $desde_array[0]*60 + $desde_array[1];
				  }
				  if($horario->getHasta()){
					$hasta_array = explode(":",$horario->getHasta());					
					$hasta = $hasta_array[0]*60 + $hasta_array[1];
										
				  }
                    if($horario->getDesdeT()){

                        $desdeT_array = explode(":",$horario->getDesdeT());
                        $desdeT = $desdeT_array[0]*60 + $desdeT_array[1];
                        $h_partido = true;

                    }
                    if($horario->getHastaT()){
                        $hastaT_array = explode(":",$horario->getHastaT());
                        $hastaT = $hastaT_array[0]*60 + $hastaT_array[1];
                        $h_partido = true;

                    }

                  if($h_partido == true) {

                       if(($ahora > $hasta && $ahora < $desdeT) || ($ahora < $desde || $ahora > $hastaT)){

                           $open = false;

                       }else{

                           $open = true;
                       }

                  }else {

                      // valida el caso que cierre a las 0:00 hs
                      if (($ahora < $desde || $ahora > $hasta) xor ($ahora > $desde && $ahora > $hasta)) {

                          $open = false;
                          // valida evaluar el dia anterior si cierra pasadas las 12

                      /* else if($ahora > $desde && $ahora > $hasta){

                         $diaAnterior = $this->diaAnterior($horario->getDia());

                         foreach($horarios as $ho){

                            if ($horarios->getDia()->getId() == $diaAnterior){

                                if($horario->getDesde()){

                                    $desde_array = explode(":",$horario->getDesde());
                                    $desde = $desde_array[0]*60 + $desde_array[1];
                                }
                                if($horario->getHasta()){
                                    $hasta_array = explode(":",$horario->getHasta());
                                    $hasta = $hasta_array[0]*60 + $hasta_array[1];

                                }
                                if($ahora > $desde && $ahora > $hasta ){

                                    $open = true;
                                }
                            }
                         }
                     }*/
                    }else{

                      $open = true;
                      $cierra = $hasta;
                    }

                  } // Si está abierto
                }
			}	
		}		
		return $open;
	}

    /*

    private function diaAnterior(Dia $dia){


        if ( $dia->getId() != 7){

            return $dia->getId() -1;
        } else{

            return 1;
        }

    }
    */

	/* Verifica si la tienda sigue abierta */
	
	public function checkTimeAction(Request $request){
		
		$dia = trim(mb_convert_case($request->get("day"),MB_CASE_LOWER));
		$hora = trim(mb_convert_case($request->get("time"),MB_CASE_LOWER));
		$tiendaId = trim(mb_convert_case($request->get("tienda"),MB_CASE_LOWER));
        
        $em = $this->getDoctrine()->getManager();

        $sucursal = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($tiendaId);
		
		$horarios = $sucursal->getHorarios();
		
		$status = $this->checkOpenNow($horarios,$dia,$hora);
		
		$resultado=array("status"=>$status);
      
        $response = new Response(json_encode($resultado));
        
        $response->headers->set('Content-Type', 'application/json');
  
        return $response;
		
	}
    
    public function checkBarrioAction(Request $request){
     
      $barrio=trim(mb_convert_case($request->get("barrio"),MB_CASE_LOWER));
      $zona=trim(mb_convert_case($request->get("zona"),MB_CASE_LOWER));
      
      $dql="SELECT u FROM BackendAdminBundle:Zona u "  ;
      $dql.=" where u.name like '".$zona."' ";
      $dql .=" order by u.name";
      
      //primero localizo la zona luego localizo el barrio
      //si no existe la zona ni el barrio muestro todo
      //sino muestro segun lo que pueda identificar
       $em = $this->getDoctrine()->getManager();
       $query = $em->createQuery($dql);
       $zonas = $query->getResult();
       $zonaId = 0;
       $barrioId = 0;
       if (count($zonas) == 1){
          $zonaId = $zonas[0]->getId();
          $dql="SELECT u FROM BackendAdminBundle:Barrio u "  ;
          $dql.=" where u.name like '".$barrio."' and u.zona ='".$zonaId."' ";
          $dql .=" order by u.name";
          
          $query = $em->createQuery($dql);
          $barrios = $query->getResult();
          if (count($barrios) == 1){
              $barrioId = $barrios[0]->getId();
          }
       }else{
		   
		  $dql="SELECT u FROM BackendAdminBundle:Barrio u "  ;
          $dql.=" where u.name like '".$barrio."' order by u.name";
		  $query = $em->createQuery($dql);
		  $barrios = $query->getResult();
          if (count($barrios) == 1){
              $barrioId = $barrios[0]->getId();
              $zonaId = $barrios[0]->getZona()->getId();
          }		  	
	   }
	   
       $resultado=array("zonaId"=>$zonaId, "barrioId"=>$barrioId);
      
       $response = new Response(json_encode($resultado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
       
    
    }
   
    
	  public function forgotPasswordAction(Request $request){
       	$resultado=array("status"=>1,"message"=>'');    //status => 0 no hay problemas 1: error
    		$email=$request->get("email");
        if ($email){
            $service = new \Backend\CustomerBundle\Services\CustomerService($this->get('doctrine.orm.default_entity_manager'));
            $forgotResponse = $service->forgotPassword($email);
            $respuesta=json_decode($forgotResponse); 
         
            if ($respuesta->status == 0) //se creo el cliente envio mail
        		{
        		  $em = $this->getDoctrine()->getManager();
              $empresa = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("empresa");
        		  $email_site = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("email");
        		  
        		  $url= $this->generateUrl(
              'frontend_change_pass',
              array('codigo' =>$respuesta->codigo ), true );
        
              $message = \Swift_Message::newInstance()
                    ->setSubject("Olvido su Contraseña en el sitio ".$empresa->getValue())
                    ->setFrom($email_site->getValue())
                    ->setTo($respuesta->email)
                    ->setBody(
                        $this->renderView(
                            'BackendCustomerBundle:Customer:forgot_email.html.twig',
                            array('name' => $respuesta->name,
                                   'url' => $url  )
                        ),'text/html'
                    );
            
            
             
              @$this->get('mailer')->send($message);
               $resultado["status"]=0;
               $resultado["message"]=$respuesta->message;
               
        		}else{
               $resultado["message"]=$respuesta->message;
             }
        		
           
        }
        $response = new Response(json_encode($resultado));
        
        $response->headers->set('Content-Type', 'application/json');
  
        return $response;
    }
	

    public function registerAction(Request $request)
    {
       	$resultado=array("status"=>1,"message"=>'');
        $em = $this->getDoctrine()->getManager();
       if ($request->getMethod() == 'POST') {  
        
        $customer=array();
        $customer["email"] = $request->get("email");    
      	$customer["password"] = $request->get("password");
    	  $customer["name"] = $request->get("name");
        $customer["lastname"] = $request->get("lastname");
		
    		if($request->get("comercio") == 1){
            	$customer["role"]="ROLE_COMERCIO"; //el comercio se da de alta como pendiente
              $customer["isComercio"] = true;
              $status=$em->getRepository('BackendCustomerBundle:Status')->findOneByName("Pendiente");
              $customer["status"]=$status;
         
    		}else{
    			$customer["role"]="ROLE_CLIENTE";  //el usuario se da de alta como habilitado
				$customer["isComercio"] = false;
				$status=$em->getRepository('BackendCustomerBundle:Status')->findOneByName("Pendiente");
				$customer["status"]=$status;			
        }        
        
    		$service = new \Backend\CustomerBundle\Services\CustomerService($this->get('doctrine.orm.default_entity_manager'));
    		$registerResponse = $service->register($customer);
    		
    		$respuesta=json_decode($registerResponse);
    		
    		if ($respuesta->status == 0) //se creo el cliente envio mail
    		{
    		  
			  $empresa = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("empresa");
    		  $email_site = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("email");
    		  
    		  $url= $this->generateUrl(
            'frontend_activate_account',
            array('codigo' =>$respuesta->codigo ), true );
    		  
    		  $message = \Swift_Message::newInstance()
                    ->setSubject("Registro en ".$empresa->getValue())
                    ->setFrom($email_site->getValue())
                    ->setTo($customer["email"])
                    ->setBody(
                        $this->renderView(
                            'BackendCustomerBundle:Customer:register_email.html.twig',
                            array('name' => $customer["name"],
                             'url' =>$url
                             )
                        ),'text/html'
                    );
        
        
         
          @$this->get('mailer')->send($message);
          $resultado["status"]=0;
          $resultado["message"]=$respuesta->message;
    		}else{
           $resultado["message"]=$respuesta->message;
         }
    		
        }
       
       $response = new Response(json_encode($resultado));
        
        $response->headers->set('Content-Type', 'application/json');
  
        return $response;   
        
        
    }
    
    
    public function changePasswordAction(Request $request, $codigo){
     
       
    if ($request->getMethod() == 'POST') {
       if ($codigo != '')
       {
       	$cambio=array("codigo"=>$request->get("codigo"),
                      "password"=>$request->get("password")
         );
         
        $service = new \Backend\CustomerBundle\Services\CustomerService($this->get('doctrine.orm.default_entity_manager'));
      	$response = $service->changePassword($cambio);
    		
      	$respuesta=json_decode($response);
      
      	if ($respuesta->status == 0) //se cambio la contraseña
    		{
    		  $em = $this->getDoctrine()->getManager();
          	  $empresa = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("empresa");
    		  $email_site = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("email");
    		  
          $message = \Swift_Message::newInstance()
                    ->setSubject("Cambio de Contraseña para el sitio ".$empresa->getValue())
                    ->setFrom($email_site->getValue())
                    ->setTo($respuesta->email)
                    ->setBody(
                        $this->renderView(
                            'BackendCustomerBundle:Customer:changepass_email.html.twig',
                            array('name' => $respuesta->name,
                                   'email' => $respuesta->email,
                                    'password' => $respuesta->password )
                        ),'text/html'
                    );
        
        
         
          @$this->get('mailer')->send($message);
         
          $this->get('session')->getFlashBag()->add('success' , 'Se ha enviado un mail con los datos de su cuenta.');
         
    		}
    	else{
          
           
             $this->get('session')->getFlashBag()->add('error' , 'Link incorrecto o ya ha activado su cuenta');
      }	
    
       }
       else{
            $this->get('session')->getFlashBag()->add('error' , 'Link incorrecto.');
          
       }
    
    
    }
       
          
     return $this->render('FrontendHomeBundle:Home:changePass.html.twig',array('codigo'=>$codigo));  
       
    
    }
    
    
    public function activateAccountAction(Request $request, $codigo){
    
     
   
       if ($codigo != '')
       {
       	$codigo=$this->getRequest()->get("codigo", null);
         
        $service = new \Backend\CustomerBundle\Services\CustomerService($this->get('doctrine.orm.default_entity_manager'));
      	$response = $service->activateAccount($codigo);
    		
      	$respuesta=json_decode($response);
      
      	if ($respuesta->status == 0) //se activo la cuenta
    		{
    		  $em = $this->getDoctrine()->getManager();
          $empresa = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("empresa");
    		  $email_site = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("email");
    		  
          $message = \Swift_Message::newInstance()
                    ->setSubject("Activo su cuenta para el sitio ".$empresa->getValue())
                    ->setFrom($email_site->getValue())
                    ->setTo($respuesta->email)
                    ->setBody(
                        $this->renderView(
                            'BackendCustomerBundle:Customer:activar_email.html.twig',
                            array('name' => $respuesta->name)
                        ),'text/html'
                    );
        
        
         
          @$this->get('mailer')->send($message);
          
           $this->get('session')->getFlashBag()->add('success' , 'Se ha activado su cuenta correctamente.');    
    		}
    	else{
          $this->get('session')->getFlashBag()->add('error' , 'No se ha podido activar la cuenta.');
      }	
    
       }
       else{
       
       $this->get('session')->getFlashBag()->add('error' , 'Link incorrecto.');
       }
    
    
    
         return $this->render('FrontendHomeBundle:Home:activate_account.html.twig', array('codigo'=>$codigo));
       
       
    
    }
    
    
    public function isLoginAction(Request $request){
        $session = $this->getRequest()->getSession();
        $resultado=array("status"=>1,"message"=>'');
         if ( $session->get('login') ){
            $resultado["status"]=0;
            $resultado["message"]="Esta logeado";
         }else{
            $resultado["status"]=1;
            $resultado["message"]="No esta logeado";
         }
       $response = new Response(json_encode($resultado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    }
    
		
    
} 
 
