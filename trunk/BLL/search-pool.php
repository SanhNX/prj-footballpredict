<?php

include '../DAO/connection.php';
include '../DTO/object.php';
include '../BLL/poolBll.php';

$keyword = $_POST['keyword'];
$itemList = getClubs($keyword);
$girdView = "";
for ($i = 0; $i < count($itemList); $i++) {
    $item = $itemList[$i];
    $html = '<li class = "item">
            <div class = "grid-icon-panel">
            <img src = "' . $item->Logo . '"/>
            </div>
            <div class = "grid-item-cap">' . $item->Name . '</div>
            <div class = "grid-item-mess">by Tim</div>
            <a class = "grid-item-button" href = "#"> Join</a>
            </li>';
    $girdView = $girdView . $html;
    echo '<script>alert("'.$html.'");</script>';   
}
echo $girdView;
?>
                            