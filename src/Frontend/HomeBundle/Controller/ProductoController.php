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
use Backend\CustomerAdminBundle\Entity\Producto;
use Backend\CustomerAdminBundle\Entity\Sucursal;

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

            $variedades = $producto->getVariedades();


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

    /**
     * @param $search
     * @param $id
     * @return Response
     */



    public function getProductsByTiendaFilterAction($id,$search){

        $resultado = array();

        if($id) {

            $em = $this->getDoctrine()->getManager();
            $sucursal = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($id);
            $horarios = $sucursal->getHorarios();

            $dql = "SELECT p FROM BackendCustomerAdminBundle:Producto p JOIN p.sucursales s WHERE s.id =".$id;

            if($search) {

             $dql.=  " AND p.name like '%".$search."%'";

            }
            $query = $em->createQuery($dql);
            $productos = $query->getResult();
            $resultado = $productos;
            $count = count($resultado);
        }

        return $this->render('FrontendHomeBundle:Shop:index.html.twig', array(

            'tienda' => $sucursal,
            'productos' => $resultado,
            'subcategoria' => $search,
            'count' => $count,
            'search'=>$search,
            'horarios' =>$horarios
        ));

    }


   public function llegaAction(Request $request){

      $session = $this->getRequest()->getSession();
      $resultado=array("status"=>1,"message"=>'No llega');
      $direccion=$request->get("direccion");
      
      $tienda=$request->get("tienda");
      //verificar siu llega con la direccion real

       $em = $this->getDoctrine()->getManager();
       $sucursal = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($tienda);

       $llega = $this->llega($sucursal,$lat,$long);

          if($llega) {

              $resultado["status"] = 0;
              $resultado["message"] = 'llega';
          }
      
      $response = new Response(json_encode($resultado));
        
      $response->headers->set('Content-Type', 'application/json');
  
      return $response;
   
   }

   /*
    *  Calcula si está dentro del radio de entrega
    */

   private function calculoDistancia(Sucursal $s, $lat2, $long2){

           $direccion = $s->getDireccion();

           $lat1 = $direccion->getLat();
           $long1 = $direccion->getLon();
           $radio = $s->getRadio();

           $degtorad = 0.01745329;
           $radtodeg = 57.29577951;

           $dlong = ($long1 - $long2);
           $dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad))
               + (cos($lat1 * $degtorad) * cos($lat2 * $degtorad)
                   * cos($dlong * $degtorad));

           $dd = acos($dvalue) * $radtodeg;

           $km = ($dd * 111.302);

           if($km <= $radio)

                return true;

           return false;
   }


   //realizar el pedido a la tienda
   public function realizarPedidoAction(Request $request){
      $resultado=array("status"=>1,"message"=>'No llega');
   
          $resultado["status"]=0;
          $resultado["message"]='llega';
      
      $response = new Response(json_encode($resultado));
        
      $response->headers->set('Content-Type', 'application/json');
  
      return $response;
   
   }



	
}