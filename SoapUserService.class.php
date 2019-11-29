<?php
//class User{
//    public $firstname;
//    public $lastname;
//    public $bday;
//    public $tel;
//    public $pasport;
//}
//class UserList{
//    public $userList;
//}
//
//class SendRequest{
//    public $SendRequest;
//}
//
//class GetRequest{
//    public $inf;
//}

class SoapUserService
{
    private $userArray = array(
        "1" => array(
            "firstname" => "Сергей",
            "lastname" => "Петров",
            "bday" => "01-12-1994",
            "tel" => "905-568-78-52",
            "pasport"=> "9054-568782"),
        "2" => array(
            "firstname" => "Андрей",
            "lastname" => "Иванов",
            "bday" => "22-07-1980",
            "tel" => "923-558-68-47",
            "pasport"=> "8735-987654"),
    );

    public function sendUser($data){
        if (!is_null($data)){
            foreach ($data->SendRequest->userList as $newUser) {
                foreach ($this->userArray as $user) {
                    if ($newUser['firstname'] == $user['firstname'] &&
                        $newUser['lastname'] == $user['lastname'] &&
                        $newUser['bday'] == $user['bday'] &&
                        $newUser['tel'] == $user['tel'] &&
                        $newUser['phone'] == $user['phone']){
                        return false;
                    }//if
                }//foreach
            }//foreach
            foreach ($data->SendRequest->userList as $newUser) {
                $this->userArray[] = $newUser;
            }//foreach

//           Вывод содержимого $this->userArray
//           foreach ($this->userArray as $user) {
//               echo "<br>";
//               foreach ($user as $key => $item ) {
//                   echo "{$key} = {$item}";
//                   echo "<br>";
//               }//foreach
//           }//foreach
            return true;
        }else{
            return false;
        }//if
    }//sendUser

}//class



// Тест класса
//$req = new SendRequest();
//
//$req->sendRequest = new UserList();
//
//$user = new User();
//$user->firstname = "Иван";
//$user->lastname = "Грозный";
//$user->bday = "01-01-1502";
//$user->pasport = "0000-000000";
//$user->tel = "000-000-00-00";
//
//$req->sendRequest->userList[]  = $user;
//$req->sendRequest->userList[]  = $user;
//$req->sendRequest->userList[]  = $user;
//
//$srv = new SoapUserService();
//$srv->sendUser($req);