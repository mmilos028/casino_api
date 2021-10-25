<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="session_type")
 */
class SessionType
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
    private int $duration_limit = 60000;

    /**
     * @ORM\Column(type="integer")
     */
    private int $auto_close = 1;

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
    public function getDurationLimit() : ?int
    {
        return $this->duration_limit;
    }

    /**
     * @param int $duration_limit
     */
    public function setDurationLimit(int $duration_limit): void
    {
        $this->duration_limit = $duration_limit;
    }

    /**
     * @return integer
     */
    public function getAutoClose() : ?int
    {
        return $this->auto_close;
    }

    /**
     * @param integer $auto_close
     */
    public function setAutoClose(int $auto_close): void
    {
        $this->auto_close = $auto_close;
    }
}