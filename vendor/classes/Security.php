<?php
class Security extends Connection
{
    private $loginPage = "login.php";
    private $homePage = "index.php";
    public function __construct()
    {
        parent::connect();
        session_start();
    }

    public function checkLoggedIn()
    {
        if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
            header("Location: " . $this->loginPage);
        }
    }

    public function doLogin()
    {
        if (count($_POST) > 0) {
            
            $user = $this->getUser($_POST["email-login"]);
            $_SESSION["loggedIn"] = $this->checkUser($user, $_POST["contrasena-login"]) ? $user["email"] : false;
            echo $_SESSION["loggedIn"];
            if ($_SESSION["loggedIn"]) {
                header("Location: " . $this->homePage);
            } else {
                return "Incorrect User Name or Password";
            }
        } else {
            return null;
        }
    }

    public function getUserData(){
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
            return $_SESSION["loggedIn"];
        } else {
            return "ACCESO";
        }
    }

    private function checkUser($user, $userPassword)
    {
        if ($user) {
            return $this->checkPassword($user["contraseña"], $userPassword);
            //return $this->checkPassword($user["securePassword"], $userPassword);
        } else {
            return false;
        }
    }

    private function checkPassword($securePassword, $userPassword)
    {
        //return password_verify($userPassword, $securePassword);
        return ($userPassword === $securePassword);
    }

    private function getUser($email)
    {
        $sql = "SELECT * FROM Usuario WHERE email = '$email'";
        //echo $sql;die;
        $result = $this->conn->query($sql);
        if ($result && $row = $result->fetch(PDO::FETCH_ASSOC)) {
            return $row;
        } else {
            return false;
        }
    }
}