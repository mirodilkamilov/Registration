<?php
class Controller extends Model
{
    protected function newUser($newRecord)
    {
        $this->setUser($newRecord);
    }



    // *    Searching
    public function prepareForSearching($searchInput)
    {
        $searchInput = htmlspecialchars(trim($searchInput));
        $searchInput = str_replace('%', '[%]', $searchInput);
        $searchInput = '%' . $searchInput . '%';
        return $searchInput;
    }

    //  Form handling
    protected function emailExist($email)
    {
        $result = $this->getUserByEmail($email);
        $emailExist = empty($result) ? false : true;
        return $emailExist;
    }
    protected function signInCheck($email, $password)
    {
        $result = $this->getUserSignIn($email, $password);
        $isSignedIn = empty($result) ? false : true;
        return $isSignedIn;
    }


    protected function securityCheck($userInput)
    {
        return htmlspecialchars(trim($userInput));
    }
    protected function emailValidate($email)
    {
        $errorMassage = '';
        if (empty($email)) {
            $errorMassage = 'Email is required';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMassage = 'Invalid email';
        }

        return $errorMassage;
    }
    protected function passwordValidate($password)
    {
        $errorMassage = '';
        if (empty($password)) {
            $errorMassage = 'Password is required';
        } else if (strlen($password) < 5) {
            $errorMassage = 'Password must contain at least 5 characters';
        }

        return $errorMassage;
    }
}
