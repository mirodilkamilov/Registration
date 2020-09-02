<?php

class Model extends Connection
{
    protected function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->connect()->query($sql);

        $results = $stmt->fetchAll();
        return $results;
    }
    protected function getUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $result = $stmt->fetch();
        return $result;
    }
    protected function getUserSignIn($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email = ? and password = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $password]);

        $result = $stmt->fetch();
        return $result;
    }

    protected function setUser($newRecord)
    {
        $sql = 'INSERT INTO user (fname, lname, email, password) VALUES (?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$newRecord['fname'], $newRecord['lname'], $newRecord['email'], $newRecord['password']]);
    }

    // *    Searching with LIKE

    protected function getByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email LIKE ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $results = $stmt->fetchAll();
        return $results;
    }
}
