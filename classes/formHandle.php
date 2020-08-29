<?php
class formHandle
{
    private $fname, $lname, $email;
    public $errors_register = array('fname' => '', 'lname' => '', 'password' => '');
    public $errors_sign = array('email' => '', 'password' => '');
    private $isOk = true;

    public function registerCheck()
    {
        $this->fname = $this->securityCheck($_POST['fname']);
        $this->lname = $this->securityCheck($_POST['lname']);
        $password_register = $this->securityCheck($_POST['password_register']);

        if (empty($this->fname)) {
            $this->errors_register['fname'] = 'First name is required';
            $this->isOk = false;
        }
        if (empty($this->lname)) {
            $this->errors_register['lname'] = 'Last name is required';
            $this->isOk = false;
        }

        $this->errors_register['password'] = $this->passwordValidate($password_register);

        if ($this->isOk) {
            header('Location: /');
        }
        return $this->isOk;
    }

    public function signInCheck()
    {
        $this->email = $this->securityCheck($_POST['email']);
        $password_sign = $this->securityCheck($_POST['password_sign']);

        $this->errors_sign['email'] = $this->emailValidate($this->email);

        $this->errors_sign['password'] = $this->passwordValidate($password_sign);

        if ($this->isOk) {
            header('Location: /');
        }
        //return $this->isOk;
    }

    private function securityCheck($userInput)
    {
        return htmlspecialchars(trim($userInput));
    }

    private function passwordValidate($password)
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

    private function emailValidate($email)
    {
        $errorMassage = '';
        if (empty($email)) {
            $errorMassage = 'Email is required';
            $this->isOk = false;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMassage = 'Invalid email';
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
