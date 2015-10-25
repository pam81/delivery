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
     * @ORM\Column(name="short", type="string", length=100,nullable=true)
     */
    private $short;


    /**
    * @ORM\OneToMany(targetEntity="Horario", mappedBy="dia")
    */
   private $horarios;

    /**
     * Constructor
     */
    public function __construct()
    {
        
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

    /**
     * Set short
     *
     * @param string $short
     * @return Dia
     */
    public function setShort($short)
    {
        $this->short = $short;

        return $this;
    }

    /**
     * Get short
     *
     * @return string 
     */
    public function getShort()
    {
        return $this->short;
    }
}
