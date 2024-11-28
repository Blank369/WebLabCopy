<?php
require_once '../controller.php';

if (isAuthorized()) {

     function filter() {
      $priceFrom = ''; 
      $priceTo = '';
      $category = '';
      $brand = '';
      $name = '';
      $description = '';

      if (isset($_GET['filterButton'])) {
        if (isset($_GET['filter_priceFrom'])) { 
          $priceFrom = sanitizeHTML($_GET['filter_priceFrom']); 
        } 
        else { 
          $priceFrom = ''; 
        }

        if (isset($_GET['filter_priceTo'])) {
          $priceTo = sanitizeHTML($_GET['filter_priceTo']);
        } 
        else {
          $priceTo = '';
        }
      
        if (isset($_GET['filter_category'])) {
          $category = sanitizeHTML($_GET['filter_category']);
        } 
        else {
          $category = '';
        }

        if (isset($_GET['filter_brand'])) {
          $brand = sanitizeHTML($_GET['filter_brand']);
        } 
        else {
          $brand = '';
        }

        if (isset($_GET['filter_name'])) {
          $name = sanitizeHTML($_GET['filter_name']);
        } 
        else {
          $name = '';
        }

        if (isset($_GET['filter_description'])) {
          $description = sanitizeHTML($_GET['filter_description']);
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
      $paramsValues = [];

      if(!empty($priceFrom) && is_numeric($priceFrom)){
        $query .= " AND goods.price >= :priceFrom";
        $params[] = ":priceFrom";
        $paramsValues[] = "$priceFrom";
      }

      if(!empty($priceTo)&& is_numeric($priceTo)){
        $query .= " AND goods.price <= :priceTo";
        $params[] = ":priceTo";
        $paramsValues[] = "$priceTo";
      }

      if(!empty($category)){
        $query .= " AND goods.id_category = :category";
        $params[] = ":category";
        $paramsValues[] = "$category";
      }

      if(!empty($brand)){
        $query .= " AND goods.id_brand = :brand";
        $params[] = ":brand";
        $paramsValues[] = "$brand";
      }
      
      if (!empty($name)) {
          $query .= " AND goods.name LIKE :name";
          $params[] = ":name";
          $paramsValues[] = "%$name%";
        }

      if (!empty($description)) {
          $query .= " AND goods.description LIKE :description";
          $params[] = ":description";
          $paramsValues[] = "%$description%";
        
        }

       $query = Config::prepare($query);

      if (!empty($params)) {
          foreach ($params as $key => &$param) {
              $query->bindParam($param, $paramsValues[$key]);
          }
      }

        $data = [];
        if($query->execute()) {
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row; // Добавляем каждую строку в массив
            }
        }
       //echo "<pre>"; print_r($query); echo "</pre>";

      return $data;
  }
}

else{
  header('Location: loginForm.php');
    exit();
}
?>
