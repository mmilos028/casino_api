<?php

namespace App\Resolver;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Paginator;
use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;
use App\Entity\Country;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Iterable_;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Constraints\Count;

final class EnabledCountriesCollectionResolver implements QueryCollectionResolverInterface
{

    /**
     * @var EntityManagerInterface 4em
     */
    private EntityManagerInterface $em;

    private LoggerInterface $logger;

    public function __construct(EntityManagerInterface $em, LoggerInterface $logger)
    {
        $this->em = $em;

        $this->logger = $logger;
    }

    /**
     * @param iterable<Country> $collection
     * @param mixed $context
     * @return mixed
     */
    public function __invoke(iterable $collection, array $context): iterable
    {
        // Query arguments are in $context['args'].

        //$this->logger->info(print_r($context['args'], true));

        foreach($collection as $key=>$value){
            if($value->getStatus() === 1) {
                unset($collection[$key]);
            }
        }



        return $collection;
    }


}