<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="transaction")
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Session")
     */
    private mixed $session;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TransactionType")
     */
    private mixed $transactionType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private mixed $userFrom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private mixed $userTo;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18)
     */
    private float $amount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $currency;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $ip_address;

    /**
     * @ORM\Column(type="integer")
     */
    private int $transactionSign;

    /**
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private \DateTime $start_time;

    /**
     * @return integer
     */
    public function getId() : ?int
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Session|null
     */
    public function getSession() : ?Session
    {
        return $this->session;
    }

    /**
     * @param Session $session
     */
    public function setSession(Session $session): void
    {
        $this->session = $session;
    }

    /**
     * @return User
     */
    public function getUserFrom(): ?User
    {
        return $this->userFrom;
    }

    /**
     * @param User $userFrom
     */
    public function setUserFrom(User $userFrom): void
    {
        $this->userFrom = $userFrom;
    }

    /**
     * @return User
     */
    public function getUserTo(): ?User
    {
        return $this->userTo;
    }

    /**
     * @param User $userTo
     */
    public function setUserTo(User $userTo): void
    {
        $this->userTo = $userTo;
    }

    /**
     * @return TransactionType
     */
    public function getTransactionType(): ?TransactionType
    {
        return $this->transactionType;
    }

    /**
     * @param TransactionType $transactionType
     */
    public function setTransactionType(TransactionType $transactionType): void
    {
        $this->transactionType = $transactionType;
    }

    /**
     * @return integer
     */
    public function getTransactionSign() : ?int
    {
        return $this->transactionSign;
    }

    /**
     * @param integer $transactionSign
     */
    public function setTransactionSign(int $transactionSign): void
    {
        $this->transactionSign = $transactionSign;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime() : ?\DateTime
    {
        return $this->start_time;
    }

    /**
     * @param \DateTime $start_time
     */
    public function setStartTime(\DateTime $start_time): void
    {
        $this->start_time = $start_time;
    }

    /**
     * @return double
     */
    public function getAmount() : ?float
    {
        return $this->amount;
    }

    /**
     * @param double $amount
     */
    public function setCredits(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency() : string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }


    /**
     * @return string
     */
    public function getIpAddress() : string
    {
        return $this->ip_address;
    }

    /**
     * @param string $ip_address
     */
    public function setIpAddress(string $ip_address): void
    {
        $this->ip_address = $ip_address;
    }

}