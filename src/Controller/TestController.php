<?php
namespace App\Controller;

use App\Entity\User;
use App\Entity\GameGroupOrder;
use App\Repository\GameGroupOrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
    * @Route("/get-game-groups")
    */
    public function getGameGroups(): Response
    {
        /**
         * @var User $user
         */
        $user = $this->getDoctrine()->getRepository(User::class)->find(28);

        //dd($user);
        //dd($user->getUserDepositWallets());

        $user_deposit_wallets = $user->getUserDepositWallets();
        //dd($user_deposit_wallets);
        /*foreach($user_deposit_wallets as $wallet){
            print_r($wallet);
        }*/

        $user_withdraw_wallets = $user->getUserWithdrawWallets();


        $repoUser = $this->getDoctrine()->getRepository(User::class);
        /**
         * @var User $user
         */
        $user = $repoUser->find(7);

        /**
         * @var GameGroupOrder[] $result
         */
        $result = $user->getGameGroupOrder();


        dd($result);

        // \PDO::ATTR_PERSISTENT 12






        return $this->render('test/index.html.twig', [
            'controller_name' => 'ConferenceController',
            'user' => $user,
            'user_deposit_wallets' => $user_deposit_wallets,
            'user_withdraw_wallets' => $user_withdraw_wallets,
            'country' => $user->getCountry(),
        ]);

    }
}