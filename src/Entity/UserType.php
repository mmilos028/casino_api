<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="user_type")
 */
class UserType
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
     * @ORM\Column(type="integer")
     */
    private int $isSuperType = 0;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserType", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private mixed $parentUserType;

    /**
     * @return integer
     */
    public function getId() : ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName() : string
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
     * @return integer
     */
    public function getIsSuperType() : ?int
    {
        return $this->isSuperType;
    }

    /**
     * @param int $isSuperType
     */
    public function setIsSuperType(int $isSuperType) : void
    {
        $this->isSuperType = $isSuperType;
    }

    /**
     * @param UserType $parentUserType
     */
    public function setParentUserType(UserType $parentUserType): void
    {
        $this->parentUserType = $parentUserType;
    }

    /**
     * @return UserType|null
     */
    public function getParentUserType() : ?UserType
    {
        return $this->parentUserType;
    }
}