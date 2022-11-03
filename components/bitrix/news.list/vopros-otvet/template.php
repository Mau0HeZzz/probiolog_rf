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
	?>
	<div itemscope itemtype="https://schema.org/Question">
	    <button class="accordion" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><span itemprop="name"><?echo $arItem["PREVIEW_TEXT"]?></span><span class="accordion__right">Развернуть</span></button>
	    <div class="panel" itemprop="acceptedAnswer" itemscope itemtype="http://schema.org/Answer">
	        <p class="accordion__content" itemprop="text"><?echo $arItem["DETAIL_TEXT"]?></p>
	    </div>
	</div>
<?endforeach;?>
