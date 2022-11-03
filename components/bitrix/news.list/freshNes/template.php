<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$preview_text = TruncateText($arItem['PREVIEW_TEXT'],100);
	$img = CFile::ResizeImageGet(
		$arItem["PREVIEW_PICTURE"],
		array("width" => 380, "height" => 220),
		BX_RESIZE_IMAGE_EXACT
	);
	if($arItem['PROPERTIES']['PUNKT_TEXT']['VALUE']['0']['TEXT']):
		$preview_text = TruncateText(strip_tags(htmlspecialcharsBack($arItem['PROPERTIES']['PUNKT_TEXT']['VALUE']['0']['TEXT'])), 100);
	endif;
	?>
	<div class="tabs-block__card tabs-card" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="tabs-card__image">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<img src="<?=$img['src']?>" alt="<?echo $arItem["NAME"]?>">
			</a>
		</div>
		<div class="tabs-card__title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
		<div class="tabs-card__text"><?=$preview_text?></div>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="tabs-card__link">Читать далее</a>
	</div>	
<?endforeach;?>

