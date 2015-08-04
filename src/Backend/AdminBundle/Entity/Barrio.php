<?php
 
namespace Backend\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="barrio")
 * @ORM\Entity()
 */
class Barrio 
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
     * @ORM\ManyToOne(targetEntity="Zona", inversedBy="barrios")
     * @ORM\JoinColumn(name="zona_id", referencedColumnName="id")
     */
   
    private $zona;
    
    /**
     * @ORM\OneToMany(targetEntity="\Backend\CustomerAdminBundle\Entity\Direccion", mappedBy="barrio")
     */
    private $direcciones;
    
    
    public function __construct() {
	
	       $this->direcciones = new ArrayCollection(); 
         
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
     * @return Localidad
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
     * Set zona
     *
     * @param \Backend\AdminBundle\Entity\Zona $zona
     * @return Barrio
     */
    public function setZona(\Backend\AdminBundle\Entity\Zona $zona = null)
    {
        $this->zona = $zona;
    
        return $this;
    }

    /**
     * Get zona
     *
     * @return \Backend\AdminBundle\Entity\Zona 
     */
    public function getZona()
    {
        return $this->zona;
    }

    

    /**
     * Add direcciones
     *
     * @param \Backend\CustomerAdminBundle\Entity\Direccion $direcciones
     * @return Barrio
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
