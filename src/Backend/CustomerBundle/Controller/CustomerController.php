<?php

namespace Backend\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Backend\CustomerBundle\Entity\Customer;
use Backend\CustomerBundle\Form\CustomerType;
use Backend\CustomerBundle\Form\ProfileType;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
/**
 * Customer controller.
 *
 */
class CustomerController extends Controller
{
    /**
     * Lists all Customer entities.
     * ADMIN: solo puede tener acceso a abm de clientes
     */
     
    public function setContainer(ContainerInterface $container = null)
{
     parent::setContainer($container); 
   
}
     
    public function indexAction(Request $request,$search)
    {
     
      if ( $this->get('security.context')->isGranted('ROLE_VIEWCUSTOMER')) {
        $em = $this->getDoctrine()->getManager();
         //setear la busqueda del place para direccionar luego
        $this->get('session')->set('customer_search',$search);
        
        $dql="SELECT u FROM BackendCustomerBundle:Customer u where u.isDelete=0 ";
        if($search)
          $dql .= " and ( u.email like '%$search%' or u.name like '%$search%' or u.lastname like '%$search%' )";
        
        $dql .=" order by u.email"; 
        $query = $em->createQuery($dql);
        
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1)/*page number*/,
        $this->container->getParameter('max_on_listepage')/*limit per page*/
    );
        
