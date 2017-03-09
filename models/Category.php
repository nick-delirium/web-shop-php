<?php

class Category
{
    public static function getCategoriesList()
    {
        $db = Database::Connect();
        
        $categoryList = [];
        
        $result = $db->query('SELECT id, name, status FROM category ORDER BY sort_order ASC');
        
        $i=0;
        while ($row = $result->fetch()) 
        {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        
        return $categoryList;
        
    }
    
    
    public static function getCategory($id)
    {
        $db = Database::Connect();
        $sql = 'SELECT * FROM category WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $result->execute();
        return $result->fetch();
    }
    
    
    public static function Create($name, $sortOrder, $status)
    {
        $db = Database::Connect();
        $sql = 'INSERT INTO category (name, sort_order, status)'
                .' VALUES (:name, :sort_order, :status)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
    
    
    public static function Update($id, $name, $sortOrder, $status)
    {
        $db = Database::Connect();
        $sql = "UPDATE category
                SET
                    name = :name,
                    sort_order = :sort_order,
                    status = :status
                WHERE id = :id";
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    
    public static function Delite($id)
    {
        $db = Database::Connect();
        $sql = 'DELETE FROM category WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function name($id)
    {
        $id = intval($id);
        $db = Database::Connect();
        $sql = 'SELECT name FROM category WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        
        $name = $result->fetch();
        return $name;
    }
}