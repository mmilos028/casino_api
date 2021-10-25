<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\TransactionType;

class TransactionTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $transactionType01 = new TransactionType();
        $transactionType01->setName("DEPOSIT FROM CODE");
        $transactionType01->setDescription('Deposit from code');
        $transactionType01->setTransactionSign(1);
        $manager->persist($transactionType01);
        $manager->flush();

        $this->setReference('transaction_type_deposit_from_code', $transactionType01);


        $transactionType02 = new TransactionType();
        $transactionType02->setName("WITHDRAW FROM CODE");
        $transactionType02->setDescription('Withdraw from code');
        $transactionType02->setTransactionSign(-1);
        $manager->persist($transactionType02);
        $manager->flush();

        $this->setReference('transaction_type_withdraw_from_code', $transactionType02);

        echo "CREATED TRANSACTION TYPES \n\n";
    }

}