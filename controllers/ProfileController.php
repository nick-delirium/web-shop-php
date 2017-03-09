<?php

class ProfileController
{
 
    public function actionIndex()
    {
        $userId = User::isLogged();
        $user = User::getUser($userId);
        $access = Admin::isAdmin();
        require_once(ROOT.'/views/user/profile.php');
    }
    
    public function actionEdit()
    {
        $userId = User::isLogged();
        $user = User::getUser($userId);
        $name = $user['name'];
        $email = $user['email'];
        $password = $user['password'];
        
        $result = false;
        
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
            $errors = false;
            
            if(!User::checkName($name)) $errors[] = 'too short name!';
            if(!User::checkPass($password)) $errors[] = 'password is weak';
            if(!User::checkMail($email)) $errors[] = 'wrong email addres';
            
            if (!$errors) $result = User::edit($userId, $name, $password, $email);
            
        }
        require_once(ROOT.'/views/user/edit.php');
    }
}