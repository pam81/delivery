<?php

namespace Backend\CustomerAdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="status_pedidos")
 * @ORM\Entity()
 */

class Status {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;   

    /**
     * @ORM\Column(name="is_delete", type="boolean" )
     */
    private $isDelete;

    /**
     * @ORM\Column(name="name", type="string",length=100, nullable=true)
     */
    private $name;
	
    /**
     * @ORM\OneToMany(targetEntity="Proceso", mappedBy="status")
     */
    private $procesos;
    
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     */
    private $modifiedAt;

    
       
    public function __construct() {
       
        $this->isDelete = false;
        $this->createdAt = new \DateTime('now');
        $this->procesos = new \Doctrine\Common\Collections\ArrayCollection();
        
    }

   public function __toString(){
   
         return $this->name;
   }


   


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     * @return Status
     */
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;

        return $this;
    }

    /**
     * Get isDelete
     *
     * @return boolean 
     */
    public function getIsDelete()
    {
        return $this->isDelete;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Status
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Status
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     * @return Status
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime 
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Add customers
     *
     * @param \Backend\CustomerBundle\Entity\Customer $customers
     * @return Status
     */
    public function addCustomer(\Backend\CustomerBundle\Entity\Customer $customers)
    {
        $this->customers[] = $customers;

        return $this;
    }

    /**
     * Remove customers
     *
     * @param \Backend\CustomerBundle\Entity\Customer $customers
     */
    public function removeCustomer(\Backend\CustomerBundle\Entity\Customer $customers)
    {
        $this->customers->removeElement($customers);
    }

    /**
     * Get customers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    

    /**
     * Add procesos
     *
     * @param \Backend\CustomerAdminBundle\Entity\Proceso $procesos
     * @return Status
     */
    public function addProceso(\Backend\CustomerAdminBundle\Entity\Proceso $procesos)
    {
        $this->procesos[] = $procesos;

        return $this;
    }

    /**
     * Remove procesos
     *
     * @param \Backend\CustomerAdminBundle\Entity\Proceso $procesos
     */
    public function removeProceso(\Backend\CustomerAdminBundle\Entity\Proceso $procesos)
    {
        $this->procesos->removeElement($procesos);
    }

    /**
     * Get procesos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProcesos()
    {
        return $this->procesos;
    }
}
