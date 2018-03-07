<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Bet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Party", inversedBy="bets")
     **/
    private $party;
     
     /**
      * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bets")
      **/
      private $user;
     
     /**
      * @ORM\Column(type="smallint")
      **/
      private $bet;
      
      /**
       * @ORM\Column(type="integer")
       **/
      private $coins;
       
      /**
       * @ORM\Column(type="datetime")
      **/
      private $created;
        
      /**
       * @ORM\Column(type="datetime")
      **/
      private $modified;
         
     
     public function getUser(): User
     {
         return $this->user;
     }
     
     public function setUser(User $user)
     {
         $this->user = $user;
     }
        
     public function getParty(): Party
     {
         return $this->party;
     }
     
     public function setParty(Party $party)
     {
         $this->party = $party;
     }
     
     /**
      * @ORM\PrePersist
      */
     public function setCreatedValue()
     {
         $this->created  = new \DateTime();
         $this->modified = new \DateTime();
     }
     
     /**
      * @ORM\PreUpdate
      */
     public function setModifiedValue()
     {
         $this->modified = new \DateTime();
     }
}
