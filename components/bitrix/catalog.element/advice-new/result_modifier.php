<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

// Собираем массив из свойств текста для&nbsp;удобного вывода в template
$text = Array();
foreach ($arResult['PROPERTIES']['TITLE_PUNKT']['VALUE'] as $key => $punkt) {
	$text[$key]['TITLE_PUNKT'] = $punkt;
}
foreach ($arResult['PROPERTIES']['TEXT_PUNKT']['VALUE'] as $key => $punktText) {
	$text[$key]['TEXT_PUNKT'] = $punktText['TEXT'];
}
foreach ($arResult['PROPERTIES']['CITATA_PUNKT']['VALUE'] as $key => $citataText) {
	$text[$key]['CITATA_PUNKT']['TEXT'] = $citataText['TEXT'];
}
foreach ($arResult['PROPERTIES']['CITATA_PUNKT']['DESCRIPTION'] as $key => $citataDescription) {
	$text[$key]['CITATA_PUNKT']['DESCRIPTION'] = $citataDescription;
}

$arResult['ARTICLE_TEXT'] = $text;

//Добавляем в массив информацию о рекомендуемом товаре
CModule::IncludeModule('iblock');
$recomend = Array();
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "PROPERTY_DOP_TEXT", "PROPERTY_LINK");
$arFilter = Array("IBLOCK_ID"=>27, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult['PROPERTIES']['REK_PREP']['VALUE']);
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