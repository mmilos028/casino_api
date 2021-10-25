<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\GameProvider;

class GameProviderFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $gameProvider01 = new GameProvider();
        $gameProvider01->setName("EZONE");
        $gameProvider01->setCustomName("EZONE");
        $gameProvider01->setStatus(1);

        $manager->persist($gameProvider01);
        $manager->flush();

        $this->setReference('GAME_PROVIDER_EZONE', $gameProvider01);

        echo "CREATED GAME PROVIDERS \n\n";

    }

    /**
     * @return int
     */
    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return 2;
    }
}
