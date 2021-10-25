<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use App\Resolver\EnabledCountriesCollectionResolver;

/**
 * @ApiResource(
       graphql={"item_query", "collection_query",
       "create", "update", "delete",
       "enabledCountriesCollectionQuery"={
           "collection_query" = EnabledCountriesCollectionResolver::class,
       }
   })
 * @ApiFilter(NumericFilter::class, properties={"status"})
 * @ApiFilter(SearchFilter::class, properties={"name": "partial"})
 * @ORM\Entity
 * @ORM\Table(name="country")
 */
class Country
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
    private int $country_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="integer")
     */
    private int $status;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $country_id
     */
    public function setCountryId(int $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return int
     */
    public function getCountryId(): ?int
    {
        return $this->country_id;
    }

    /**
     * @param int $id
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
     * @return integer
     */
    public function getStatus() : ?int
    {
        return $this->status;
    }

    /**
     * @param integer $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
}