<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\PersistentCollection;
use App\Resolver\CreateSessionMutationResolver;
use App\Resolver\CloseSessionMutationResolver;

/**
 * @ApiResource(graphql={"item_query", "collection_query", "create", "update", "delete",
        "createSessionFromWebsite" = {
            "mutation" = CreateSessionMutationResolver::class,
            "args" = {
                "sessionType" = {"type" = "String"},
                "user" = {"type" = "String"},
                "sessionState" = {"type" = "String"},
                "sessionToken" = {"type" = "String"}
            }
        },
        "closeSessionFromWebsite" = {
            "mutation" = CloseSessionMutationResolver::class,
            "args" = {
                "sessionId" = {"type" = "Int"}
            }
        }
    }
   )
 * @ORM\Entity
 * @ORM\Table(name="session")
 */
class Session
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private \DateTime $start_time;

    /**
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP NULL", nullable=true)
     */
    private ?\DateTime $end_time = null;

    /**
     * @ORM\Column(type="decimal", precision=36, scale=18, nullable=true)
     */
    private float $credits;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $currency;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $session_state = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $ip_address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $session_token = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $user_agent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="session", fetch="EAGER")
     */
    private mixed $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SessionType", fetch="EAGER")
     */
    private mixed $sessionType;


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
     * @return \DateTime
     */
    public function getStartTime() : \DateTime
    {
        return $this->start_time;
    }

    /**
     * @param \DateTime $start_time
     */
    public function setStartTime(\DateTime $start_time): void
    {
        $this->start_time = $start_time;
    }

    /**
     * @return \DateTime|null
     */
    public function getEndTime() : ?\DateTime
    {
        return $this->end_time;
    }

    /**
     * @param \DateTime|null $end_time
     */
    public function setEndTime(?\DateTime $end_time): void
    {
        $this->end_time = $end_time;
    }

    /**
     * @return double
     */
    public function getCredits() : ?float
    {
        return $this->credits;
    }

    /**
     * @param double $credits
     */
    public function setCredits(float $credits): void
    {
        $this->credits = $credits;
    }

    /**
     * @return string
     */
    public function getCurrency() : ?string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getSessionState() : ?string
    {
        return $this->session_state;
    }

    /**
     * @param string $session_state
     */
    public function setSessionState(string $session_state): void
    {
        $this->session_state = $session_state;
    }

    /**
     * @return string
     */
    public function getIpAddress() : ?string
    {
        return $this->ip_address;
    }

    /**
     * @param string $ip_address
     */
    public function setIpAddress(string $ip_address): void
    {
        $this->ip_address = $ip_address;
    }

    /**
     * @return User|null
     */
    public function getUser() : User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user) : void
    {
        $this->user = $user;
    }

    /**
     * @return SessionType|null
     */
    public function getSessionType() : SessionType
    {
        return $this->sessionType;
    }

    /**
     * @param SessionType $sessionType
     */
    public function setSessionType(SessionType $sessionType) : void
    {
        $this->sessionType = $sessionType;
    }

    /**
     * @return string
     */
    public function getSessionToken() : ?string
    {
        return $this->session_token;
    }

    /**
     * @param string $session_token
     */
    public function setSessionToken(string $session_token): void
    {
        $this->session_token = $session_token;
    }

    /**
     * @return string
     */
    public function getUserAgent() : ?string
    {
        return $this->user_agent;
    }

    /**
     * @param string $user_agent
     */
    public function setUserAgent(string $user_agent): void
    {
        $this->user_agent = $user_agent;
    }

}