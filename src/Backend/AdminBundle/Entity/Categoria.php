<?php

namespace Backend\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="categoria")
 * @ORM\Entity()
 */
class Categoria
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
     * @ORM\OneToMany(targetEntity="Subcategoria", mappedBy="categoria")
     */
    private $subcategorias;

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
     * @return Categoria
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
     * Add subcategorias
     *
     * @param \Backend\AdminBundle\Entity\Subcategoria $subcategorias
     * @return Categoria
     */
    public function addSubcategoria(\Backend\AdminBundle\Entity\Subcategoria $subcategorias)
    {
        $this->subcategorias[] = $subcategorias;

        return $this;
    }

    /**
     * Remove subcategorias
     *
     * @param \Backend\AdminBundle\Entity\Subcategoria $subcategorias
     */
    public function removeSubcategoria(\Backend\AdminBundle\Entity\Subcategoria $subcategorias)
    {
        $this->subcategorias->removeElement($subcategorias);
    }

    /**
     * Get subcategorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubcategorias()
    {
        return $this->subcategorias;
    }
}
