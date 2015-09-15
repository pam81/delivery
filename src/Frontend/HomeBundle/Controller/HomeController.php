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
            $listado[] = $record;
       }
       $response = new Response(json_encode($listado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    
    }
    
    public function getTiendasPremiumAction(Request $request){
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
    /*
	public function loginCreateAction(){
		
		return $this->render('FrontendHomeBundle:Login:index.html.twig');
		
	}
    */
    public function loginAction(Request $request){
    
        $email=$request->get("email");
        $password=$request->get("password");
        
        $path=$this->generateUrl("frontend_homepage");
        
        if ($request->get("_target_path")){
          $path=$this->generateUrl($request->get("_target_path"));
        }
        $resultado=array("status"=>0,"message"=>'', "redirect"=>'');
        if ($email && $password){
        try{
          
          $em = $this->getDoctrine()->getManager();
          $user=$em->getRepository('BackendCustomerBundle:Customer')->loadUserByUsername($email);
          
          if ( null !== $user && $user->comparePassword($password) ){
                  
                if (!$user->getIsActive()){
                     
                     $resultado["message"]='Usuario inhabilitado.';
                     $resultado["status"]=0;
                }else{  
                  $this->get('session')->set("user",$user);
                  $token = new UsernamePasswordToken($user, null, "frontend", $user->getRoles());
                  $this->get("security.context")->setToken($token); //now the user is logged in
                  $resultado["message"]='Usuario válido.';
                  $resultado["status"]=1;
                  $resultado["redirect"]=$path;
                  
                  $resultado["user"]=array("email"=>$user->getEmail(), "name"=>$user->getName(),"token"=>$token);
               }   
                  
          }else{
                  $resultado["message"]='Usuario y/o clave incorrectas.';
                  $resultado["status"]=0;             
                
          
          } 
           
         }catch(Exception $e){
                 $resultado["message"]='Usuario y/o clave incorrectas.';
                 $resultado["status"]=0; 
                
         }
         
        }else{
          
              $resultado["message"]='Usuario y/o clave incorrectas.';
              $resultado["status"]=0;
              
        }
        
        $response = new Response(json_encode($resultado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    }
	
	

    public function registerAction(Request $request)
    {
       if ($request->getMethod() == 'POST') {  
        
        $customer=array();
        $customer["email"] = $this->getRequest()->get("email", null);    
    	$customer["password"] = $this->getRequest()->get("password", null);
    	$customer["name"] = $this->getRequest()->get("name", null);
        $customer["lastname"] = $this->getRequest()->get("lastname", null);
        $customer["terminos"] = $this->getRequest()->get("terminos", null);
		
		
		if($this->getRequest()->get("comercio", null) == 1){
		
        	$customer["role"]="ROLE_VENDEDOR";
        
		}else{
        	
			$customer["role"]="ROLE_VISITOR";			
        }        
        
    		$service = new \Backend\CustomerBundle\Services\CustomerService($this->get('doctrine.orm.default_entity_manager'));
    		$registerResponse = $service->register($cliente);
    		
    		$respuesta=json_decode($registerResponse);
    		
    		if ($respuesta->status == 0) //se creo el cliente envio mail
    		{
    		  $em = $this->getDoctrine()->getManager();
          	  $empresa = $em->getRepository('BackendCustomerBundle:Seteo')->findOneByName("empresa");
    		  $email_site = $em->getRepository('BackendCustomerBundle:Seteo')->findOneByName("email");
    		  
    		  $url= $this->generateUrl(
            'activate_account',
            array('codigo' =>$respuesta->codigo ), true );
    		  
    		  $message = \Swift_Message::newInstance()
                    ->setSubject("Registro en ".$empresa->getValue())
                    ->setFrom($email_site->getValue())
                    ->setTo($customer["email"])
                    ->setBody(
                        $this->renderView(
                            'FrontendHomeBundle:Registro:register_email.html.twig',
                            array('name' => $customer["name"],
                             'url' =>$url
                             )
                        ),'text/html'
                    );
        
        
         
          @$this->get('mailer')->send($message);
          $this->get('session')->getFlashBag()->add('success' , $respuesta->message);
    		}else{
           $this->get('session')->getFlashBag()->add('error' , $respuesta->message);
         }
    		
       }
            return $this->render('FrontendHomeBundle:Registro:registrarse.html.twig');   
        
        
    }
		
    
} 
 