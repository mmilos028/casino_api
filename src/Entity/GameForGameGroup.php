<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="game_for_game_group")
 */
class GameForGameGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game", fetch="LAZY")
     */
    private mixed $game;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GameGroup", fetch="LAZY")
     */
    private mixed $gameGroup;

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
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param Game $game
     */
    public function setGame(Game $game): void
    {
        $this->game = $game;
    }

    /**
     * @return GameGroup|null
     */
    public function getGameGroup(): ?GameGroup
    {
        return $this->gameGroup;
    }

    /**
     * @param GameGroup $gameGroup
     */
    public function setGameGroup(GameGroup $gameGroup): void
    {
        $this->gameGroup = $gameGroup;
    }
}