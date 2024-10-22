<?php

require_once 'app/model/user.php';

class LoginController
{
    public function login($conn, $email, $password)
    {
        // Validate the input
        if (empty($email) || empty($password)) {
            echo "Email and password are required.";
            return;
        }

        // Find the user by email
        $user = new User($email, $password);
        $foundUser = $user->getUser($conn);

        if ($foundUser) {
            // Set the session
            $user->setSession($conn);
            header('Location: home.php');
            exit;
        } else {
            // Invalid login credentials
            header('Location: login.php');
            exit;
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
