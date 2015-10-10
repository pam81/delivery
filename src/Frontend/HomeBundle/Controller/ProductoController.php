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
use BackendCustomerAdmin\Entity\Producto;
/**
 * Producto controller.
 *
 */
class ProductoController extends Controller
{

   public function getVariedadesByProductoAction($id){
	
	//$sucursal_id = $request->request->get("sucursal");
	if($id){
		
        $em = $this->getDoctrine()->getManager();

        $producto = $em->getRepository('BackendCustomerAdminBundle:Producto')->find($id);
		
		$variedades = $sucursal->getVariedades();
	
	
       return $this->render('FrontendHomeBundle:Shop:index.html.twig', array(
        'variedades' => $variedades
		//'productos' => $productos
          
       ));
			
	}else{
		
		return $this->render('FrontendHomeBundle:Home:terminos.html.twig');
	}
    }
    
    
    public function showCarritoAction(){
    
      	return $this->render('FrontendHomeBundle:Cart:index.html.twig');
    
    }
    
	
}