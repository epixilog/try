<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartyRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Party
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game", inversedBy="parties")
     * @ORM\JoinColumn(nullable=false)
     **/
     private $game;
     
     /**
      * @ORM\Column(type="datetime")
      **/
      private $start;
      
     /**
      * @ORM\Column(type="datetime")
      **/
      private $end;
      
      /**
       * @ORM\Column(type="string")
       **/
      private $api;
      
      /**
      * @ORM\Column(type="smallint")
      **/
      private $result = 0;
      
      /**
       * @ORM\Column(length=355)
       **/
      private $thumbnail;
      
      /**
      * @ORM\Column(type="smallint")
      **/
      private $status = 0;
      
      
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Value", mappedBy="party")
     **/
     private $values;
     
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bet", mappedBy="party")
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
     
     
     
     public function __construct()
     {
         $this->values = new ArrayCollection();
         $this->bets   = new ArrayCollection();
     }
     
     public function getGame(): Game
     {
         return $this->game;
     }
     
     public function setGame(Game $game)
     {
         $this->game = $game;
     }
     
     /**
      * @return Collection|Value[]
      */
      public function getValues()
      {
          return $this->values;
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
     }
     
     /**
      * @ORM\PreUpdate
      */
     public function setModifiedValue()
     {
         $this->modified = new \DateTime();
     }
}
