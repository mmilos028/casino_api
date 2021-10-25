<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BonusProfileCurrency;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="bonus_profile")
 */
class BonusProfile
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $profileName;

    /**
     * bonus_deposit_value = (deposit_value * bonus_multiplier) / 100
     * @ORM\Column(type="integer", nullable=false)
     */
    private ?int $bonusMultiplier;

    /**
     * number of times required to bet of initial deposit value
     * @ORM\Column(type="integer", nullable=false)
     */
    private ?int $wageringMultiplier;

    /**
     * after how many days will bonus restricted credits turn to real credits on player account
     * @ORM\Column(type="integer", nullable=false)
     */
    private ?int $restrictedPeriodDays;

    /** active or cancelled
     * @ORM\Column(type="integer", nullable=false)
     */
    private ?int $profileStatus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $profileDescription;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BonusProfileCurrency", mappedBy="bonusProfile", fetch="LAZY")
     */
    private mixed $bonusProfileCurrency;

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
     * @return string
     */
    public function getProfileName(): string
    {
        return $this->profileName;
    }

    /**
     * @param string $profileName
     */
    public function setProfileName(string $profileName): void
    {
        $this->profileName = $profileName;
    }

    /**
     * @return int|null
     */
    public function getBonusMultiplier(): ?int
    {
        return $this->bonusMultiplier;
    }

    /**
     * @param int|null $bonusMultiplier
     */
    public function setBonusMultiplier(?int $bonusMultiplier): void
    {
        $this->bonusMultiplier = $bonusMultiplier;
    }

    /**
     * @return int|null
     */
    public function getWageringMultiplier(): ?int
    {
        return $this->wageringMultiplier;
    }

    /**
     * @param int|null $wageringMultiplier
     */
    public function setWageringMultiplier(?int $wageringMultiplier): void
    {
        $this->wageringMultiplier = $wageringMultiplier;
    }

    /**
     * @return int|null
     */
    public function getRestrictedPeriodDays(): ?int
    {
        return $this->restrictedPeriodDays;
    }

    /**
     * @param int|null $restrictedPeriodDays
     */
    public function setRestrictedPeriodDays(?int $restrictedPeriodDays): void
    {
        $this->restrictedPeriodDays = $restrictedPeriodDays;
    }

    /**
     * @return int|null
     */
    public function getProfileStatus(): ?int
    {
        return $this->profileStatus;
    }

    /**
     * @param int|null $profileStatus
     */
    public function setProfileStatus(?int $profileStatus): void
    {
        $this->profileStatus = $profileStatus;
    }

    /**
     * @return string
     */
    public function getProfileDescription(): string
    {
        return $this->profileDescription;
    }

    /**
     * @param string $profileDescription
     */
    public function setProfileDescription(string $profileDescription): void
    {
        $this->profileDescription = $profileDescription;
    }

    /**
     * @return mixed
     */
    public function getBonusProfileCurrency()
    {
        return $this->bonusProfileCurrency;
    }
}