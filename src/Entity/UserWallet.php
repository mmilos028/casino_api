<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use ApiPlatform\Core\Annotation\ApiResource;




/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="user_wallet", indexes={
 *  @Index(name="user_wallet_idx", columns={"user_id"})
 * })
 */
class UserWallet
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18)
     */
    private float $balance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $currency;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userWallet", fetch="EAGER")
     */
    private mixed $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BalanceType", fetch="EAGER")
     */
    private mixed $balanceType;

    /**
     * @return integer
     */
    public function getId(): ?int
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
     * @return double
     */
    public function getBalance() : ?float
    {
        return $this->balance;
    }

    /**
     * @param double $balance
     */
    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getCurrency() : ?string
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
     * @return User|null
     */
    public function getUser() : ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user) : void
    {
        $this->user = $user;
    }

    /**
     * @return BalanceType|null
     */
    public function getBalanceType() : ?BalanceType
    {
        return $this->balanceType;
    }

    /**
     * @param BalanceType $balanceType
     */
    public function setBalanceType(BalanceType $balanceType) : void
    {
        $this->balanceType = $balanceType;
    }
}


