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
    
    
   
    
} 
 