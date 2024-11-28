<?php
require_once '../controller.php';

class CRUDTables{
    public static function GetGoods()
    {
        $query = "SELECT goods.img_path, goods.name, category.name AS name_category, brands.name AS name_brand, goods.description, goods.price 
                        FROM goods JOIN category ON goods.id_category = category.id JOIN brands ON goods.id_brand = brands.id";
        $query = Config::prepare($query);
        $data = [];
        if($query->execute()) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function addGood($img, $name, $id_category, $id_brand, $description, $price)
    {
        if('FIELDS_OK' === self::checkFields($img, $name, $id_category, $id_brand, $description, $price)){
            $query = "INSERT INTO goods (img_path, name, id_category, id_brand, description, price) 
                VALUES (:img_path, :name, :id_category, :id_brand, :description, :price)";
            $query = Config::prepare($query);

            $img_path = addPic($img);
            if($img_path === 'FILE_ALREADY_EXISTS'){
                PageController::WriteMessage('FILE_ALREADY_EXISTS');
            }
            else {
                $name = sanitizeHTML($name);
                $id_category = sanitizeHTML($id_category);
                $id_brand = sanitizeHTML($id_brand);
                $description = sanitizeHTML($description);
                $price = sanitizeHTML($price);

                $query->bindParam(":img_path", $img_path);
                $query->bindParam(":name", $name);
                $query->bindParam(":id_category", $id_category);
                $query->bindParam(":id_brand", $id_brand);
                $query->bindParam(":description", $description);
                $query->bindParam(":price", $price);

                if ($query->execute()) {
                    PageController::WriteMessage('SUCCESSFUL_ADDITION_GOOD');
                } else {
                    PageController::WriteMessage('ERROR_ADDITION_GOOD');
                }
            }
        }
        else{
            PageController::WriteMessage('ERROR_FIELDS_' . self::checkFields($img, $name, $id_category, $id_brand, $description, $price));
        }

    }

    public static function checkFields($img_path, $name, $id_category, $id_brand, $description, $price)
    {
        //if(!empty($img_path) && preg_match("/(\/?(\w[^\/*\"<>|]+))*\/?(\w[^\/*\"<>|]+)\.(png|jpeg|webp)/u", $img_path)){}
        if(getimagesize($img_path['tmp_name'])){}
        else{ return 'IMG_ERROR';}

        if(!empty($name)){}
        else{ return 'NAME_ERROR';}

        $idCategories = UserAction::readCategoryTable();
        $idcArray = array_column($idCategories, 'id');
        if(in_array($id_category, $idcArray)){}
        else{return 'CATEGORY_MISSING';}

        $idBrands = UserAction::readBrandTable();
        $idbArray = array_column($idBrands, 'id');
        if(in_array($id_brand, $idbArray)){}
        else{return 'BRAND_MISSING';}

        if(!empty($description)){}
        else{ return 'DESCRIPTION_ERROR';}

        if(!empty($price) && preg_match("/\d/u", $price)){}
        else{ return 'PRICE_ERROR';}

        return 'FIELDS_OK';
    }
    public static function GetCategories()
    {
        $query = "SELECT * FROM category";
        $query = Config::prepare($query);
        $data = [];
        if($query->execute()){
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function addCategory($name)
    {
        $query = "INSERT INTO category (name) VALUES (:name)";
        $query = Config::prepare($query);
        $name = sanitizeHTML($name);
        $query->bindParam(":name", $name);
        if ($query->execute()) {
            PageController::WriteMessage('SUCCESSFUL_ADDITION_CATEGORY');
        }
        else {
            PageController::WriteMessage('ERROR_ADDITION_CATEGORY');
        }
    }
    public static function GetBrands()
    {
        $query = "SELECT * FROM brands";
        $query = Config::prepare($query);
        $data = [];
        if($query->execute()){
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function addBrand($name)
    {
        $query = "INSERT INTO brands (name) VALUES (:name)";
        $query = Config::prepare($query);
        $name = sanitizeHTML($name);
        $query->bindParam(":name", $name);
        if ($query->execute()) {
            PageController::WriteMessage('SUCCESSFUL_ADDITION_BRAND');
        }
        else {
            PageController::WriteMessage('ERROR_ADDITION_BRAND');
        }
    }



}