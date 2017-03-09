<?php

class Order
{
    public static function getOrders()
    {
        $db = Database::Connect();
        
        $result = $db->query('SELECT * FROM product_order ORDER BY date ASC');
        
        $i=0;
        while ($row = $result->fetch()) 
        {
            $orders[$i]['id'] = $row['id'];
            $orders[$i]['user_name'] = $row['user_name'];
            $orders[$i]['user_phone'] = $row['user_phone'];
            $orders[$i]['user_addres'] = $row['user_addres'];
            $orders[$i]['date'] = $row['date'];
            $orders[$i]['products'] = $row['products'];
            $orders[$i]['status'] = $row['status'];
            $i++;
        }
        
        return $orders;
        
    }
    
    
    public static function getOrder($id)
    {
        $db = Database::Connect();
        $sql = 'SELECT * FROM product_order where id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $result->execute();
        return $result->fetch();
    }
    
    public static function getStatus($item)
    {
        switch($item) 
        {
            case '1':
                $status = 'in progress'; break;
            case '2':
                $status = 'sent'; break;
            case '3':
                $status = 'arrived'; break;
            case '4':
                $status = 'troubles!'; break;
        }
        return $status;
    }
    
    public static function updateOrder($id, $userName, $userPhone, $userAddres, $date, $status)
	{
		$db = Database::Connect();
		$sql = "UPDATE product_order
			SET 
				user_name = :user_name, 
				user_phone = :user_phone, 
				user_addres = :user_addres, 
				date = :date, 
				status = :status 
			WHERE id = :id";
		// Получение и возврат результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':user_name', $userName, PDO::PARAM_STR);
		$result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
		$result->bindParam(':user_addres', $userAddres, PDO::PARAM_STR);
		$result->bindParam(':date', $date, PDO::PARAM_STR);
		$result->bindParam(':status', $status, PDO::PARAM_INT);
		return $result->execute();
	}
    
	
	public static function Delite($id)
	{
		$db = Database::Connect();
		$sql = 'DELETE FROM product_order WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}
}