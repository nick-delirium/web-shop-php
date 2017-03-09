<?php

class User
{
    
    public static function Register($name, $email, $password) 
    {
        $db = Database::Connect();
        $sql = 'INSERT INTO user (name, email, password)'
            .' VALUES (:name, :email, :password)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function checkName($name)
    {
        if (strlen($name)>=3) return true;
        return false;
    }
    
    public static function checkPass($password)
    {   $pattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,20}$/";
        if (strlen($password)>= 6) {
            if(preg_match($pattern, $password)) return true;
            else return false;
        }
        return false;
    }
    
    public static function checkMail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }
    
    public static function checkMailExists($email)
    {
        $db = Database::Connect();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        if ($result->fetchColumn()) return true;
        return false;
    }
    
    
    public static function CheckNameExists($name)
    {
        $db = Database::Connect();
        $sql = 'SELECT COUNT(*) FROM user WHERE name = :name';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();
        
        if ($result->fetchColumn()) return true;
        return false;
        
    }

    public static function checkUser($name, $password)
    {
        $db = Database::Connect();
        $sql = 'SELECT * FROM user WHERE name = :name AND password = :password';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        
        $user = $result->fetch();
        if ($user) return $user['id'];
        return false;
    }
    
    public static function checkPhone($phone)
    {
        if(strlen($phone) >= 10) return true;
        else return false;
    }
    
    public static function login($userId, $name)
    {
        $_SESSION['user'] = $userId;
        $_SESSION['name'] = $name;
    }

    public static function isLogged()
    {
        
        if (isset($_SESSION['user'])) return $_SESSION['user'];
        else header("Location: /login/");
    }
    
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) return false;
        else return true;
    }
    
    public static function getUser($id)
    {
        $id = intval($id);
        
        $db = Database::Connect();
        $sql = 'SELECT * FROM user WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        
        return $result->fetch();
    }
    
    public function edit($id, $name, $password, $email)
    {
        $db = Database::Connect();
        $sql = 'UPDATE user SET name = :name, password = :password, email = :email WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
}