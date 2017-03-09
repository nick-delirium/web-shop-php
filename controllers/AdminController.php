<?php

class AdminController extends Admin
{
    public function actionIndex()
    {
        self::isAdmin();
        require_once('/views/admin/index.php');
    }
    
    
}