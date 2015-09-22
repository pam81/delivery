<?php

namespace Backend\CustomerAdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Backend\CustomerAdminBundle\Entity\Sucursal;
use Backend\AdminBundle\Entity\Horario;
use Backend\CustomerAdminBundle\Form\SucursalType;

use Backend\CustomerAdminBundle\Entity\Customer;
/**
 * Sucursal controller.
 *
 */
class SucursalController extends Controller
{

     public function generateSQL($search){
     
        $user=$this->getUser();
	      
        $dql="SELECT u FROM BackendCustomerAdminBundle:Sucursal u JOIN u.customer c where c.id = ".$user->getId()  ;

		$search= mb_convert_case($search,MB_CASE_LOWER);        
       
        if ($search)
          
		  $dql.=" where u.name like '%$search%' ";
          
          $dql .=" order by u.id"; 
        
        return $dql;
     
     }

    /**
     * Lists all Direcciones entities.
     *
     */
    public function indexAction(Request $request,$search){
		
        if ( $this->get('security.context')->isGranted('ROLE_VIEWSUCURSAL')) {
         $em = $this->getDoctrine()->getManager();
        
         $dql=$this->generateSQL($search);
         $query = $em->createQuery($dql);
        
         $paginator  = $this->get('knp_paginator');
         $pagination = $paginator->paginate(
         $query,
         $this->get('request')->query->get('page', 1)/*page number*/,
         $this->container->getParameter('max_on_listepage')/*limit per page*/
     		);
        
         $deleteForm = $this->createDeleteForm(0);
         return $this->render('BackendCustomerAdminBundle:Sucursal:index.html.twig', 
         array('pagination' => $pagination,
         'delete_form' => $deleteForm->createView(),
         'search'=>$search
         ));
        
     	}
      else
          throw new AccessDeniedException(); 
     }
		
		
		/*
   
    {
       if ( $this->get('security.context')->isGranted('ROLE_VIEWDIRECCION')) {
        $em = $this->getDoctrine()->getManager();
        
        $dql=$this->generateSQL($search);
        $query = $em->createQuery($dql);
        
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1) /*page number*//*,
        $this->container->getParameter('max_on_listepage') /*limit per page*/
    /*);
        
        $deleteForm = $this->createDeleteForm(0);
        return $this->render('BackendCustomerAdminBundle:Sucursal:index.html.twig', 
        array('pagination' => $pagination,
        'delete_form' => $deleteForm->createView(),
        'search'=>$search
        ));
        
    }
     else
         throw new AccessDeniedException(); 
    }
	
        if ( $this->get('security.context')->isGranted('ROLE_VIEWSUCURSAL')) {
       
         
        	if (!$this->get('security.context')->isGranted('ROLE_VENDEDOR')){
				
            	$search=$this->generateAdminSQL($request);
	
			}else{
				
             	$user=$this->getUser();
             	if (!$user->getId()){
                $this->get('session')->getFlashBag()->add('error' , 'Debe crear un usuario para la sucursal');
                return $this->redirect($this->generateUrl('home'));
            
		 		}else{
					
                	$dql =  $this->generateSQL($request,$user->getId());
        		}
     
		        $em = $this->getDoctrine()->getManager();
        
		        //$dql=$this->generateSQL($search);
		        $query = $em->createQuery($qry);
	 
	    }
       
        
		/*
        
        if (!$this->get('security.context')->isGranted('ROLE_VISITOR')){
            return $this->render('BackendCustomerAdminBundle:Cuenta:index.html.twig', 
            array(
            'resultados' => $search["resultados"],
            'search'=>$search
            ));
        }else{
            return $this->render('BackendAdminBundle:Cuenta:indexClient.html.twig', 
            array(
            'resultados' => $search,
            'clienteId'=>$user=$this->getUser()->getCliente()->getId()
            
            ));
        
        } 
		
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1) /*page number*///,
	
	//    $this->container->getParameter('max_on_listepage') /*limit per page*/
	/*
	    );
        
        $deleteForm = $this->createDeleteForm(0);
        return $this->render('BackendCustomerAdminBundle:Sucursal:index.html.twig', 
        array('pagination' => $pagination,
        'delete_form' => $deleteForm->createView(),
        'search'=>$search
        ));   
        
    }
     else
         throw new AccessDeniedException(); 
    }
	
	*/
	
