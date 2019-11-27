<?php
class User{
    public $firstname;
    public $lastname;
    public $bday;
    public $tel;
    public $pasport;
}
class UserList{
    public $users;
}

class sendRequest{
    public $userlist;
}


class SoapUserService
{
    private static $userArray = array(
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

    public function sendUser($userlist){
        if (isset($userlist)){
            foreach ($userlist->$users as $user) {
                $this->userArray[]
            }

        }
    }
}