<?php

namespace App\DataFixtures;

use App\Entity\GameForGameGroup;
use App\Entity\GameGroup;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Game;

class GameForGameGroupFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        /**
         * @var GameGroup $gameGroupAllGames
         */
        $gameGroupAllGames = $this->getReference("GAME_GROUP_ALL_GAMES");

        /**
         * @var Game $game01
         */
        $game01 = $this->getReference('GAME01');

        $gameForGameGroup01 = new GameForGameGroup();
        $gameForGameGroup01->setGame($game01);
        $gameForGameGroup01->setGameGroup($gameGroupAllGames);
        $manager->persist($gameForGameGroup01);
        $manager->flush();


        /**
         * @var Game $game02
         */
        $game02 = $this->getReference('GAME02');

        $gameForGameGroup02 = new GameForGameGroup();
        $gameForGameGroup02->setGame($game02);
        $gameForGameGroup02->setGameGroup($gameGroupAllGames);
        $manager->persist($gameForGameGroup02);
        $manager->flush();


        /**
         * @var Game $game03
         */
        $game03 = $this->getReference('GAME03');

        $gameForGameGroup03 = new GameForGameGroup();
        $gameForGameGroup03->setGame($game03);
        $gameForGameGroup03->setGameGroup($gameGroupAllGames);
        $manager->persist($gameForGameGroup03);
        $manager->flush();


        /**
         * @var Game $game04
         */
        $game04 = $this->getReference('GAME04');

        $gameForGameGroup04 = new GameForGameGroup();
        $gameForGameGroup04->setGame($game04);
        $gameForGameGroup04->setGameGroup($gameGroupAllGames);
        $manager->persist($gameForGameGroup04);
        $manager->flush();


        /**
         * @var Game $game05
         */
        $game05 = $this->getReference('GAME05');

        $gameForGameGroup05 = new GameForGameGroup();
        $gameForGameGroup05->setGame($game05);
        $gameForGameGroup05->setGameGroup($gameGroupAllGames);
        $manager->persist($gameForGameGroup05);
        $manager->flush();

        /**
         * @var Game $game06
         */
        $game06 = $this->getReference('GAME06');

        $gameForGameGroup06 = new GameForGameGroup();
        $gameForGameGroup06->setGame($game05);
        $gameForGameGroup06->setGameGroup($gameGroupAllGames);
        $manager->persist($gameForGameGroup06);
        $manager->flush();


        /**
         * @var Game $game07
         */
        $game07 = $this->getReference('GAME07');

        $gameForGameGroup07 = new GameForGameGroup();
        $gameForGameGroup07->setGame($game07);
        $gameForGameGroup07->setGameGroup($gameGroupAllGames);
        $manager->persist($gameForGameGroup07);
        $manager->flush();

        echo "CREATED GAME FOR GAME GROUP \n\n";

    }

    public function getDependencies() : array
    {
        return [
            GameGroupFixtures::class,
            GameFixtures::class
        ];
    }

}
