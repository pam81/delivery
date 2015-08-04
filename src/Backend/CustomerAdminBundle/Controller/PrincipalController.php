<?php

namespace Backend\CustomerAdminBundle\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Backend\CustomerBundle\Form\ProfileType;

class PrincipalController extends Controller
{
  

    public function indexAction()
    {
        return $this->render('BackendCustomerAdminBundle:Principal:index.html.twig');
    }
    
    public function accessAction()
    {
       $this->get('session')->getFlashBag()->add('error' , 'Su usuario no tiene acceso a esta sección.');    
      return $this->redirect($this->generateUrl('login_customer'));
    }
    
    public function blankAction()
    {
           
      return $this->render('BackendCustomerAdminBundle:Principal:blank.html.twig');
    } 
    
    public function profileAction(Request $request) {
        
        $customer=$this->getUser();
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendCustomerBundle:Customer')->find($customer->getId());

        if (!$entity) {
            throw $this->createNotFoundException('No se ha encontrado el cliente.');
        }

        $editForm = $this->createForm(new ProfileType(), $entity);
       

      $defaultData = array('message' => 'Type your message here');
      $form = $this->createFormBuilder($defaultData)
         ->add('password', 'repeated', array(
                        'type' => 'password',
                        'invalid_message' => 'No coincide la contraseña.',
                        'options' => array('attr' => array('class' => 'password-field')),
                        'required' => true,
                        'first_options'  => array('label' => 'Contraseña'),
                        'second_options' => array('label' => 'Repetir contraseña'),
                    ))
        
    
     
        ->getForm();

        if ($request->isMethod('POST')) {
          //update del profile
          if ($request->get('action') == 'update')
          {
          try{  
               
             $editForm->bind($request);

             if ($editForm->isValid()) {
               $em->persist($entity);
               $em->flush();
               $this->get('session')->getFlashBag()->add('success' , 'Se ha actualizado el perfil.');
            
             }
             else
                $this->get('session')->getFlashBag()->add('error' , 'No se ha podido modificar su perfil.');
             
           }
           catch(\Exception $e){
           
             $this->get('session')->getFlashBag()->add('error' , 'No se ha podido modificar su perfil.');
           }  
             
          }
          //change es para cambiar la contraseña
          if ($request->get('action') == 'change')
          {  
             $form->bind($request);
            // data is an array with "password", "confirm" as keys
            
            if ($form->isValid()){
                $data = $form->getData();
                $entity->setPassword($data["password"]);
                $em->persist($entity);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success' , 'Se ha cambiado su contraseña.');
            }
            else
                $this->get('session')->getFlashBag()->add('error' , 'No se ha podido modificar su contraseña.');
          }  
        }
        
        return $this->render('BackendCustomerBundle:Customer:profile.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'pass'   => $form->createView()
            
        ));
        
        
        
    }
    
    
}