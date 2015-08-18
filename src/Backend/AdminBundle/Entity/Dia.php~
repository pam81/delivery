<?php

namespace Backend\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="dia")
 * @ORM\Entity()
 */
class Dia
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
    * @ORM\ManyToMany(targetEntity="Horario", mappedBy="dias")
    */
  
   protected $horarios;


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
     * @return Dia
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
     * @return Dia
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
     * @return Dia
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
     * @return Dia
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
     * @return Dia
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
     * Add horarios
     *
     * @param \Backend\AdminBundle\Entity\Horario $horarios
     * @return Dia
     */
    public function addHorario(\Backend\AdminBundle\Entity\Horario $horarios)
    {
        $this->horarios[] = $horarios;

        return $this;
    }

    /**
     * Remove horarios
     *
     * @param \Backend\AdminBundle\Entity\Horario $horarios
     */
    public function removeHorario(\Backend\AdminBundle\Entity\Horario $horarios)
    {
        $this->horarios->removeElement($horarios);
    }

    /**
     * Get horarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHorarios()
    {
        return $this->horarios;
    }
}
