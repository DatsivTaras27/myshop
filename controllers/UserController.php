<?php

class UserController
{
    public function actionRegister()
    {
        $name = false;
        $email = false;
        $password = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
            if (!User::checkName($name)) {
                $errors[] = 'Імя не повинно бути менше за 2 символи';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильний email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не повинен бути менший за 6 символів';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такий email вже використовується';
            }
            
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }

        require_once(ROOT . '/views/user/register.php');
        return true;
    }
    
    public function actionLogin()
    {
        $email = false;
        $password = false;
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильний email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не повинен бути менший за 6 символів';
            }

            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                $errors[] = 'Неправильні дані';
            } else {
                User::auth($userId);
                header("Location: /cabinet");
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /");
    }
}
