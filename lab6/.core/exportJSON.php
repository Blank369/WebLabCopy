<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sendEx'])) {
    $createJSON = new exportJSON();
    if($createJSON->CheckAddress()){
        $jsonFile=$createJSON->LoadDataIntoFile();
        //$jsonFile= str_replace("/", "\\", $jsonFile);
        //$jsonFile="file:///" . $jsonFile;
        if(isset($jsonFile) && !empty($jsonFile)){
            $messageE="EXPORT_SUCCESSFUL";
            //header("Location: filesForm.php");
        }
        else{
            $messageE="ERROR_WRITE";
        }
    }
    else{
        $messageE="INCORRECT_ADDRESS";
    }
}


class exportJSON{
    private $address="";
    private $data = [];

    function CheckAddress() : bool {
        if(isset($_POST['export_address']) && !empty($_POST['export_address']) &&
            preg_match("/(\/(\w[^\/*\"<>|]+))*\/(\w[^\/*\"<>|]+)\.json/u", $_POST['export_address'])){
                $this->address = htmlspecialchars($_POST['export_address']);
                $this->address = str_replace(".json", "_exported.json", $this->address);
                $this->address = str_replace("\\", "/", $this->address);
                return true;
        }
        else return false;
    }

    function ReadGoodsData(){
        $sql = "SELECT * FROM goods";

        $sql = Config::prepare($sql);
        if ($sql->execute()) {
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $this->data[] = $row;
            }
        }
    }

    function LoadDataIntoFile(){
        $this->ReadGoodsData();

        $jsonData = json_encode($this->data, JSON_PRETTY_PRINT);

        if(file_put_contents($this->address, $jsonData)) {
            return $this->address;
        } else {
            return "";
        }
    }
}

?>