<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\UserType;

class UserTypeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $userSuperTypeMaster = new UserType();
        $userSuperTypeMaster->setName('Master');
        $userSuperTypeMaster->setIsSuperType(1);
        $manager->persist($userSuperTypeMaster);
        $manager->flush();

        $this->setReference('super_type_master', $userSuperTypeMaster);

        $userSuperTypeAffiliate = new UserType();
        $userSuperTypeAffiliate->setName('Affiliate');
        $userSuperTypeAffiliate->setIsSuperType(1);
        $manager->persist($userSuperTypeAffiliate);
        $manager->flush();

        $this->setReference('super_type_affiliate', $userSuperTypeAffiliate);

        $userSuperTypeAdministrator = new UserType();
        $userSuperTypeAdministrator->setName('Administrator');
        $userSuperTypeAdministrator->setIsSuperType(1);
        $manager->persist($userSuperTypeAdministrator);
        $manager->flush();

        $this->setReference('super_type_administrator', $userSuperTypeAdministrator);

        $userSuperTypePlayer = new UserType();
        $userSuperTypePlayer->setName('Player');
        $userSuperTypePlayer->setIsSuperType(1);
        $manager->persist($userSuperTypePlayer);
        $manager->flush();

        $this->setReference('super_type_player', $userSuperTypePlayer);

        $userTypeCasino = new UserType();
        $userTypeCasino->setName('Casino System');
        $userTypeCasino->setIsSuperType(0);
        //$userTypeCasino->setParentUserTypeId($userSuperTypeAffiliate->getId());
        $userTypeCasino->setParentUserType($userSuperTypeAffiliate);
        $manager->persist($userTypeCasino);
        $manager->flush();

        $this->setReference('user_type_casino_system', $userTypeCasino);

        $userTypeWhiteLabel = new UserType();
        $userTypeWhiteLabel->setName('White Label');
        $userTypeWhiteLabel->setIsSuperType(0);
        //$userTypeWhiteLabel->setParentUserTypeId($userSuperTypeAffiliate->getId());
        $userTypeWhiteLabel->setParentUserType($userSuperTypeAffiliate);
        $manager->persist($userTypeWhiteLabel);
        $manager->flush();

        $this->setReference('user_type_white_label', $userTypeWhiteLabel);

        $userTypeInternetGroup = new UserType();
        $userTypeInternetGroup->setName('Internet Group');
        $userTypeInternetGroup->setIsSuperType(0);
        //$userTypeInternetGroup->setParentUserTypeId($userSuperTypeAffiliate->getId());
        $userTypeInternetGroup->setParentUserType($userSuperTypeAffiliate);
        $manager->persist($userTypeInternetGroup);
        $manager->flush();

        $this->setReference('user_type_internet_group', $userTypeInternetGroup);

        $userTypeWebPartnerGroup = new UserType();
        $userTypeWebPartnerGroup->setName('Web Partner Group');
        $userTypeWebPartnerGroup->setIsSuperType(0);
        //$userTypeWebPartnerGroup->setParentUserTypeId($userSuperTypeAffiliate->getId());
        $userTypeWebPartnerGroup->setParentUserType($userSuperTypeAffiliate);
        $manager->persist($userTypeWebPartnerGroup);
        $manager->flush();

        $this->setReference('user_type_web_partner_group', $userTypeWebPartnerGroup);

        $userTypePosGroup = new UserType();
        $userTypePosGroup->setName('Point Of Sale Group');
        $userTypePosGroup->setIsSuperType(0);
        //$userTypePosGroup->setParentUserTypeId($userSuperTypeAffiliate->getId());
        $userTypePosGroup->setParentUserType($userSuperTypeAffiliate);
        $manager->persist($userTypePosGroup);
        $manager->flush();

        $this->setReference('user_type_pos_group', $userTypePosGroup);

        $userTypeAdminMaster = new UserType();
        $userTypeAdminMaster->setName('AdminMaster');
        $userTypeAdminMaster->setIsSuperType(0);
        //$userTypeAdminMaster->setParentUserTypeId($userSuperTypeAdministrator->getId());
        $userTypeAdminMaster->setParentUserType($userSuperTypeAdministrator);
        $manager->persist($userTypeAdminMaster);
        $manager->flush();

        $this->setReference('user_type_admin_master', $userTypeAdminMaster);


        $userTypeWebPartner = new UserType();
        $userTypeWebPartner->setName('Web Partner');
        $userTypeWebPartner->setIsSuperType(0);
        //$userTypeWebPartner->setParentUserTypeId($userSuperTypeAffiliate->getId());
        $userTypeWebPartner->setParentUserType($userSuperTypeAffiliate);
        $manager->persist($userTypeWebPartner);
        $manager->flush();

        $this->setReference('user_type_web_partner', $userTypeWebPartner);

        $userTypePos = new UserType();
        $userTypePos->setName('Point Of Sale');
        $userTypePos->setIsSuperType(0);
        //$userTypePos->setParentUserTypeId($userSuperTypeAffiliate->getId());
        $userTypePos->setParentUserType($userSuperTypeAffiliate);
        $manager->persist($userTypePos);
        $manager->flush();

        $this->setReference('user_type_pos', $userTypePos);

        $userTypeInternetPlayer = new UserType();
        $userTypeInternetPlayer->setName('Internet Player');
        $userTypeInternetPlayer->setIsSuperType(0);
        //$userTypeInternetPlayer->setParentUserTypeId($userSuperTypePlayer->getId());
        $userTypeInternetPlayer->setParentUserType($userSuperTypePlayer);
        $manager->persist($userTypeInternetPlayer);
        $manager->flush();

        $this->setReference('user_type_internet_player', $userTypeInternetPlayer);

        echo "CREATED USER TYPES \n\n";

    }

    public function getDependencies() : array
    {
        return [
            CountryFixtures::class,
        ];
    }
}
