<?php

abstract class Admin
{
    public static function isAdmin()
    {
        $id = User::isLogged();
        $user = User::getUser($id);
        if ($user['access'] > 0) return true;
        else die('Access denied!');
    }
}