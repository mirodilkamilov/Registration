<?php

class signInForm extends Controller
{
    private $isOk = true;
    private $email, $password;
    public $errors_sign = array('email' => '', 'password' => '', 'signIn' => '');

    public function signInValidate()
    {
        $this->email = $this->securityCheck($_POST['email']);
        $password = $_POST['password'];

        $this->errors_sign['email'] = $this->emailValidate($this->email);
        $this->isOk = empty($this->errors_sign['email']) ? true : false;

        $this->errors_sign['password'] = $this->passwordValidate($password);
        $this->isOk = empty($this->errors_sign['password']) ?  $this->isOk : false;

        if ($this->isOk) {
            $isSignedIn = $this->signInCheck($this->email, $password);
            if ($isSignedIn) {
                header('Location: test.php');
            } else {
                $this->errors_sign['signIn'] = 'The email or password is incorrect';
            }
        }
    }
    public function getEmail()
    {
        return $this->email;
    }
}
