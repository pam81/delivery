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
use BackendCustomerAdmin\Entity\Favorito;
/**
 * Home controller.
 *
 */
class HomeController extends Controller
{

   
    public function indexAction(Request $request)
    {        
        return $this->render('FrontendHomeBundle:Home:index.html.twig');        
    }
    
    public function faqAction(Request $request)
    {    
        return $this->render('FrontendHomeBundle:Home:faqs.html.twig');
                
    }
    
    //obtener listado de zonas y barrios 
    public function menuZonaAction(Request $request){
    
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
    
     //obtener listado de categorias y subcategorias 
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
    
    //obtener listado de los barrios según la zona
    private function getSubcategorias($categoriaId){
      $subcategorias = $this->getDoctrine()->getRepository('BackendAdminBundle:Subcategoria')->findBy(array("categoria"=>$categoriaId));
     
      $resultado=array();
      foreach($subcategorias as $s){
            $record=array();
            $record["id"]=$s->getId();
            $record["name"]=$s->getName();
            $resultado[] = $record;
       }
       
       return $resultado;
    }
    
    public function getTiendasAction(Request $request){
        
     
      $listado=array();
      for($i=0; $i< 6; $i++){
            $record=array();
            $record["id"]=$i;
            $record["name"]="";
            $record["imagen"]="images/home/product1.jpg";
            $record["estado"]=rand(0,1); //0:cerrado 1: abierto
            $record["horario"]="Lunes a Viernes 9 a 18hs";
            $listado[] = $record;
       }
       $response = new Response(json_encode($listado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    
    }
    
    public function getTiendasPremiumAction(Request $request){
        
        //mostrar en el slider principal sucursales activas
      /*$tiendas = $this->getDoctrine()->getRepository('BackendCustomerAdminBundle:Sucursal')
                  ->findBy(array("is_active"=>true));*/
        
        $listado=array();
        $images=array("images/home/recommend1.jpg", "images/home/recommend2.jpg", "images/home/recommend3.jpg");
        for($i=0; $i< 6; $i++){
              $record=array();
              $record["id"]=$i;
              $record["name"]="";
              $record["imagen"]=$images[rand(0,2)];
              $record["estado"]=rand(0,1); //0:cerrado 1: abierto
              $listado[] = $record;
         }
    
       $response = new Response(json_encode($listado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    
    }
    
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
              $favorito->setCustomer($em->getRepository('BackendCustomerBundle:User')->find($customer_id));
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
              'change_pass',
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
       if ($request->getMethod() == 'POST') {  
        
        $customer=array();
        $customer["email"] = $request->get("email");    
      	$customer["password"] = $request->get("password");
    	  $customer["name"] = $request->get("name");
        $customer["lastname"] = $request->get("lastname");
		
    		if($request->get("comercio") == 1){
            	$customer["role"]="ROLE_COMERCIO";
              $customer["isComercio"] = true;
    		}else{
    			$customer["role"]="ROLE_CLIENTE";
          $customer["isComercio"] = false;			
        }        
        
    		$service = new \Backend\CustomerBundle\Services\CustomerService($this->get('doctrine.orm.default_entity_manager'));
    		$registerResponse = $service->register($customer);
    		
    		$respuesta=json_decode($registerResponse);
    		
    		if ($respuesta->status == 0) //se creo el cliente envio mail
    		{
    		  $em = $this->getDoctrine()->getManager();
          $empresa = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("empresa");
    		  $email_site = $em->getRepository('BackendUserBundle:Seteo')->findOneByName("email");
    		  
    		  $url= $this->generateUrl(
            'activate_account',
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
     	$resultado=array("status"=>1,"message"=>'');
       
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
          $resultado["status"]=0;
       
         
    		}
    	else{
          
            $resultado["message"]='Link incorrecto o ya ha activado su cuenta.';
      }	
    
       }
       else{
       
           $resultado["message"]= 'Link incorrecto.';
       }
    
    
    }
       
     $response = new Response(json_encode($resultado));
        
        $response->headers->set('Content-Type', 'application/json');
  
        return $response;       
       
       
    
    }
    
    
    public function activateAccountAction(Request $request, $codigo){
    
      $resultado=array("status"=>1,"message"=>'');
   
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
          
          $resultado["status"]=0;
          $resultado["message"]='Se ha activado su cuenta correctamente.';  
    		}
    	else{
          $resultado["message"]= 'No se ha podido activar la cuenta.';
      }	
    
       }
       else{
       
       $resultado["message"]= 'Link incorrecto.';
       }
    
    
    
        $response = new Response(json_encode($resultado));
        
        $response->headers->set('Content-Type', 'application/json');
  
        return $response; 
       
       
    
    }
    
		
    
} 
 
