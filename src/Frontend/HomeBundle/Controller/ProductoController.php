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
     * @param Request $request
     * @param $id
     * @return Response
     */

    public function getProductsByTiendaFilter(Request $request,$id){

        $listado = array();

        if($id) {

            $filter = trim(mb_convert_case($request->get("filter"),MB_CASE_LOWER));
            $em = $this->getDoctrine()->getManager();
            $dql = "SELECT u FROM BackendCustomerAdminBundle:Producto p WHERE p.sucursales =".$id;

            if($filter) {

             $dql.=  " AND p.name like '%'.$filter.'%'";
            }
            $query = $em->createQuery($dql);
            $productos = $query->getResult();

            foreach($productos as $prod){

                    $record = array();
                    $record['id'] = $prod->getId();
                    $record['nombre'] = $prod->getName();
                    $record['descripcion'] = $prod->getDescription();
                    $record['imagen'] = $prod->getWebPath();
                    $record['precio'] = $prod->getPrice();

                    $listado[] = $record;
            }

        }

        $response = new Response(json_encode($listado));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
	
}