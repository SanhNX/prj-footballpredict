<?php
session_start();
include '../DAO/connection.php';
include '../DTO/object.php';
include '../BLL/poolBll.php';

$keyword = $_POST['keyword'];
$itemList = getClubs($keyword);
$girdView = "";
for ($i = 0; $i < count($itemList); $i++) {
    $item = $itemList[$i];
    $isGroup = groupExist($item->Id, $_SESSION['UserId']);
    if($isGroup == -1)
        $button = '<a id="'.$item->Id.'" class = "grid-item-button"  onclick="joingroup('.$item->Id.', '.$_SESSION['UserId'].')"> Join</a>';
    else
        $button = '<a id="'.$item->Id.'" class = "grid-item-button disable" > Had Joined</a>';
    $html = '<li class = "item">
            <div class = "grid-icon-panel">
            <img src = "' . $item->Logo . '"/>
            </div>
            <div class = "grid-item-cap">' . $item->Name . '</div>
            <div class = "grid-item-mess">' . $item->CreateBy . '</div>
            '.$button.'
            </li>';
    $girdView = $girdView . $html;
}
echo $girdView;
?>
                            