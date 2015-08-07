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
    
} 
 