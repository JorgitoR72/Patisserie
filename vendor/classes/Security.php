<?php
class Security extends Connection
{
    private $loginPage = "login.php";
    private $homePage = "index.php";
    private $registerPage = "register.php";
    private $exitPage = "exit.php";

    public function __construct()
    {
        parent::connect();
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    }

    public function closeSession()
    {
        if (isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"]) {
            header("Location: " . $this->loginPage);
            unset($_SESSION['loggedIn']);
            header("Location: " . $this->homePage);
        }
    }

    public function checkLoggedIn()
    {
        if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
            header("Location: " . $this->loginPage);
        }
    }

    public function checkAdmin()
    {
        if ($_SESSION["loggedIn"]["tipoUsuario"] == "Autor") {
            return true;
        } else {
            return false;
        }
    }





    public function doLogin()
    {
        if (count($_POST) > 0) {
            $user = $this->getUser($_POST["email-login"]);
            $_SESSION["loggedIn"] = $this->checkUser($user, $_POST["contrasena-login"]) ? $user["email"] : false;
            var_dump($_SESSION["loggedIn"]);
            if ($_SESSION["loggedIn"]) {
                header("Location: " . $this->homePage);
                $_SESSION["loggedIn"] = $user;
                /* $_SESSION["loggedIn"]["message"] = 1; */
            } else {
                return "Incorrect Credentials" . '<br><a href='.$this->registerPage.' style="color: #f1dcc2; font-style: italic;">CREATE ACCOUNT HERE</a>';
            }
        } else {
            return null;
        }
    }

    public function getUserData()
    {
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
            if ($_SESSION["loggedIn"] && !$_SESSION["loggedIn"]["message"]) {
                $_SESSION["loggedIn"]["message"] = 1;
                return "Buenas, ".$_SESSION["loggedIn"]["nombre"]."!";
            } else {
                return $_SESSION["loggedIn"]["nombre"];
            }
        } else {
            return "ACCESO";
        }
    }

    private function checkUser($user, $userPassword)
    {
        if ($user) {
            return $this->checkPassword($user["contrasena"], $userPassword);
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

    //registro
    // ejemplo de insert : INSERT INTO Usuario (idUsuario, email, nombre, apellido, contraseña, tipoUsuario, idPlan) VALUES (1, 'cliente1@example.com', 'Cliente', 'Uno', 'password1', 'Cliente', 1)

    public function doRegister()
    {
        if (count($_POST) > 0) {
            //creo array $data
            $data = [];

            //conseguir idUsuario
            $stmt1 = $this->conn->query("SELECT MAX(idUsuario) AS max_id FROM Usuario");
            $id = $stmt1->fetch(PDO::FETCH_ASSOC);
            $data["idUsuario"] = $id["max_id"] + 1;

            //email
            $data["email"] = $_POST["email"];

            //nombre
            $data["nombre"] = $_POST["nombre-registro"];

            //apellido
            $data["apellido"] = $_POST["apellido"];

            //contraseña
            $data["contrasena"] = $_POST["contrasena"];

            //tipoUsuario (default="Cliente")
            $data["tipoUsuario"] = "Cliente";

            //idPlan (default=0)
            $data["idPlan"] = 1;

            if ($this->checkPassword($_POST["contrasena"], $_POST["confirmar-contrasena"])) {
                $consulta = $this->conn->prepare('INSERT INTO Usuario (idUsuario, email, nombre, apellido, contrasena, tipoUsuario, idPlan) VALUES (:idUsuario, :email, :nombre, :apellido, :contrasena, :tipoUsuario, :idPlan)');

                // Asignar valores a los parámetros
                $consulta->bindParam(':idUsuario', $data["idUsuario"], PDO::PARAM_INT);
                $consulta->bindParam(':email', $data["email"], PDO::PARAM_STR);
                $consulta->bindParam(':nombre', $data["nombre"], PDO::PARAM_STR);
                $consulta->bindParam(':apellido', $data["apellido"], PDO::PARAM_STR);
                $consulta->bindParam(':contrasena', $data["contrasena"], PDO::PARAM_STR);
                $consulta->bindParam(':tipoUsuario', $data["tipoUsuario"], PDO::PARAM_STR);
                $consulta->bindParam(':idPlan', $data["idPlan"], PDO::PARAM_INT);
                //var_dump($consulta);die;
                // Ejecutar la consulta y devolver true o false.
                if ($consulta->execute()) {
                    header("Location: " . $this->loginPage);
                } else {
                    return "Registro Fallido";
                }
            } else {
                return "Las contraseñas no coinciden";
            }
        } else {
            return null;
        }
    }

    public function createExit()
    {
        if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
            return null;
        } else {
            return '<li class="nav-item"><a class="nav-link" href='.$this->exitPage.'><img src="img/salida2.png" alt="" style="height: 30px; width: 30px;"></a></li>';
        }
    }
}
