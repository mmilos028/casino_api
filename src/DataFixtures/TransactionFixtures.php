<?php

namespace App\DataFixtures;

use App\Entity\Transaction;
use App\Entity\TransactionType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\ORM\Spot\ColumnTypeGuesser;
use App\Entity\User;
use App\Entity\Session;

class TransactionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * @var TransactionType $transactionTypeDeposit
         */
        $transactionTypeDeposit = $this->getReference('transaction_type_deposit_from_code');
        /**
         * @var TransactionType $transactionTypeWithdraw
         */
        $transactionTypeWithdraw = $this->getReference('transaction_type_withdraw_from_code');

        /**
         * @var User $user_ultimate777_ig
         */
        $user_ultimate777_ig = $this->getReference('user_ultimate777_ig');
        /**
         * @var User $player
         */
        $player = $this->getReference('player');

        /**
         * @var Session $site_session
         */
        $site_session = $this->getReference('site_session');

        $transaction01 = new Transaction();
        $transaction01->setCurrency('BTC');
        $transaction01->setIpAddress("178.223.26.207");
        $transaction01->setStartTime(new \DateTime());
        $transaction01->setCredits(0.0005451233);
        $transaction01->setUserFrom($user_ultimate777_ig);
        $transaction01->setUserTo($player);
        $transaction01->setTransactionType($transactionTypeDeposit);
        $transaction01->setTransactionSign(1);
        $transaction01->setSession($site_session);
        $manager->persist($transaction01);
        $manager->flush();


        $transaction02 = new Transaction();
        $transaction02->setCurrency('BTC');
        $transaction02->setIpAddress("178.223.26.207");
        $transaction02->setStartTime(new \DateTime());
        $transaction02->setCredits(0.0005451233);
        $transaction02->setUserFrom($user_ultimate777_ig);
        $transaction02->setUserTo($player);
        $transaction02->setTransactionType($transactionTypeWithdraw);
        $transaction02->setTransactionSign(-1);
        $transaction02->setSession($site_session);
        $manager->persist($transaction02);
        $manager->flush();

        for($i=0;$i<1000; $i++){

            $faker = Factory::create();
            $startTime = $faker->dateTimeBetween('-1 year', '-1 week');

            $transaction = new Transaction();
            $transaction->setCurrency($this->getRandomCurrency());
            $transaction->setIpAddress(Factory::create()->ipv4);
            $transaction->setStartTime($startTime);
            $credits = $faker->randomFloat(6, 0.000001, 1);
            $transaction->setCredits($credits);
            $transaction->setUserFrom($user_ultimate777_ig);
            $transaction->setUserTo($player);
            $transactionSign = $this->getRandomTransactionSign();
            if($transactionSign == 1){
                $transaction->setTransactionType($transactionTypeDeposit);
            }else{
                $transaction->setTransactionType($transactionTypeWithdraw);
            }
            $transaction->setTransactionSign($this->getRandomTransactionSign());
            $transaction->setSession($site_session);

            $manager->persist($transaction);
            $manager->flush();
        }

        echo "CREATED TRANSACTIONS \n\n";
    }

    private function getRandomTransactionSign(): int {
        $randInt = random_int(0, 1);
        if($randInt == 0)return -1;
        else return 1;
    }

    private function getRandomCurrency(): string{
        $randInt = random_int(1, 8);
        switch($randInt){
            case 1:
                return "BTC";
            case 2:
                return "LTC";
            case 3:
                return "XDG";
            case 4:
                return "ETH";
            case 5:
                return "ZEC";
            case 6:
                return "TRX";
            case 7:
                return "DASH";
            case 8:
                return "XMR";
        }
        return "BTC";
    }

    public function getDependencies() : array
    {
        return [
            TransactionTypeFixtures::class,
            UserFixtures::class,
            PlayerFixtures::class,
            SessionFixtures::class,
        ];
    }

}