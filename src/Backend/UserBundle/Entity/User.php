<?php

namespace Backend\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Backend\UserBundle\Entity\User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Backend\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks 
 * @UniqueEntity("email")
 * @UniqueEntity("dni") 
 *   
 */
class User implements AdvancedUserInterface, \Serializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $password;
    
    /**
     * @ORM\Column(name="codigo", type="string", length=200, nullable= true)
     */
    private $codigo; 

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="is_delete", type="boolean" )
     */
    private $isDelete;

    /**
     * @ORM\Column(name="name", type="string",length=100, nullable=true)
     */
    private $name;
    /**
     * @ORM\Column(name="lastname", type="string", length=100, nullable=true)
     */
    private $lastname;
    
    /**
     * @ORM\Column(name="dni", type="string", length=100, nullable=true)
     */
    private $dni;
    /**
     * @ORM\Column(name="birthday", type="date",  nullable=true)
     */
    private $birthday;
    
    /**
     * @ORM\Column(name="phone", type="string", length=100, nullable=true)
     */
    private $phone;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users")
     *
     */
    private $groups;
    
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     */
    private $modifiedAt;
   
       
    public function __construct() {
        $this->isActive = true;
        $this->isDelete = false;
        $this->salt = md5(uniqid(null, true));
        $this->groups =  new ArrayCollection();
        $this->createdAt = new \DateTime('now');
        
    }

   public function __toString(){
   
         return $this->email;
   }


   /**
     * @ORM\PreUpdate()
     * 
     */
     
    public function modifiedUpdate(){
    
      $this->setModifiedAt(new \DateTime('now'));
    } 

    public function getUsername(){
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function getSalt() {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles() {
       // return $this->groups->toArray();
        
        
       $grupos=$this->groups;
       $roles=array();
       foreach($grupos as $g)
       {
         foreach($g->getAccesos() as $a)
            $roles[]=$a->getAcceso();
            
         $roles[]=$g->getRole();
       } 
       
       return $roles;
        
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list (
                $this->id,
                ) = unserialize($serialized);
    }

    public function isAccountNonExpired() {
        return !$this->isDelete;
    }

    public function isAccountNonLocked() {
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return $this->isActive;
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
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
       
       if (null === $password)  {
           return; 
       }
       global $kernel;
        if($kernel instanceOf \AppCache) $kernel = $kernel->getKernel();
        
         $factory = $kernel->getContainer()->get('security.encoder_factory');
         $encoder = $factory->getEncoder($this);
         //todo: obtener el encoder en security para usar lo mismo   
        $this->password = $encoder->encodePassword($password, $this->getSalt());
        //$this->password = sha1($password);
    
        return $this;
    }
    
    public function comparePassword($passToCompare)
    {
     global $kernel;
        if($kernel instanceOf \AppCache) $kernel = $kernel->getKernel();
        
         $factory = $kernel->getContainer()->get('security.encoder_factory');
         $encoder = $factory->getEncoder($this);
         //todo: obtener el encoder en security para usar lo mismo   
        $toCompare = $encoder->encodePassword($passToCompare, $this->getSalt());
        if ($this->getPassword() == $toCompare)
           return true;
        else
          return false;
           
    
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add groups
     *
     * @param \Backend\UserBundle\Entity\Group $groups
     * @return User
     */
    public function addGroup(\Backend\UserBundle\Entity\Group $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \Backend\UserBundle\Entity\Group $groups
     */
    public function removeGroup(\Backend\UserBundle\Entity\Group $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

   

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     * @return User
     */
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;
    
        return $this;
    }

    /**
     * Get isDelete
     *
     * @return boolean 
     */
    public function getIsDelete()
    {
        return $this->isDelete;
    }

    

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
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
     * @return User
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
     * Set dni
     *
     * @param string $dni
     * @return User
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    
        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = new \DateTime($birthday);
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {   if ($this->birthday){
          return $this->birthday->format("Y-m-d");
        }else{
          return  $this->birthday;
        }
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    

   


    /**
     * Set codigo
     *
     * @param string $codigo
     * @return User
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }
}
