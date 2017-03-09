<?php

class AdminCategoryController extends Admin
{
    
    public function actionIndex()
    {
        self::isAdmin();
        $categories = Category::getCategoriesList();
        require_once(ROOT.'/views/admin/categories/index.php');
    }
    
    public function actionCreate()
    {
        self::isAdmin();
        
        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];
            if (isset($_POST['sort'])) $sortOrder = $_POST['sort'];
                      else $sortOrder = 0;
            $status = $_POST['status'];
            
            Category::Create($name, $sortOrder, $status);
            header("Location: /admin/category");
        }
        
        require_once(ROOT.'/views/admin/categories/create.php'); 
    }
    
    
    public function actionUpdate($id)
    {
        self::isAdmin();
        $category = Category::getCategory($id);
        
        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $sortOrder = $_POST['sort'];
            $status = $_POST['status'];
            
            Category::Update($id, $name, $sortOrder, $status);
            header("Location: /admin/category");
        }
        
        require_once(ROOT.'/views/admin/categories/update.php');
        
    }
    
    
    public function actionDelite($id)
    {
        self::isAdmin();
        $name = implode(Category::name($id));
        if (isset($_POST['submit']))
        {
            Category::Delite($id);
            header("Location: /admin/category");
        }
        require_once(ROOT.'/views/admin/categories/delite.php');
    }   
    
    
}