<?php



class ProductController
{
    
    public function actionView($productId)
    {
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $product = Product::getProduct($productId);
        
        require_once(ROOT.'/views/site/shop/product_details.php');
        
    }
}