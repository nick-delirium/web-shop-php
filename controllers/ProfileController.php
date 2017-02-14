<?php

class ProfileController
{
 
    public function actionIndex()
    {
        $userId = User::isLogged();
        
        require_once(ROOT.'/views/user/profile.php');
    }
    
}