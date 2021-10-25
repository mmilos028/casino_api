<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\Validator\Constraints\Count;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="\App\Repository\GameGroupOrderRepository")
 * @ORM\Table(name="game_group_order")
 *
 */
class GameGroupOrder
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="gameGroupOrder", fetch="LAZY")
     */
    private mixed $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GameGroup", fetch="LAZY")
     */
    private mixed $gameGroup;

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
