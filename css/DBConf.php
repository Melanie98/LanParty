<?php
/**
 * Created by PhpStorm.
 * User: melan
 * Date: 5-10-2017
 * Time: 09:12
 */

class DBConf
{
    private $conn;
    private $query;


    public function __construct()
    {

    }

    public function openConnection()
    {
        $this->setConn(new PDO("mysql:host=127.0.0.1;dbname=dynamic", "root", ""));
    }

    public function closeConnection()
    {
        $this->setConn(null);
    }

    /////////////////////////////////////////////////////////Getters en Setters
    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery($query)
    {
        $this->query = $query;
    }



}