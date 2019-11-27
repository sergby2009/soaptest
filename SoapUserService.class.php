<?php
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
    public $sendRequest;
}


class SoapUserService
{
    private $userArray = array(
        "1" => array(
            "FirstName" => "Сергей",
            "LastName" => "Петров",
            "bday" => "01-12-1994",
            "tel" => "905-568-78-52",
            "pasport"=> "9054-568782"),
        "2" => array(
            "FirstName" => "Андрей",
            "LastName" => "Иванов",
            "bday" => "22-07-1980",
            "tel" => "923-558-68-47",
            "pasport"=> "8735-987654"),
    );

    public function sendUser(SendRequest $data){
        if (!is_null($data)){
            foreach ($data->users as $user) {
                $this->userArray[] = $user;
            }

            }

        }
    }
}
//
$req = new SendRequest();

$req->sendRequest = new UserList();

$user = new User();
$user->firstname = "Иван";
$user->lastname = "Грозный";
$user->bday = "01-01-1502";
$user->pasport = "0000-000000";
$user->tel = "000-000-00-00";

$req->sendRequest->userList[]  = $user;
$req->sendRequest->userList[]  = $user;
$req->sendRequest->userList[]  = $user;

$srv = new SoapUserService();
$srv->sendUser($req);