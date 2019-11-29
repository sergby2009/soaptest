<?php
    header("Content-Type: text/html; charset=utf-8");
    header('Cache-Control: no-store, no-cache');
    header('Expires: '.date('r'));

    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);

class User{
    public $firstname;
    public $lastname;
    public $bday;
    public $tel;
    public $pasport;
}

class UserList{
    public $userList;
}

class SendRequest{
    public $SendRequest;
}

$req = new SendRequest();
$req->SendRequest = new UserList();
$req->SendRequest->userList = new User();

$req->SendRequest->userList->firstname = "Иван";
$req->SendRequest->userList->lastname = "Грозный";
$req->SendRequest->userList->bday = "01-01-1502";
$req->SendRequest->userList->pasport = "0000-000000";
$req->SendRequest->userList->tel = "000-000-00-00";

//$req->SendRequest->userList[]  = $user;
//$req->SendRequest->userList[]  = $user;
//$req->SendRequest->userList[]  = $user;

//$srv = new SoapUserService();
//$srv->sendUser($req);

try {
        $options = ['soap_version' => SOAP_1_2,
                    "trace"        => 1,
                    'classmap'     => ['']];
        $client = new SoapClient("http://php2.local/user.wsdl", $options);
        $client->__setCookie('XDEBUG_SESSION', 'PHPSTORM');
        var_dump($client->__getFunctions());
        var_dump($client->sendUser($req));
    } catch (SoapFault $exception) {
        echo $exception->getMessage();
    }//try