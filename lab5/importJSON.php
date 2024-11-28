<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sendIm'])) {
    $loadJSON = new importJSON();
    if($loadJSON->CheckAddress()){
        $messageI = $loadJSON->import();
        if($messageI==="IMPORT_SUCCESSFUL"){
            $importData = array($loadJSON->counterDownloadedData[0], $loadJSON->counterDownloadedData[1], $loadJSON->counterDownloadedData[2]);
    }
        //echo "<pre>"; print_r($loadJSON->counterDownloadedData); echo "</pre>";
    }
    else{
        $messageI="INCORRECT_ADDRESS";
    }
}

class importJSON{
    private $address="";
    private $data = [];
    public $numberOfRecords;
    public $counterDownloadedData = [];

    function CheckAddress() : bool {
        if(isset($_POST['import_address']) && !empty($_POST['import_address']) &&
            preg_match("/(\/(\w[^\/*\"<>|]+))*\/(\w[^\/*\"<>|]+)\.json/u", $_POST['import_address'])){
                $this->address = htmlspecialchars($_POST['import_address']);
                $this->address = str_replace("\\", "/", $this->address);
                return true;
        }
        else return false;
    }

    function CreateTable(){
        $SQLCreateTable = "CREATE TABLE IF NOT EXISTS `goods_imported` (
                        `id` int AUTO_INCREMENT NOT NULL UNIQUE,
                        `img_path` varchar(100) NOT NULL,
                        `name` varchar(50) NOT NULL,
                        `id_category` int NOT NULL,
                        `id_brand` int NOT NULL,
                        `description` varchar(300) NOT NULL,
                        `price` float NOT NULL,
                        `check_sum` varchar(32) NOT NULL,
                        PRIMARY KEY (`id`),
                        FOREIGN KEY (id_category) REFERENCES category(id) ON DELETE CASCADE,
                        FOREIGN KEY (id_brand) REFERENCES brands(id) ON DELETE CASCADE
                    ); ";

        //$SQLCreateTable .= "ALTER TABLE `goods_imported` ADD CONSTRAINT `goods_fk3` FOREIGN KEY (`id_category`) REFERENCES `category`(`id`);";
       // $SQLCreateTable .= "ALTER TABLE `goods_imported` ADD CONSTRAINT `goods_fk4` FOREIGN KEY (`id_brand`) REFERENCES `brands`(`id`);";

        global $conn;
        $result = $conn->query($SQLCreateTable);
    }

    function GetContents(){
        $handle = fopen($this->address, 'r');
        if($handle){
            $json_data = [];
            while(!feof($handle))
            {
                $json_data[] = fgets($handle);
            }
            fclose($handle);
            $json_data_string = $this->ArrayToString($json_data);
            $this->data = json_decode($json_data_string);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return "JSON_ERROR";
            }
            else return "";
            //$this->data = json_decode(file_get_contents($this->address));
           //echo "<pre>";  print_r(file_get_contents($this->address)); echo "</pre>";
           // echo "<pre>"; print_r($json_data_string); echo "</pre>";

           /* echo "<pre>"; 
            print_r($this->data); 
            echo "</pre>";*/
        }
        else{
            return "FAILED_OPEN_FILE";
        }
    }

    function ArrayToString($array){
        $string = "";
        foreach($array as $item){
            $string .= $item;
        }
        return $string;
    }

    function ExtractData(){
        $countSuccess = 0;
        $countError = 0;
        $countDublicates = 0;

       // $count = 1;
        foreach ($this->data AS $item) {
            $product_array = [
                htmlspecialchars($item->img_path),
                htmlspecialchars($item->name),
                htmlspecialchars($item->id_category),
                htmlspecialchars($item->id_brand),
                htmlspecialchars($item->description),
                htmlspecialchars($item->price)
            ];

            //echo "Запись " . $count . "<br>";
            //echo "<pre>"; print_r($product_array); echo "</pre>";
            //$count++; 
            
            $resultOfCreation = $this->CreateGood($product_array);
            if($resultOfCreation === 1) {
                $countSuccess++; 
                //echo "Запись добавлена <br> <br>";
            }
            else if($resultOfCreation === 0) {
                $countDublicates++; 
                //echo "Дубликат. Запись не добавлена <br> <br>";
            }
            else {
                $countError++; 
                //echo "Ошибка добваления записи <br> <br>";
            }
        }
        return [$countSuccess, $countDublicates, $countError];
    }

    function CreateGood($array){
        $img_path = $array[0]; 
        $name = $array[1];
        $id_category = $array[2];
        $id_brand = $array[3];
        $description = $array[4]; 
        $price = $array[5];
        $check_sum = $this->CreateCheckSum($img_path . $name . $id_category . $id_brand . $description . $price);

        //echo $check_sum . "<br>";

        if($this->FindDuplicates($check_sum) === 0){
            $sql = "INSERT INTO goods_imported (img_path, name, id_category, id_brand, description, price, check_sum) VALUES (?, ?, ?, ?, ?, ?, ?)";

            global $conn;
            $stmt = $conn->prepare($sql);

            $stmt->bind_param("ssiisds", $img_path, $name, $id_category, $id_brand, $description, $price, $check_sum);

            if ($stmt->execute()) {
                $stmt->close();
                return 1;
            } else {
                $stmt->close();
                return -1;
            }   
        }
        else return 0;
    }

    function FindDuplicates($check_sum){
        $queryFindDuplicates = "SELECT COUNT(*) AS count FROM goods_imported WHERE check_sum = ?";

        global $conn;
        $stmt = $conn->prepare($queryFindDuplicates);
        $stmt->bind_param("s", $check_sum);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_assoc();

        //echo "<pre>"; print_r($count['count']); echo "</pre>";

        return $count['count'];
    }

    function CreateCheckSum($string){
        //echo $string . "<br>";
        //echo hash('md5', $string) . "<br>";
        return hash('md5', $string);
    }

    function import(){
        $this->CreateTable();
        $result = $this->GetContents();
        if(!empty($this->data)){
            $resultImportArray = $this->ExtractData();
            $this->counterDownloadedData = array($resultImportArray[0], $resultImportArray[1], $resultImportArray[2]);
            return "IMPORT_SUCCESSFUL";
        }
        else{
            return $result;
        }
    }
}
?>