<?php 



class MainController
{
    
    
    
    public function actionIndex()
    {
        
        $categories = [];
        $categories = Category::getCategoriesList();
        $latestProducts = [];
        $latestProducts = Product::getLatestProducts(6);
            
        require_once(ROOT.'/views/site/index.php');
        
    }
    
    
    public function actionContact()
    {
        
        $mail = '';
        $subject = 'feedback from shop';
        $message = '';
        $result = false;
        $fullmesage = '';
        if(isset($_POST['submit'])) {
            $mail = $_POST['mail'];
            $message = $_POST['text'];
            $backmail = 'sylenien@gmail.com';
            $fullmesage = $message.'  from  EMAIL: '.$mail;
            $result = mail($backmail, $subject, $fullmesage);
            $result = true; 
        }
        require_once(ROOT.'/views/site/feedback.php');
    }
    
}