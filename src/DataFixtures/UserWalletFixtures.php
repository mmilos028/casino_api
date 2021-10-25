<?php

namespace App\DataFixtures;

use App\Entity\BalanceType;
use App\Entity\UserWallet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserWalletFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        /**
         * @var User $user
         */
        $user = $this->getReference('player');
        /**
         * @var BalanceType $balanceType01
         */
        $balanceType01 = $this->getReference('balance_type_free_credits');

        //$test_user_id = $user->getId();

        //deposit wallets
        $userWallet01 = new UserWallet();
        $userWallet01->setUser($user);
        $userWallet01->setBalanceType($balanceType01);
        $userWallet01->setBalance(0.028);
        $userWallet01->setCurrency("BTC");
        $manager->persist($userWallet01);
        $manager->flush();

        $userWallet02 = new UserWallet();
        $userWallet02->setUser($user);
        $userWallet02->setBalanceType($balanceType01);
        $userWallet02->setBalance(5.28);
        $userWallet02->setCurrency("LTC");
        $manager->persist($userWallet02);
        $manager->flush();

        $userWallet03 = new UserWallet();
        $userWallet03->setUser($user);
        $userWallet03->setBalanceType($balanceType01);
        $userWallet03->setBalance(2622.52);
        $userWallet03->setCurrency("XDG");
        $manager->persist($userWallet03);
        $manager->flush();

        $userWallet04 = new UserWallet();
        $userWallet04->setUser($user);
        $userWallet04->setBalanceType($balanceType01);
        $userWallet04->setBalance(0.50);
        $userWallet04->setCurrency("ETH");
        $manager->persist($userWallet04);
        $manager->flush();

        $userWallet05 = new UserWallet();
        $userWallet05->setUser($user);
        $userWallet05->setBalanceType($balanceType01);
        $userWallet05->setBalance(4.12609);
        $userWallet05->setCurrency("ZEC");
        $manager->persist($userWallet05);
        $manager->flush();

        $userWallet06 = new UserWallet();
        $userWallet06->setUser($user);
        $userWallet06->setBalanceType($balanceType01);
        $userWallet06->setBalance(15.05343971);
        $userWallet06->setCurrency("TRX");
        $manager->persist($userWallet06);
        $manager->flush();

        $userWallet07 = new UserWallet();
        $userWallet07->setUser($user);
        $userWallet07->setBalanceType($balanceType01);
        $userWallet07->setBalance(6.05766900);
        $userWallet07->setCurrency("DASH");
        $manager->persist($userWallet07);
        $manager->flush();

        $userWallet08 = new UserWallet();
        $userWallet08->setUser($user);
        $userWallet08->setBalanceType($balanceType01);
        $userWallet08->setBalance(5.04973993);
        $userWallet08->setCurrency("XMR");
        $manager->persist($userWallet08);
        $manager->flush();

        echo "CREATED USER WALLETS \n\n";

    }

    public function getDependencies() : array
    {
        return [
            UserFixtures::class,
            PlayerFixtures::class,
            BalanceTypeFixtures::class,
        ];
    }
}