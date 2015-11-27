<?php
 
namespace Backend\CustomerAdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="favorito")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks 
 *    
 */
class Favorito 
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     *        
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="\Backend\CustomerBundle\Entity\Customer", inversedBy="favoritos")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     *      
     */
    private $customer;
    /**
     * @ORM\ManyToOne(targetEntity="\Backend\CustomerAdminBundle\Entity\Sucursal", inversedBy="favoritos")
     * @ORM\JoinColumn(name="sucursal_id", referencedColumnName="id")
     *      
     */
    private $sucursal;
    
    
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     */
    private $modifiedAt;
    
    public function __construct() {
        
        $this->createdAt = new \DateTime('now');
    }
    
     /**
     * @ORM\PreUpdate()
     * 
     */
     
    public function modifiedUpdate(){
    
      $this->setModifiedAt(new \DateTime('now'));
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Favorito
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
     * @return Favorito
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
     * Set customer
     *
     * @param \Backend\CustomerBundle\Entity\Customer $customer
     * @return Favorito
     */
    public function setCustomer(\Backend\CustomerBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Backend\CustomerBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set sucursal
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursal $sucursal
     * @return Favorito
     */
    public function setSucursal(\Backend\CustomerAdminBundle\Entity\Sucursal $sucursal = null)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return \Backend\CustomerAdminBundle\Entity\Sucursal 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }
}
