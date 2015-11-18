<?php

namespace Backend\CustomerAdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Backend\CustomerAdminBundle\Entity\Producto;
use Backend\CustomerAdminBundle\Form\ProductoType;

/**
 * Producto controller.
 *
 */
class ProductoController extends Controller
{

     public function generateSQL($search){
     
        $user=$this->getUser();
            
        $dql="SELECT u FROM BackendCustomerAdminBundle:Producto u JOIN u.sucursales s where s.customer = ".$user->getId();
        $search=mb_convert_case($search,MB_CASE_LOWER);
       
        if ($search)
          $dql.=" and u.name like '%$search%' ";
          
        $dql .=" order by u.name"; 
        
        return $dql;
     
     }

    /**
     * Lists all Producto entities.
     *
     */
    public function indexAction(Request $request,$search)
    {
       if ( $this->get('security.context')->isGranted('ROLE_VIEWPRODUCTO')) {
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
        return $this->render('BackendCustomerAdminBundle:Producto:index.html.twig', 
        array('pagination' => $pagination,
        'delete_form' => $deleteForm->createView(),
        'search'=>$search
        ));
        
    }
     else
         throw new AccessDeniedException(); 
    }
    /**
     * Creates a new Producto entity.
     *
     */
    public function createAction(Request $request)
    {
        if ( $this->get('security.context')->isGranted('ROLE_ADDPRODUCTO')) {
        $entity  = new Producto();
        $customerId=$this->getUser()->getId();
        $form = $this->createForm(new ProductoType(), $entity, array("customerId"=>$customerId));		

        $form->bind($request);
                 
        if ($form->isValid()) {
			
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se ha agregado un nuevo producto.');
            return $this->redirect($this->generateUrl('producto_edit', array('id' => $entity->getId())));
        }
        
        return $this->render('BackendCustomerAdminBundle:Producto:new.html.twig', array(
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
    * @param Producto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Producto $entity)
    {
        $form = $this->createForm(new ProductoType(), $entity, array(
            'action' => $this->generateUrl('producto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Producto entity.
     *
     */
    public function newAction()
    {
       if ( $this->get('security.context')->isGranted('ROLE_ADDPRODUCTO')) {
        $entity = new Producto();
        $customerId=$this->getUser()->getId();
        $form   = $this->createForm(new ProductoType(), $entity, array("customerId"=>$customerId));

        return $this->render('BackendCustomerAdminBundle:Producto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
            
        ));
       }
       else
          throw new AccessDeniedException();
    }

  
    /**
     * Displays a form to edit an existing Producto entity.
     *
     */
    public function editAction($id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_MODPRODUCTO')) { 
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendCustomerAdminBundle:Producto')->find($id);

        if (!$entity) {
            
             $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado el producto.');
             return $this->redirect($this->generateUrl('producto'));
        }
        $customerId=$this->getUser()->getId();
        $editForm = $this->createForm(new ProductoType(), $entity, array("customerId"=>$customerId));
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendCustomerAdminBundle:Producto:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            
            
        ));
      }
      else
         throw new AccessDeniedException(); 
    }

    /**
    * Creates a form to edit a Producto entity.
    *                                       
    * @param Producto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Producto $entity)
    {
        $form = $this->createForm(new ProductoType(), $entity, array(
            'action' => $this->generateUrl('producto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Producto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_MODPRODUCTO')) {  
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendCustomerAdminBundle:Producto')->find($id);

        if (!$entity) {
             $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado el producto.');
             return $this->redirect($this->generateUrl('producto'));
        }

        $deleteForm = $this->createDeleteForm($id);
        $customerId=$this->getUser()->getId();
        $editForm = $this->createForm(new ProductoType(), $entity, array("customerId"=>$customerId));
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add('success' , 'Se han actualizado los datos del producto .');
            return $this->redirect($this->generateUrl('producto_edit', array('id' => $id)));
        }

        return $this->render('BackendCustomerAdminBundle:Producto:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
           
            
        ));
      }
      else
         throw new AccessDeniedException();  
    }
    /**
     * Deletes a Producto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_DELPRODUCTO')) { 
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendCustomerAdminBundle:Producto')->find($id);

            if (!$entity) {
                $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado el producto.');
             
            }
           else{
            
              //TODO: si se borran y hay pedidos? hay compras?
            
            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se han borrado los datos del producto.');
            
            }
        }

        return $this->redirect($this->generateUrl('producto'));
      }
      else
       throw new AccessDeniedException(); 
    }

    /**
     * Creates a form to delete a Producto entity by id.
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

    /*
     * Carga masiva de productos a traves de un excel
     *
     */

    public function importarAction(Request $request){

        if ( $this->get('security.context')->isGranted('ROLE_ADDPRODUCTO')) {

            $user=$this->getUser();
            $em = $this->getDoctrine()->getManager();

            $dql="SELECT u FROM BackendCustomerAdminBundle:Sucursal u JOIN u.customer c where c.id = ".$user->getId();

            $query = $em->createQuery($dql);

            $sucursales=$query->getResult();

            $entity = null;
            return $this->render('BackendCustomerAdminBundle:Producto:masiva.html.twig', array(
                'entity' => $entity,
                'sucursales' => $sucursales
                    ));

            } else{
                throw new AccessDeniedException();
            }
    }


    private function procesarExcel($filename){

        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject($filename);

        foreach ($phpExcelObject ->getWorksheetIterator() as $worksheet) {

            foreach ($worksheet->getRowIterator() as $row) {

                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                foreach ($cellIterator as $cell) {

                    if (!is_null($cell)) {

                        echo '        Cell - ' , $cell->getCoordinate() , ' - ' , $cell->getCalculatedValue();

                    }
                }
            }
        }

    }

    
     public function exportarAction(Request $request)
    {
     if ( $this->get('security.context')->isGranted('ROLE_VIEWPRODUCTO')) {
         
         $em = $this->getDoctrine()->getManager();

       
        $search=$this->generateSQL($request->query->get("search-query")); 
           
       
        $query = $em->createQuery($search);
        
        $excelService = $this->get('phpexcel')->createPHPExcelObject();
                         
                            
        $excelService->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Código')
                    ->setCellValue('B1', 'Nombre')
                    ->setCellValue('C1', 'Descripción')
                    ->setCellValue('D1', 'Precio')
                    ->setCellValue('E1', 'Categoría')
                    ->setCellValue('F1', 'Subcategoría')
                    ->setCellValue('G1', 'Variedades')
                    ->setCellValue('H1', 'Publicado')
                    ->setCellValue('I1', 'Siempre disponible')
                    ->setCellValue('J1', 'Sucursales')
                    ;
                    
        $resultados=$query->getResult();
        $i=2;
        foreach($resultados as $r)
        {   $subcategoria='';
            if ($r->getSubcategoria()){
               $subcategoria=$r->getSubcategoria()->getName();
            }
            $variedades='';
            $separador='';
            foreach($r->getVariedades() as $v){
              $variedades .=$separador.$v->getName();
              $separador=' - ';
            }
            $publicado="NO";
            if ($r->getIsActive()){
              $publicado="SI";
            }
            $disponible="NO";
            if ($r->getAlwaysAvailable()){
              $disponible="SI";
            
            }
            $sucursales='';
            $separador='';
            foreach($r->getSucursales() as $s){
              $sucursales .=$separador.$s->getName();
              $separador=' - ';
            }
            
           $excelService->setActiveSheetIndex(0)
                         ->setCellValue("A$i",$r->getCode())
                         ->setCellValue("B$i",$r->getName())
                         ->setCellValue("C$i",$r->getDescription())
                         ->setCellValue("D$i",$r->getPrecio())
                         ->setCellValue("E$i",$r->getCategoria()->getName())
                         ->setCellValue("F$i",$subcategoria)
                         ->setCellValue("G$i",$variedades)
                         ->setCellValue("H$i",$publicado)
                         ->setCellValue("I$i",$disponible)
                         ->setCellValue("J$i",$sucursales)
                         ;
          $i++;
        }
                            
        $excelService->getActiveSheet()->setTitle('Listado de Productos');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excelService->setActiveSheetIndex(0);
        $excelService->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $excelService->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $excelService->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $excelService->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $excelService->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $excelService->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $excelService->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $excelService->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $excelService->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $excelService->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        
        $fileName="productos_".date("Ymd").".xls";
        //create the response
        $writer = $this->get('phpexcel')->createWriter($excelService, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
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
    public function getProductosAction(Request $request)
    {
      
      $categorias = $this->getDoctrine()->getRepository('BackendCustomerAdminBundle:Producto')->findAll();
     
      $resultado=array();
      foreach($categorias as $v){
            $r=array();
            $r["id"]=$v->getId();
            $r["text"]=$v->getName();
            $resultado[] = $r;
       }
       $response = new Response(json_encode($resultado));
        
       $response->headers->set('Content-Type', 'application/json');
  
       return $response;
    }
    
    public function getSubcategoriaByCategoriaAction(Request $request)
    {
     
      $categoria_id=$request->request->get("categoria");
      $subcategorias = $this->getDoctrine()->getRepository('BackendAdminBundle:Subcategoria')->findBy(array("categoria"=>$categoria_id));
     
      $resultado=array();
      foreach($subcategorias as $v){
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
