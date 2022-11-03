<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Лечение СРК, дисбактериоза, восстановление микрофлоры кишечника");
$APPLICATION->SetPageProperty("description", "Пробиолог. Пробиотик для кишечника при приеме антибиотиков, стрессе, неправильном питании и инфекциях");
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/slick.css", true);
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/articles/articles-new.css", true);
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/slick.min.js");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/articles/detect_error.js");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/articles/articles-new.js");
global $arrFilter;
$arrFilter = array();
$arPage = explode('/',trim($APPLICATION->GetCurDir(),'/'));
$count = count($arPage);
if($arPage[$count-2] == 'tag'){
	$_REQUEST["tag"] = end($arPage);
	$arrFilter["%TAGS"] = array(urldecode(htmlspecialchars($_REQUEST["tag"])));
	$arParams["FILTER_NAME"] = 'arrFilter';
} else {
	CHTTP::SetStatus("404 Not Found");
	@define("ERROR_404","Y");
}
#echo '<pre style="">';print_r($arrFilter);echo '</pre>';

?>
<div class="advice">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "probiolog",
            array(
                "PATH" => "",
                "SITE_ID" => "s3",
                "START_FROM" => "0"
            ),
			array("HIDE_ICONS" => "Y")
        ); ?>
		<? $APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"poleznye-sovety",
			array(
				"IBLOCK_ID" => "35",
				"IBLOCK_TYPE" => "pr_rf",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"CACHE_GROUPS" =>"N",
				"COUNT_ELEMENTS" => "Y",
				"TOP_DEPTH" => 2,
				"SECTION_URL" => "/poleznye-sovety/#SECTION_CODE_PATH#/",
				"VIEW_MODE" => "TILE",
				"SHOW_PARENT_NAME" => "Y",
				"HIDE_SECTION_NAME" => "Y",
				"ADD_SECTIONS_CHAIN" => "Y",
			),
			$component,
			array("HIDE_ICONS" => "Y")
		); ?>
