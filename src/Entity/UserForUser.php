<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="user_for_user")
 */
class UserForUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="parentUser", fetch="LAZY")
     */
    private mixed $userTo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", fetch="LAZY")
     */
    private mixed $userFor;

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
     * @return User|null
     */
    public function getUserFor(): ?User
    {
        return $this->userFor;
    }

    /**
     * @param User $userFor
     */
    public function setUserFor(User $userFor): void
    {
        $this->userFor = $userFor;
    }
}