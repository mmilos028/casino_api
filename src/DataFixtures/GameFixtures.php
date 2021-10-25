<?php

namespace App\DataFixtures;

use App\Entity\GameProvider;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Game;
use Faker\Factory;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        /**
         * @var GameProvider $gameProvider
         */
        $gameProvider = $this->getReference('GAME_PROVIDER_EZONE');

        $game01 = new Game();
        $game01->setName("Sizzling Star");
        $game01->setCustomId("595");
        $game01->setCustomName("Sizzling Star");
        $game01->setStatus(1);
        $game01->setGameProvider($gameProvider);

        $manager->persist($game01);
        $manager->flush();
        $this->setReference('GAME01', $game01);

        $game02 = new Game();
        $game02->setName("Magic Papyrus");
        $game02->setCustomId("596");
        $game02->setCustomName("Magic Papyrus");
        $game02->setStatus(1);
        $game02->setGameProvider($gameProvider);

        $manager->persist($game02);
        $manager->flush();
        $this->setReference('GAME02', $game02);

        $game03 = new Game();
        $game03->setName("Good Luck Deluxe");
        $game03->setCustomId("597");
        $game03->setCustomName("Good Luck Deluxe");
        $game03->setStatus(1);
        $game03->setGameProvider($gameProvider);

        $manager->persist($game03);
        $manager->flush();
        $this->setReference('GAME03', $game03);

        $game04 = new Game();
        $game04->setName("Happy Diamonds");
        $game04->setCustomId("598");
        $game04->setCustomName("Happy Diamonds");
        $game04->setStatus(1);
        $game04->setGameProvider($gameProvider);

        $manager->persist($game04);
        $manager->flush();
        $this->setReference('GAME04', $game04);

        $game05 = new Game();
        $game05->setName("Power Liner");
        $game05->setCustomId("598");
        $game05->setCustomName("Power Liner");
        $game05->setStatus(1);
        $game05->setGameProvider($gameProvider);

        $manager->persist($game05);
        $manager->flush();
        $this->setReference('GAME05', $game05);

        $game06 = new Game();
        $game06->setName("Asia Fruits");
        $game06->setCustomId("191");
        $game06->setCustomName("Asia Fruits");
        $game06->setStatus(1);
        $game06->setGameProvider($gameProvider);

        $manager->persist($game06);
        $manager->flush();
        $this->setReference('GAME06', $game06);

        $game07 = new Game();
        $game07->setName("Bees N Bugs");
        $game07->setCustomId("1818");
        $game07->setCustomName("Bees N Bugs");
        $game07->setStatus(1);
        $game07->setGameProvider($gameProvider);

        $manager->persist($game07);
        $manager->flush();
        $this->setReference('GAME07', $game07);

        $game08 = new Game();
        $game08->setName("Best Of Book");
        $game08->setCustomId("183");
        $game08->setCustomName("Best Of Book");
        $game08->setStatus(1);
        $game08->setGameProvider($gameProvider);

        $manager->persist($game08);
        $manager->flush();
        $this->setReference('GAME08', $game08);

        $game09 = new Game();
        $game09->setName("Best Of Book Ultimate");
        $game09->setCustomId("184");
        $game09->setCustomName("Best Of Book Ultimate");
        $game09->setStatus(1);
        $game09->setGameProvider($gameProvider);

        $manager->persist($game09);
        $manager->flush();
        $this->setReference('GAME09', $game09);

        $game10 = new Game();
        $game10->setName("Busy Bee");
        $game10->setCustomId("1820");
        $game10->setCustomName("Busy Bee");
        $game10->setStatus(1);
        $game10->setGameProvider($gameProvider);

        $manager->persist($game10);
        $manager->flush();
        $this->setReference('GAME10', $game10);

        $game11 = new Game();
        $game11->setName("Good Luck");
        $game11->setCustomId("190");
        $game11->setCustomName("Good Luck");
        $game11->setStatus(1);
        $game11->setGameProvider($gameProvider);

        $manager->persist($game11);
        $manager->flush();
        $this->setReference('GAME11', $game11);

        $game12 = new Game();
        $game12->setName("Hot Reel");
        $game12->setCustomId("143");
        $game12->setCustomName("Hot Reel");
        $game12->setStatus(1);
        $game12->setGameProvider($gameProvider);

        $manager->persist($game12);
        $manager->flush();
        $this->setReference('GAME12', $game12);

        $game13 = new Game();
        $game13->setName("Kamasutra");
        $game13->setCustomId("284");
        $game13->setCustomName("Kamasutra");
        $game13->setStatus(1);
        $game13->setGameProvider($gameProvider);

        $manager->persist($game13);
        $manager->flush();
        $this->setReference('GAME13', $game13);

        $game14 = new Game();
        $game14->setName("Lines 27");
        $game14->setCustomId("225");
        $game14->setCustomName("Lines 27");
        $game14->setStatus(1);
        $game14->setGameProvider($gameProvider);

        $manager->persist($game14);
        $manager->flush();
        $this->setReference('GAME14', $game14);

        $game15 = new Game();
        $game15->setName("Magic Bell");
        $game15->setCustomId("285");
        $game15->setCustomName("Magic Bell");
        $game15->setStatus(1);
        $game15->setGameProvider($gameProvider);

        $manager->persist($game15);
        $manager->flush();
        $this->setReference('GAME15', $game15);


        echo "CREATED GAMES \n\n";

    }

    public function getDependencies() : array
    {
        return [
            GameProviderFixtures::class
        ];
    }
}