<? $APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "advice-new",
    array(
		"FILTER_NAME" => "arrFilter",
        "ACTION_VARIABLE" => "action",
        "ADD_ELEMENT_CHAIN" => "Y",
        "ADD_PICT_PROP" => "-",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BASKET_URL" => "",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "N",
        "COMPATIBLE_MODE" => "Y",
        "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
        "DETAIL_BACKGROUND_IMAGE" => "-",
        "DETAIL_BRAND_USE" => "N",
        "DETAIL_BROWSER_TITLE" => "-",
        "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
        "DETAIL_DETAIL_PICTURE_MODE" => array(
            0 => "POPUP",
            1 => "MAGNIFIER",
        ),
        "DETAIL_DISPLAY_NAME" => "Y",
        "DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
        "DETAIL_IMAGE_RESOLUTION" => "16by9",
        "DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(),
        "DETAIL_META_DESCRIPTION" => "-",
        "DETAIL_META_KEYWORDS" => "-",
        "DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
        "DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
        "DETAIL_PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "DETAIL_SET_CANONICAL_URL" => "N",
        "DETAIL_SHOW_POPULAR" => "N",
        "DETAIL_SHOW_SLIDER" => "N",
        "DETAIL_SHOW_VIEWED" => "N",
        "DETAIL_STRICT_SECTION_CHECK" => "N",
        "DETAIL_USE_COMMENTS" => "N",
        "DETAIL_USE_VOTE_RATING" => "N",
        "DISABLE_INIT_JS_IN_COMPONENT" => "Y",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER" => "asc",
        "ELEMENT_SORT_ORDER2" => "asc",
        "FILTER_HIDE_ON_MOBILE" => "N",
        "FILTER_VIEW_MODE" => "HORIZONTAL",
        "IBLOCK_ID" => "35",
        "IBLOCK_TYPE" => "pr_rf",
        "INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "Y",
        "INSTANT_RELOAD" => "N",
        "LABEL_PROP" => array(),
        "LAZY_LOAD" => "N",
        "LINE_ELEMENT_COUNT" => "3",
        "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
        "LINK_IBLOCK_ID" => "",
        "LINK_IBLOCK_TYPE" => "",
        "LINK_PROPERTY_SID" => "",
        "LIST_BROWSER_TITLE" => "-",
        "LIST_ENLARGE_PRODUCT" => "STRICT",
        "LIST_META_DESCRIPTION" => "-",
        "LIST_META_KEYWORDS" => "-",
        "LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
        "LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false}]",
        "LIST_PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "LIST_PROPERTY_CODE_MOBILE" => array(),
        "LIST_SHOW_SLIDER" => "N",
        "LIST_SLIDER_INTERVAL" => "3000",
        "LIST_SLIDER_PROGRESS" => "N",
        "LOAD_ON_SCROLL" => "N",
        "MESSAGE_404" => "",
        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
        "MESS_BTN_BUY" => "Купить",
        "MESS_BTN_COMPARE" => "Сравнение",
        "MESS_BTN_DETAIL" => "Подробнее",
        "MESS_BTN_SUBSCRIBE" => "Подписаться",
        "MESS_NOT_AVAILABLE" => "Нет в наличии",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "advice",
        "PAGER_TITLE" => "Товары",
        "PAGE_ELEMENT_COUNT" => "9",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "PRICE_CODE" => array(),
        "PRICE_VAT_INCLUDE" => "Y",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "PRODUCT_ID_VARIABLE" => "id",
        "PRODUCT_PROPERTIES" => array(),
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "SEARCH_CHECK_DATES" => "Y",
        "SEARCH_NO_WORD_LOGIC" => "Y",
        "SEARCH_PAGE_RESULT_COUNT" => "50",
        "SEARCH_RESTART" => "N",
        "SEARCH_USE_LANGUAGE_GUESS" => "Y",
        "SECTIONS_HIDE_SECTION_NAME" => "Y",
        "SECTIONS_SHOW_PARENT_NAME" => "Y",
        "SECTIONS_VIEW_MODE" => "TILE",
        "SECTION_BACKGROUND_IMAGE" => "-",
        "SECTION_COUNT_ELEMENTS" => "Y",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "SECTION_TOP_DEPTH" => "2",
        //"SEF_FOLDER" => "/stati-novye/",
		"SEF_FOLDER" => "/poleznye-sovety/",
        "SEF_MODE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "Y",
        "SHOW_404" => "Y",
        "SHOW_DEACTIVATED" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "SHOW_TOP_ELEMENTS" => "N",
        "SIDEBAR_DETAIL_SHOW" => "N",
        "SIDEBAR_PATH" => "",
        "SIDEBAR_SECTION_SHOW" => "N",
        "TEMPLATE_THEME" => "blue",
        "TOP_ELEMENT_COUNT" => "9",
        "TOP_ELEMENT_SORT_FIELD" => "sort",
        "TOP_ELEMENT_SORT_FIELD2" => "id",
        "TOP_ELEMENT_SORT_ORDER" => "asc",
        "TOP_ELEMENT_SORT_ORDER2" => "desc",
        "TOP_ENLARGE_PRODUCT" => "STRICT",
        "TOP_LINE_ELEMENT_COUNT" => "3",
        "TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
        "TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
        "TOP_PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "TOP_PROPERTY_CODE_MOBILE" => "",
        "TOP_SHOW_SLIDER" => "Y",
        "TOP_SLIDER_INTERVAL" => "3000",
        "TOP_SLIDER_PROGRESS" => "N",
        "TOP_VIEW_MODE" => "SECTION",
        "USER_CONSENT" => "N",
        "USER_CONSENT_ID" => "0",
        "USER_CONSENT_IS_CHECKED" => "Y",
        "USER_CONSENT_IS_LOADED" => "N",
        "USE_COMPARE" => "N",
        "USE_ELEMENT_COUNTER" => "Y",
        "USE_ENHANCED_ECOMMERCE" => "N",
        "USE_FILTER" => "N",
        "USE_MAIN_ELEMENT_SECTION" => "N",
        "USE_PRICE_COUNT" => "N",
        "USE_PRODUCT_QUANTITY" => "N",
        "USE_STORE" => "N",
        "COMPONENT_TEMPLATE" => "services",
        "SEF_URL_TEMPLATES" => array(
            "sections" => "",
            "section" => "#SECTION_CODE_PATH#/",
            "element" => "#ELEMENT_CODE#/",
            "compare" => "",
            "smart_filter" => "",
        )
    ),
    false
); ?>
<button class="accordion accordion1">Источники информации
            <span class="accordion__right">Развернуть</span></button>
        <div class="panel">
            <p class="accordion__content">
                <? foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>

                    <? if (is_array($arProperty["DISPLAY_VALUE"])): ?>
                        <?= implode('<br>', $arProperty["DISPLAY_VALUE"]); ?>
                    <? else: ?>
                        <?= $arProperty["DISPLAY_VALUE"]; ?>
                    <? endif ?>
                    <br/>
                <? endforeach; ?>
            </p>
        </div>
        <div class="info__consult">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/bitrix/templates/probiolog_rf/include/poleznye-sovety.php"
                )
            );?>
        </div>
        <div class="info__consult">БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ</div>
    </div>
</div>

<script src="<?= SITE_TEMPLATE_PATH ?>/js/pagination.js"></script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>