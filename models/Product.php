<?php

class Product
{
    const SHOW_BY_DEFAULT = 1;
    
    public static function getLatestProducts($limit = self::SHOW_BY_DEFAULT)
    {
        $limit = intval($limit);
        
        $db=Database::Connect();
        
        $productsList = [];
        
        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
                            . 'WHERE visible = "1" '
                            . 'ORDER BY id DESC '
                            . 'LIMIT ' . $limit);
        for($i=0;$row=$result->fetch();$i++) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
        }
        
        return $productsList;
    }
                    
   public static function getProductsByCat($categoryId, $page = 1)
    {
        
         if ($categoryId) {
            $offset = ($page-1)*self::SHOW_BY_DEFAULT;
            $db = Database::Connect();            
            $products = array();
            $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                    . "WHERE visible = '1' AND category_id = '$categoryId' "
                    . "ORDER BY id DESC "                
                    . "LIMIT ".self::SHOW_BY_DEFAULT
                    . " OFFSET ".$offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;       
        }
      

    }
    
    public static function getProduct($id)
    {
        $id = intval($id);
        
        $db = Database::Connect();
        $result = $db->query('SELECT * FROM product WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetch();
    }
    

    public static function getCatProducts($categoryId)
    {
        $db=Database::Connect();
        $result = $db->query('SELECT count(id) AS count FROM product WHERE visible = "1" AND category_id="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

}