    /**
     * Creates a new Direccion entity.
     *
     */
    public function createAction(Request $request)
    {
        if ( $this->get('security.context')->isGranted('ROLE_VENDEDOR')) {
        
			$entity  = new Sucursal();
			$customerId = $this->getUser()->getId();
			$em = $this->getDoctrine()->getManager();
			$customer = $em->getRepository('BackendCustomerBundle:Customer')->find($customerId);
        	$form = $this->createForm(new SucursalType(), $entity);
        	$form->bind($request);
         
        if ($form->isValid()) {
            
			$entity->setCustomer($customer);
			$em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se ha agregado una nueva sucursal.');
            return $this->redirect($this->generateUrl('sucursal_edit', array('id' => $entity->getId())));
        }
        
        

        return $this->render('BackendCustomerAdminBundle:Sucursal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
           
        ));
      }
      else
       throw new AccessDeniedException();
    }

    /**
    * Creates a form to create a Cliente entity.
    *
    * @param Direccion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Sucursal $entity)
    {
        $form = $this->createForm(new SucursalType(), $entity, array(
            'action' => $this->generateUrl('sucursal_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Barrio entity.
     *
     */
    public function newAction()
    {
       if ( $this->get('security.context')->isGranted('ROLE_ADDSUCURSAL')) {
        $entity = new Sucursal();
        $form   = $this->createForm(new SucursalType(), $entity);

        return $this->render('BackendCustomerAdminBundle:Sucursal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
            
        ));
       }
       else
          throw new AccessDeniedException();
    }

  
    /**
     * Displays a form to edit an existing Barrio entity.
     *
     */
    public function editAction($id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_MODSUCURSAL')) { 
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($id);

        if (!$entity) {
            
             $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado la direccion.');
             return $this->redirect($this->generateUrl('sucursal'));
        }

        $editForm = $this->createForm(new SucursalType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendCustomerAdminBundle:Sucursal:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            
        ));
      }
      else
         throw new AccessDeniedException(); 
    }

    /**
    * Creates a form to edit a Sucursal entity.
    *                                       
    * @param Direccion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sucursal $entity)
    {
        $form = $this->createForm(new SucursalType(), $entity, array(
            'action' => $this->generateUrl('sucursal_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Barrio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_MODSUCURSAL')) {  
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($id);

        if (!$entity) {
             $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado la sucursal.');
             return $this->redirect($this->generateUrl('sucursal'));
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SucursalType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add('success' , 'Se han actualizado los datos de la sucursal .');
            return $this->redirect($this->generateUrl('sucursal_edit', array('id' => $id)));
        }

        return $this->render('BackendCustomerAdminBundle:Sucursal:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            
        ));
      }
      else
         throw new AccessDeniedException();  
    }
	
    /**
     * Deletes a Direccion entity.
     *
     */
    
	public function deleteAction(Request $request, $id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_DELSUCURSAL')) { 
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($id);

            if (!$entity) {
                $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado la sucursal.');
             
            }
           else{
                  
            
            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se han borrado los datos de la sucursal.');
            
            }
        }

        return $this->redirect($this->generateUrl('direccion'));
      }
      else
       throw new AccessDeniedException(); 
    }

    /**
     * Creates a form to delete a Barrio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
	
	/**
	*  Load Dia Entity to create Horario 
	*/
	
    public function loadHorarioAction(Request $request){
		 
       	$em = $this->getDoctrine()->getManager();

		$dias = $em->getRepository('BackendAdminBundle:Dia')->findAll();
			
				if(!$dias){
				
					$data['existe']= false;
				
				}else{
						$data['existe'] = true;				
						
						foreach($dias as $dia){
							
								$d['id'] = $dia->getId();
								$d['name'] = $dia->getName();						
																				
								$resultados[] = $d;						
						}
						
						
						$data['resultados'] = $resultados;
								
				} 
					
			
			$response = new Response(json_encode($data));
			$response->headers->set('Content-Type', 'application/json');
			
			return $response;
    }
	
	/**
	 *  Listar horarios de atencion para la Sucursal 
	 */
	
	
    public function listarHorarioAction($id){
		 
        if ( $this->get('security.context')->isGranted('ROLE_VIEWSUCURSAL')) { 
         $em = $this->getDoctrine()->getManager();

         $entity = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($id);

         if (!$entity) {
             throw $this->createNotFoundException('No se ha encontrado al sucursal.');
         }

 		$horarios = $entity->getHorarios();
		$deleteForm = $this->createDeleteForm($id);
		
         return $this->render('BackendCustomerAdminBundle:Sucursal:listar_horarios.html.twig', array(
            'entity'      => $entity,
 			'horarios' 	  => $horarios,
 			'delete_form'   => $deleteForm->createView()            
         ));
       }
       else
          throw new AccessDeniedException();    
    }
	
	
	/**
	*  Load Dia Entity to create Horario 
	*/
	
	
    	
	/**
	* Creates a excel file to export data
	*
	*/
	
    
     public function exportarAction(Request $request)
    {
     if ( $this->get('security.context')->isGranted('ROLE_VIEWDIRECCION')) {
         
         $em = $this->getDoctrine()->getManager();

       
        $search=$this->generateSQL($request->query->get("search-query")); 
           
       
        $query = $em->createQuery($search);
        
        $excelService = $this->get('xls.service_xls5');
                         
                            
        $excelService->excelObj->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Zona')
                    ->setCellValue('B1', 'Calle')
					->setCellValue('C1','Numero')	
                    
                    ;
                    
        $resultados=$query->getResult();
        $i=2;
        foreach($resultados as $r)
        {
           $excelService->excelObj->setActiveSheetIndex(0)
                         ->setCellValue("A$i",$r->getZona()->getName())
                         ->setCellValue("B$i",$r->getCalle())
						 ->setCellValue("C$i",$r->getNumero())	 
                         ;
          $i++;
        }
                            
        $excelService->excelObj->getActiveSheet()->setTitle('Listado de Direcciones');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excelService->excelObj->setActiveSheetIndex(0);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        
        $fileName="direcciones_".date("Ymd").".xls";
        //create the response
        $response = $excelService->getResponse();
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        //$response->headers->set('Content-Disposition', 'filename='.$fileName);
        echo header("Content-Disposition: attachment; filename=$fileName");
        // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->sendHeaders();
        return $response; 
        
        
        }
        else{
           throw new AccessDeniedException(); 
        }
    }
        
    
}
