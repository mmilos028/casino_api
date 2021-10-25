<?php

namespace App\DataFixtures;

use App\Entity\GameGroup;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class GameGroupFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $gameGroup01 = new GameGroup();
        $gameGroup01->setName("ALL GAMES");
        $gameGroup01->setCustomName("ALL GAMES");
        $gameGroup01->setDescription("");
        $gameGroup01->setStatus(1);

        $manager->persist($gameGroup01);
        $manager->flush();

        $this->setReference("GAME_GROUP_ALL_GAMES", $gameGroup01);

        $gameGroup02 = new GameGroup();
        $gameGroup02->setName("TABLE GROUP");
        $gameGroup02->setCustomName("TABLE GROUP");
        $gameGroup02->setDescription("");
        $gameGroup02->setStatus(1);

        $manager->persist($gameGroup02);
        $manager->flush();

        $this->setReference("GAME_GROUP_TABLE_GROUP", $gameGroup02);

        $gameGroup03 = new GameGroup();
        $gameGroup03->setName("SLOT GAMES");
        $gameGroup03->setCustomName("SLOT GAMES");
        $gameGroup03->setDescription("");
        $gameGroup03->setStatus(1);

        $manager->persist($gameGroup03);
        $manager->flush();

        $this->setReference("GAME_GROUP_SLOT_GAMES", $gameGroup03);

        $gameGroup04 = new GameGroup();
        $gameGroup04->setName("JACKPOT GAMES");
        $gameGroup04->setCustomName("JACKPOT GAMES");
        $gameGroup04->setDescription("");
        $gameGroup04->setStatus(1);

        $manager->persist($gameGroup04);
        $manager->flush();

        $this->setReference("GAME_GROUP_JACKPOT_GAMES", $gameGroup04);

        $gameGroup05 = new GameGroup();
        $gameGroup05->setName("POKER GAMES");
        $gameGroup05->setCustomName("POKER GAMES");
        $gameGroup05->setDescription("");
        $gameGroup05->setStatus(1);

        $manager->persist($gameGroup05);
        $manager->flush();

        $this->setReference("GAME_GROUP_POKER_GAMES", $gameGroup05);

        echo "CREATED GAME GROUPS \n\n";

    }

    /**
     * @return int
     */
    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return 3;
    }

}
