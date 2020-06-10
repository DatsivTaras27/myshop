<?php

class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $name = $user['name'];
        $password = $user['password'];

        $result = false;
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;
            if (!User::checkName($name)) {
                $errors[] = 'Імя не повинно бути менше за 2 символи';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не повинен бути менший за 6 символів';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }

    public function actionHistory()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        
        $ordersList = Order::getOrdersList($userId);

        require_once(ROOT . '/views/cabinet/history.php');
        return true;
    }
}
