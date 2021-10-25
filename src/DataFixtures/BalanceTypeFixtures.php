<?php

namespace App\DataFixtures;

use App\Entity\BalanceType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BalanceTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $balanceType01 = new BalanceType();
        $balanceType01->setName("FREE CREDITS");
        $manager->persist($balanceType01);
        $manager->flush();

        $this->setReference('balance_type_free_credits', $balanceType01);

        $balanceType02 = new BalanceType();
        $balanceType02->setName("RESTRICTED CREDITS");
        $manager->persist($balanceType02);
        $manager->flush();

        $balanceType03 = new BalanceType();
        $balanceType03->setName("RESTRICTED DEPOSIT");
        $manager->persist($balanceType03);
        $manager->flush();

        $balanceType04 = new BalanceType();
        $balanceType04->setName("RESTRICTED BONUS");
        $manager->persist($balanceType04);
        $manager->flush();

        $balanceType05 = new BalanceType();
        $balanceType05->setName("RESTRICTED WIN");
        $manager->persist($balanceType05);
        $manager->flush();

        $balanceType06 = new BalanceType();
        $balanceType06->setName("RESTRICTED PROMOTION");
        $manager->persist($balanceType06);
        $manager->flush();

        echo "CREATED BALANCE TYPES \n\n";
    }

}