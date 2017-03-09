<?php

class AdminProductController extends Admin
{
    public function actionIndex()
    {
        self::isAdmin();
        $productsList = Product::getProductsList();
        require_once(ROOT.'/views/admin/products/index.php');
    }
    
    public function actionDelite($id)
    {   
        self::isAdmin();
        $product = Product::getProduct($id);
        if (isset($_POST['submit']))
        {
            Product::delite($id);
            header("Location: /admin/product"); 
        }
        
        require_once(ROOT.'/views/admin/products/delite.php');
    }
    
    public function actionCreate()
    {
        self::isAdmin();
        $categoriesList = Category::getCategoriesList();
        
        if (isset($_POST['submit']))
        {
            $options['name'] = $_POST['name'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['visible'] = $_POST['visible'];
            $options['description'] = $_POST['description'];
            
            $errors = false;
            if (!isset($options['name']) || empty($options['name'])) $errors[]='Empty name';
            if ($errors == false)
            {
                $id = Product::Create($options);
                if ($id)
                {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"]))
                    {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/UPLOADS/PRODUCT/{$id}.jpg");
                    }
					else 
				header("Location: /admin/product/");
                }
            }
        }
        
        require_once(ROOT.'/views/admin/products/create.php'); 
    }
    
    
    public function actionUpdate($id)
    {
        self::isAdmin();
        $categoriesList = Category::getCategoriesList();
        $product = Product::getProduct($id);
        
        if (isset($_POST['submit']))
        {
            $options['name'] = $_POST['name'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['visible'] = $_POST['visible'];
            $options['description'] = $_POST['description'];

            if (Product::Update($id, $options))
            {
                if (is_uploaded_file($_FILES["image"]["tmp_name"]))
                    {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/UPLOADS/PRODUCT/{$id}.jpg");
					}
				header("Location: /admin/product");   
            }
        }
        require_once(ROOT.'/views/admin/products/update.php');
    }
}