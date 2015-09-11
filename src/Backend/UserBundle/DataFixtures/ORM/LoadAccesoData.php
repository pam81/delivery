<?php 

namespace Backend\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\UserBundle\Entity\Acceso;

class LoadAccesoData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $accesoAdmin = new Acceso();
        $accesoAdmin->setName('Nuevo Usuario');
        $accesoAdmin->setAcceso('ROLE_ADDUSER');
        $manager->persist($accesoAdmin);
        $manager->flush();
        $this->addReference('add-user', $accesoAdmin);
        
        $accesoAdmin2 = new Acceso();
        $accesoAdmin2->setName('Modificar Usuario');
        $accesoAdmin2->setAcceso('ROLE_MODUSER');
        $manager->persist($accesoAdmin2);
        $manager->flush();
        $this->addReference('mod-user', $accesoAdmin2);

        $accesoAdmin3 = new Acceso();
        $accesoAdmin3->setName('Borrar Usuario');
        $accesoAdmin3->setAcceso('ROLE_DELUSER');
        $manager->persist($accesoAdmin3);
        $manager->flush();
        $this->addReference('del-user', $accesoAdmin3);
       
        $accesoAdmin4 = new Acceso();
        $accesoAdmin4->setName('Listar Usuarios');
        $accesoAdmin4->setAcceso('ROLE_VIEWUSER');
        $manager->persist($accesoAdmin4);
        $manager->flush();
        $this->addReference('view-user', $accesoAdmin4);
        
        $accesoAdmin5 = new Acceso();
        $accesoAdmin5->setName('Seteos de parámetros');
        $accesoAdmin5->setAcceso('ROLE_SETEO');
        $manager->persist($accesoAdmin5);
        $manager->flush();
        $this->addReference('seteos', $accesoAdmin5);
        
        $accesoAdmin6 = new Acceso();
        $accesoAdmin6->setName('Nueva Zona');
        $accesoAdmin6->setAcceso('ROLE_ADDZONA');
        $manager->persist($accesoAdmin6);
        $manager->flush();
        $this->addReference('add-zona', $accesoAdmin6);
        
        $accesoAdmin7 = new Acceso();
        $accesoAdmin7->setName('Modificar Zona');
        $accesoAdmin7->setAcceso('ROLE_MODZONA');
        $manager->persist($accesoAdmin7);
        $manager->flush();
        $this->addReference('mod-zona', $accesoAdmin7);

        $accesoAdmin8 = new Acceso();
        $accesoAdmin8->setName('Borrar Zona');
        $accesoAdmin8->setAcceso('ROLE_DELZONA');
        $manager->persist($accesoAdmin8);
        $manager->flush();
        $this->addReference('del-zona', $accesoAdmin8);
       
        $accesoAdmin9 = new Acceso();
        $accesoAdmin9->setName('Listar Zona');
        $accesoAdmin9->setAcceso('ROLE_VIEWZONA');
        $manager->persist($accesoAdmin9);
        $manager->flush();
        $this->addReference('view-zona', $accesoAdmin9);
        
        $accesoAdmin10 = new Acceso();
        $accesoAdmin10->setName('Nueva Categoría');
        $accesoAdmin10->setAcceso('ROLE_ADDCATEGORIA');
        $manager->persist($accesoAdmin10);
        $manager->flush();
        $this->addReference('add-categoria', $accesoAdmin10);
        
        $accesoAdmin11 = new Acceso();
        $accesoAdmin11->setName('Modificar Categoría');
        $accesoAdmin11->setAcceso('ROLE_MODCATEGORIA');
        $manager->persist($accesoAdmin11);
        $manager->flush();
        $this->addReference('mod-categoria', $accesoAdmin11);

        $accesoAdmin12 = new Acceso();
        $accesoAdmin12->setName('Borrar Categoría');
        $accesoAdmin12->setAcceso('ROLE_DELCATEGORIA');
        $manager->persist($accesoAdmin12);
        $manager->flush();
        $this->addReference('del-categoria', $accesoAdmin12);
       
        $accesoAdmin13 = new Acceso();
        $accesoAdmin13->setName('Listar Categorías');
        $accesoAdmin13->setAcceso('ROLE_VIEWCATEGORIA');
        $manager->persist($accesoAdmin13);
        $manager->flush();
        $this->addReference('view-categoria', $accesoAdmin13);
        
        $accesoAdmin14 = new Acceso();
        $accesoAdmin14->setName('Nueva Subcategoría');
        $accesoAdmin14->setAcceso('ROLE_ADDSUBCATEGORIA');
        $manager->persist($accesoAdmin14);
        $manager->flush();
        $this->addReference('add-subcategoria', $accesoAdmin14);
        
        $accesoAdmin15 = new Acceso();
        $accesoAdmin15->setName('Modificar Subcategoría');
        $accesoAdmin15->setAcceso('ROLE_MODSUBCATEGORIA');
        $manager->persist($accesoAdmin15);
        $manager->flush();
        $this->addReference('mod-subcategoria', $accesoAdmin15);

        $accesoAdmin16 = new Acceso();
        $accesoAdmin16->setName('Borrar Subcategoría');
        $accesoAdmin16->setAcceso('ROLE_DELSUBCATEGORIA');
        $manager->persist($accesoAdmin16);
        $manager->flush();
        $this->addReference('del-subcategoria', $accesoAdmin16);
       
        $accesoAdmin17 = new Acceso();
        $accesoAdmin17->setName('Listar Subcategorías');
        $accesoAdmin17->setAcceso('ROLE_VIEWSUBCATEGORIA');
        $manager->persist($accesoAdmin17);
        $manager->flush();
        $this->addReference('view-subcategoria', $accesoAdmin17);
        
        $accesoAdmin18 = new Acceso();
        $accesoAdmin18->setName('Nuevo Barrio');
        $accesoAdmin18->setAcceso('ROLE_ADDBARRIO');
        $manager->persist($accesoAdmin18);
        $manager->flush();
        $this->addReference('add-barrio', $accesoAdmin18);
        
        $accesoAdmin19 = new Acceso();
        $accesoAdmin19->setName('Modificar Barrio');
        $accesoAdmin19->setAcceso('ROLE_MODBARRIO');
        $manager->persist($accesoAdmin19);
        $manager->flush();
        $this->addReference('mod-barrio', $accesoAdmin19);

        $accesoAdmin20 = new Acceso();
        $accesoAdmin20->setName('Borrar Barrio');
        $accesoAdmin20->setAcceso('ROLE_DELBARRIO');
        $manager->persist($accesoAdmin20);
        $manager->flush();
        $this->addReference('del-barrio', $accesoAdmin20);
       
        $accesoAdmin21= new Acceso();
        $accesoAdmin21->setName('Listar Barrio');
        $accesoAdmin21->setAcceso('ROLE_VIEWBARRIO');
        $manager->persist($accesoAdmin21);
        $manager->flush();
        $this->addReference('view-barrio', $accesoAdmin21);
        
        $accesoAdmin22 = new Acceso();
        $accesoAdmin22->setName('Nuevo Cliente');
        $accesoAdmin22->setAcceso('ROLE_ADDCUSTOMER');
        $manager->persist($accesoAdmin22);
        $manager->flush();
        $this->addReference('add-customer', $accesoAdmin22);
        
        $accesoAdmin23 = new Acceso();
        $accesoAdmin23->setName('Modificar Cliente');
        $accesoAdmin23->setAcceso('ROLE_MODCUSTOMER');
        $manager->persist($accesoAdmin23);
        $manager->flush();
        $this->addReference('mod-customer', $accesoAdmin23);

        $accesoAdmin24 = new Acceso();
        $accesoAdmin24->setName('Borrar Cliente');
        $accesoAdmin24->setAcceso('ROLE_DELCUSTOMER');
        $manager->persist($accesoAdmin24);
        $manager->flush();
        $this->addReference('del-customer', $accesoAdmin24);
       
        $accesoAdmin25= new Acceso();
        $accesoAdmin25->setName('Listar Cliente');
        $accesoAdmin25->setAcceso('ROLE_VIEWCUSTOMER');
        $manager->persist($accesoAdmin25);
        $manager->flush();
        $this->addReference('view-customer', $accesoAdmin25); 
			
        $accesoAdmin26 = new Acceso();
        $accesoAdmin26->setName('Nueva Direccion');
        $accesoAdmin26->setAcceso('ROLE_ADDDIRECCION');
        $manager->persist($accesoAdmin26);
        $manager->flush();
        $this->addReference('add-direccion', $accesoAdmin26);
        
        $accesoAdmin27 = new Acceso();
        $accesoAdmin27->setName('Modificar Direccion');
        $accesoAdmin27->setAcceso('ROLE_MODDIRECCION');
        $manager->persist($accesoAdmin27);
        $manager->flush();
        $this->addReference('mod-direccion', $accesoAdmin27);

        $accesoAdmin28 = new Acceso();
        $accesoAdmin28->setName('Borrar Direccion');
        $accesoAdmin28->setAcceso('ROLE_DELDIRECCION');
        $manager->persist($accesoAdmin28);
        $manager->flush();
        $this->addReference('del-direccion', $accesoAdmin28);
       
        $accesoAdmin29= new Acceso();
        $accesoAdmin29->setName('Listar Direcciones');
        $accesoAdmin29->setAcceso('ROLE_VIEWDIRECCION');
        $manager->persist($accesoAdmin29);
        $manager->flush();
        $this->addReference('view-direccion', $accesoAdmin29); 
			
        $accesoAdmin38 = new Acceso();
        $accesoAdmin38->setName('Nuevo Favorito');
        $accesoAdmin38->setAcceso('ROLE_ADDFAVORITO');
        $manager->persist($accesoAdmin38);
        $manager->flush();
        $this->addReference('add-favorito', $accesoAdmin38);
        
        $accesoAdmin39 = new Acceso();
        $accesoAdmin39->setName('Modificar Favorito');
        $accesoAdmin39->setAcceso('ROLE_MODFAVORITO');
        $manager->persist($accesoAdmin39);
        $manager->flush();
        $this->addReference('mod-favorito', $accesoAdmin39);

        $accesoAdmin40 = new Acceso();
        $accesoAdmin40->setName('Borrar Favorito');
        $accesoAdmin40->setAcceso('ROLE_DELFAVORITO');
        $manager->persist($accesoAdmin40);
        $manager->flush();
        $this->addReference('del-favorito', $accesoAdmin40);
       
        $accesoAdmin41= new Acceso();
        $accesoAdmin41->setName('Listar Favoritos');
        $accesoAdmin41->setAcceso('ROLE_VIEWFAVORITO');
        $manager->persist($accesoAdmin41);
        $manager->flush();
        $this->addReference('view-favorito', $accesoAdmin41);
        
        $accesoAdmin42 = new Acceso();
        $accesoAdmin42->setName('Nueva Compra');
        $accesoAdmin42->setAcceso('ROLE_ADDCOMPRA');
        $manager->persist($accesoAdmin42);
        $manager->flush();
        $this->addReference('add-compra', $accesoAdmin42);
        
        $accesoAdmin43 = new Acceso();
        $accesoAdmin43->setName('Modificar Compra');
        $accesoAdmin43->setAcceso('ROLE_MODCOMPRA');
        $manager->persist($accesoAdmin43);
        $manager->flush();
        $this->addReference('mod-compra', $accesoAdmin43);

        $accesoAdmin44 = new Acceso();
        $accesoAdmin44->setName('Borrar Compra');
        $accesoAdmin44->setAcceso('ROLE_DELCOMPRA');
        $manager->persist($accesoAdmin44);
        $manager->flush();
        $this->addReference('del-compra', $accesoAdmin44);
       
        $accesoAdmin45= new Acceso();
        $accesoAdmin45->setName('Listar Compras');
        $accesoAdmin45->setAcceso('ROLE_VIEWCOMPRA');
        $manager->persist($accesoAdmin45);
        $manager->flush();
        $this->addReference('view-compra', $accesoAdmin45);
        
        $accesoAdmin46 = new Acceso();
        $accesoAdmin46->setName('Nuevo Venta');
        $accesoAdmin46->setAcceso('ROLE_ADDVENTA');
        $manager->persist($accesoAdmin46);
        $manager->flush();
        $this->addReference('add-venta', $accesoAdmin46);
        
        $accesoAdmin47 = new Acceso();
        $accesoAdmin47->setName('Modificar Venta');
        $accesoAdmin47->setAcceso('ROLE_MODVENTA');
        $manager->persist($accesoAdmin47);
        $manager->flush();
        $this->addReference('mod-venta', $accesoAdmin47);

        $accesoAdmin48 = new Acceso();
        $accesoAdmin48->setName('Borrar Venta');
        $accesoAdmin48->setAcceso('ROLE_DELVENTA');
        $manager->persist($accesoAdmin48);
        $manager->flush();
        $this->addReference('del-venta', $accesoAdmin48);
       
        $accesoAdmin49= new Acceso();
        $accesoAdmin49->setName('Listar Ventas');
        $accesoAdmin49->setAcceso('ROLE_VIEWVENTA');
        $manager->persist($accesoAdmin49);
        $manager->flush();
        $this->addReference('view-venta', $accesoAdmin49);
        
        $accesoAdmin50 = new Acceso();
        $accesoAdmin50->setName('Nuevo Producto');
        $accesoAdmin50->setAcceso('ROLE_ADDPRODUCTO');
        $manager->persist($accesoAdmin50);
        $manager->flush();
        $this->addReference('add-producto', $accesoAdmin50);
        
        $accesoAdmin51 = new Acceso();
        $accesoAdmin51->setName('Modificar Producto');
        $accesoAdmin51->setAcceso('ROLE_MODPRODUCTO');
        $manager->persist($accesoAdmin51);
        $manager->flush();
        $this->addReference('mod-producto', $accesoAdmin51);

        $accesoAdmin52 = new Acceso();
        $accesoAdmin52->setName('Borrar Producto');
        $accesoAdmin52->setAcceso('ROLE_DELPRODUCTO');
        $manager->persist($accesoAdmin52);
        $manager->flush();
        $this->addReference('del-producto', $accesoAdmin52);
       
        $accesoAdmin53= new Acceso();
        $accesoAdmin53->setName('Listar Productos');
        $accesoAdmin53->setAcceso('ROLE_VIEWPRODUCTO');
        $manager->persist($accesoAdmin53);
        $manager->flush();
        $this->addReference('view-producto', $accesoAdmin53);
        
        $accesoAdmin54 = new Acceso();
        $accesoAdmin54->setName('Nueva Sucursal');
        $accesoAdmin54->setAcceso('ROLE_ADDSUCURSAL');
        $manager->persist($accesoAdmin54);
        $manager->flush();
        $this->addReference('add-sucursal', $accesoAdmin54);
        
        $accesoAdmin55 = new Acceso();
        $accesoAdmin55->setName('Modificar Sucursal');
        $accesoAdmin55->setAcceso('ROLE_MODSUCURSAL');
        $manager->persist($accesoAdmin55);
        $manager->flush();
        $this->addReference('mod-sucursal', $accesoAdmin55);

        $accesoAdmin56 = new Acceso();
        $accesoAdmin56->setName('Borrar Sucursal');
        $accesoAdmin56->setAcceso('ROLE_DELSUCURSAL');
        $manager->persist($accesoAdmin56);
        $manager->flush();
        $this->addReference('del-sucursal', $accesoAdmin56);
       
        $accesoAdmin57= new Acceso();
        $accesoAdmin57->setName('Listar Sucursales');
        $accesoAdmin57->setAcceso('ROLE_VIEWSUCURSAL');
        $manager->persist($accesoAdmin57);
        $manager->flush();
        $this->addReference('view-sucursal', $accesoAdmin57);
               
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
