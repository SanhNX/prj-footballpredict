<?php
session_start();
include '../DAO/connection.php';
include '../DTO/object.php';
include '../BLL/poolBll.php';

if ($_FILES["file"]["name"] === "")
    $avatar = 'images/icon/default-pool-avt-bg.png';
else
    $avatar = "images/resources/team-logo/" . $_FILES["file"]["name"];

$type = isset($_POST['isprivate']) && $_POST['isprivate']?1:0;
// insert this club 
$isCreate = insertClub($_POST['txtgroupname'], $avatar, $type, $_SESSION['UserName'], $_POST['txtgroupdescription']);
// insert this club in groups of this user!
$excuteQuery = insertGroup($isCreate, $_SESSION['UserId']);
if ($isCreate == -1 && $excuteQuery == -1) {
    echo 'fail';
} else {
    $dirTemp = str_replace('BLL', '', getcwd()) . "images/resources/team-logo/";
    $dir = str_replace("\\", "/", $dirTemp . $_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $dir);
    echo 'success';
}

function insertClub($name, $logo, $type, $by, $description) {
    $sql = "INSERT INTO tbl_club(Name, Logo, Type, CreateBy, Description) VALUES('$name', '$logo', $type, '$by', '$description')";
//    echo '<script>alert("' . $sql . '");</script>';
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