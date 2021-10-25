<?php

namespace App\DataFixtures;

use App\Entity\GameForDesktop;
use App\Entity\GameProvider;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Game;
use Faker\Factory;
use App\Entity\User;

class GameForDesktopFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        /**
         * @var User $user
         */
        $user = $this->getReference('user_ultimate777_ig');

        /**
         * @var Game $game01
         */
        $game01 = $this->getReference('GAME01');
        $gameForDesktop01 = new GameForDesktop();
        $gameForDesktop01->setUser($user);
        $gameForDesktop01->setGame($game01);
        $manager->persist($gameForDesktop01);
        $manager->flush();


        /**
         * @var Game $game02
         */
        $game02 = $this->getReference('GAME02');
        $gameForDesktop02 = new GameForDesktop();
        $gameForDesktop02->setUser($user);
        $gameForDesktop02->setGame($game02);
        $manager->persist($gameForDesktop02);
        $manager->flush();


        /**
         * @var Game $game03
         */
        $game03 = $this->getReference('GAME03');
        $gameForDesktop03 = new GameForDesktop();
        $gameForDesktop03->setUser($user);
        $gameForDesktop03->setGame($game03);
        $manager->persist($gameForDesktop03);
        $manager->flush();


        /**
         * @var Game $game04
         */
        $game04 = $this->getReference('GAME04');
        $gameForDesktop04 = new GameForDesktop();
        $gameForDesktop04->setUser($user);
        $gameForDesktop04->setGame($game04);
        $manager->persist($gameForDesktop04);
        $manager->flush();


        /**
         * @var Game $game05
         */
        $game05 = $this->getReference('GAME05');
        $gameForDesktop05 = new GameForDesktop();
        $gameForDesktop05->setUser($user);
        $gameForDesktop05->setGame($game05);
        $manager->persist($gameForDesktop05);
        $manager->flush();


        /**
         * @var Game $game06
         */
        $game06 = $this->getReference('GAME06');
        $gameForDesktop06 = new GameForDesktop();
        $gameForDesktop06->setUser($user);
        $gameForDesktop06->setGame($game06);
        $manager->persist($gameForDesktop06);
        $manager->flush();


        /**
         * @var Game $game07
         */
        $game07 = $this->getReference('GAME07');
        $gameForDesktop07 = new GameForDesktop();
        $gameForDesktop07->setUser($user);
        $gameForDesktop07->setGame($game07);
        $manager->persist($gameForDesktop07);
        $manager->flush();


        /**
         * @var Game $game08
         */
        $game08 = $this->getReference('GAME08');
        $gameForDesktop08 = new GameForDesktop();
        $gameForDesktop08->setUser($user);
        $gameForDesktop08->setGame($game08);
        $manager->persist($gameForDesktop08);
        $manager->flush();


        /**
         * @var Game $game09
         */
        $game09 = $this->getReference('GAME09');
        $gameForDesktop09 = new GameForDesktop();
        $gameForDesktop09->setUser($user);
        $gameForDesktop09->setGame($game09);
        $manager->persist($gameForDesktop09);
        $manager->flush();


        /**
         * @var Game $game10
         */
        $game10 = $this->getReference('GAME10');
        $gameForDesktop10 = new GameForDesktop();
        $gameForDesktop10->setUser($user);
        $gameForDesktop10->setGame($game10);
        $manager->persist($gameForDesktop10);
        $manager->flush();


        echo "CREATED GAMES FOR DESKTOP \n\n";

    }

    public function getDependencies() : array
    {
        return [
            GameFixtures::class,
            UserFixtures::class
        ];
    }
}
