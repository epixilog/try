<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
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
    private $affiliation; //[TODO] on create generate an affiliation code (new one)
    
    /**
     * @ORM\Column(type="integer")
     **/
    private $affiliated;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bet", mappedBy="user")
     **/
     private $bets;

    

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
}
