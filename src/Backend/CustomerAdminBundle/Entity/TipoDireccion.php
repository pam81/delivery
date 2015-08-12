<?php
 
namespace Backend\CustomerAdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="tipodireccion")
 * @ORM\Entity()
 */
class TipoDireccion 
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;
	
    /**
     * @ORM\OneToMany(targetEntity="Direccion", mappedBy="tipo")
     */
    private $direcciones;
    
       
		
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
			
    
    public function __construct() {
	
		$this->createdAt = new \DateTime('now');
         
    }
    
    public function __toString()
    {
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
     * Set name
     *
     * @param string $name
     * @return TipoDireccion
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
     * @return TipoDireccion
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
     * Add direcciones
     *
     * @param \Backend\CustomerAdminBundle\Entity\Direccion $direcciones
     * @return TipoDireccion
     */
    public function addDireccione(\Backend\CustomerAdminBundle\Entity\Direccion $direcciones)
    {
        $this->direcciones[] = $direcciones;

        return $this;
    }

    /**
     * Remove direcciones
     *
     * @param \Backend\CustomerAdminBundle\Entity\Direccion $direcciones
     */
    public function removeDireccione(\Backend\CustomerAdminBundle\Entity\Direccion $direcciones)
    {
        $this->direcciones->removeElement($direcciones);
    }

    /**
     * Get direcciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDirecciones()
    {
        return $this->direcciones;
    }
}
