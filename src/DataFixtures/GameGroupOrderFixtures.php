<?php

namespace App\DataFixtures;

use App\Entity\GameGroup;
use App\Entity\GameGroupOrder;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GameGroupOrderFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        echo "INSERTING GAME GROUP ALL GAMES ORDER \n\n";

        /**
         * @var GameGroup $gameGroupAllGames
         */
        $gameGroupAllGames = $this->getReference('GAME_GROUP_ALL_GAMES');

        /**
         * @var User $user
         */
        $user = $this->getReference('user_ultimate777_ig');

        $gameGroupOrder01 = new GameGroupOrder();
        $gameGroupOrder01->setGameGroup($gameGroupAllGames);
        $gameGroupOrder01->setUser($user);
        $gameGroupOrder01->setSortOrder(1);

        $manager->persist($gameGroupOrder01);
        $manager->flush();

        echo "INSERTED GAME GROUP ALL GAMES ORDER \n\n";


        /**
         * @var GameGroup $gameGroupTableGames
         */
        $gameGroupTableGames = $this->getReference('GAME_GROUP_TABLE_GROUP');

        $gameGroupOrder02 = new GameGroupOrder();
        $gameGroupOrder02->setGameGroup($gameGroupTableGames);
        $gameGroupOrder02->setUser($user);
        $gameGroupOrder02->setSortOrder(2);

        $manager->persist($gameGroupOrder02);
        $manager->flush();


        /**
         * @var GameGroup $gameGroupSlotGames
         */
        $gameGroupSlotGames = $this->getReference('GAME_GROUP_SLOT_GAMES');

        $gameGroupOrder03 = new GameGroupOrder();
        $gameGroupOrder03->setGameGroup($gameGroupSlotGames);
        $gameGroupOrder03->setUser($user);
        $gameGroupOrder03->setSortOrder(2);

        $manager->persist($gameGroupOrder03);
        $manager->flush();


        /**
         * @var GameGroup $gameGroupJackpotGames
         */
        $gameGroupJackpotGames = $this->getReference('GAME_GROUP_JACKPOT_GAMES');

        $gameGroupOrder04 = new GameGroupOrder();
        $gameGroupOrder04->setGameGroup($gameGroupJackpotGames);
        $gameGroupOrder04->setUser($user);
        $gameGroupOrder04->setSortOrder(3);

        $manager->persist($gameGroupOrder04);
        $manager->flush();


        /**
         * @var GameGroup $gameGroupPokerGames
         */
        $gameGroupPokerGames = $this->getReference('GAME_GROUP_POKER_GAMES');

        $gameGroupOrder05 = new GameGroupOrder();
        $gameGroupOrder05->setGameGroup($gameGroupPokerGames);
        $gameGroupOrder05->setUser($user);
        $gameGroupOrder05->setSortOrder(4);

        $manager->persist($gameGroupOrder05);
        $manager->flush();

        echo "CREATED GAME GROUP ORDER \n\n";

    }

    public function getDependencies() : array
    {
        return [
            GameGroupFixtures::class,
            UserFixtures::class
        ];
    }

}
