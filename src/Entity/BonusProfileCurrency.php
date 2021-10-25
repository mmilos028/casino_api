<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="bonus_profile_currency")
 */
class BonusProfileCurrency
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BonusProfile", inversedBy="bonusProfileCurrency", fetch="LAZY")
     */
    private mixed $bonusProfile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $currency;

    /**
     * maximum amount to fulfill player to use bonus campaign
     * @ORM\Column(type="decimal", precision=36, scale=18)
     */
    private ?float $maximumAmount;

    /**
     * minimum amount to fulfill player to use bonus campaign
     * @ORM\Column(type="decimal", precision=36, scale=18)
     */
    private ?float $minimumAmount;

    /**
     * if it is promotion and not a bonus
     * @ORM\Column(type="decimal", precision=36, scale=18)
     */
    private ?float $promotionAmount;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBonusProfile()
    {
        return $this->bonusProfile;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
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
     * @return float|null
     */
    public function getMaximumAmount(): ?float
    {
        return $this->maximumAmount;
    }

    /**
     * @param float|null $maximumAmount
     */
    public function setMaximumAmount(?float $maximumAmount): void
    {
        $this->maximumAmount = $maximumAmount;
    }

    /**
     * @return float|null
     */
    public function getMinimumAmount(): ?float
    {
        return $this->minimumAmount;
    }

    /**
     * @param float|null $minimumAmount
     */
    public function setMinimumAmount(?float $minimumAmount): void
    {
        $this->minimumAmount = $minimumAmount;
    }

    /**
     * @return float|null
     */
    public function getPromotionAmount(): ?float
    {
        return $this->promotionAmount;
    }

    /**
     * @param float|null $promotionAmount
     */
    public function setPromotionAmount(?float $promotionAmount): void
    {
        $this->promotionAmount = $promotionAmount;
    }
}