<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryItemResolverInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

final class PlayerLoginResolver implements QueryItemResolverInterface
{

    /**
     * @var EntityManagerInterface 4em
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param User|null $item
     * @param mixed $context
     * @return User
     */
    public function __invoke($item, array $context)
    {
        // Query arguments are in $context['args'].

        $userTypeRepository = $this->em->getRepository("App\Entity\UserType");
        /**
         * @var UserType $userTypeInternetPlayer
         */
        $userTypeInternetPlayer = $userTypeRepository->findOneBy(["name" => "Internet Player"]);


        $userRepository = $this->em->getRepository("App\Entity\User");
        /**
         * @var User $item
         */
        $item = $userRepository->findUserByUsernamePassword($context['args']['username'], $context['args']['password'], $userTypeInternetPlayer, 'N');
        /*$item = $userRepository->findBy(
            [
                'username' => $context['args']['username'],
                'password' => $context['args']['password'],
                'userType' => $userTypeInternetPlayer,
                'isBanned' => 'N'
            ]
        );*/

        if(!isset($item))
            return null;
        else return $item;
    }
}