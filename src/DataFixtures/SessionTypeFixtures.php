<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\SessionType;

class SessionTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        //session types
        $site_session_type = new SessionType();
        $site_session_type->setName("SITE_SESSION");
        $site_session_type->setAutoClose(true);
        $site_session_type->getDurationLimit(50000);
        $manager->persist($site_session_type);
        $manager->flush();

        $this->setReference('session_type_site', $site_session_type);

        $integration_session_type = new SessionType();
        $integration_session_type->setName("INTEGRATION_SESSION");
        $integration_session_type->setAutoClose(false);
        $integration_session_type->getDurationLimit(50000);
        $manager->persist($integration_session_type);
        $manager->flush();

        $this->setReference('session_type_integration', $integration_session_type);

        echo "CREATED SESSION TYPES \n\n";

    }
}
