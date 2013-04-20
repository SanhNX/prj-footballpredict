<?php

include '../DAO/connection.php';
include '../BLL/poolBll.php';
include '../DTO/object.php';

// Các xử lý để chèn vào Database!

$excuteQuery = insertGroup($_POST['clubId'], $_POST['userId']);
if ($excuteQuery == -1)
    echo "false";
else 
    echo "true";
?>

