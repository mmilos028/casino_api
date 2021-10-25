<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Iterable_;

final class UserLoginCollectionResolver implements QueryCollectionResolverInterface
{

    /**
     * @var EntityManagerInterface 4em
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param iterable<User> $collection
     * @param mixed $context
     * @return mixed
     */
    public function __invoke(iterable $collection, array $context): iterable
    {
        // Query arguments are in $context['args'].


        foreach($collection as $user){

        }

        return $collection;
    }
}