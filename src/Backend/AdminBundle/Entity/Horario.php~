<?php

namespace Backend\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="horario")
 * @ORM\Entity()
 */
class Horario
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=100,nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(name="cerrado", type="boolean",nullable=true)
     */
    
	private $cerrado;

    /**
     * @ORM\Column(name="desde", type="string", length=100,nullable=true)
     */
    
	private $desde;
		
    /**
     * @ORM\Column(name="hasta", type="string", length=100,nullable=true)
     */
    
	private $hasta;
	
    /**
    * @ORM\OneToMany(targetEntity="\Backend\CustomerAdminBundle\Entity\Sucursal", mappedBy="horario")
    */
    private $sucursales;
	
    /**
    * @ORM\ManyToMany(targetEntity="Dia", mappedBy="horarios")
    */
  
    protected $dias;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subcategorias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Horario
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
     * Set cerrado
     *
     * @param boolean $cerrado
     * @return Horario
     */
    public function setCerrado($cerrado)
    {
        $this->cerrado = $cerrado;

        return $this;
    }

    /**
     * Get cerrado
     *
     * @return boolean 
     */
    public function getCerrado()
    {
        return $this->cerrado;
    }

    /**
     * Set desde
     *
     * @param \String $desde
     * @return Horario
     */
    public function setDesde(\String $desde)
    {
        $this->desde = $desde;

        return $this;
    }

    /**
     * Get desde
     *
     * @return \String 
     */
    public function getDesde()
    {
        return $this->desde;
    }

    /**
     * Set hasta
     *
     * @param \String $hasta
     * @return Horario
     */
    public function setHasta(\String $hasta)
    {
        $this->hasta = $hasta;

        return $this;
    }

    /**
     * Get hasta
     *
     * @return \String 
     */
    public function getHasta()
    {
        return $this->hasta;
    }

    /**
     * Add sucursales
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursal $sucursales
     * @return Horario
     */
    public function addSucursale(\Backend\CustomerAdminBundle\Entity\Sucursal $sucursales)
    {
        $this->sucursales[] = $sucursales;

        return $this;
    }

    /**
     * Remove sucursales
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursal $sucursales
     */
    public function removeSucursale(\Backend\CustomerAdminBundle\Entity\Sucursal $sucursales)
    {
        $this->sucursales->removeElement($sucursales);
    }

    /**
     * Get sucursales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSucursales()
    {
        return $this->sucursales;
    }

    /**
     * Add dias
     *
     * @param \Backend\AdminBundle\Entity\Dia $dias
     * @return Horario
     */
    public function addDia(\Backend\AdminBundle\Entity\Dia $dias)
    {
        $this->dias[] = $dias;

        return $this;
    }

    /**
     * Remove dias
     *
     * @param \Backend\AdminBundle\Entity\Dia $dias
     */
    public function removeDia(\Backend\AdminBundle\Entity\Dia $dias)
    {
        $this->dias->removeElement($dias);
    }

    /**
     * Get dias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDias()
    {
        return $this->dias;
    }
}
