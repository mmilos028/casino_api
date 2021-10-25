<?php

namespace App\DataFixtures;

use App\Entity\UserForUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\UserType;
use App\Entity\Country;
use Faker\Factory;

class PlayerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        /**
         * @var UserType $userTypeInternetPlayer
         */
        $userTypeInternetPlayer = $this->getReference('user_type_internet_player');
        /**
         * @var Country $fake_country
         */
        $fake_country = $this->getReference('country');
        /**
         * @var User $userUltimate777IG
         */
        $userUltimate777IG = $this->getReference('user_ultimate777_ig');

        // create 20 players
        for ($i = 0; $i < 20; $i++) {
            $user = new User();

            $faker = Factory::create();

            $username = $faker->userName;
            $user->setUsername($username);
            $user->setPassword($username);
            $user->setEmail($faker->email);
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setGender("m");
            $user->setBirthdate($faker->dateTimeBetween('-80years', '-20years'));
            $user->setAddress($faker->address);
            $user->setUserType($userTypeInternetPlayer);
            //$user->setCountry(702404504);
            //$user->setCountryId($fake_country_id);
            $user->setCountry($fake_country);
            $user->setAddress2($faker->streetAddress);
            $user->setBankAccountNumber($faker->bankAccountNumber);
            $user->setBankCountry($fake_country);
            $user->setInternationalBankAccountNumber($faker->bankAccountNumber);
            $user->setBankIdentificationCode($faker->swiftBicNumber);
            $user->setZipCode($faker->postcode);
            $user->setCity($faker->city);
            $user->setIsBanned(rand(0, 1) == 0 ? 'N' : 'Y');

            $randomVerificationStatus = rand(0, 2);
            if($randomVerificationStatus == 0){
                $user->setVerificationStatus('NOV');
            }else if($randomVerificationStatus == 1){
                $user->setVerificationStatus('EMV');
            }else if($randomVerificationStatus == 2){
                $user->setVerificationStatus('KYC');
            }
            $user->setPhoneNumber($faker->phoneNumber);

            if($randomVerificationStatus == 0){
                $user->setLanguage('en');
            }else if($randomVerificationStatus == 1){
                $user->setLanguage('de');
            }else{
                $user->setLanguage('en');
            }

            $user->setCurrency("BTC");

            $manager->persist($user);
            $manager->flush();

            $userForUser01 = new UserForUser();
            $userForUser01->setUserFor($userUltimate777IG);
            $userForUser01->setUserTo($user);
            $manager->persist($userForUser01);
            $manager->flush();

        }

        $faker = Factory::create();

        $player = new User();
        $player->setUsername("mmilos028");
        $player->setPassword("mmilos028");
        $player->setEmail("mmilos028@gmail.com");

        $player->setFirstName("Milos");
        $player->setLastName("Milosevic");
        $player->setGender("m");
        $player->setBirthdate(new \DateTime("19-Mar-1986"));
        $player->setUserType($userTypeInternetPlayer);
        $player->setCountry($fake_country);
        $player->setAddress2($faker->streetAddress);
        $player->setBankAccountNumber($faker->bankAccountNumber);
        $player->setBankCountry($fake_country);
        $player->setInternationalBankAccountNumber($faker->bankAccountNumber);
        $player->setBankIdentificationCode($faker->swiftBicNumber);
        $player->setZipCode($faker->postcode);
        $player->setCity($faker->city);
        $player->setIsBanned(rand(0, 1) == 0 ? 'N' : 'Y');
        $player->setVerificationStatus('KYC');
        $player->setPhoneNumber($faker->phoneNumber);
        $player->setLanguage('en');
        $player->setCurrency("BTC");

        $manager->persist($player);
        $manager->flush();

        $this->setReference('player', $player);

        $userForUser01 = new UserForUser();
        $userForUser01->setUserFor($userUltimate777IG);
        $userForUser01->setUserTo($player);
        $manager->persist($userForUser01);
        $manager->flush();




        $faker = Factory::create();

        $player = new User();
        $player->setUsername("miloske01");
        $player->setPassword("miloske01");
        $player->setEmail("mmilos028@gmail.com");

        $player->setFirstName("Milos");
        $player->setLastName("Milosevic");
        $player->setGender("m");
        $player->setBirthdate(new \DateTime("19-Mar-1986"));
        $player->setUserType($userTypeInternetPlayer);
        $player->setCountry($fake_country);
        $player->setAddress2($faker->streetAddress);
        $player->setBankAccountNumber($faker->bankAccountNumber);
        $player->setBankCountry($fake_country);
        $player->setInternationalBankAccountNumber($faker->bankAccountNumber);
        $player->setBankIdentificationCode($faker->swiftBicNumber);
        $player->setZipCode($faker->postcode);
        $player->setCity($faker->city);
        $player->setIsBanned(rand(0, 1) == 0 ? 'N' : 'Y');
        $player->setVerificationStatus('KYC');
        $player->setPhoneNumber($faker->phoneNumber);
        $player->setLanguage('en');
        $player->setCurrency("BTC");
        $manager->persist($player);
        $manager->flush();

        $userForUser01 = new UserForUser();
        $userForUser01->setUserFor($userUltimate777IG);
        $userForUser01->setUserTo($player);
        $manager->persist($userForUser01);
        $manager->flush();

        echo "CREATED PLAYERS \n\n";

    }

    public function getDependencies() : array
    {
        return [
            CountryFixtures::class,
            UserTypeFixtures::class,
            UserFixtures::class,
        ];
    }
}
