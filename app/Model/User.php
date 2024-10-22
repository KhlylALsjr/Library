<?php

class User
{
    private $email;
    private $password;

    public function __construct($email = null, $password = null)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setpassword($email)
    {
        $this->email = $email;
    }

    public function getUser($conn)
    {
        // SQL query to get user details
        $query = "SELECT * FROM users WHERE email='$this->email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $user = new User();
            $user->setEmail($row['email']);
            return $user;
        }

        return null;
    }

    public function setSession($conn)
    {
        session_start();
        // Assuming getUser() returns a User object
        $user = $this->getUser($conn);
        if ($user) {
            $_SESSION['username'] = $user->getEmail();
        }
    }
}
