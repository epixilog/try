<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
      * @ORM\Column(type="string", length=500)
     **/
    private $from;
    
    /**
      * @ORM\Column(type="string", length=500)
     **/
    private $to;
    
    /**
      * @ORM\Column(type="integer")
     **/
    private $amount;
    
    /**
      * @ORM\Column(type="datetime")
     **/
     private $created;
     
     /**
       * @ORM\Column(type="datetime")
      **/
      private $modified;
      
      
     
     /**
      * @ORM\PrePersist
      */
     public function setCreatedValue()
     {
         $this->created = new \DateTime();
     }
     
     /**
      * @ORM\PreUpdate
      */
     public function setModifiedValue()
     {
         $this->modified = new \DateTime();
     }
     
}
