<?php
 
namespace Backend\CustomerAdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="direccion")
 * @ORM\Entity()
 */
class Direccion 
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="calle", type="string", length=100)
     */
    private $calle;
    
    /**
     * @ORM\Column(name="numero", type="string", length=10)
     */
    private $numero;
	
    /**
     * @ORM\Column(name="piso", type="integer",nullable=true)
     */
    private $piso;
	
    /**
     * @ORM\Column(name="depto", type="string", length=4,nullable=true)
     */
    private $depto;
	
    /**
     * @ORM\Column(name="zip", type="string", length=8)
     */
    private $zip;
	
    /**
     * @ORM\Column(name="default", type="boolean")
     */
    private $isDefault;
	
	
    /**
     * @ORM\ManyToOne(targetEntity="Zona", inversedBy="direcciones")
     * @ORM\JoinColumn(name="zona_id", referencedColumnName="id")
     */
   
    private $zona;
	
    /**
     * @ORM\ManyToOne(targetEntity="Barrio", inversedBy="direcciones")
     * @ORM\JoinColumn(name="barrio_id", referencedColumnName="id")
     */
   
    private $barrio;
	
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    
    
    public function __construct() {
	
		$this->isDefault = true;
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
     * Set calle
     *
     * @param string $calle
     * @return Direccion
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Direccion
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set piso
     *
     * @param integer $piso
     * @return Direccion
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;

        return $this;
    }

    /**
     * Get piso
     *
     * @return integer 
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * Set depto
     *
     * @param string $depto
     * @return Direccion
     */
    public function setDepto($depto)
    {
        $this->depto = $depto;

        return $this;
    }

    /**
     * Get depto
     *
     * @return string 
     */
    public function getDepto()
    {
        return $this->depto;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Direccion
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set isDefault
     *
     * @param boolean $isDefault
     * @return Direccion
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Get isDefault
     *
     * @return boolean 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Direccion
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
     * Set zona
     *
     * @param \Backend\CustomerAdminBundle\Entity\Zona $zona
     * @return Direccion
     */
    public function setZona(\Backend\CustomerAdminBundle\Entity\Zona $zona = null)
    {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get zona
     *
     * @return \Backend\CustomerAdminBundle\Entity\Zona 
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set barrio
     *
     * @param \Backend\CustomerAdminBundle\Entity\Barrio $barrio
     * @return Direccion
     */
    public function setBarrio(\Backend\CustomerAdminBundle\Entity\Barrio $barrio = null)
    {
        $this->barrio = $barrio;

        return $this;
    }

    /**
     * Get barrio
     *
     * @return \Backend\CustomerAdminBundle\Entity\Barrio 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }
}
