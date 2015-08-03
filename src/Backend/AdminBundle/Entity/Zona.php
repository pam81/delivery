<?php
 
namespace Backend\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="zona")
 * @ORM\Entity()
 */
class Zona 
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
     * @ORM\OneToMany(targetEntity="Barrio", mappedBy="zona")
     */
    private $barrios;
    
    /**
     * @ORM\OneToMany(targetEntity="\Backend\CustomerAdminBundle\Entity\Direccion", mappedBy="zona")
     */
    private $direcciones;
    
    public function __construct() {
	
	       
          $this->barrios = new ArrayCollection();
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
     * @return Zona
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
     * Add barrios
     *
     * @param \Backend\AdminBundle\Entity\Barrio $barrios
     * @return Zona
     */
    public function addBarrio(\Backend\AdminBundle\Entity\Barrio $barrios)
    {
        $this->barrios[] = $barrios;
    
        return $this;
    }

    /**
     * Remove barrios
     *
     * @param \Backend\AdminBundle\Entity\Barrio $barrios
     */
    public function removeBarrio(\Backend\AdminBundle\Entity\Barrio $barrios)
    {
        $this->barrios->removeElement($barrios);
    }

    /**
     * Get barrios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBarrios()
    {
        return $this->barrios;
    }

    

    

    /**
     * Add direcciones
     *
     * @param \Backend\CustomerAdminBundle\Entity\Direccion $direcciones
     * @return Zona
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
