<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="responsible_gaming_limit")
 */
class ResponsibleGamingLimit
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="responsibleGamingLimit", fetch="LAZY")
     */
    private mixed $user;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18, nullable=true)
     */
    private ?float $depositLimitPerDay;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18, nullable=true)
     */
    private ?float $depositLimitPerWeek;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18, nullable=true)
     */
    private ?float $depositLimitPerMonth;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18, nullable=true)
     */
    private ?float $maximumLossPerDay;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18, nullable=true)
     */
    private ?float $maximumLossPerWeek;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18, nullable=true)
     */
    private ?float $maximumLossPerMonth;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18, nullable=true)
     */
    private ?float $wagerLimitPerDay;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $sessionLimitInMinutes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $gamingBreakStatus;

    /**
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private ?\DateTime $gamingBreakDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $deactivateAccountStatus;

    /**
     * @return integer
     */
    public function getId() : int
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
    public function getDepositLimitPerDay() : ?float
    {
        return $this->depositLimitPerDay;
    }

    /**
     * @param double $depositLimitPerDay
     */
    public function setDepositLimitPerDay(float $depositLimitPerDay): void
    {
        $this->depositLimitPerDay = $depositLimitPerDay;
    }

    /**
     * @return double
     */
    public function getDepositLimitPerWeek() : ?float
    {
        return $this->depositLimitPerWeek;
    }

    /**
     * @param double $depositLimitPerWeek
     */
    public function setDepositLimitPerWeek(float $depositLimitPerWeek): void
    {
        $this->depositLimitPerWeek = $depositLimitPerWeek;
    }

    /**
     * @return double
     */
    public function getDepositLimitPerMonth() : ?float
    {
        return $this->depositLimitPerMonth;
    }

    /**
     * @param double $depositLimitPerMonth
     */
    public function setDepositLimitPerMonth(float $depositLimitPerMonth): void
    {
        $this->depositLimitPerMonth = $depositLimitPerMonth;
    }

    /**
     * @return double
     */
    public function getMaximumLossPerDay() : ?float
    {
        return $this->maximumLossPerDay;
    }

    /**
     * @param double $maximumLossPerDay
     */
    public function setMaximumLossPerDay(float $maximumLossPerDay): void
    {
        $this->maximumLossPerDay = $maximumLossPerDay;
    }

    /**
     * @return double
     */
    public function getMaximumLossPerWeek() : ?float
    {
        return $this->maximumLossPerWeek;
    }

    /**
     * @param double $maximumLossPerWeek
     */
    public function setMaximumLossPerWeek(float $maximumLossPerWeek): void
    {
        $this->maximumLossPerWeek = $maximumLossPerWeek;
    }

    /**
     * @return double
     */
    public function getMaximumLossPerMonth() : ?float
    {
        return $this->maximumLossPerMonth;
    }

    /**
     * @param double $maximumLossPerMonth
     */
    public function setMaximumLossPerMonth(float $maximumLossPerMonth): void
    {
        $this->maximumLossPerMonth = $maximumLossPerMonth;
    }

    /**
     * @return double
     */
    public function getWagerLimitPerDay() : ?float
    {
        return $this->wagerLimitPerDay;
    }

    /**
     * @param double $wagerLimitPerDay
     */
    public function setWagerLimitPerDay(float $wagerLimitPerDay): void
    {
        $this->wagerLimitPerDay = $wagerLimitPerDay;
    }

    /**
     * @return double
     */
    public function getSessionLimitInMinutes()
    {
        return $this->sessionLimitInMinutes;
    }

    /**
     * @param double $sessionLimitInMinutes
     */
    public function setSessionLimitInMinutes(float $sessionLimitInMinutes): void
    {
        $this->sessionLimitInMinutes = $sessionLimitInMinutes;
    }

    /**
     * @return int
     */
    public function getGamingBreakStatus() : ?int
    {
        return $this->gamingBreakStatus;
    }

    /**
     * @param int $gamingBreakStatus
     */
    public function setGamingBreakStatus(int $gamingBreakStatus): void
    {
        $this->gamingBreakStatus = $gamingBreakStatus;
    }

    /**
     * @return mixed
     */
    public function getGamingBreakDate()
    {
        return $this->gamingBreakDate;
    }

    /**
     * @param mixed $gamingBreakDate
     */
    public function setGamingBreakDate($gamingBreakDate): void
    {
        $this->gamingBreakDate = $gamingBreakDate;
    }

    /**
     * @return integer
     */
    public function getDeactivateAccountStatus() : ?int
    {
        return $this->deactivateAccountStatus;
    }

    /**
     * @param integer $deactivateAccountStatus
     */
    public function setDeactivateAccountStatus(int $deactivateAccountStatus): void
    {
        $this->deactivateAccountStatus = $deactivateAccountStatus;
    }


}