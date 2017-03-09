<?php 

class CartController
{
    
    public function actionAdd($id)
    {
        echo Cart::Add($id);
        return true;
    }
    
    public function actionDelite($id)
    {
        Cart::DeliteItem($id);
        header("Location: /cart/");
        return true;
    }
    
    public function actionCheckout()
    {
        $prodsInCart = Cart::getProducts();
        if (!$prodsInCart) header("Location: /cart/"); // если нет продуктов
        
        $prodsId = array_keys($prodsInCart);
        $products = Product::getSelectedId($prodsId);
        $totalPrice = Cart::getTotal($products);
        $totalQuantity = Cart::countItems();
        
        $userName = '';
        $userPhone = '';
        $userAddres = '';
        
        $result = false;
        
        if(!User::isGuest()) {  // залогинен ли юзер
            $userId = User::isLogged();
            $user = User::getUser($userId);
            $userName = $user['name'];
        } else $userId = false;
        
        if(isset($_POST['submit'])) {
            $userName = $_POST['name'];
            $userPhone = $_POST['phone'];
            $userAddres = $_POST['addres'];
            $errors = false;
            
//            if(!User::checkPhone($userPhone)) $errors[] = 'Invalid phone';
            
            if($errors == false) { // если нет ошибок - отправить
                
                $result = Cart::Save($userName, $userPhone, $userAddres, $userId, $prodsInCart);
//                echo "done";
                if($result != false) {
                    $adminMail = 'sylenien@gmail.com';
                    $message = 'check /admin/orders';
                    $subj = 'new order';
                    mail($adminMail, $subj, $message);
                    Cart::Clear();
                }
            }
        }
        require_once(ROOT.'/views/user/checkout.php');  
    }     
    
    
    public function actionIndex()
    {
        $prodsInCart = false;
        $prodsInCart = Cart::getProducts();
        
        if ($prodsInCart) {
            $prodsId = array_keys($prodsInCart);
            $products = Product::getSelectedId($prodsId);
            $totalPrice = Cart::getTotal($products);
        }
        
        require_once(ROOT.'/views/user/cart.php');
    }
    
    public function actionDelete($id)
    {
        Cart::deleteProduct($id);
        header("Location: /cart/");
    }
           
            
}