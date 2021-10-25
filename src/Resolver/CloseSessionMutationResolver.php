<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\MutationResolverInterface;
use App\Entity\Session;
use Doctrine\ORM\EntityManagerInterface;

final class CloseSessionMutationResolver implements MutationResolverInterface
{

    /**
     * @var EntityManagerInterface 4em
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Session|null $item
     * @param mixed $context
     * @return Session
     */
    public function __invoke($item, array $context)
    {
        // Mutation input arguments are in $context['args']['input'].

        // Do something with the book.
        // Or fetch the book if it has not been retrieved.
        //$item->setCurrency($context['args']['input']['currency']);

        $detectedIp = $this->detectIpAddress();

        try {
            /**
             * @var Session $session
             */
            $session = $this->em->getRepository(Session::class)->find($context['args']['input']['sessionId']);
            $session->setEndTime(new \DateTime());
            $session->setSessionState("NORMAL");
            $session->setIpAddress($detectedIp);
            $this->em->persist($session);
            $this->em->flush();

            return $session;
        }catch(\Exception $ex){

        }

        // The returned item will pe persisted.
        return $item;
    }

    public function detectIpAddress() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        if($this->testPrivateIP($ip) || $ip == "::1"){
            return long2ip(rand(0, 4294967295));
        }else{
            return $ip;
        }
    }

    //test if it is ip address
    private function testPrivateIP($ip_address)
    {
        //if there are ip addresses with , separated as CSV string
        $ip_addresses = explode(",", $ip_address);
        $ip_address = $ip_addresses[0];
        $ip_start = ip2long("192.168.0.0");
        $ip_end = ip2long("192.168.255.255");
        $ip_test = ip2long($ip_address);
        if ($ip_test > $ip_start && $ip_test < $ip_end) {
            return true;
        } //if is in private ip address range
        $ip_start = ip2long("10.0.0.0");
        $ip_end = ip2long("10.255.255.255");
        $ip_test = ip2long($ip_address);
        if ($ip_test > $ip_start && $ip_test < $ip_end) {
            return true;
        } //if is in private ip address range
        $ip_start = ip2long("172.16.0.0");
        $ip_end = ip2long("172.31.255.255");
        $ip_test = ip2long($ip_address);
        if ($ip_test > $ip_start && $ip_test < $ip_end) {
            return true;
        } //if is in private ip address range
        return false; // //if it is not in private ip address range
    }
}