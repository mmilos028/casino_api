<?php

namespace App\DataFixtures;

use App\Entity\Game;
use App\Entity\GameGroup;
use App\Entity\GameGroupOrder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\GameOrder;
use App\Entity\User;
use Faker\Factory;

class GameOrderFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        /**
         * @var User $user
         */
        $user = $this->getReference('user_ultimate777_ig');

        /**
         * @var GameGroup $gameGroupAllGames
         */
        $gameGroupAllGames = $this->getReference('GAME_GROUP_ALL_GAMES');

        /**
         * @var Game $game01
         */
        $game01 = $this->getReference('GAME01');

        $gameOrder01 = new GameOrder();
        $gameOrder01->setUser($user);
        $gameOrder01->setGameGroup($gameGroupAllGames);
        $gameOrder01->setSortOrder(1);
        $gameOrder01->setGame($game01);

        $manager->persist($gameOrder01);
        $manager->flush();

        /**
         * @var Game $game02
         */
        $game02 = $this->getReference('GAME02');

        $gameOrder02 = new GameOrder();
        $gameOrder02->setUser($user);
        $gameOrder02->setGameGroup($gameGroupAllGames);
        $gameOrder02->setSortOrder(4);
        $gameOrder02->setGame($game02);

        $manager->persist($gameOrder02);
        $manager->flush();

        /**
         * @var Game $game03
         */
        $game03 = $this->getReference('GAME03');

        $gameOrder03 = new GameOrder();
        $gameOrder03->setUser($user);
        $gameOrder03->setGameGroup($gameGroupAllGames);
        $gameOrder03->setSortOrder(2);
        $gameOrder03->setGame($game03);

        $manager->persist($gameOrder03);
        $manager->flush();

        /**
         * @var Game $game04
         */
        $game04 = $this->getReference('GAME04');

        $gameOrder04 = new GameOrder();
        $gameOrder04->setUser($user);
        $gameOrder04->setGameGroup($gameGroupAllGames);
        $gameOrder04->setSortOrder(20);
        $gameOrder04->setGame($game04);

        $manager->persist($gameOrder04);
        $manager->flush();

        /**
         * @var Game $game05
         */
        $game05 = $this->getReference('GAME05');

        $gameOrder05 = new GameOrder();
        $gameOrder05->setUser($user);
        $gameOrder05->setGameGroup($gameGroupAllGames);
        $gameOrder05->setSortOrder(3);
        $gameOrder05->setGame($game05);

        $manager->persist($gameOrder05);
        $manager->flush();


        /**
         * @var Game $game06
         */
        $game06 = $this->getReference('GAME06');

        $gameOrder06 = new GameOrder();
        $gameOrder06->setUser($user);
        $gameOrder06->setGameGroup($gameGroupAllGames);
        $gameOrder06->setSortOrder(8);
        $gameOrder06->setGame($game06);

        $manager->persist($gameOrder06);
        $manager->flush();

        /**
         * @var Game $game07
         */
        $game07 = $this->getReference('GAME07');

        $gameOrder07 = new GameOrder();
        $gameOrder07->setUser($user);
        $gameOrder07->setGameGroup($gameGroupAllGames);
        $gameOrder07->setSortOrder(4);
        $gameOrder07->setGame($game07);

        $manager->persist($gameOrder07);
        $manager->flush();

        /**
         * @var Game $game08
         */
        $game08 = $this->getReference('GAME08');

        $gameOrder08 = new GameOrder();
        $gameOrder08->setUser($user);
        $gameOrder08->setGameGroup($gameGroupAllGames);
        $gameOrder08->setSortOrder(15);
        $gameOrder08->setGame($game08);

        $manager->persist($gameOrder08);
        $manager->flush();


        /**
         * @var Game $game09
         */
        $game09 = $this->getReference('GAME09');

        $gameOrder09 = new GameOrder();
        $gameOrder09->setUser($user);
        $gameOrder09->setGameGroup($gameGroupAllGames);
        $gameOrder09->setSortOrder(13);
        $gameOrder09->setGame($game09);

        $manager->persist($gameOrder09);
        $manager->flush();


        /**
         * @var Game $game10
         */
        $game10 = $this->getReference('GAME10');

        $gameOrder10 = new GameOrder();
        $gameOrder10->setUser($user);
        $gameOrder10->setGameGroup($gameGroupAllGames);
        $gameOrder10->setSortOrder(17);
        $gameOrder10->setGame($game10);

        $manager->persist($gameOrder10);
        $manager->flush();

        echo "CREATED GAME ORDER \n\n";

    }

    public function getDependencies() : array
    {
        return [
            UserFixtures::class,
            GameGroupFixtures::class,
            GameFixtures::class,
            GameGroupOrderFixtures::class
        ];
    }
}
