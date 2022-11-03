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


<div class="advice-detail">
    <div class="container">
    <div class="advice-detail-bread">
        <a href="/">Главная</a>
        >
        <a href="/poleznye-sovety/">Полезные советы</a>
        >
        <a href="/poleznye-sovety/?category=<?= $arResult["SECTION"]["CODE"] ?>"><?=$arResult["SECTION"]["NAME"]?></a>
        >
        <a href="javascript:void(0);"><?=$arResult["NAME"]?></a>
    </div>
    <div itemscope itemtype="http://schema.org/Article">
        <div class="advice-detail-name" itemprop="headline">
            <?=$arResult["NAME"]?>
        </div>
            <div itemprop="image" class="advice-detail-img" style="background-image: url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>); width: 100%; height: 622px; background-size: cover; background-position: top;"></div>
        <div class="advice-detail-text" itemprop="description">
            <?echo $arResult["DETAIL_TEXT"];?>
        </div>
    </div>
    <?
    global $arRelated;
    $arRelated = array('!ID' => $arResult['ID'], 'IBLOCK_SECTION_ID' => $arResult['IBLOCK_SECTION_ID']);

    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "related",
        Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array("",""),
            "FILE_404" => "/404.php",
            "FILTER_NAME" => "arRelated",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => $arParams[ "IBLOCK_ID"],
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "3",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array("",""),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "Y",
            "SET_TITLE" => "N",
            "SHOW_404" => "Y",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "ID",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N"
        )
    ); ?>
    <button class="accordion accordion1">Источники информации
        <span class="accordion__right">Развернуть</span></button>
    <div class="panel">
        <p class="accordion__content">
       <? foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode('<br>', $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;?>
        </p>
    </div>
    <div class="info__consult">БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ</div>
</div>
</div>