        $deleteForm = $this->createDeleteForm(0);
        return $this->render('BackendCustomerBundle:Customer:index.html.twig', 
        array('pagination' => $pagination,
        'delete_form' => $deleteForm->createView(),
        'search'=>$search
        ));
        
    }
     else
         throw new AccessDeniedException();  
        
    
    }

    /**
     * Creates a new Customer entity.
     *
     */
    public function createAction(Request $request)
    {
       
        if ( $this->get('security.context')->isGranted('ROLE_ADDCUSTOMER')) {
        $entity  = new Customer();
        $form = $this->createForm(new CustomerType(), $entity);
        $form->bind($request);
         
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se ha creado un nuevo cliente.');
            return $this->redirect($this->generateUrl('customer_edit', array('id' => $entity->getId())));
        }
        
        

        return $this->render('BackendCustomerBundle:Customer:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
           
        ));
      }
      else
       throw new AccessDeniedException();    
    }

    /**
     * Displays a form to create a new Customer entity.
     *
     */
    public function newAction()
    {
        if ( $this->get('security.context')->isGranted('ROLE_ADDCUSTOMER')) {
        $entity = new Customer();
        $form   = $this->createForm(new CustomerType(), $entity);

        return $this->render('BackendCustomerBundle:Customer:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
            
        ));
       }
       else
          throw new AccessDeniedException();   
    }

    /**
     * Finds and displays a Customer entity.
     *
     */
    public function showAction($id)
    {
      if ( $this->get('security.context')->isGranted('ROLE_VIEWCUSTOMER')) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendCustomerBundle:Customer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No se ha encontrado el cliente.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendCustomerBundle:Customer:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
      }
      else
         throw new AccessDeniedException();        
    }

    /**
     * Displays a form to edit an existing Customer entity.
     *
     */
    public function editAction($id)
    {
       if ( $this->get('security.context')->isGranted('ROLE_MODCUSTOMER')) { 
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendCustomerBundle:Customer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No se ha encontrado el cliente.');
        }

        $editForm = $this->createForm(new CustomerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendCustomerBundle:Customer:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            
        ));
      }
      else
         throw new AccessDeniedException();    
    }

    /**
     * Edits an existing Customer entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
       if ( $this->get('security.context')->isGranted('ROLE_MODCUSTOMER')) {  
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendCustomerBundle:Customer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No se ha encontrado el cliente.');
        }

       $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CustomerType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add('success' , 'Se ha actualizado el cliente.');
            return $this->redirect($this->generateUrl('customer_edit', array('id' => $id)));
        }

        return $this->render('BackendCustomerBundle:Customer:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            
        ));
      }
      else
         throw new AccessDeniedException();    
        
    }

    /**
     * Deletes a Customer entity.
     *  No se borra se pone en true isDelete
     */
    public function deleteAction(Request $request, $id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_DELCUSTOMER')) { 
            $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendCustomerBundle:Customer')->find($id);

            if (!$entity) {
                $this->get('session')->getFlashBag()->add('error' , 'No se ha borrado el cliente.');
                throw $this->createNotFoundException('No se ha encontrado el Usuario.');
            }
            $entity->setIsDelete(true);
            $entity->setIsActive(false);
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se ha borrado el cliente.');
        }

        return $this->redirect($this->generateUrl('customer',array('search' => $this->get('session')->get('customer_search') )));
      }
      else
       throw new AccessDeniedException();    
    }
    
    
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    
   
    
    
    public function registerAction(Request $request)
    {
       if ($request->getMethod() == 'POST') {  
        
        $cliente=array();
        $cliente["email"] = $this->getRequest()->get("email", null);    
    	$cliente["password"] = $this->getRequest()->get("password", null);
    	$cliente["name"] = $this->getRequest()->get("name", null);
        $cliente["lastname"] = $this->getRequest()->get("lastname", null);
        $cliente["role"]="ROLE_VISITOR";
        
        
        
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
                    ->setTo($cliente["email"])
                    ->setBody(
                        $this->renderView(
                            'BackendCustomerBundle:Customer:register_email.html.twig',
                            array('name' => $cliente["name"],
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
            return $this->render('BackendCustomerBundle:Customer:registrarse.html.twig');   
        
        
    }
    
    public function forgotPasswordAction(Request $request){
     
    if ($request->getMethod() == 'POST') {
    	$service = new \Backend\CustomerBundle\Services\CustomerService($this->get('doctrine.orm.default_entity_manager'));
    	$forgotResponse = $service->forgotPassword($this->getRequest()->get("email", null));
    		
    	$respuesta=json_decode($forgotResponse);
    
      if ($respuesta->status == 0) //se creo el cliente envio mail
    		{
    		  $em = $this->getDoctrine()->getManager();
          $empresa = $em->getRepository('BackendCustomerBundle:Seteo')->findOneByName("empresa");
    		  $email_site = $em->getRepository('BackendCustomerBundle:Seteo')->findOneByName("email");
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
        
        
         
          $this->get('mailer')->send($message);
          $this->get('session')->getFlashBag()->add('success' , 'Se ha enviado un mail para cambiar su contraseña.');  
    		}
    	else{
          $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado el cliente.');
      }	
    
    }
     return $this->render('BackendCustomerBundle:Customer:forgot.html.twig');         
        
    
    }
    
    public function changePasswordAction(Request $request, $codigo){
    
       
    if ($request->getMethod() == 'POST') {
       if ($codigo != '')
       {
       	$cambio=array("codigo"=>$this->getRequest()->get("codigo", null),
                      "password"=>$this->getRequest()->get("password", null)
         );
         
        $service = new \Backend\CustomerBundle\Services\CustomerService($this->get('doctrine.orm.default_entity_manager'));
      	$response = $service->changePassword($cambio);
    		
      	$respuesta=json_decode($response);
      
      	if ($respuesta->status == 0) //se cambio la contraseña
    		{
    		  $em = $this->getDoctrine()->getManager();
          	  $empresa = $em->getRepository('BackendCustomerBundle:Seteo')->findOneByName("empresa");
    		  $email_site = $em->getRepository('BackendCustomerBundle:Seteo')->findOneByName("email");
    		  
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
        
        
         
          $this->get('mailer')->send($message);
         $this->get('session')->getFlashBag()->add('success' , 'Se ha enviado un mail con los datos de su cuenta.');  
    		}
    	else{
          $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado el cliente.');
      }	
    
       }
       else{
       
       $this->get('session')->getFlashBag()->add('error' , 'Link incorrecto.');
       }
    
    
    }
       return $this->render('BackendCustomerBundle:Customer:change.html.twig', array('codigo'=>$codigo));
     
       
       
    
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
          $empresa = $em->getRepository('BackendCustomerBundle:Seteo')->findOneByName("empresa");
    		  $email_site = $em->getRepository('BackendCustomerBundle:Seteo')->findOneByName("email");
    		  
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
        
        
         
          $this->get('mailer')->send($message);
          $this->get('session')->getFlashBag()->add('success' , 'Se ha activado su cuenta correctamente.');  
    		}
    	else{
          $this->get('session')->getFlashBag()->add('error' , 'No se ha podido activar la cuenta.');
      }	
    
       }
       else{
       
       $this->get('session')->getFlashBag()->add('error' , 'Link incorrecto.');
       }
    
    
    
       return $this->render('BackendCustomerBundle:Customer:activate_account.html.twig', array('codigo'=>$codigo));
     
       
       
    
    }
    

    
}
