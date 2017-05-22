<?php

class AdminController extends Admin
{
    public function actionIndex()
    {
        self::isAdmin();
        require_once(ROOT.'/views/admin/index.php');
    }


}
