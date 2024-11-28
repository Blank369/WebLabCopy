<?php
require_once 'config.php';

     function filter() {
      $priceFrom = ''; 
      $priceTo = '';
      $category = '';
      $brand = '';
      $name = '';
      $description = '';

      if (isset($_GET['filterButton'])) {
        if (isset($_GET['filter_priceFrom'])) { 
          $priceFrom = htmlspecialchars($_GET['filter_priceFrom']); 
        } 
        else { 
          $priceFrom = ''; 
        }

        if (isset($_GET['filter_priceTo'])) {
          $priceTo = htmlspecialchars($_GET['filter_priceTo']);
        } 
        else {
          $priceTo = '';
        }
      
        if (isset($_GET['filter_category'])) {
          $category = htmlspecialchars($_GET['filter_category']);
        } 
        else {
          $category = '';
        }

        if (isset($_GET['filter_brand'])) {
          $brand = htmlspecialchars($_GET['filter_brand']);
        } 
        else {
          $brand = '';
        }

        if (isset($_GET['filter_name'])) {
          $name = htmlspecialchars($_GET['filter_name']);
        } 
        else {
          $name = '';
        }

        if (isset($_GET['filter_description'])) {
          $description = htmlspecialchars($_GET['filter_description']);
        } 
        else {
          $description = '';
        }
      }
   
      $data = getFiltered($priceFrom, $priceTo, $category, $brand, $name, $description);

      return $data;
    }

   function getFiltered($priceFrom, $priceTo, $category, $brand, $name, $description) {
      
      $query = "SELECT goods.img_path, goods.name, category.name AS name_category, brands.name AS name_brand, goods.description, goods.price 
                        FROM goods JOIN category ON goods.id_category = category.id JOIN brands ON goods.id_brand = brands.id 
                        WHERE 1=1";

      $params = [];
      $paramTypes = '';

      if(!empty($priceFrom) && is_numeric($priceFrom)){
        $query .= " AND goods.price >= ?";
        $params[] = "$priceFrom";
        $paramTypes .= 'd';
      }

      if(!empty($priceTo)&& is_numeric($priceTo)){
        $query .= " AND goods.price <= ?";
        $params[] = "$priceTo";
        $paramTypes .= 'd';
      }

      if(!empty($category)){
        $query .= " AND goods.id_category = ?";
        $params[] = "$category";  
        $paramTypes .= 'i';
      }

      if(!empty($brand)){
        $query .= " AND goods.id_brand = ?";
        $params[] = "$brand";
        $paramTypes .= 'i';
      }
      
      if (!empty($name)) {
          $query .= " AND goods.name LIKE ?";
          $params[] = "%$name%";
          $paramTypes .= 's';
        }

      if (!empty($description)) {
          $query .= " AND goods.description LIKE ?";
          $params[] = "%$description%";
          $paramTypes .= 's';
        
        }

     global $conn;
     $stmt = $conn->prepare($query);
    
      if (!empty($params)) {
        $stmt->bind_param($paramTypes, ...$params);
      }

      $stmt->execute();
      
      $result = $stmt->get_result(); // Получаем результат

      $data = [];
      while ($row = $result->fetch_assoc()) {
        $data[] = $row; // Добавляем каждую строку в массив
      }

      return $data;
  }

?>
