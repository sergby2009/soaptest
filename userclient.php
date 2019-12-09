<?php
    header("Content-Type: text/html; charset=utf-8");
    header('Cache-Control: no-store, no-cache');
    header('Expires: '.date('r'));

    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);


class TUser{
    public $firstname;
    public $lastname;
    public $bday;
    public $tel;
    public $pasport;
}
//
class TuserList{
    public $userList;
}
//
class SendRequest{
    public $sendRequest;
    public $id;
}


$req = new SendRequest();
$req->sendRequest = new TuserList();

//$req->sendRequest->userList = new ArrayObject();

$user = new TUser();
$user->firstname = "Иван";
$user->lastname = "Грозный";
$user->bday = "01-01-1502";
$user->pasport = "0000-000000";
$user->tel = "000-000-00-00";

$user1 = new TUser();
$user1->firstname = "Иван";
$user1->lastname = "Грозный";
$user1->bday = "01-01-1502";
$user1->pasport = "0000-000000";
$user1->tel = "000-000-00-00";

$user2 = new TUser();
$user2->firstname = "Иван";
$user2->lastname = "Грозный";
$user2->bday = "01-01-1502";
$user2->pasport = "0000-000000";
$user2->tel = "000-000-00-00";


//$user = new SoapVar($user1,SOAP_ENC_OBJECT,null,null,'user');
//$req->sendRequest->userList->append($user1);


$req->sendRequest->userList[] = $user;
$req->sendRequest->userList[] = $user1;
$req->sendRequest->userList[] = $user2;

$req->id = 5;

try {
        $options = ['soap_version' => SOAP_1_2,
                    "trace"        => 1,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'classmap'     => ['']];
        $client = new SoapClient("http://php2.local/user.wsdl", $options);
        $client->__setCookie('XDEBUG_SESSION', 'PHPSTORM');
        var_dump($client->__getFunctions());
        var_dump($client->sendUser($req->sendRequest));
        var_dump($client->getUser($req->id));
        echo $result;
    } catch (SoapFault $exception) {
        echo $exception->getMessage();
    }//try