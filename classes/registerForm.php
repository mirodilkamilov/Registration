<?php
class registerForm extends Controller
{
    private $fname, $lname, $email;
    public $errors_register = array('fname' => '', 'lname' => '', 'email' => '', 'password' => '');

    private $isOk = true;

    public function registerCheck()
    {
        $this->fname = $this->securityCheck($_POST['fname']);
        $this->lname = $this->securityCheck($_POST['lname']);
        $this->email = $this->securityCheck($_POST['email']);
        $password_register = $this->securityCheck($_POST['password']);

        if (empty($this->fname)) {
            $this->errors_register['fname'] = 'First name is required';
            $this->isOk = false;
        } else if (strlen($this->fname) >= 20) {
            $this->errors_register['fname'] = 'Maximum length is 20 characters';
            $this->fname = '';
            $this->isOk = false;
        }

        if (empty($this->lname)) {
            $this->errors_register['lname'] = 'Last name is required';
            $this->isOk = false;
        } else if (strlen($this->lname) >= 20) {
            $this->errors_register['lname'] = 'Maximum length is 20 characters';
            $this->lname = '';
            $this->isOk = false;
        }

        $this->errors_register['email'] = $this->emailValidate($this->email);
        $this->isOk = empty($this->errors_register['email']) ? $this->isOk : false;

        $this->errors_register['password'] = $this->passwordValidate($password_register);
        $this->isOk = empty($this->errors_register['password']) ? $this->isOk : false;

        if ($this->isOk) {
            header('Location: /');
        }
        return $this->isOk;
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
