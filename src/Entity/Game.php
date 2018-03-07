<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(length=250, nullable=false)
     */
    private $name;
    
    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $description;
    
    /**
     * @ORM\Column(length=250, nullable=false)
     */
    private $api;
    
    /**
     * @ORM\Column(length=350, nullable=true)
     */
    private $thumbnail;
    
    /**
     * @ORM\Column(type="smallint", nullable = false)
     */
    private $status = 0;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Party", mappedBy="game")
     **/
     private $parties;
     
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
         $this->parties = new ArrayCollection();
     }
     
     
     
     /**
      * @return Collection|Party[]
      */
      public function getParties()
      {
          return $this->parties;
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
