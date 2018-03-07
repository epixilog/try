<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValueRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Value
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Party", inversedBy="values")
     * @ORM\JoinColumn(nullable=false)
     **/
     private $party;
     
    /**
     * @ORM\Column(type="float")
     **/
     private $value;
     
     /**
      * @ORM\Column(type="datetime")
      **/
     private $created;
     
     
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
     }
}
