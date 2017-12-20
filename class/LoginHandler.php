<?php

include 'DBConfi.php';

class LoginHandler extends DBConfi
{
    private $password;
    private $userRights;
    private $userId;

    public function __construct()
    {
        $this->openConnection();
    }

    public function logIn($userEmail, $password)
    {
        $this->setPassword($password);
        $stmt = $this->getConn()->prepare('SELECT * FROM users WHERE userEmail= :userEmail AND userPassword= :userPassword');
        $stmt->bindParam(':userEmail', $userEmail);
        $stmt->bindParam(':userPassword', $this->getPassword());
        $stmt->execute();


//        $this->setCusRights(($stmt->fetch()['cusRights']));
//        $this->setCusId(($stmt->fetch()['cusId']));


        $this->closeConnection();


        if ($stmt->rowCount() != 0) // Kijkt of er een hit is gevonden in de DB met de username en password
        {

            session_start();
            $_SESSION['login'] = true;
            foreach ($stmt->fetchAll() AS $hit)
            {
                $this->setUserRights($hit['userRights']);
                $_SESSION['userId'] = $hit['userId'];
            }

            if ($this->getUserRights() == 0)
            {
               $_SESSION['userRights'] = 0;
               header('location: index.php');
            }

            if ($this->getUserRights() == 1) {
                $_SESSION['userRights'] = 1;
                header('location: index.php');
            }
        }

        else
        {
            return false;
        }
    }




    public function checkLoggedIn()
    {
        if(isset($_SESSION['login']) && $_SESSION['login'] == true)  //Kijkt of de Session is ingesteld en true isl
        {
            if ($_SESSION['userRights'] == 0)
            {
                $_SESSION['userRights'] = 0;
                header('location: index.php');
            }

            if ($_SESSION['userRights'] == 1)
            {
                $_SESSION['userRights'] = 1;
                header('location: index.php');
            }
        }

       else
       {
           header('Location:../login.php');
       }
    }

    public function logOut()
    {
        unset($_SESSION['login']);
        header('location: index.php');
    }
///////////////////////////////////////////////////////////////Getters en Setters

    public function getPassword()
    {

        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = md5($password);
        //$this->password = $password;
    }

    public function getUserRights()
    {
        return $this->userRights;
    }

    public function setUserRights($userRights)
    {
        $this->userRights = $userRights;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

}