<?
// Собираем массив из свойств текста для&nbsp;удобного вывода в template
$text = Array();
foreach ($arResult['PROPERTIES']['PUNKT']['VALUE'] as $key => $punkt) {
	$text[$key]['PUNKT'] = $punkt;
}
foreach ($arResult['PROPERTIES']['PUNKT_TEXT']['VALUE'] as $key => $punktText) {
	$text[$key]['PUNKT_TEXT'] = $punktText['TEXT'];
}
foreach ($arResult['PROPERTIES']['CITATA']['VALUE'] as $key => $citata) {
	$text[$key]['CITATA'] = $citata['TEXT'];
}

$arResult['ARTICLE_TEXT'] = $text;

//Добавляем в массив информацию о рекомендуемом товаре
CModule::IncludeModule('iblock');
$recomend = Array();
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "PROPERTY_DOP_TEXT", "PROPERTY_LINK");
$arFilter = Array("IBLOCK_ID"=>20, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult['PROPERTIES']['REK_PREP']['VALUE']);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$img = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
	$recomend['NAME'] = $arFields['PREVIEW_TEXT'];
	$recomend['TEXT'] = $arFields['DETAIL_TEXT'];
	$recomend['DOP_TEXT'] = $arFields['PROPERTY_DOP_TEXT_VALUE']['TEXT'];
	$recomend['LINK'] = $arFields['PROPERTY_LINK_VALUE'];
	$recomend['IMG'] = $img;
}
$arResult['RECOMEND_TOVAR'] = $recomend;

//Источники информации
$info = Array();
if($arResult['PROPERTIES']['IST_INFO']['VALUE']){
	$arSelect1 = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT");
	$arFilter1 = Array("IBLOCK_ID"=>22, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult['PROPERTIES']['IST_INFO']['VALUE']);
	$res1 = CIBlockElement::GetList(Array(), $arFilter1, false, Array(), $arSelect1);
	while($ob1 = $res1->GetNextElement()){
		$arFields1 = $ob1->GetFields();
		$info['TEXT'] = $arFields1['PREVIEW_TEXT'];
	}
}
$arResult['ISTOCHNIK_INFO'] = $info;

?>