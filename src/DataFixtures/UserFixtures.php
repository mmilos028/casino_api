<?php

namespace App\DataFixtures;

use App\Entity\UserForUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\UserType;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        echo "INSERTING ROOT MASTER\n\n";
        /**
         * @var UserType $userSuperTypeMaster
         */
        $userSuperTypeMaster = $this->getReference('super_type_master');

        $userRootMaster = new User();
        $userRootMaster->setUsername('ROOT MASTER');
        $userRootMaster->setPassword('ROOT MASTER');
        $userRootMaster->setUserType($userSuperTypeMaster);
        $manager->persist($userRootMaster);
        $manager->flush();

        echo "INSERTED ROOT MASTER \n\n";

        /**
         * @var UserType $userTypeCasino
         */
        $userTypeCasino = $this->getReference('user_type_casino_system');

        $userCasino = new User();
        $userCasino->setUsername('Casino');
        $userCasino->setPassword('Casino');
        $userCasino->setUserType($userTypeCasino);
        $manager->persist($userCasino);
        $manager->flush();


        $userForUser01 = new UserForUser();
        $userForUser01->setUserFor($userRootMaster);
        $userForUser01->setUserTo($userCasino);
        $manager->persist($userForUser01);
        $manager->flush();

        /**
         * @var UserType $userTypeCasino
         */
        $userTypeCasino = $this->getReference('user_type_casino_system');

        $userCasinoLga = new User();
        $userCasinoLga->setUsername('Casino LGA');
        $userCasinoLga->setPassword('Casino LGA');
        $userCasinoLga->setUserType($userTypeCasino);
        $manager->persist($userCasinoLga);
        $manager->flush();

        $userForUser02 = new UserForUser();
        $userForUser02->setUserFor($userCasino);
        $userForUser02->setUserTo($userCasinoLga);
        $manager->persist($userForUser02);
        $manager->flush();

        /**
         * @var UserType $userTypeWhiteLabel
         */
        $userTypeWhiteLabel = $this->getReference('user_type_white_label');

        //white label
        $userUltimate777 = new User();
        $userUltimate777->setUsername('Ultimate777');
        $userUltimate777->setPassword('Ultimate777');
        $userUltimate777->setUserType($userTypeWhiteLabel);
        $manager->persist($userUltimate777);
        $manager->flush();

        echo "CREATED Ultimate777 \n\n";

        $userForUser03 = new UserForUser();
        $userForUser03->setUserFor($userCasinoLga);
        $userForUser03->setUserTo($userUltimate777);
        $manager->persist($userForUser03);
        $manager->flush();


        //point of sale group

        /**
         * @var UserType $userTypePosGroup
         */
        $userTypePosGroup = $this->getReference('user_type_pos_group');

        $userUltimate777Pos = new User();
        $userUltimate777Pos->setUsername('Ultimate777 POS');
        $userUltimate777Pos->setPassword('Ultimate777 POS');
        $userUltimate777Pos->setUserType($userTypePosGroup);
        $manager->persist($userUltimate777Pos);
        $manager->flush();

        $userForUser04 = new UserForUser();
        $userForUser04->setUserFor($userUltimate777);
        $userForUser04->setUserTo($userUltimate777Pos);
        $manager->persist($userForUser04);
        $manager->flush();

        //web partner group
        /**
         * @var UserType $userTypeWebPartnerGroup
         */
        $userTypeWebPartnerGroup = $this->getReference('user_type_web_partner_group');

        $userUltimate777WP = new User();
        $userUltimate777WP->setUsername('Ultimate777 WP');
        $userUltimate777WP->setPassword('Ultimate777 WP');
        $userUltimate777WP->setUserType($userTypeWebPartnerGroup);
        $manager->persist($userUltimate777WP);
        $manager->flush();

        $userForUser05 = new UserForUser();
        $userForUser05->setUserFor($userUltimate777);
        $userForUser05->setUserTo($userUltimate777WP);
        $manager->persist($userForUser05);
        $manager->flush();

        //internet group
        /**
         * @var UserType $userTypeInternetGroup
         */
        $userTypeInternetGroup = $this->getReference('user_type_internet_group');

        $userUltimate777IG = new User();
        $userUltimate777IG->setUsername('Ultimate777.com');
        $userUltimate777IG->setPassword('Ultimate777.com');
        $userUltimate777IG->setUserType($userTypeInternetGroup);
        $manager->persist($userUltimate777IG);
        $manager->flush();

        $this->setReference('user_ultimate777_ig', $userUltimate777IG);

        $userForUser06 = new UserForUser();
        $userForUser06->setUserFor($userUltimate777);
        $userForUser06->setUserTo($userUltimate777IG);
        $manager->persist($userForUser06);
        $manager->flush();

        echo "CREATED USERS \n\n";

    }

    public function getDependencies() : array
    {
        return [
            CountryFixtures::class,
            UserTypeFixtures::class,
        ];
    }
}
