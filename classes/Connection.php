<?php

class Connection
{
    protected $pdo;

    protected function connect()
    {
        $url = getenv('JAWSDB_NAVY_URL');
        $dbparts = parse_url($url);

        $servername = $dbparts['host'];
        $username = $dbparts['user'];
        $password = $dbparts['pass'];
        $dbname = ltrim($dbparts['path'], '/');

        // $servername = "localhost";
        // $username = "root";
        // $password = "root";
        // $dbname = "registration";
        $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $this->pdo;
    }
}
