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
 * @ORM\Table(name="game_order")
 */
class GameOrder
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="gameOrder", fetch="EAGER")
     */
    private mixed $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GameGroup", fetch="EAGER")
     */
    private mixed $gameGroup;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game", fetch="EAGER")
     */
    private mixed $game;

    /**
     * @ORM\Column(type="integer")
     */
    private int $sortOrder;

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
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
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
     * @return integer
     */
    public function getSortOrder() : ?int
    {
        return $this->sortOrder;
    }

    /**
     * @param integer $sortOrder
     */
    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }
}
