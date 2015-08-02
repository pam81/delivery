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
        
        $accesoAdmin34 = new Acceso();
        $accesoAdmin34->setName('Nuevo Barrio');
        $accesoAdmin34->setAcceso('ROLE_ADDBARRIO');
        $manager->persist($accesoAdmin34);
        $manager->flush();
        $this->addReference('add-barrio', $accesoAdmin34);
        
        $accesoAdmin35 = new Acceso();
        $accesoAdmin35->setName('Modificar Barrio');
        $accesoAdmin35->setAcceso('ROLE_MODBARRIO');
        $manager->persist($accesoAdmin35);
        $manager->flush();
        $this->addReference('mod-barrio', $accesoAdmin35);

        $accesoAdmin36 = new Acceso();
        $accesoAdmin36->setName('Borrar Barrio');
        $accesoAdmin36->setAcceso('ROLE_DELBARRIO');
        $manager->persist($accesoAdmin36);
        $manager->flush();
        $this->addReference('del-barrio', $accesoAdmin36);
       
        $accesoAdmin37= new Acceso();
        $accesoAdmin37->setName('Listar Barrio');
        $accesoAdmin37->setAcceso('ROLE_VIEWBARRIO');
        $manager->persist($accesoAdmin37);
        $manager->flush();
        $this->addReference('view-barrio', $accesoAdmin37);
        
         
        
               
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
