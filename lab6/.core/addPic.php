<?php
require_once '../controller.php';

function addPic($uploadPic)
{
    //echo "<pre>"; print_r($_FILES); echo "</pre>";

    $uploadDir = '../pic/goods/';
    $uploadFile = $uploadDir . basename($uploadPic['name']);

    if(!file_exists($uploadFile)){
        if(move_uploaded_file($uploadPic['tmp_name'], $uploadFile)) {
            return $uploadFile;
        }
    }
    else{
        return 'FILE_ALREADY_EXISTS';
    }

}