<?php

class Cart
{
    public static function Add($id)
    {
        $id = intval($id);
        $prodsInCart = [];
        
        if(isset($_SESSION['products'])) {
            $prodsInCart = $_SESSION['products'];
        }
        
        if(array_key_exists($id, $prodsInCart)) {
            $prodsInCart[$id]++;
        } else {
            $prodsInCart[$id] = 1;
        }
        
        $_SESSION['products'] = $prodsInCart;
        return self::countItems();
       //echo '<pre>';print_r($_SESSION['products']); die();
    }
    
    public static function countItems()
    {
        if (isset($_SESSION['products']))
		{
            $count = 0;
            foreach($_SESSION['products'] as $item) {   
                $count+=1;
            }
        return $count;
        } 
		else 
		{
            return 0;
        }      
    }
    
    
    public static function getProducts()
    {
        if(isset($_SESSION['products'])) {
            return $_SESSION['products'];
        } else return false;
    }
    
    public static function getTotal($products)
    {
        $prodsInCart = self::getProducts();
        if ($prodsInCart) {
            $total = 0;
            foreach($products as $item) {
                $total +=$item['price']*$prodsInCart[$item['id']];
            }
        }
        return $total;
    }
    
    
    public static function Save($name, $phone, $addres, $id, $products)
    {
        $db = Database::Connect();
        
        $sql = 'INSERT INTO product_order (user_name, user_phone, user_addres, user_id, products) '
            . 'VALUES (:user_name, :user_phone, :user_addres, :user_id, :products)';
        $products = json_encode($products);
        
        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $name, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':user_addres', $addres, PDO::PARAM_STR);
        $result->bindParam(':user_id', $id, PDO::PARAM_INT);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }
    
    
     public static function Clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
    
    public static function DeliteItem($id)
    {   
        $products = [];
        $products = $_SESSION['products'];
        if (isset($products[$id])) unset($products[$id]);
        $_SESSION['products'] = $products;
        return true;
    }
    
}