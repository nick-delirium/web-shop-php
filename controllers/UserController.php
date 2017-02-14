<?php

class UserController
{
    public function actionRegister()
    {
        $name='';
        $email='';
        $password='';
        $result = false;
        
        if (isset($_POST['submit'])) {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            
            $errors = false;
            
            if (!User::checkName($name)) $errors[]='Name is less than 3 symbols';
            if (!User::checkMail($email)) $errors[]='incorrect email';
            if (!User::checkPass($password)) $errors[]='Password is weak or less than 6 symbols; password must include atleast one uppercase Letter, one downcase letter and one number 4 safety';
            if (User::checkMailExists($email)) $errors[] = 'This email is already registered';
            if (User::checkNameExists($name)) $errors[] = 'This name is taken';
            
            
            if (!$errors) {
               $result = User::Register($name, $email, $password);
            }
        }
        
        require_once(ROOT.'/views/user/register.php');
        
    }
    
    public function actionLogin()
    {
        $name = '';
        $password = '';
        
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $errors = false;
            
            $userId = User::checkUser($name, $password);
            if (!$userId) $errors[] = 'Wrong password or username';
            else {
                User::login($userId);
                header("Location: /profile/");
            }
        }
        require_once(ROOT.'/views/user/login.php');
    }
    
    
    
}