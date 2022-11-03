<?
ob_start();
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
CModule::IncludeModule('iblock');

$name = $_POST['name'];
$text = $_POST['text'];
$id = $_POST['id'];
$date = date('d.m.Y');

if($name != ''){
	$el = new CIBlockElement;

	$PROP = array();
	$PROP['DATE'] = $date;  // свойству с кодом 12 присваиваем значение "Белый"
	$PROP['ID_ARTICLES'] = $id;        // свойству с кодом 3 присваиваем значение 38

	$arLoadProductArray = Array(
	  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
	  "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
	  "IBLOCK_ID"      => 28,
	  "PROPERTY_VALUES"=> $PROP,
	  "NAME"           => $name,
	  "ACTIVE"         => "N",            // активен
	  "PREVIEW_TEXT"   => $text
	  //"DETAIL_TEXT"    => "текст для детального просмотра",
	  //"DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif")
	  );

	if($PRODUCT_ID = $el->Add($arLoadProductArray))
	    //echo "New ID: ".$PRODUCT_ID;
		echo '<div class="info__item-mess">Спасибо, ваш комментарий отправлен на модерацию.</div>';
	else
	  echo "Error: ".$el->LAST_ERROR;

}

?>