<?php
class Controller
{
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
