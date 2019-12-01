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
}


$req = new SendRequest();
$req->sendRequest = new TuserList();
//$req->sendRequest->userList = new TUser();
//$req->sendRequest->userList->firstname = "Иван";
//$req->sendRequest->userList->lastname = "Грозный";
//$req->sendRequest->userList->bday = "01-01-1502";
//$req->sendRequest->userList->pasport = "0000-000000";
//$req->sendRequest->userList->tel = "000-000-00-00";

$user = new TUser();
$user->firstname = "Иван";
$user->lastname = "Грозный";
$user->bday = "01-01-1502";
$user->pasport = "0000-000000";
$user->tel = "000-000-00-00";

$req->sendRequest->userList[] = $user;

//$req->SendRequest->userList[]  = $user;
//$req->SendRequest->userList[]  = $user;
//$srv = new SoapUserService();
//$srv->sendUser($req);

try {
        $options = ['soap_version' => SOAP_1_2,
                    "trace"        => 1,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'classmap'     => ['']];
        $client = new SoapClient("http://php2.local/user.wsdl", $options);
        $client->__setCookie('XDEBUG_SESSION', 'PHPSTORM');
        var_dump($client->__getFunctions());
        var_dump($client->sendUser($req->sendRequest));
        echo $result;
    } catch (SoapFault $exception) {
        echo $exception->getMessage();
    }//try