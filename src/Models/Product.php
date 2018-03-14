<?php
	namespace Models;
	use \PDO;
	class Product extends Model {
	
		public function add($name, $description, $price, $amount, $category){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($name === null || $description === null || $price === null || $amount === null || $category === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            $data = array();
            try	{
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableProduct.'` (`'.\Config\Database\DBConfig\Product::$name.'`,`'.\Config\Database\DBConfig\Product::$description.'`, `'.\Config\Database\DBConfig\Product::$price.'`, `'.\Config\Database\DBConfig\Product::$amount.'`,`'.\Config\Database\DBConfig\Product::$category.'`) VALUES (:name, :description, :price, :amount, :category)');
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':description', $description, PDO::PARAM_STR); 
                $stmt->bindValue(':price', $price, PDO::PARAM_STR);
                $stmt->bindValue(':amount', $amount, PDO::PARAM_STR);
                $stmt->bindValue(':category', $category, PDO::PARAM_INT);
                $result = $stmt->execute(); 
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$noadd;
                else
                    $data['message'] = \Config\Database\DBMessageName::$addok;
                $stmt->closeCursor();
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
		}
    }