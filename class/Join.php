<?php
include_once 'DBConfi.php';
/**
 * Created by PhpStorm.
 * User: melan
 * Date: 19-12-2017
 * Time: 11:06
 */

class Join extends DBConfi
{

    public function __construct()
    {
        $this->openConnection();
    }

    public function joinParticipateOverview()
    {
        $this->openConnection();
        $this->setQuery($this->getConn()->prepare('SELECT  tournooi.tournooiName, users.userEmail, users.userStudentNr FROM participate 
                                                    inner join tournooi ON participate.tournooiId = tournooi.tournooiId 
                                                    join users on participate.userId = users.userId'));
        $this->getQuery()->execute();

        return ($this->getQuery()->fetchAll());
    }

    public function joinPaymentOverview()
    {
        $this->openConnection();
        $this->setQuery($this->getConn()->prepare('SELECT * FROM `application` JOIN users ON application.userId = users.userId'));
        $this->getQuery()->execute();

        return ($this->getQuery()->fetchAll());
    }


}