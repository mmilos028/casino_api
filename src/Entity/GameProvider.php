<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\Validator\Constraints\Count;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="game_provider")
 */
class GameProvider
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
    private string $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $custom_name;

    /**
     * @ORM\Column(type="integer")
     */
    private int $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private mixed $game;

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
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCustomName() : ?string
    {
        return $this->custom_name;
    }

    /**
     * @param string $custom_name
     */
    public function setCustomName(string $custom_name): void
    {
        $this->custom_name = $custom_name;
    }

    /**
     * @return integer
     */
    public function getStatus() : ?int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Game
     */
    public function getGame() : ?Game
    {
        return $this->game;
    }

    /**
     * @param Game $game
     */
    public function setGame(Game $game) : void
    {
        $this->game = $game;
    }
}