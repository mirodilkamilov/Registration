<?php

class signInForm extends Controller
{
    private $isOk = true;
    private $email, $password;
    public $errors_sign = array('email' => '', 'password' => '');

    public function signInCheck()
    {
        $this->email = $this->securityCheck($_POST['email']);
        $password = $this->securityCheck($_POST['password']);

        $this->errors_sign['email'] = $this->emailValidate($this->email);
        $this->isOk = empty($this->errors_sign['email']) ? true : false;

        $this->errors_sign['password'] = $this->passwordValidate($password);
        $this->isOk = empty($this->errors_sign['password']) ?  $this->isOk : false;

        if ($this->isOk) {
            header('Location: /');
        }
        //return $this->isOk;
    }
    public function getEmail()
    {
        return $this->email;
    }
}
