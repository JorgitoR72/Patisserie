<?php
class Security extends Connection
{
    private $loginPage = "registro.php";
    private $homePage = "index.php";
    public function __construct()
    {
        $this->connect();
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
            $user = $this->getUser($_POST["emailLogin"]);
            $_SESSION["loggedIn"] = $this->checkUser($user, $_POST["contrasenaLogin"]) ? $user["emailLogin"] : false;
            if ($_SESSION["loggedIn"]) {
                header("Location: " . $this->homePage);
            } else {
                return "Incorrect User Name or Password";
            }
        } else {
            return null;
        }
    }

    public function getUserData()
    {
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
            return $_SESSION["loggedIn"];
        }
    }

    private function checkUser($user, $contrasenaLogin)
    {
        if ($user) {
            //return $this->checkPassword($user["contrasenaLogin"], $contrasenaLogin);
            return $this->checkPassword($user["securePassword"], $contrasenaLogin);
        } else {
            return false;
        }
    }

    private function checkPassword($securePassword, $contrasenaLogin)
    {
        return password_verify($contrasenaLogin, $securePassword);
        //return ($contrasenaLogin === $securePassword);
    }

    private function getUser($emailLogin)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM Usuario WHERE email = ?");
            $stmt->bindParam(1, $emailLogin);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) > 0) {
                return $result[0];
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Handle the exception here
            return false;
        }
    }
}