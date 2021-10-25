<?php

namespace App\DataFixtures;

use App\Entity\BalanceType;
use App\Entity\Session;
use App\Entity\UserWallet;
use App\Entity\UserWithdrawWallet;
use App\Entity\UserForUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Intl\Intl;

use App\Entity\User;
use App\Entity\UserType;
use App\Entity\Country;
use App\Entity\SessionType;

use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


        //fill country table

        /*
        $country_list_json_string = <<< EOL
{"status":"OK","result":[{"id":"702404490","name":"Afghanistan"},{"id":null,"name":"Aland Islands"},{"id":"702404491","name":"Albania"},{"id":"702404492","name":"Algeria"},{"id":"702404494","name":"American Samoa"},{"id":"702404496","name":"Andorra"},{"id":"702404497","name":"Angola"},{"id":"702404498","name":"Anguilla"},{"id":null,"name":"Antarctica"},{"id":"702404499","name":"Antigua and Barbuda"},{"id":"702404500","name":"Argentina"},{"id":"702404501","name":"Armenia"},{"id":"702404502","name":"Aruba"},{"id":"702404503","name":"Australia"},{"id":"702404504","name":"Austria"},{"id":"702404505","name":"Azerbaijan"},{"id":"702404507","name":"Bahamas"},{"id":"702404508","name":"Bahrain"},{"id":"702404510","name":"Bangladesh"},{"id":"702404511","name":"Barbados"},{"id":"702404513","name":"Belarus"},{"id":"702404514","name":"Belgium"},{"id":"702404515","name":"Belize"},{"id":"702404516","name":"Benin"},{"id":"702404517","name":"Bermuda"},{"id":"702404518","name":"Bhutan"},{"id":"702404519","name":"Bolivia (Plurinational State of)"},{"id":null,"name":"Bonaire, Sint Eustatius and Saba"},{"id":"702404521","name":"Bosnia and Herzegovina"},{"id":"702404522","name":"Botswana"},{"id":"702404523","name":"Bouvet Island"},{"id":"702404524","name":"Brazil"},{"id":"702404526","name":"British Indian Ocean Territory"},{"id":"702404528","name":"Brunei Darussalam"},{"id":"702404529","name":"Bulgaria"},{"id":"702404530","name":"Burkina Faso"},{"id":"702404531","name":"Burma (Myanmar)"},{"id":null,"name":"Burundi"},{"id":null,"name":"Cabo Verde"},{"id":"702404534","name":"Cambodia"},{"id":"702404535","name":"Cameroon"},{"id":"702404536","name":"Canada"},{"id":"702404539","name":"Cayman Islands"},{"id":"702404540","name":"Central African Republic"},{"id":"702404541","name":"Chad"},{"id":"702404542","name":"Chile"},{"id":"702404543","name":"China"},{"id":"702404544","name":"Christmas Island"},{"id":"702404545","name":"Cocos (Keeling) Islands"},{"id":"702404546","name":"Colombia"},{"id":"702404548","name":"Comoros"},{"id":null,"name":"Congo"},{"id":null,"name":"Congo (Democratic Republic of the)"},{"id":"702404552","name":"Cook Islands"},{"id":"702404553","name":"Costa Rica"},{"id":null,"name":"Cote d'Ivoire"},{"id":"702404554","name":"Croatia"},{"id":"702404555","name":"Cuba"},{"id":"702404556","name":"Curacao"},{"id":"702404557","name":"Cyprus"},{"id":"702404558","name":"Czech Republic"},{"id":"702404559","name":"Denmark"},{"id":"702404560","name":"Djibouti"},{"id":"702404561","name":"Dominica"},{"id":"702404562","name":"Dominican Republic"},{"id":"702404566","name":"Ecuador"},{"id":"702404567","name":"Egypt"},{"id":"702404569","name":"El Salvador"},{"id":"702404571","name":"Equatorial Guinea"},{"id":"702404572","name":"Eritrea"},{"id":"702404573","name":"Estonia"},{"id":"702404574","name":"Ethiopia"},{"id":"702404575","name":"Falkland Islands (Malvinas)"},{"id":"702404576","name":"Faroe Islands"},{"id":"702404577","name":"Fiji"},{"id":"702404578","name":"Finland"},{"id":"702404579","name":"France"},{"id":"702404580","name":"French Guiana"},{"id":null,"name":"French Polynesia"},{"id":"702404583","name":"French Southern Territories"},{"id":"702404585","name":"Gabon"},{"id":"702404586","name":"Gambia"},{"id":null,"name":"Georgia"},{"id":"702404587","name":"Germany"},{"id":"702404588","name":"Ghana"},{"id":"702404589","name":"Gibraltar"},{"id":"702404592","name":"Greece"},{"id":"702404593","name":"Greenland"},{"id":"702404594","name":"Grenada"},{"id":"702404596","name":"Guadeloupe"},{"id":"702404597","name":"Guam"},{"id":"702404598","name":"Guatemala"},{"id":"702404599","name":"Guernsey"},{"id":"702404600","name":"Guinea"},{"id":"702404601","name":"Guinea-Bissau"},{"id":"702404602","name":"Guyana"},{"id":"702404603","name":"Haiti"},{"id":"702404604","name":"Heard Island and McDonald Islands"},{"id":"702404607","name":"Holy See"},{"id":"702404608","name":"Honduras"},{"id":"702404609","name":"Hong Kong"},{"id":"702404610","name":"Hungary"},{"id":"702404611","name":"Iceland"},{"id":"702404612","name":"India"},{"id":"702404613","name":"Indonesia"},{"id":null,"name":"Iran (Islamic Republic of)"},{"id":null,"name":"Iraq"},{"id":"702404568","name":"Ireland"},{"id":"702404616","name":"Isle of Man"},{"id":"702404617","name":"Israel"},{"id":"702404618","name":"Italy"},{"id":"702404619","name":"Jamaica"},{"id":"702404621","name":"Japan"},{"id":"702404622","name":"Jersey"},{"id":"702404623","name":"Jordan"},{"id":"702404624","name":"Kazakhstan"},{"id":"702404626","name":"Kenya"},{"id":"702404627","name":"Kiribati"},{"id":null,"name":"Korea (Democratic People's Republic of)"},{"id":null,"name":"Korea (Republic of)"},{"id":"702404630","name":"Kuwait"},{"id":"702404631","name":"Kyrgyzstan"},{"id":null,"name":"Lao People's Democratic Republic"},{"id":null,"name":"Latvia"},{"id":"702404633","name":"Lebanon"},{"id":"702404634","name":"Lesotho"},{"id":"702404635","name":"Liberia"},{"id":"702404636","name":"Libya"},{"id":"702404637","name":"Liechtenstein"},{"id":"702404638","name":"Lithuania"},{"id":"702404639","name":"Luxembourg"},{"id":null,"name":"Macao"},{"id":null,"name":"Macedonia (the former Yugoslav Republic of)"},{"id":"702404642","name":"Madagascar"},{"id":"702404644","name":"Malawi"},{"id":"702404645","name":"Malaysia"},{"id":null,"name":"Maldives"},{"id":"702404647","name":"Mali"},{"id":"702404648","name":"Malta"},{"id":"702404651","name":"Marshall Islands"},{"id":"702404652","name":"Martinique"},{"id":"702404653","name":"Mauritania"},{"id":"702404654","name":"Mauritius"},{"id":"702404655","name":"Mayotte"},{"id":"702404657","name":"Mexico"},{"id":"702404658","name":"Micronesia (Federated States of)"},{"id":null,"name":"Moldova (Republic of)"},{"id":"702404662","name":"Monaco"},{"id":"702404663","name":"Mongolia"},{"id":"702404664","name":"Montenegro"},{"id":"702404665","name":"Montserrat"},{"id":"702404666","name":"Morocco"},{"id":"702404667","name":"Mozambique"},{"id":"702404669","name":"Namibia"},{"id":"702404670","name":"Nauru"},{"id":"702404671","name":"Nepal"},{"id":"702404673","name":"Netherlands"},{"id":"702404675","name":"New Caledonia"},{"id":"702404676","name":"New Zealand"},{"id":"702404677","name":"Nicaragua"},{"id":"702404678","name":"Niger"},{"id":"702404679","name":"Nigeria"},{"id":"702404680","name":"Niue"},{"id":"702404681","name":"Norfolk Island"},{"id":"702404682","name":"Northern Mariana Islands"},{"id":"702404683","name":"Norway"},{"id":null,"name":"Oman"},{"id":"702404684","name":"Pakistan"},{"id":"702404685","name":"Palau"},{"id":null,"name":"Palestine, State of"},{"id":"702404687","name":"Panama"},{"id":"702404688","name":"Papua New Guinea"},{"id":"702404689","name":"Paraguay"},{"id":"702404690","name":"Peru"},{"id":null,"name":"Philippines"},{"id":null,"name":"Pitcairn"},{"id":"702404693","name":"Poland"},{"id":"702404694","name":"Portugal"},{"id":"702404696","name":"Puerto Rico"},{"id":"702404697","name":"Qatar"},{"id":"702404699","name":"Romania"},{"id":"702404700","name":"Russian Federation"},{"id":"702404701","name":"Rwanda"},{"id":"702404698","name":"Runion"},{"id":null,"name":"Saint Barthelemy"},{"id":null,"name":"Saint Helena, Ascension and Tristan da Cunha"},{"id":"702404707","name":"Saint Kitts and Nevis"},{"id":"702404708","name":"Saint Lucia"},{"id":null,"name":"Saint Martin (French part)"},{"id":"702404709","name":"Saint Pierre and Miquelon"},{"id":null,"name":"Saint Vincent and the Grenadines"},{"id":"702404713","name":"Samoa"},{"id":"702404714","name":"San Marino"},{"id":"702404702","name":"Sao Tome and Principe"},{"id":"702404715","name":"Saudi Arabia"},{"id":"702404717","name":"Senegal"},{"id":"702404718","name":"Serbia"},{"id":"702404719","name":"Seychelles"},{"id":null,"name":"Sierra Leone"},{"id":"702404721","name":"Singapore"},{"id":null,"name":"Sint Maarten (Dutch part)"},{"id":"702404724","name":"Slovakia"},{"id":"702404725","name":"Slovenia"},{"id":"702404726","name":"Solomon Islands"},{"id":"702404727","name":"Somalia"},{"id":"702404728","name":"South Africa"},{"id":null,"name":"South Georgia and the South Sandwich Islands"},{"id":null,"name":"South Sudan"},{"id":"702404731","name":"Spain"},{"id":"702404732","name":"Sri Lanka"},{"id":"702404733","name":"Sudan"},{"id":null,"name":"Suriname"},{"id":"702404734","name":"Svalbard and Jan Mayen"},{"id":"702404735","name":"Swaziland"},{"id":"702404736","name":"Sweden"},{"id":"702404737","name":"Switzerland"},{"id":null,"name":"Syrian Arab Republic"},{"id":"702404739","name":"Taiwan, Province of China"},{"id":"702404740","name":"Tajikistan"},{"id":null,"name":"Tanzania, United Republic of"},{"id":"702404742","name":"Thailand"},{"id":null,"name":"Timor-Leste"},{"id":"702404745","name":"Togo"},{"id":"702404746","name":"Tokelau"},{"id":"702404747","name":"Tonga"},{"id":"702404748","name":"Trinidad and Tobago"},{"id":"702404749","name":"Tunisia"},{"id":"702404750","name":"Turkey"},{"id":"702404751","name":"Turkmenistan"},{"id":"702404752","name":"Turks and Caicos Islands"},{"id":"702404753","name":"Tuvalu"},{"id":"702404754","name":"Uganda"},{"id":"702404755","name":"Ukraine"},{"id":"702404756","name":"United Arab Emirates"},{"id":null,"name":"United Kingdom of Great Britain and Northern Ireland"},{"id":"702404758","name":"United States Minor Outlying Islands"},{"id":"702404493","name":"United States of America"},{"id":"702404760","name":"Uruguay"},{"id":"702404762","name":"Uzbekistan"},{"id":"702404763","name":"Vanuatu"},{"id":null,"name":"Venezuela (Bolivarian Republic of)"},{"id":null,"name":"Vietnam"},{"id":"702404768","name":"Virgin Islands (British)"},{"id":null,"name":"Virgin Islands (U.S.)"},{"id":"702404770","name":"Wallis and Futuna Islands"},{"id":"702404771","name":"Western Sahara"},{"id":"702404772","name":"Yemen"},{"id":"702404773","name":"Zambia"},{"id":"702404774","name":"Zimbabwe"}]}        
EOL;

        $country_list_json_string = trim($country_list_json_string);
        $country_list_json = json_decode($country_list_json_string, true);

        $country_list = $country_list_json['result'];

        //print_r($country_list); die;

        $fake_country = null;
        $fake_country_id = null;

        for($i=0; $i<count($country_list); $i++){
            if( $country_list[$i]['id'] !== null && $country_list[$i]['id'] != 'null' ){
                $country = new Country();
                $country->setCountryId($country_list[$i]['id']);
                $country->setName($country_list[$i]['name']);

                $manager->persist($country);
                $manager->flush();

                if ($country_list[$i]['id'] == "702404718" || $country_list[$i]['id'] == 702404718) {
                    $fake_country = $country;
                }

            }
        }

        echo "CREATED COUNTRIES \n\n";

        $fake_country_id = $fake_country->getId();

        //print_r($fake_country); die;
        */
        try {

            /*
            $userSuperTypeMaster = new UserType();
            $userSuperTypeMaster->setName('Master');
            $userSuperTypeMaster->setIsSuperType(1);
            $manager->persist($userSuperTypeMaster);
            $manager->flush();

            $userSuperTypeAffiliate = new UserType();
            $userSuperTypeAffiliate->setName('Affiliate');
            $userSuperTypeAffiliate->setIsSuperType(1);
            $manager->persist($userSuperTypeAffiliate);
            $manager->flush();

            $userSuperTypeAdministrator = new UserType();
            $userSuperTypeAdministrator->setName('Administrator');
            $userSuperTypeAdministrator->setIsSuperType(1);
            $manager->persist($userSuperTypeAdministrator);
            $manager->flush();

            $userSuperTypePlayer = new UserType();
            $userSuperTypePlayer->setName('Player');
            $userSuperTypePlayer->setIsSuperType(1);
            $manager->persist($userSuperTypePlayer);
            $manager->flush();


            $userTypeCasino = new UserType();
            $userTypeCasino->setName('Casino System');
            $userTypeCasino->setIsSuperType(0);
            $userTypeCasino->setParentUserTypeId($userSuperTypeAffiliate->getId());
            $manager->persist($userTypeCasino);
            $manager->flush();

            $userTypeWhiteLabel = new UserType();
            $userTypeWhiteLabel->setName('White Label');
            $userTypeWhiteLabel->setIsSuperType(0);
            $userTypeWhiteLabel->setParentUserTypeId($userSuperTypeAffiliate->getId());
            $manager->persist($userTypeWhiteLabel);
            $manager->flush();

            $userTypeInternetGroup = new UserType();
            $userTypeInternetGroup->setName('Internet Group');
            $userTypeInternetGroup->setIsSuperType(0);
            $userTypeInternetGroup->setParentUserTypeId($userSuperTypeAffiliate->getId());
            $manager->persist($userTypeInternetGroup);
            $manager->flush();

            $userTypeWebPartnerGroup = new UserType();
            $userTypeWebPartnerGroup->setName('Web Partner Group');
            $userTypeWebPartnerGroup->setIsSuperType(0);
            $userTypeWebPartnerGroup->setParentUserTypeId($userSuperTypeAffiliate->getId());
            $manager->persist($userTypeWebPartnerGroup);
            $manager->flush();

            $userTypePosGroup = new UserType();
            $userTypePosGroup->setName('Point Of Sale Group');
            $userTypePosGroup->setIsSuperType(0);
            $userTypePosGroup->setParentUserTypeId($userSuperTypeAffiliate->getId());
            $manager->persist($userTypePosGroup);
            $manager->flush();

            $userTypeAdminMaster = new UserType();
            $userTypeAdminMaster->setName('AdminMaster');
            $userTypeAdminMaster->setIsSuperType(0);
            $userTypeAdminMaster->setParentUserTypeId($userSuperTypeAdministrator->getId());
            $manager->persist($userTypeAdminMaster);
            $manager->flush();


            $userTypeWebPartner = new UserType();
            $userTypeWebPartner->setName('Web Partner');
            $userTypeWebPartner->setIsSuperType(0);
            $userTypeWebPartner->setParentUserTypeId($userSuperTypeAffiliate->getId());
            $manager->persist($userTypeWebPartner);
            $manager->flush();

            $userTypePos = new UserType();
            $userTypePos->setName('Point Of Sale');
            $userTypePos->setIsSuperType(0);
            $userTypePos->setParentUserTypeId($userSuperTypeAffiliate->getId());
            $manager->persist($userTypePos);
            $manager->flush();

            $userTypeInternetPlayer = new UserType();
            $userTypeInternetPlayer->setName('Internet Player');
            $userTypeInternetPlayer->setIsSuperType(0);
            $userTypeInternetPlayer->setParentUserTypeId($userSuperTypePlayer->getId());
            $manager->persist($userTypeInternetPlayer);
            $manager->flush();

            echo "CREATED USER TYPES \n\n";
            */

            /*
            $userRootMaster = new User();
            $userRootMaster->setUsername('ROOT MASTER');
            $userRootMaster->setPassword('ROOT MASTER');
            $userRootMaster->setUserType($userSuperTypeMaster);
            $manager->persist($userRootMaster);
            $manager->flush();

            echo "CREATED ROOT MASTER \n\n";


            $userCasino = new User();
            $userCasino->setUsername('Casino');
            $userCasino->setPassword('Casino');
            $userCasino->setUserType($userTypeCasino);
            $manager->persist($userCasino);
            $manager->flush();


            $userForUser01 = new UserForUser();
            $userForUser01->setUserIdFor($userRootMaster->getId());
            $userForUser01->setUserIdTo($userCasino->getId());
            $manager->persist($userForUser01);
            $manager->flush();

            $userCasinoLga = new User();
            $userCasinoLga->setUsername('Casino LGA');
            $userCasinoLga->setPassword('Casino LGA');
            $userCasinoLga->setUserType($userTypeCasino);
            $manager->persist($userCasinoLga);
            $manager->flush();

            $userForUser02 = new UserForUser();
            $userForUser02->setUserIdFor($userCasino->getId());
            $userForUser02->setUserIdTo($userCasinoLga->getId());
            $manager->persist($userForUser02);
            $manager->flush();


            //white label
            $userUltimate777 = new User();
            $userUltimate777->setUsername('Ultimate777');
            $userUltimate777->setPassword('Ultimate777');
            $userUltimate777->setUserType($userTypeWhiteLabel);
            $manager->persist($userUltimate777);
            $manager->flush();

            echo "CREATED Ultimate777 \n\n";

            $userForUser03 = new UserForUser();
            $userForUser03->setUserIdFor($userCasinoLga->getId());
            $userForUser03->setUserIdTo($userUltimate777->getId());
            $manager->persist($userForUser03);
            $manager->flush();


            //point of sale group
            $userUltimate777Pos = new User();
            $userUltimate777Pos->setUsername('Ultimate777 POS');
            $userUltimate777Pos->setPassword('Ultimate777 POS');
            $userUltimate777Pos->setUserType($userTypePosGroup);
            $manager->persist($userUltimate777Pos);
            $manager->flush();

            $userForUser04 = new UserForUser();
            $userForUser04->setUserIdFor($userUltimate777->getId());
            $userForUser04->setUserIdTo($userUltimate777Pos->getId());
            $manager->persist($userForUser04);
            $manager->flush();

            //web partner group
            $userUltimate777WP = new User();
            $userUltimate777WP->setUsername('Ultimate777 WP');
            $userUltimate777WP->setPassword('Ultimate777 WP');
            $userUltimate777WP->setUserType($userTypeWebPartnerGroup);
            $manager->persist($userUltimate777WP);
            $manager->flush();

            $userForUser05 = new UserForUser();
            $userForUser05->setUserIdFor($userUltimate777->getId());
            $userForUser05->setUserIdTo($userUltimate777WP->getId());
            $manager->persist($userForUser05);
            $manager->flush();

            //internet group
            $userUltimate777IG = new User();
            $userUltimate777IG->setUsername('Ultimate777.com');
            $userUltimate777IG->setPassword('Ultimate777.com');
            $userUltimate777IG->setUserType($userTypeInternetGroup);
            $manager->persist($userUltimate777IG);
            $manager->flush();

            $userForUser06 = new UserForUser();
            $userForUser06->setUserIdFor($userUltimate777->getId());
            $userForUser06->setUserIdTo($userUltimate777IG->getId());
            $manager->persist($userForUser06);
            $manager->flush();

            echo "CREATED USERS \n\n";
            */

            // create 20 players
            /*
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

                $manager->persist($user);
                $manager->flush();

                $userForUser01 = new UserForUser();
                $userForUser01->setUserIdFor($userUltimate777IG->getId());
                $userForUser01->setUserIdTo($user->getId());
                $manager->persist($userForUser01);
                $manager->flush();
            }

            $user = new User();
            $user->setUsername("mmilos028");
            $user->setPassword("mmilos028");
            $user->setEmail("mmilos028@gmail.com");

            $user->setFirstName("Milos");
            $user->setLastName("Milosevic");
            $user->setGender("m");
            $user->setBirthdate(new \DateTime("19-Mar-1986"));
            $user->setUserType($userTypeInternetPlayer);
            //$user->setCountryId($fake_country_id);
            $user->setCountry($fake_country);
            $manager->persist($user);
            $manager->flush();
            $test_user_id = $user->getId();

            //$test_user_id = 1;
            echo "TEST USER ID = " . $test_user_id;

            $userForUser01 = new UserForUser();
            $userForUser01->setUserIdFor($userUltimate777IG->getId());
            $userForUser01->setUserIdTo($test_user_id);
            $manager->persist($userForUser01);
            $manager->flush();

            echo "CREATED PLAYERS \n\n";
            */







            //session types
            /*
            $site_session_type = new SessionType();
            $site_session_type->setName("SITE_SESSION");
            $site_session_type->setAutoClose(true);
            $site_session_type->getDurationLimit(50000);
            $manager->persist($site_session_type);
            $manager->flush();

            $integration_session_type = new SessionType();
            $integration_session_type->setName("INTEGRATION_SESSION");
            $integration_session_type->setAutoClose(false);
            $integration_session_type->getDurationLimit(50000);
            $manager->persist($integration_session_type);
            $manager->flush();

            $session = new Session();
            $session->setUserId($user->getId());
            $session->setSessionTypeId($site_session_type->getId());
            $session->setStartTime(new \DateTime());
            //$session->setEndTime(\DateTime::)
            $session->setCredits(100);
            $session->setCurrency("EUR");
            $session->setSessionState("BROKEN");
            $session->setIpAddress(" 79.101.227.135");
            $manager->persist($session);
            $manager->flush();


            $balanceType01 = new BalanceType();
            $balanceType01->setName("FREE CREDITS");
            $manager->persist($balanceType01);
            $manager->flush();
            */

            //deposit wallets
            /*
            $userDepositWallet01 = new UserDepositWallet();
            $userDepositWallet01->setUserId($test_user_id);
            $userDepositWallet01->setBalanceTypeId($balanceType01->getId());
            $userDepositWallet01->setBalance(0.028);
            $userDepositWallet01->setCurrency("BTC");
            $manager->persist($userDepositWallet01);
            $manager->flush();

            $userDepositWallet02 = new UserDepositWallet();
            $userDepositWallet02->setUserId($test_user_id);
            $userDepositWallet02->setBalanceTypeId($balanceType01->getId());
            $userDepositWallet02->setBalance(5.28);
            $userDepositWallet02->setCurrency("LTC");
            $manager->persist($userDepositWallet02);
            $manager->flush();

            $userDepositWallet03 = new UserDepositWallet();
            $userDepositWallet03->setUserId($test_user_id);
            $userDepositWallet03->setBalanceTypeId($balanceType01->getId());
            $userDepositWallet03->setBalance(2622.52);
            $userDepositWallet03->setCurrency("XDG");
            $manager->persist($userDepositWallet03);
            $manager->flush();

            $userDepositWallet04 = new UserDepositWallet();
            $userDepositWallet04->setUserId($test_user_id);
            $userDepositWallet04->setBalanceTypeId($balanceType01->getId());
            $userDepositWallet04->setBalance(0.50);
            $userDepositWallet04->setCurrency("ETH");
            $manager->persist($userDepositWallet01);
            $manager->flush();

            $userDepositWallet05 = new UserDepositWallet();
            $userDepositWallet05->setUserId($test_user_id);
            $userDepositWallet05->setBalanceTypeId($balanceType01->getId());
            $userDepositWallet05->setBalance(4.12609);
            $userDepositWallet05->setCurrency("ZEC");
            $manager->persist($userDepositWallet05);
            $manager->flush();

            $userDepositWallet06 = new UserDepositWallet();
            $userDepositWallet06->setUserId($test_user_id);
            $userDepositWallet06->setBalanceTypeId($balanceType01->getId());
            $userDepositWallet06->setBalance(15.05343971);
            $userDepositWallet06->setCurrency("TRX");
            $manager->persist($userDepositWallet06);
            $manager->flush();

            $userDepositWallet07 = new UserDepositWallet();
            $userDepositWallet07->setUserId($test_user_id);
            $userDepositWallet07->setBalanceTypeId($balanceType01->getId());
            $userDepositWallet07->setBalance(6.05766900);
            $userDepositWallet07->setCurrency("DASH");
            $manager->persist($userDepositWallet07);
            $manager->flush();

            $userDepositWallet08 = new UserDepositWallet();
            $userDepositWallet08->setUserId($test_user_id);
            $userDepositWallet08->setBalanceTypeId($balanceType01->getId());
            $userDepositWallet08->setBalance(5.04973993);
            $userDepositWallet08->setCurrency("XMR");
            $manager->persist($userDepositWallet08);
            $manager->flush();
            */


            //withdraw wallets
            /*
            $userWithdrawWallet01 = new UserWithdrawWallet();
            $userWithdrawWallet01->setUserId($test_user_id);
            $userWithdrawWallet01->setBalanceTypeId($balanceType01->getId());
            $userWithdrawWallet01->setBalance(0.028);
            $userWithdrawWallet01->setCurrency("BTC");
            $manager->persist($userWithdrawWallet01);
            $manager->flush();

            $userWithdrawWallet02 = new UserWithdrawWallet();
            $userWithdrawWallet02->setUserId($test_user_id);
            $userWithdrawWallet02->setBalanceTypeId($balanceType01->getId());
            $userWithdrawWallet02->setBalance(5.28);
            $userWithdrawWallet02->setCurrency("LTC");
            $manager->persist($userWithdrawWallet02);
            $manager->flush();

            $userWithdrawWallet03 = new UserWithdrawWallet();
            $userWithdrawWallet03->setUserId($test_user_id);
            $userWithdrawWallet03->setBalanceTypeId($balanceType01->getId());
            $userWithdrawWallet03->setBalance(2622.52);
            $userWithdrawWallet03->setCurrency("XDG");
            $manager->persist($userWithdrawWallet03);
            $manager->flush();

            $userWithdrawWallet04 = new UserWithdrawWallet();
            $userWithdrawWallet04->setUserId($test_user_id);
            $userWithdrawWallet04->setBalanceTypeId($balanceType01->getId());
            $userWithdrawWallet04->setBalance(0.50);
            $userWithdrawWallet04->setCurrency("ETH");
            $manager->persist($userWithdrawWallet04);
            $manager->flush();

            $userWithdrawWallet05 = new UserWithdrawWallet();
            $userWithdrawWallet05->setUserId($test_user_id);
            $userWithdrawWallet05->setBalanceTypeId($balanceType01->getId());
            $userWithdrawWallet05->setBalance(4.12609);
            $userWithdrawWallet05->setCurrency("ZEC");
            $manager->persist($userWithdrawWallet05);
            $manager->flush();

            $userWithdrawWallet06 = new UserWithdrawWallet();
            $userWithdrawWallet06->setUserId($test_user_id);
            $userWithdrawWallet06->setBalanceTypeId($balanceType01->getId());
            $userWithdrawWallet06->setBalance(15.05343971);
            $userWithdrawWallet06->setCurrency("TRX");
            $manager->persist($userWithdrawWallet06);
            $manager->flush();

            $userWithdrawWallet07 = new UserWithdrawWallet();
            $userWithdrawWallet07->setUserId($test_user_id);
            $userWithdrawWallet07->setBalanceTypeId($balanceType01->getId());
            $userWithdrawWallet07->setBalance(6.05766900);
            $userWithdrawWallet07->setCurrency("DASH");
            $manager->persist($userWithdrawWallet07);
            $manager->flush();

            $userWithdrawWallet08 = new UserWithdrawWallet();
            $userWithdrawWallet08->setUserId($test_user_id);
            $userWithdrawWallet08->setBalanceTypeId($balanceType01->getId());
            $userWithdrawWallet08->setBalance(5.04973993);
            $userWithdrawWallet08->setCurrency("XMR");
            $manager->persist($userWithdrawWallet08);
            $manager->flush();

            */
        }catch(Exception $ex){

        }
    }
}
