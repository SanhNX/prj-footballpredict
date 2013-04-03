<?php

function getClubs() {
    $sql = "SELECT * FROM  tbl_club";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Club();
        $item->Id = $seletedItem['Id'];
        $item->Name = $seletedItem['Name'];
        $item->Logo = $seletedItem['Logo'];
        $item->Played = $seletedItem['Played'];
        $item->Points = $seletedItem['Points'];
        $item->Won = $seletedItem['Won'];
        $item->Lost = $seletedItem['Lost'];

        $result[$i] = $item;
        $i++;
    }
    return $result;
}

?>