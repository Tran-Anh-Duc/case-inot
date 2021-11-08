<?php
include_once "models/UserModel.php";

class AuthController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showFromLogin()
    {
        include_once "view/auth/login.php";
    }

    public function login($request)
    {
        $email = $request["email"];
        $password = $request["password"];

        if ($this->userModel->checkLogin($email, $password)) {
            $user = $this->userModel->getByEmail($email);
            $_SESSION["username"] = $user["name"];
            header("location:index.php");
        } else {
            var_dump("tai  khoan loi");
        }
    }

    public function logout()
    {
        session_destroy();
//        unset($_SESSION["username"]);
        header("location:index.php?page=login");
    }

    public function checkAuth()
    {
        if (!isset($_SESSION["username"])) {
            header("location:index.php?page=login");
        }
    }

}