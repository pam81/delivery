<?php

namespace Backend\CustomerAdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Table(name="promocion")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 */
class Promocion
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=200)
     */
    private $name;

    /**
     * @ORM\Column(name="detail", type="string", length=200)
     */
    private $detail;

    /**
     * @ORM\Column(name="terms", type="text")
     */
    private $terms;

    /**
     * @ORM\Column(name="type", type="integer",nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(name="status", type="integer",nullable=false)
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity="Sucursal", inversedBy="promociones", cascade={"persist","remove"})
     * @ORM\JoinTable(name="sucursal_promocion")
     */
    protected $sucursales;

    /**
     * @ORM\ManyToMany(targetEntity="\Backend\AdminBundle\Entity\Subcategoria", inversedBy="promociones", cascade={"persist","remove"})
     * @ORM\JoinTable(name="subcategoria_promocion")
     */
    protected $subcategorias;

    /**
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="promociones")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     */
    private $producto;

    /**
     * @ORM\Column(name="stock", type="integer",nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(name="stop", type="boolean",nullable=true)
     */
    private $stop;

    /**
     * @ORM\Column(name="desde", type="datetime",nullable=false)
     */
    private $desde;

    /**
     * @ORM\Column(name="hasta", type="datetime",nullable=false)
     */
    private $hasta;
    
    /**
     * @ORM\ManyToMany(targetEntity="\Backend\AdminBundle\Entity\HorarioPromo", inversedBy="promociones")
     * @ORM\JoinTable(name="promocion_horario")
     */

    private $horarios;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     */
    private $modifiedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */

    private $path;
    private $temp;
    private $file;

    public function __construct() {

        $this->createdAt = new \DateTime('now');
        $this->status = 1;
    }

    public function __toString()
    {
        return $this->name;
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            @unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            @unlink($file);
        }
    }



    public function getFile()
    {
        return $this->file;
    }



    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }



    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        $sucursales=$this->getSucursales();
        return 'uploads/promociones/'.$sucursales[0]->getCustomer()->getId();
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
     * Set name
     *
     * @param string $name
     * @return Promocion
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
     * Set terms
     *
     * @param string $terms
     * @return Promocion
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * Get terms
     *
     * @return string 
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Promocion
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set desde
     *
     * @param \DateTime $desde
     * @return Promocion
     */
    public function setDesde($desde)
    {
        $this->desde = $desde;

        return $this;
    }

    /**
     * Get desde
     *
     * @return \DateTime 
     */
    public function getDesde()
    {
        return $this->desde;
    }

    /**
     * Set hasta
     *
     * @param integer $hasta
     * @return Promocion
     */
    public function setHasta($hasta)
    {
        $this->hasta = $hasta;

        return $this;
    }

    /**
     * Get hasta
     *
     * @return integer 
     */
    public function getHasta()
    {
        return $this->hasta;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Promocion
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
     * @return Promocion
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
     * Add sucursales
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursal $sucursales
     * @return Promocion
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
     * Add subcategorias
     *
     * @param \Backend\CustomerAdminBundle\Entity\Subcategoria $subcategorias
     * @return Promocion
     */
    public function addSubcategoria(\Backend\AdminBundle\Entity\Subcategoria $subcategorias)
    {
        $this->subcategorias[] = $subcategorias;

        return $this;
    }

    /**
     * Remove subcategorias
     *
     * @param \Backend\CustomerAdminBundle\Entity\Subcategoria $subcategorias
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

    /**
     * Set producto
     *
     * @param \Backend\CustomerAdminBundle\Entity\Producto $producto
     * @return Promocion
     */
    public function setProducto(\Backend\CustomerAdminBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \Backend\CustomerAdminBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Promocion
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return Promocion
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Promocion
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Add dias
     *
     * @param \Backend\AdminBundle\Entity\Dia $dias
     * @return Promocion
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

    /**
     * Set stop
     *
     * @param boolean $stop
     * @return Promocion
     */
    public function setStop($stop)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * Get stop
     *
     * @return boolean 
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * Add horarios
     *
     * @param \Backend\AdminBundle\Entity\HorarioPromo $horarios
     * @return Promocion
     */
    public function addHorario(\Backend\AdminBundle\Entity\HorarioPromo $horarios)
    {
        $this->horarios[] = $horarios;

        return $this;
    }

    /**
     * Remove horarios
     *
     * @param \Backend\AdminBundle\Entity\HorarioPromo $horarios
     */
    public function removeHorario(\Backend\AdminBundle\Entity\HorarioPromo $horarios)
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
     * Set status
     *
     * @param integer $status
     * @return Promocion
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
