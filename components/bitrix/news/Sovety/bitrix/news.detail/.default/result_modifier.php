<?php

$arSections = array();

// получаем разделы
$dbResSect = CIBlockSection::GetList(
    array("SORT" => "ASC"),
    array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ID" => $arResult['IBLOCK_SECTION_ID'])
);
//Получаем разделы и собираем в массив
while ($sectRes = $dbResSect->GetNext()) {
    $arSections = $sectRes;
}


$arResult["SECTION"] = $arSections;

?>