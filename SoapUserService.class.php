<?php
class SoapUserService
{
    private $userArray = array(
        "1" => array(
            "firstname" => "Сергей",
            "lastname" => "Петров",
            "bday" => "01-12-1994",
            "tel" => "905-568-78-52",
            "pasport" => "9054-568782"),
        "2" => array(
            "firstname" => "Андрей",
            "lastname" => "Иванов",
            "bday" => "22-07-1980",
            "tel" => "923-558-68-47",
            "pasport" => "8735-987654"),
    );

    public function sendUser($sendRequest)
    {
        if (!is_null($sendRequest)) {
            // Log переданного пакета
            $rawPost = "Input:\r\n";
            $rawPost .= file_get_contents('php://input');
            $rawPost .= "\r\n---\r\nsendRequest:\r\n";
            $rawPost .= serialize($sendRequest);
            file_put_contents("log_sendUser.xml", $rawPost);
            // Поиск дублей (при нахождение выход с false)
            foreach ($sendRequest->userList->user as $newUser) {
                foreach ($this->userArray as $user) {
                    if ($newUser->firstname == $user['firstname'] &&
                        $newUser->lastname == $user['lastname'] &&
                        $newUser->bday == $user['bday'] &&
                        $newUser->tel == $user['tel'] &&
                        $newUser->pasport == $user['pasport']){
                        return array("status" => "false");
                    }else{
                        $this->userArray[] = ['firstname' => $newUser->firstname,
                            'lastname' => $newUser->lastname,
                            'bday' => $newUser->bday,
                            'tel' => $newUser->tel,
                            'pasport' => $newUser->pasport];
                    }//if
                }//foreach
            }//foreach
            // Добавление пользователя в массив
            foreach ($sendRequest->userList->user as $newUser) {
                $this->userArray[] = ['firstname' => $newUser->firstname,
                    'lastname' => $newUser->lastname,
                    'bday' => $newUser->bday,
                    'tel' => $newUser->tel,
                    'pasport' => $newUser->pasport];
            }//foreach
            return array("status" => "true");
        } else {
            return array("status" => "false");
        }//if
    }//sendUser

    public function getUser($getRequest)
    {
        //$id = $id * 1;
        if (isset($this->userArray[$getRequest])){
            return array("getList" => array("user" => array(
                "firstname" => $this->userArray[$getRequest]["firstname"],
                "lastname"  => $this->userArray[$getRequest]["lastname"],
                "bday"  => $this->userArray[$getRequest]["bday"],
                "tel"  => $this->userArray[$getRequest]["tel"],
                "pasport"  => $this->userArray[$getRequest]["pasport"]
            )));
        }else{
            throw new SoapFault("server", "Несуществующий id");
        }
    }//getUser
}//class