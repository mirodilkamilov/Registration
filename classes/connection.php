<?php

class Connection
{
    protected $pdo;

    protected function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registration";
        $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $this->pdo;
    }
}
