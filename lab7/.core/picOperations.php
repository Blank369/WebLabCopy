<?php
require_once '../controller.php';

function addPic($uploadPic)
{
    $uploadDir = '../pic/goods/';
    $uploadFile = $uploadDir . basename($uploadPic['name']);

    if(!file_exists($uploadFile)){
        if(move_uploaded_file($uploadPic['tmp_name'], $uploadFile)) {
            return $uploadFile;
        }
        else{
            return 'ADD_PIC_ERROR';
        }
    }
    else {
        return 'FILE_ALREADY_EXISTS';
    }
}

function deletePic($removePic)
{
    if(unlink($removePic)){
        return true;
    }
    else {
        return 'DELETE_PIC_ERROR';
    }
}