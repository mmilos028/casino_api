<?php

namespace App\DataFixtures;

use App\Entity\Session;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\SessionType;

class SessionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        /**
         * @var SessionType $site_session_type
         */
        $site_session_type = $this->getReference('session_type_site');
        /**
         * @var User $user
         */
        $user = $this->getReference('player');

        $session = new Session();
        $session->setUser($user);
        $session->setSessionType($site_session_type);
        $session->setStartTime(new \DateTime());
        //$session->setEndTime(\DateTime::)
        $session->setCredits(100);
        $session->setCurrency("EUR");
        $session->setSessionState("BROKEN");
        $session->setIpAddress("79.101.227.135");
        $manager->persist($session);
        $manager->flush();

        $this->setReference('site_session', $session);

        echo "CREATED SESSIONS \n\n";

    }

    public function getDependencies() : array
    {
        return [
            PlayerFixtures::class,
            SessionTypeFixtures::class,
        ];
    }
}
