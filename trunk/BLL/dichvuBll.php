<?php

function getDichVuList() {
    $sql = "
                SELECT `Id`, `LoaiId`, `Tieude`, `Noidung`, `Hinhanh`, `Date` FROM `tb_dichvucuoi`  ORDER BY  `Date` DESC";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result=  array();
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Feed();
        $item->Id = $seletedItem['Id'];
        $item->LoaiId = $seletedItem['LoaiId'];
        $item->Ten = $seletedItem['Tieude'];
        $item->Date = $seletedItem['Date'];
        $item->Noidung = $seletedItem['Noidung'];
        $item->Hinhanh = $seletedItem['Hinhanh'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}
function getDichVuList_byLoai($type) {
    $sql = "
                SELECT `Id`, `LoaiId`, `Tieude`, `Noidung`, `Hinhanh`, `Date` FROM `tb_dichvucuoi`  WHERE `LoaiId`=$type  ORDER BY  `Date` DESC";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result=  array();
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Feed();
        $item->Id = $seletedItem['Id'];
        $item->LoaiId = $seletedItem['LoaiId'];
        $item->Ten = $seletedItem['Tieude'];
        $item->Date = $seletedItem['Date'];
        $item->Noidung = $seletedItem['Noidung'];
        $item->Hinhanh = $seletedItem['Hinhanh'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}
function getDichVu_byID($id) {
    $sql = "SELECT `Id`, `LoaiId`, `Tieude`, `Noidung`, `Hinhanh`, `Date` FROM `tb_dichvucuoi`
            WHERE Id = $id";
    $queryResult = mysql_query($sql);

    if (!$queryResult) {
        echo 'Could not run query: ' . $id . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);

    $item = new Feed();
    $item->Id = $seletedItem['Id'];
    $item->LoaiId = $seletedItem['LoaiId'];
    $item->Ten = $seletedItem['Tieude'];
    $item->Date = $seletedItem['Date'];
    $item->Noidung = $seletedItem['Noidung'];
    $item->Hinhanh = $seletedItem['Hinhanh'];
    return $item;
}

function addDichVu($LoaiId, $Ten, $Date, $Noidung, $Hinhanh) {
    $LoaiId = mysql_real_escape_string($LoaiId);
    $Ten = mysql_real_escape_string($Ten);
    $Date = mysql_real_escape_string($Date);
    $Noidung = mysql_real_escape_string($Noidung);
    $Hinhanh = mysql_real_escape_string($Hinhanh);


    $sql = "INSERT INTO `tb_dichvucuoi` (
	`LoaiId`, `Tieude`, `Date`, `Noidung`, 
	`Hinhanh`) 
	VALUES ('$LoaiId', '$Ten','$Date', '$Noidung','$Hinhanh');";
    $queryResult = mysql_query($sql);
    if ($queryResult)
        return mysql_insert_id();
    else
        return -1;
}

function updateDichVu_byId($id, $Ten, $Date, $Noidung, $Hinhanh) {
    $sql = "UPDATE `tb_dichvucuoi`
	SET `Tieude`='$Ten',
            `Date`='$Date',
            `Noidung`='$Noidung',
            `Hinhanh`='$Hinhanh',
	WHERE `tb_dichvucuoi`.`Id` = $id;";
    $queryResult = mysql_query($sql);
    return $queryResult;
}

function deleteDichVu($id) {
    $sql = "DELETE FROM `tb_dichvucuoi` WHERE `tb_dichvucuoi`.`Id` = $id;";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'ERROR!';
        exit;
    } else {
        echo 'SUCCESS!';
    }
}

?>