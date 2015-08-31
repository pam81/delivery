<?php

namespace Backend\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Backend\AdminBundle\Entity\Horario;
use Backend\AdminBundle\Form\HorarioType;

/**
 * Horario controller.
 *
 */
class HorarioController extends Controller
{

     public function generateSQL($search){
     
        $dql="SELECT u FROM BackendAdminBundle:Barrio u "  ;
        $search=mb_convert_case($search,MB_CASE_LOWER);
        
       
        if ($search)
          $dql.=" where u.name like '%$search%' ";
          
        $dql .=" order by u.name"; 
        
        return $dql;
     
     }

    /**
     * Lists all Barrios entities.
     *
     */
    public function indexAction(Request $request,$search)
    {
       if ( $this->get('security.context')->isGranted('ROLE_VIEWBARRIO')) {
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
        return $this->render('BackendAdminBundle:Barrio:index.html.twig', 
        array('pagination' => $pagination,
        'delete_form' => $deleteForm->createView(),
        'search'=>$search
        ));
        
    }
     else
         throw new AccessDeniedException(); 
    }
    /**
     * Creates a new Barrio entity.
     *
     */
    public function createAction(Request $request)
    {
        if ( $this->get('security.context')->isGranted('ROLE_ADDHORARIO')) {
        $entity  = new Horario();
        $form = $this->createForm(new HorarioType(), $entity);
        $form->bind($request);
         
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se ha agregado un nuevo barrio.');
            return $this->redirect($this->generateUrl('barrio_edit', array('id' => $entity->getId())));
        }
        
        

        return $this->render('BackendAdminBundle:Barrio:new.html.twig', array(
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
    * @param Barrio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Horario $entity)
    {
        $form = $this->createForm(new HorarioType(), $entity, array(
            'action' => $this->generateUrl('horario_create'),
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
       if ( $this->get('security.context')->isGranted('ROLE_ADDHORARIO')) {
        $entity = new Horario();
        

	   	if ( $this->get('security.context')->isGranted('ROLE_VENDEDOR')) {	

        	return $this->render('BackendAdminBundle:Horario:newCustomer.html.twig', array(
            	'entity' => $entity
            	//'form'   => $form->createView()
            
        	));
		
	  	 }else{
			
			$form   = $this->createForm(new HorarioType(), $entity);
	        return $this->render('BackendAdminBundle:Horario:new.html.twig', array(
	            'entity' => $entity,
	            'form'   => $form->createView()
            
	        ));	
			
		 }
       
       }else
          throw new AccessDeniedException();
    }


	/*
	 * Guardar horario
	*/
	
    public function toSaveHorarioAction(Request $request){
		
	  $data= array("ok"=>false);
    
 	  try{
		  
		$sucursalId = $request->request->get('sucursalId');
		$diaId = $request->request->get('diaId');
		$abre = $request->request->get('abre');
		$cierra = $request->request->get('cierra');
		$cerrado = $request->request->get('cerrado');
		
		$horario = new Horario();
  			
  		$em = $this->getDoctrine()->getManager();
		$sucursal = $em->getRepository('BackendCustomerAdminBundle:Sucursal')->find($sucursalId);
		
		$dia = $em->getRepository('BackendAdminBundle:Dia')->find($diaId);
		
		$horario.setDia($dia);
		
		if(!$cerrado){
		
			$horario.setDesde($abre);
			$horario.setHasta($cierra);
		
		}else{
			
			$horario.setCerrado(true);
		}
		
		$em->persist($horario);
		$sucursal.addHorario($horario);
        $em->persist($sucursal);
        $em->flush();
		
		$data["ok"] = true;
		$data["msg"] =  $horario.getDia().getName();
		
		
  	
    }catch(Exception $e){
        $data["ok"]=false;
        $data["msg"]="error";
    
    } 
	
	$this->get('session')->getFlashBag()->add('success' , 'Se ha agregado un nuevo horario.');
	$response = new Response(json_encode($data));
	$response->headers->set('Content-Type', 'application/json');
		
	return $response;		
		 
	}



  
    /**
     * Displays a form to edit an existing Barrio entity.
     *
     */
    public function editAction($id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_MODBARRIO')) { 
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendAdminBundle:Barrio')->find($id);

        if (!$entity) {
            
             $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado el barrio .');
             return $this->redirect($this->generateUrl('barrio'));
        }

        $editForm = $this->createForm(new BarrioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendAdminBundle:Barrio:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            
        ));
      }
      else
         throw new AccessDeniedException(); 
    }

    /**
    * Creates a form to edit a Barrio entity.
    *                                       
    * @param Barrio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Barrio $entity)
    {
        $form = $this->createForm(new BarrioType(), $entity, array(
            'action' => $this->generateUrl('barrio_update', array('id' => $entity->getId())),
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
        if ( $this->get('security.context')->isGranted('ROLE_MODBARRIO')) {  
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendAdminBundle:Barrio')->find($id);

        if (!$entity) {
             $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado el barrio.');
             return $this->redirect($this->generateUrl('barrio'));
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BarrioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add('success' , 'Se han actualizado los datos del barrio .');
            return $this->redirect($this->generateUrl('barrio_edit', array('id' => $id)));
        }

        return $this->render('BackendAdminBundle:Barrio:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            
        ));
      }
      else
         throw new AccessDeniedException();  
    }
    /**
     * Deletes a Barrio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_DELBARRIO')) { 
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendAdminBundle:Barrio')->find($id);

            if (!$entity) {
                $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado el barrio.');
             
            }
           else{
            
          
            
            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se han borrado los datos del barrio.');
            
            }
        }

        return $this->redirect($this->generateUrl('barrio'));
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
    
     public function exportarAction(Request $request)
    {
     if ( $this->get('security.context')->isGranted('ROLE_VIEWBARRIO')) {
         
         $em = $this->getDoctrine()->getManager();

       
        $search=$this->generateSQL($request->query->get("search-query")); 
           
       
        $query = $em->createQuery($search);
        
        $excelService = $this->get('xls.service_xls5');
                         
                            
        $excelService->excelObj->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Zona')
                    ->setCellValue('B1', 'Nombre')
                    
                    ;
                    
        $resultados=$query->getResult();
        $i=2;
        foreach($resultados as $r)
        {
           $excelService->excelObj->setActiveSheetIndex(0)
                         ->setCellValue("A$i",$r->getZona()->getName())
                         ->setCellValue("B$i",$r->getName())
                         ;
          $i++;
        }
                            
        $excelService->excelObj->getActiveSheet()->setTitle('Listado de Barrios');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excelService->excelObj->setActiveSheetIndex(0);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        
        
        $fileName="barrios_".date("Ymd").".xls";
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
    
    public function getBarrioByZonaAction(Request $request)
    {
     
      $zona_id=$request->request->get("zona");
      $barrios = $this->getDoctrine()->getRepository('BackendAdminBundle:Barrio')->findBy(array("zona"=>$zona_id));
     
      $resultado=array();
      foreach($barrios as $v){
            $r=array();
            $r["id"]=$v->getId();
            $r["text"]=$v->getName();
            $resultado[] = $r;
       }
       $response = new Response(json_encode($resultado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    }
    
    
}
