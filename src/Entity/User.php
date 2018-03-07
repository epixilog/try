<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    private $userName;
    
    /**
     * @ORM\Column(type="string")
     */
    private $firstName;
    
    /**
     * @ORM\Column(type="string")
     */
    private $lastName;
    
    /**
     * @ORM\Column(type="string")
     */
    private $phone;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $coins = 0;
    
    /**
     * @ORM\Column(type="smallint")
     **/
    private $status = 0;
    
    /**
     * @ORM\Column(type="string")
     **/
    private $affiliation;
    
    /**
     * @ORM\Column(type="integer", nullable = true)
     **/
    private $affiliated = null;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bet", mappedBy="user")
     **/
     private $bets;

    /**
      * @ORM\Column(type="datetime")
      **/
      private $created;
      
      /**
      * @ORM\Column(type="datetime")
      **/
      private $modified;

    /**
     * Constructors
     **/
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * Setters and Getters
     **/
    
    public function getFirstName(){
        return $this->firstName;
    }
    
    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }
    
    public function getLastName(){
        return $this->lastName;
    }
    
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }
    
    /**
     * @return Collection|Bet[]
     */
     public function getBets()
     {
         return $this->bets;
     }
      
     /**
      * @ORM\PrePersist
      */
     public function setCreatedValue()
     {
         $this->created  = new \DateTime();
         $this->modified = new \DateTime();
         
         $aff_str = $this->getFirstName().date("YmdHms").$this->getLastName().date("YmdHms").$this->getUserName();
         $this->affiliation = hash("sha256", $aff_str);
     }
     
     /**
      * @ORM\PreUpdate
      */
     public function setModifiedValue()
     {
         $this->modified = new \DateTime();
     } 
}
