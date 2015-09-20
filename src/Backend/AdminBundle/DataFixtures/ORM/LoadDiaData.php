<?php 

namespace Backend\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\AdminBundle\Entity\Dia;

class LoadDiaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $dia = new Dia();
        $dia->setName('Lunes');
        $manager->persist($dia);
        $manager->flush();
        $this->addReference('dia-lunes', $dia);
        
        
       $dia = new Dia();
        $dia->setName('Martes');
        $manager->persist($dia);
        $manager->flush();
        $this->addReference('dia-martes', $dia);
        
        $dia = new Dia();
        $dia->setName('Miercoles');
        $manager->persist($dia);
        $manager->flush();
        $this->addReference('dia-miercoles', $dia);
        
        $dia = new Dia();
        $dia->setName('Jueves');
        $manager->persist($dia);
        $manager->flush();
        $this->addReference('dia-jueves', $dia);
        
        $dia = new Dia();
        $dia->setName('Viernes');
        $manager->persist($dia);
        $manager->flush();
        $this->addReference('dia-viernes', $dia);
        
        $dia = new Dia();
        $dia->setName('Sabado');
        $manager->persist($dia);
        $manager->flush();
        $this->addReference('dia-sabado', $dia);
        
        $dia = new Dia();
        $dia->setName('Domingo');
        $manager->persist($dia);
        $manager->flush();
        $this->addReference('dia-domingo', $dia);
        
        $dia = new Dia();
        $dia->setName('Lunes a Viernes');
        $manager->persist($dia);
        $manager->flush();
        $this->addReference('dia-lunesaviernes', $dia); 
        
       
        $dia = new Dia();
        $dia->setName('Todos los días');
        $manager->persist($dia);
        $manager->flush();
        $this->addReference('dia-todoslosdias', $dia); 
        
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 13; // the order in which fixtures will be loaded
    }
}


