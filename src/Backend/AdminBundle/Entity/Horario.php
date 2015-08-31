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
    * @ORM\ManyToMany(targetEntity="\Backend\CustomerAdminBundle\Entity\Sucursal", mappedBy="horarios")
    */
	
    private $sucursales;
	
    /**
     * @ORM\ManyToOne(targetEntity="Dia", inversedBy="horarios")
     * @ORM\JoinColumn(name="dia_id", referencedColumnName="id")
     */
  
    protected $dia;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sucursales = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param string $desde
     * @return Horario
     */
    public function setDesde($desde)
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
     * @param string $hasta
     * @return Horario
     */
    public function setHasta($hasta)
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
     * Set dia
     *
     * @param \Backend\AdminBundle\Entity\Dia $dia
     * @return Horario
     */
    public function setDia(\Backend\AdminBundle\Entity\Dia $dia = null)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get dia
     *
     * @return \Backend\AdminBundle\Entity\Dia 
     */
    public function getDia()
    {
        return $this->dia;
    }
}
