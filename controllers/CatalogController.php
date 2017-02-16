<?php 

class CatalogController
{
    
    
    
    public function actionIndex()
    {
        
        $categories = [];
        $categories = Category::getCategoriesList();
        $latestProducts = [];
        $latestProducts = Product::getLatestProducts(12);
            
        require_once(ROOT.'/views/site/shop/catalog.php');
        
    }
 
       public function actionCategory($categoryId, $page = 1)
    {
        echo "page is $page";
        $categories = [];
        $categories = Category::getCategoriesList();
        $products = [];
        $products = Product::getProductsByCat($categoryId, $page);
            
        $total = Product::getCatProducts($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        
        require_once(ROOT.'/views/site/shop/category.php');
       
        
    }
 
    
}