<?php 

namespace Backend\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\UserBundle\Entity\Group;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $groupAdmin = new Group();
        $groupAdmin->setName('Administrador de sistemas');
        $groupAdmin->setRole('ROLE_ADMIN');
        $groupAdmin->addAcceso($this->getReference('add-user'));
        $groupAdmin->addAcceso($this->getReference('mod-user'));
        $groupAdmin->addAcceso($this->getReference('del-user'));
        $groupAdmin->addAcceso($this->getReference('view-user'));
        $groupAdmin->addAcceso($this->getReference('seteos'));
        $groupAdmin->addAcceso($this->getReference('add-zona'));
        $groupAdmin->addAcceso($this->getReference('mod-zona'));
        $groupAdmin->addAcceso($this->getReference('del-zona'));
        $groupAdmin->addAcceso($this->getReference('view-zona'));
        $groupAdmin->addAcceso($this->getReference('add-barrio'));
        $groupAdmin->addAcceso($this->getReference('mod-barrio'));
        $groupAdmin->addAcceso($this->getReference('del-barrio'));
        $groupAdmin->addAcceso($this->getReference('view-barrio'));
        
        $groupAdmin->addAcceso($this->getReference('add-categoria'));
        $groupAdmin->addAcceso($this->getReference('mod-categoria'));
        $groupAdmin->addAcceso($this->getReference('del-categoria'));
        $groupAdmin->addAcceso($this->getReference('view-categoria'));
        
        $groupAdmin->addAcceso($this->getReference('add-subcategoria'));
        $groupAdmin->addAcceso($this->getReference('mod-subcategoria'));
        $groupAdmin->addAcceso($this->getReference('del-subcategoria'));
        $groupAdmin->addAcceso($this->getReference('view-subcategoria'));
        
        
        $manager->persist($groupAdmin);
        $manager->flush();
        $this->addReference('admin-group', $groupAdmin);
        
        $groupAdmin5 = new Group();
        $groupAdmin5->setName('Visitante');
        $groupAdmin5->setRole('ROLE_VISITOR');
        $manager->persist($groupAdmin5);
        $manager->flush();
        $this->addReference('visitor-group', $groupAdmin5);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
