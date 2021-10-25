<?php
// src/Entity/User.php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\Validator\Constraints\Count;
//use App\Resolver\UserMutationResolver;
use App\Resolver\UserLoginCollectionResolver;
use App\Resolver\PlayerLoginResolver;
use App\Repository\UserRepository;

//php bin/console doctrine:schema:update --force
//php bin/console doctrine:fixtures:load

/**
 * @ApiResource(
       graphql={"item_query",
       "collection_query",
       "create", "update", "delete",
        "loginCollectionQuery"={
            "collection_query" = UserLoginCollectionResolver::class,
             "args" = {
                "username" = {"type" = "String"},
                "password" = {"type" = "String"}
             },
        },
        "loginPlayerQuery"={
            "item_query" = PlayerLoginResolver::class,
            "args" = {
                "username" = {"type" = "String"},
                "password" = {"type" = "String"}
            }
        }
   })
 * @ApiFilter(SearchFilter::class, properties={"_id": "partial", "username": "partial"})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User
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
    private string $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $gender;

    /**
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP NULL")
     */
    private \DateTime $birthdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $isBanned;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $verificationStatus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $zipCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $address2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $bankAccountNumber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", fetch="LAZY")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=true)
     */
    private mixed $bankCountry;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $bankIdentificationCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $internationalBankAccountNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $currency;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserType")
     * @ORM\JoinColumn(name="user_type_id", referencedColumnName="id", nullable=false)
     */
    private mixed $userType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserWallet", mappedBy="user", fetch="LAZY")
     */
    private mixed $userWallet;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", fetch="LAZY")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=true)
     */
    private mixed $country;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Session", mappedBy="user", fetch="LAZY")
     */
    private mixed $session;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GameForDesktop", mappedBy="user", fetch="LAZY")
     */
    private mixed $gameForDesktop;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserForUser", mappedBy="userTo", fetch="LAZY")
     */
    private mixed $parentUser;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GameGroupOrder", mappedBy="user", fetch="LAZY")
     * @ORM\OrderBy({"sortOrder" = "ASC"})
     */
    private mixed $gameGroupOrder;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GameOrder", mappedBy="user", fetch="LAZY")
     * @ORM\OrderBy({"sortOrder" = "ASC"})
     */
    private mixed $gameOrder;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResponsibleGamingLimit", mappedBy="user", fetch="LAZY")
     */
    private mixed $responsibleGamingLimit;

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
     * @return string
     */
    public function getUsername() : ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail() : ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword() : ?string
    {
        //return md5($this->password);
        return hash("sha512", $this->password);
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return UserType|null
     */
    public function getUserType() : ?UserType
    {
        return $this->userType;
    }

    /**
     * @param UserType $userType
     */
    public function setUserType(UserType $userType) : void {
        $this->userType = $userType;
    }

    /**
     * @return string
     */
    public function getFirstName() : ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName() : ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getGender() : ?string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param \DateTime $birthdate
     */
    public function setBirthdate(\DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getAddress() : ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getIsBanned() : ?string
    {
        return $this->isBanned;
    }

    /**
     * @param string $isBanned
     */
    public function setIsBanned(string $isBanned): void
    {
        $this->isBanned = $isBanned;
    }

    /**
     * @return string
     */
    public function getVerificationStatus() : ?string
    {
        return $this->verificationStatus;
    }

    /**
     * @param string $verificationStatus
     */
    public function setVerificationStatus(string $verificationStatus): void
    {
        $this->verificationStatus = $verificationStatus;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getZipCode() : ?string
    {
        return $this->zipCode;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity() : ?string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getAddress2() : ?string
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     */
    public function setAddress2(string $address2): void
    {
        $this->address2 = $address2;
    }

    /**
     * @return string
     */
    public function getPhoneNumber() : ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getBankAccountNumber() : ?string
    {
        return $this->bankAccountNumber;
    }

    /**
     * @param string $bankAccountNumber
     */
    public function setBankAccountNumber(string $bankAccountNumber): void
    {
        $this->bankAccountNumber = $bankAccountNumber;
    }

    /**
     * @return Country
     */
    public function getBankCountry() : Country
    {
        return $this->bankCountry;
    }

    /**
     * @param Country $bankCountry
     */
    public function setBankCountry(Country $bankCountry): void
    {
        $this->bankCountry = $bankCountry;
    }

    /**
     * @return string
     */
    public function getBankIdentificationCode() : ?string
    {
        return $this->bankIdentificationCode;
    }

    /**
     * @param string $bankIdentificationCode
     */
    public function setBankIdentificationCode(string $bankIdentificationCode): void
    {
        $this->bankIdentificationCode = $bankIdentificationCode;
    }

    /**
     * @return string
     */
    public function getInternationalBankAccountNumber() : ?string
    {
        return $this->internationalBankAccountNumber;
    }

    /**
     * @param string $internationalBankAccountNumber
     */
    public function setInternationalBankAccountNumber(string $internationalBankAccountNumber): void
    {
        $this->internationalBankAccountNumber = $internationalBankAccountNumber;
    }

    /**
     * @return string
     */
    public function getLanguage() : ?string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
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
     * @return Collection|UserWallet[]
     */
    public function getUserWallet() : Collection
    {
        return $this->userWallet;
    }

    /**
     * @return Country
     */
    public function getCountry() : Country
    {
        return $this->country;
    }

    /**
     * @param Country $country
     */
    public function setCountry(Country $country) : void
    {
        $this->country = $country;
    }

    /**
     * @return PersistentCollection
     */
    public function getSession() : PersistentCollection
    {
        return $this->session;
    }

    /**
     * @param Session $session
     */
    public function setSession(Session $session) : void
    {
        $this->session = $session;
    }

    /**
     * @return PersistentCollection
     */
    public function getGameForDesktop(): PersistentCollection
    {
        return $this->gameForDesktop;
    }

    /**
     * @return PersistentCollection|UserForUser[]
     */
    public function getParentUser(): PersistentCollection
    {
        return $this->parentUser;
    }

    /**
     * @return PersistentCollection|GameGroupOrder[]
     */
    public function getGameGroupOrder() : PersistentCollection
    {
        return $this->gameGroupOrder;
    }

    /**
     * @return PersistentCollection|GameOrder[]
     */
    public function getGameOrder() : PersistentCollection
    {
        return $this->gameOrder;
    }

    /**
     * @return PersistentCollection|ResponsibleGamingLimit[]
     */
    public function getResponsibleGamingLimit() : PersistentCollection
    {
        return $this->responsibleGamingLimit;
    }

}