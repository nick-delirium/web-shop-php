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
    
    
    public static function Create($options)
    {
        $db = Database::Connect();
        
        $sql = 'INSERT INTO product '
                .'(name, price, category_id, brand, availability, is_new, is_recommended, visible, description) '
                .'VALUES '
                .'(:name, :price, :category_id, :brand, :availability, :is_new, :is_recommended, :visible, :description)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':visible', $options['visible'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        if ($result->execute()) return $db->lastInsertId();
        else return 0;
    }
    
    public static function Update($id, $options)
    {
        $db = Database::Connect();
        
        $sql = "UPDATE product SET"
                ." name = :name,"
                ." price = :price,"
                ." category_id = :category_id,"
                ." brand = :brand,"
                ." availability = :availability,"
                ." description = :description,"
                ." is_new = :is_new,"
                ." is_recommended = :is_recommended,"
                ." visible = :visible" 
            ." WHERE id = :id";
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':visible', $options['visible'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    
    public static function getProduct($id)
    {
        $id = intval($id);
        
        $db = Database::Connect();
        $result = $db->query('SELECT * FROM product WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetch();
    }
    
    
    public static function delite($id)
    {
        $db = Database::Connect();
        $sql = 'DELETE FROM product WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    
    
    public static function getCatProducts($categoryId)
    {
        $db=Database::Connect();
        $result = $db->query('SELECT count(id) AS count FROM product WHERE visible = "1" AND category_id="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }
    
    
    public static function getProductsList()
    {
        $db = Database::Connect();
        
        $result = $db->query('SELECT id, name, price, availability, category_id, visible FROM product ORDER BY id ASC');
        $list = [];
        
        for($i=0;$row=$result->fetch();$i++) {
            $list[$i]['id'] = $row['id'];
            $list[$i]['name'] = $row['name'];
            $list[$i]['price'] = $row['price'];
            $list[$i]['availability'] = $row['availability'];
            $list[$i]['visible'] = $row['visible'];
            $list[$i]['category_id'] = $row['category_id'];
        }
        return $list;
    }
    
    
    public static function getSelectedId($array)
    {
        $products = [];
        $db = Database::Connect();
        $id = implode(',', $array);
        
        $sql = "SELECT * FROM product WHERE visible = '1' AND id in ($id)";
        
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        for($i=0;$row=$result->fetch();$i++) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
        }
        return $products;
    }

	
	
	
	public static function getImage($id)
	{
		$noPic = '000.png';
		$path = '/UPLOADS/PRODUCT/';
		
		$pathToImg = $path. $id. '.jpg';
		if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToImg))
		{
			return $pathToImg;
		}
		else return $pathToImg=$path.$noPic;
	}
}

