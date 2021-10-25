<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table(name="session_for_session")
 */
class SessionForSession
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $session_id_to;

    /**
     * @ORM\Column(type="integer")
     */
    private int $session_id_for;

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
     * @return integer
     */
    public function getSessionIdTo(): ?int
    {
        return $this->session_id_to;
    }

    /**
     * @param integer $session_id_to
     */
    public function setSessionIdTo(int $session_id_to): void
    {
        $this->session_id_to = $session_id_to;
    }

    /**
     * @return integer
     */
    public function getSessionIdFor(): ?int
    {
        return $this->session_id_for;
    }

    /**
     * @param integer $session_id_for
     */
    public function setSessionIdFor(int $session_id_for): void
    {
        $this->session_id_for = $session_id_for;
    }
}