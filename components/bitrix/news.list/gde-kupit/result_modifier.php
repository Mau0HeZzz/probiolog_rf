<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$iblock = 14;

foreach($arResult["ITEMS"] as $arItem) {

    $section = $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]["VALUE"]['0'];

    /*Формируем массив */
    $arSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*", "PREVIEW_PICTURE");
    $arFilter = array("IBLOCK_ID" => $iblock, "SECTION_ID" => $section);
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]['ITEMS'] = [];
    $i = 0;

    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();



        $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]['ITEMS'][$i]['NAME'] = $arFields['NAME'];
        $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]['ITEMS'][$i]['PICTURE'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
        $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]['ITEMS'][$i]['PROPS'] = $arProps;

        $i++;
    }
}

