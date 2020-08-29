<?php
class formHandle
{
    private $fname, $lname, $email;
    public $errors_register = array('fname' => '', 'lname' => '', 'password' => '');
    public $errors_sign = array('email' => '', 'password' => '');
    private $isOk = true;

    public function registerCheck()
    {
        $fname = $this->securityCheck($_POST['fname']);
        $lname = $this->securityCheck($_POST['lname']);
        $password_register = $this->securityCheck($_POST['password_register']);

        if (empty($fname)) {
            $this->errors_register['fname'] = 'First name is required';
            $this->isOk = false;
        } else {
            $this->fname = $fname;
        }
        if (empty($lname)) {
            $this->errors_register['lname'] = 'Last name is required';
            $this->isOk = false;
        } else {
            $this->lname = $lname;
        }

        $this->errors_register['password'] = $this->passwordCheck($password_register);

        if ($this->isOk) {
            header('Location: /');
        }
        return $this->isOk;
    }

    public function signInCheck()
    {
        $email = $this->securityCheck($_POST['email']);
        $password_sign = $this->securityCheck($_POST['password_sign']);

        if (empty($email)) {
            $this->errors_sign['email'] = 'Email is required';
            $this->isOk = false;
        } else {
            $this->email = $email;
        }

        $this->errors_sign['password'] = $this->passwordCheck($password_sign);

        if ($this->isOk) {
            header('Location: /');
        }
        return $this->isOk;
    }

    private function securityCheck($userInput)
    {
        return htmlspecialchars(trim($userInput));
    }

    private function passwordCheck($password)
    {
        $errorMassage = '';
        if (empty($password)) {
            $errorMassage = 'Password is required';
            $this->isOk = false;
        } else if (strlen($password) < 5) {
            $errorMassage = 'Password must contain at least 5 characters';
            $this->isOk = false;
        }

        return $errorMassage;
    }
    public function getFname()
    {
        return $this->fname;
    }
    public function getLname()
    {
        return $this->lname;
    }
    public function getEmail()
    {
        return $this->email;
    }
}
