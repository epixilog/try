<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OperationRepository")
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="operations")
     * @ORM\JoinColumn(nullable=false)
     **/
     private $user;
     
     /**
      * @ORM\Column(type="string", length=500)
      **/
      private $trxId;
      
     /**
      * @ORM\Column(type="integer")
      **/
      private $amount;
      
      /**
       * @ORM\Column(type="string", length=500)
       **/
      private $qrCode;
      
      /**
       * @ORM\Column(type="string", length=500)
       **/
      private $ipn;
      
      /**
       * @ORM\Column(type="smallint")
       * Type of operation: 
       *    +1 => Deposit
       *    -1 => Withdrawal
       **/
      private $type;
      
      /**
       * @ORM\Column(type="datetime")
       **/
      private $created;
      
      /**
       * @ORM\Column(type="datetime")
       **/
      private $modified;
      
      /**
       * @ORM\Column(type="datetime")
       **/
      private $expired;
      
      
}
