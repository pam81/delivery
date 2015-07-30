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
        $accesoAdmin10->setName('Nueva Farmacia');
        $accesoAdmin10->setAcceso('ROLE_ADDFARMACIA');
        $manager->persist($accesoAdmin10);
        $manager->flush();
        $this->addReference('add-farmacia', $accesoAdmin10);
        
        $accesoAdmin11 = new Acceso();
        $accesoAdmin11->setName('Modificar Farmacia');
        $accesoAdmin11->setAcceso('ROLE_MODFARMACIA');
        $manager->persist($accesoAdmin11);
        $manager->flush();
        $this->addReference('mod-farmacia', $accesoAdmin11);

        $accesoAdmin12 = new Acceso();
        $accesoAdmin12->setName('Borrar Farmacia');
        $accesoAdmin12->setAcceso('ROLE_DELFARMACIA');
        $manager->persist($accesoAdmin12);
        $manager->flush();
        $this->addReference('del-farmacia', $accesoAdmin12);
       
        $accesoAdmin13 = new Acceso();
        $accesoAdmin13->setName('Listar Farmacia');
        $accesoAdmin13->setAcceso('ROLE_VIEWFARMACIA');
        $manager->persist($accesoAdmin13);
        $manager->flush();
        $this->addReference('view-farmacia', $accesoAdmin13);
        
        $accesoAdmin14 = new Acceso();
        $accesoAdmin14->setName('Nueva Cartilla');
        $accesoAdmin14->setAcceso('ROLE_ADDCARTILLA');
        $manager->persist($accesoAdmin14);
        $manager->flush();
        $this->addReference('add-cartilla', $accesoAdmin14);
        
        $accesoAdmin15 = new Acceso();
        $accesoAdmin15->setName('Modificar Cartilla');
        $accesoAdmin15->setAcceso('ROLE_MODCARTILLA');
        $manager->persist($accesoAdmin15);
        $manager->flush();
        $this->addReference('mod-cartilla', $accesoAdmin15);

        $accesoAdmin16 = new Acceso();
        $accesoAdmin16->setName('Borrar Cartilla');
        $accesoAdmin16->setAcceso('ROLE_DELCARTILLA');
        $manager->persist($accesoAdmin16);
        $manager->flush();
        $this->addReference('del-cartilla', $accesoAdmin16);
       
        $accesoAdmin17 = new Acceso();
        $accesoAdmin17->setName('Listar Cartilla');
        $accesoAdmin17->setAcceso('ROLE_VIEWCARTILLA');
        $manager->persist($accesoAdmin17);
        $manager->flush();
        $this->addReference('view-cartilla', $accesoAdmin17);
        
        $accesoAdmin18 = new Acceso();
        $accesoAdmin18->setName('Nuevo Plan');
        $accesoAdmin18->setAcceso('ROLE_ADDPLAN');
        $manager->persist($accesoAdmin18);
        $manager->flush();
        $this->addReference('add-plan', $accesoAdmin18);
        
        $accesoAdmin19 = new Acceso();
        $accesoAdmin19->setName('Modificar Plan');
        $accesoAdmin19->setAcceso('ROLE_MODPLAN');
        $manager->persist($accesoAdmin19);
        $manager->flush();
        $this->addReference('mod-plan', $accesoAdmin19);

        $accesoAdmin20 = new Acceso();
        $accesoAdmin20->setName('Borrar Plan');
        $accesoAdmin20->setAcceso('ROLE_DELPLAN');
        $manager->persist($accesoAdmin20);
        $manager->flush();
        $this->addReference('del-plan', $accesoAdmin20);
       
        $accesoAdmin21= new Acceso();
        $accesoAdmin21->setName('Listar Plan');
        $accesoAdmin21->setAcceso('ROLE_VIEWPLAN');
        $manager->persist($accesoAdmin21);
        $manager->flush();
        $this->addReference('view-plan', $accesoAdmin21);
        
        $accesoAdmin22 = new Acceso();
        $accesoAdmin22->setName('Nuevo Prestador');
        $accesoAdmin22->setAcceso('ROLE_ADDPRESTADOR');
        $manager->persist($accesoAdmin22);
        $manager->flush();
        $this->addReference('add-prestador', $accesoAdmin22);
        
        $accesoAdmin23 = new Acceso();
        $accesoAdmin23->setName('Modificar Prestador');
        $accesoAdmin23->setAcceso('ROLE_MODPRESTADOR');
        $manager->persist($accesoAdmin23);
        $manager->flush();
        $this->addReference('mod-prestador', $accesoAdmin23);

        $accesoAdmin24 = new Acceso();
        $accesoAdmin24->setName('Borrar Prestador');
        $accesoAdmin24->setAcceso('ROLE_DELPRESTADOR');
        $manager->persist($accesoAdmin24);
        $manager->flush();
        $this->addReference('del-prestador', $accesoAdmin24);
       
        $accesoAdmin25= new Acceso();
        $accesoAdmin25->setName('Listar Prestador');
        $accesoAdmin25->setAcceso('ROLE_VIEWPRESTADOR');
        $manager->persist($accesoAdmin25);
        $manager->flush();
        $this->addReference('view-prestador', $accesoAdmin25);
        
        $accesoAdmin26 = new Acceso();
        $accesoAdmin26->setName('Nueva Especialidad');
        $accesoAdmin26->setAcceso('ROLE_ADDESPECIALIDAD');
        $manager->persist($accesoAdmin26);
        $manager->flush();
        $this->addReference('add-especialidad', $accesoAdmin26);
        
        $accesoAdmin27 = new Acceso();
        $accesoAdmin27->setName('Modificar Especialidad');
        $accesoAdmin27->setAcceso('ROLE_MODESPECIALIDAD');
        $manager->persist($accesoAdmin27);
        $manager->flush();
        $this->addReference('mod-especialidad', $accesoAdmin27);

        $accesoAdmin28 = new Acceso();
        $accesoAdmin28->setName('Borrar Especialidad');
        $accesoAdmin28->setAcceso('ROLE_DELESPECIALIDAD');
        $manager->persist($accesoAdmin28);
        $manager->flush();
        $this->addReference('del-especialidad', $accesoAdmin28);
       
        $accesoAdmin29= new Acceso();
        $accesoAdmin29->setName('Listar Especialidad');
        $accesoAdmin29->setAcceso('ROLE_VIEWESPECIALIDAD');
        $manager->persist($accesoAdmin29);
        $manager->flush();
        $this->addReference('view-especialidad', $accesoAdmin29);
        
        
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
        
         
        $accesoAdmin38 = new Acceso();
        $accesoAdmin38->setName('Nuevo Idioma');
        $accesoAdmin38->setAcceso('ROLE_ADDIDIOMA');
        $manager->persist($accesoAdmin38);
        $manager->flush();
        $this->addReference('add-idioma', $accesoAdmin38);
        
        $accesoAdmin39 = new Acceso();
        $accesoAdmin39->setName('Modificar Idioma');
        $accesoAdmin39->setAcceso('ROLE_MODIDIOMA');
        $manager->persist($accesoAdmin39);
        $manager->flush();
        $this->addReference('mod-idioma', $accesoAdmin39);

        $accesoAdmin40 = new Acceso();
        $accesoAdmin40->setName('Borrar Idioma');
        $accesoAdmin40->setAcceso('ROLE_DELIDIOMA');
        $manager->persist($accesoAdmin40);
        $manager->flush();
        $this->addReference('del-idioma', $accesoAdmin40);
       
        $accesoAdmin41= new Acceso();
        $accesoAdmin41->setName('Listar Idioma');
        $accesoAdmin41->setAcceso('ROLE_VIEWIDIOMA');
        $manager->persist($accesoAdmin41);
        $manager->flush();
        $this->addReference('view-idioma', $accesoAdmin41);
               
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
