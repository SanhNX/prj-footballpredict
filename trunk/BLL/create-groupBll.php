<?php
include '../DAO/connection.php';

$isCreate = insertClub($_POST['txtgroupname'], $_POST['uploadfile'], $_POST['isprivate'], $_POST['txtgroupdescription']);
//echo '<script>alert("'.$isExist.'");</script>';   
if ($isCreate == -1) {
    echo 'fail';
} else {
     move_uploaded_file($_POST['uploadfile'],"../images/" . 'abc.jpg');
    echo 'success';
}

function insertClub($name, $logo, $type, $description){
    $sql = "INSERT INTO tbl_club( Name, Logo, Type , Description) VALUES ('$name', '$logo', $type, '$description')";              
    $queryResult = mysql_query($sql) or die(mysql_error());
    
    if (!$queryResult) {
        echo 'Error: ' . $id . mysql_error();
        return -1;
    }
    
    if ($queryResult)
        return mysql_insert_id();
    else
        return -1;
}

?>