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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
    'TILE' => array(
        'CONT' => 'bx_catalog_tile',
        'TITLE' => 'bx_catalog_tile_category_title',
        'LIST' => 'bx_catalog_tile_ul',
        'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
    )
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>

<div class="title">Полезные советы</div>
<? if (0 < $arResult["SECTIONS_COUNT"]) { ?>
    <div class="advice-category">
        <? foreach ($arResult['SECTIONS'] as &$arSection) { ?>
            <? if ($arSection['ELEMENT_CNT'] == 0) continue; ?>

            <? $uri = explode('/', $_SERVER['REQUEST_URI']); ?>
            <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="advice-category__item<? if (in_array($arSection['CODE'], $uri)) { echo ' selected'; } ?>"><?=$arSection['NAME']?></a>

        <? }
        unset($arSection); ?>
    </div>
<? } ?>