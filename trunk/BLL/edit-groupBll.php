<?php
session_start();
include '../DAO/connection.php';
include '../DTO/object.php';
include '../BLL/poolBll.php';

if ($_FILES["gFile"]["name"] === "")
    $avatar = 'images/icon/default-pool-avt-bg.png';
else
    $avatar = "images/resources/team-logo/" . $_FILES["gFile"]["name"];

$type = isset($_POST['isprivate']) && $_POST['isprivate']?1:0;

//echo '<script>alert("' .$_POST['txtgName']."------". $avatar."------". $type."------". $_POST['txtgDescription']. '");</script>';
// Edit this club 
$isEdit = editClub($_POST['txtgName'], $avatar, $type, $_POST['txtgDescription'], $_POST['idHidden']);
//echo '<script>alert("' . $isEdit . '");</script>';
if ($isEdit != 1) {
    echo 'fail';
} else {
    $dirTemp = str_replace('BLL', '', getcwd()) . "images/resources/team-logo/";
    $dir = str_replace("\\", "/", $dirTemp . $_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $dir);
    echo 'success';
}

function editClub($name, $logo, $type, $description, $id) {
    $sql = "UPDATE tbl_club SET Name = '".$name."', Logo = '".$logo."', Type = '".$type."', Description = '".$description."' WHERE Id = '".$id."' ";
//    echo '<script>alert("' . $sql . '");</script>';
    $queryResult = mysql_query($sql);
    return $queryResult;
}

?>