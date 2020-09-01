<?php
class View extends Model
{
    public function showAllUsers()
    {
        $results = $this->getAllUsers();
        return $results;
    }
    public function showUser($email)
    {
        $results = $this->getUserByEmail($email);
        return $results;
    }
}
