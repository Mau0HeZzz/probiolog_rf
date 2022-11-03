<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);



$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList,
    'ITEM' => array(
        'ID' => $arResult['ID'],
        'IBLOCK_ID' => $arResult['IBLOCK_ID'],
        'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
        'JS_OFFERS' => $arResult['JS_OFFERS']
    )
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
    'ID' => $mainId,
    'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
    'STICKER_ID' => $mainId . '_sticker',
    'BIG_SLIDER_ID' => $mainId . '_big_slider',
    'BIG_IMG_CONT_ID' => $mainId . '_bigimg_cont',
    'SLIDER_CONT_ID' => $mainId . '_slider_cont',
    'OLD_PRICE_ID' => $mainId . '_old_price',
    'PRICE_ID' => $mainId . '_price',
    'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
    'PRICE_TOTAL' => $mainId . '_price_total',
    'SLIDER_CONT_OF_ID' => $mainId . '_slider_cont_',
    'QUANTITY_ID' => $mainId . '_quantity',
    'QUANTITY_DOWN_ID' => $mainId . '_quant_down',
    'QUANTITY_UP_ID' => $mainId . '_quant_up',
    'QUANTITY_MEASURE' => $mainId . '_quant_measure',
    'QUANTITY_LIMIT' => $mainId . '_quant_limit',
    'BUY_LINK' => $mainId . '_buy_link',
    'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
    'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
    'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
    'COMPARE_LINK' => $mainId . '_compare_link',
    'TREE_ID' => $mainId . '_skudiv',
    'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
    'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
    'OFFER_GROUP' => $mainId . '_set_group_',
    'BASKET_PROP_DIV' => $mainId . '_basket_prop',
    'SUBSCRIBE_LINK' => $mainId . '_subscribe',
    'TABS_ID' => $mainId . '_tabs',
    'TAB_CONTAINERS_ID' => $mainId . '_tab_containers',
    'SMALL_CARD_PANEL_ID' => $mainId . '_small_card_panel',
    'TABS_PANEL_ID' => $mainId . '_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
    : $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
    : $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers) {
    $actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
        ? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
        : reset($arResult['OFFERS']);
    $showSliderControls = false;

    foreach ($arResult['OFFERS'] as $offer) {
        if ($offer['MORE_PHOTO_COUNT'] > 1) {
            $showSliderControls = true;
            break;
        }
    }
} else {
    $actualItem = $arResult;
    $showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['CATALOG_SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
} ?>

<?
/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/
?>

<div class="advice-detail">
    <div class="row-articles">
        <? $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "probiolog",
            array(
                "PATH" => "",
                "START_FROM" => "0"
            )
        ); ?>

			<?php

#echo '<pre style="display:none;">';print_r($arResult);echo '</pre>';		
			
		?>
		 <div class="" itemscope itemtype="http://schema.org/Article">
		 <meta itemprop="identifier" content="<?=$arResult['ID']?>">
		<meta itemprop="datePublished" content="<?=ConvertDateTime($arResult['ACTIVE_FROM'], "YYYY-MM-DD HH:MI:SS", "ru")?>" />
		 <div class="" itemprop="description">
        <?foreach($arResult['ARTICLE_TEXT'] as $key => $articleText):?>

            <div class="<?=($key == 0) ? 'section_article' : 'section_article_2'?>">
                <?if($key == 0):?>
                    <h1 itemprop="headline" class="section_article_title">
                        <?=($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] : $arResult['NAME'])?>
						<?#=($arResult['NAME'])?>
                    </h1>
                    <img itemprop="image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
                    <div class="section_article_text">
                        <?if($articleText['TITLE_PUNKT']){?>
                            <br>
                            <br>
                            <h2 class="article_h2"><?=$articleText['TITLE_PUNKT']?></h2>
                        <?}?>
                        <?if(htmlspecialcharsBack($articleText['TEXT_PUNKT']) != '-'){?>
                            <br>
                            <?=htmlspecialcharsBack($articleText['TEXT_PUNKT'])?>
                        <?}?>
                    </div>
                <?else:?>
                	<?if($articleText['CITATA_PUNKT']['DESCRIPTION'] == '1'):?>
                		<div class="section_article_2-row">
                	<?endif;?>					
	                    <div class="section_article_2_left">
	                        <?if($articleText['TITLE_PUNKT']):?> 
	                            <h2 class="article_h2"><?=$articleText['TITLE_PUNKT']?></h2>
	                        <?endif;?>
	                        <?if(htmlspecialcharsBack($articleText['TEXT_PUNKT']) != '-'):?>
	                            <br>
	                            <?=htmlspecialcharsBack($articleText['TEXT_PUNKT'])?>
	                        <?endif;?>
	                    </div>
	                    <?if(htmlspecialcharsBack($articleText['CITATA_PUNKT']['TEXT']) != '-'):?>
	                        <div class="section_article_2_right">
	                            <div class="section_article_2_right_block">
	                                <img src="/bitrix/templates/probiolog_rf/icons/kov.png" alt="kov"><br><br>
	                                <?=htmlspecialcharsBack($articleText['CITATA_PUNKT']['TEXT'])?>
	                            </div>
	                        </div>
	                    <?endif;?>
	                <?if($articleText['CITATA_PUNKT']['DESCRIPTION'] == '1'):?>
                		</div>
                	<?endif;?>
                <?endif;?>
            </div>
        <?endforeach;?>
        <?if($arResult['PROPERTIES']['DOP_TEXT']['VALUE']['TEXT']){?>
        	<div class="section_article_3_footer">
        		<?=htmlspecialcharsBack($arResult['PROPERTIES']['DOP_TEXT']['VALUE']['TEXT']);?>
        	</div>
      	<?}?>
		</div>
        <?/*?><div class="advice-detail-name">
            <?= $arResult["NAME"] ?>
        </div>
        <div class="advice-detail-img b-lazy" data-src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
             style="width: 100%; height: 622px; background-size: cover; background-position: top;"></div>
        <div class="advice-detail-text">
            <? echo $arResult["DETAIL_TEXT"]; ?>
        </div>
        <?*/?>
        <?
        /*global $arRelated;
        $arRelated = array('!ID' => $arResult['ID'], 'IBLOCK_SECTION_ID' => $arResult['IBLOCK_SECTION_ID']);

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "related",
            array(
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
                "FIELD_CODE" => array("", ""),
                "FILE_404" => "/404.php",
                "FILTER_NAME" => "arRelated",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "12",
                "IBLOCK_TYPE" => "probiolog",
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
                "PROPERTY_CODE" => array("", ""),
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
        ); */?>

        <?/* if (!empty($arResult["PROPERTIES"]["SOURCES"]["VALUE"])): ?>
            <button class="accordion accordion1">
                Источники информации
                <span class="accordion__right">Развернуть</span>
            </button>
            <div class="panel">

                <? foreach ($arResult["PROPERTIES"]["SOURCES"]["VALUE"] as $key => $value): ?>
                    <p class="accordion__content"><? print_r($value); ?></p>
                <? endforeach; ?>

            </div>
        <? endif; ?>
        <div class="info__consult">БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ</div><?*/?>
    </div>
	</div>
    <?if(($arResult['PROPERTIES']['ASK']['VALUE']['TEXT']) && ($arResult['PROPERTIES']['ANSWER']['VALUE']['TEXT'])):?>
        <div class="section" itemscope itemtype="https://schema.org/Question">
            <p class="text mt100">Часто задаваемый вопрос</p>
            <button class="accordion accordion-active" id="bx_3218110189_50">
                <span itemprop="name"><?=htmlspecialcharsBack($arResult['PROPERTIES']['ASK']['VALUE']['TEXT'])?></span>
            </button>
            <div class="panel mb50" style="display: block;" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                <p class="accordion__content" itemprop="text"><?=htmlspecialcharsBack($arResult['PROPERTIES']['ANSWER']['VALUE']['TEXT'])?></p>
            </div>
        </div>
    <?endif;?>
    <div class="recomend__fon mt100">
   		<div class="recomend row-articles">
      		<div class="recomend__title">Рекомендуемое средство</div>
      		<div class="recomend__name"><?=$arResult['RECOMEND_TOVAR']['NAME']?></div>
      		<?if($arResult['RECOMEND_TOVAR']['TEXT']){?>
         		<div class="recomend__text"><?=$arResult['RECOMEND_TOVAR']['TEXT']?></div>
      		<?}?>
      		<?if($arResult['RECOMEND_TOVAR']['DOP_TEXT']){?>
         		<div class="recomend__doptext"><?=$arResult['RECOMEND_TOVAR']['DOP_TEXT']?></div>
      		<?}?>
      		<?if($arResult['RECOMEND_TOVAR']['LINK']){?>
         		<a href="<?=$arResult['RECOMEND_TOVAR']['LINK']?>" class="button-buy recomend__link">Подробнее</a>
      		<?}?>
      		<!-- <img src="<?=$arResult['RECOMEND_TOVAR']['IMG']?>" class="recomend__img" alt="<?=$arResult['RECOMEND_TOVAR']['NAME']?>" width="515" height="400"> -->
      		<img src="<?=$arResult['RECOMEND_TOVAR']['IMG']?>" class="recomend__img" alt="<?=$arResult['RECOMEND_TOVAR']['NAME']?>" width="455">
   		</div>
	</div>
	<div class="info__fon">
	    <div class="row-articles">
	      <div class="info mt120 mb50">
	         <div class="info__item">
	            <div class="info__item-like">
	               <div class="info__title">Понравилась статья?</div>
	               <div class="info__social">
	                  <div class="info__social-col">
	                     <div class="info__social-name">Оцените статью:</div>
	                     <div class="info__social-block">
	                        <div class="like like-js">
	                           <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
	                           <path class="like-icon" d="M30 21.8751C30 21.3742 29.8008 20.9076 29.4575 20.5634C29.8467 20.1376 30.045 19.5667 29.9908 18.9726C29.8933 17.9134 28.9391 17.0834 27.8175 17.0834H22.67C22.925 16.3092 23.3333 14.8901 23.3333 13.7501C23.3333 11.9426 21.7975 10.4167 20.8333 10.4167C19.9683 10.4167 19.3491 10.9042 19.3233 10.9242C19.2241 11.0034 19.1666 11.1234 19.1666 11.2501V14.0759L16.7658 19.2751L16.6666 19.3259V19.1667C16.6666 18.9367 16.48 18.75 16.25 18.75H12.0833C10.9342 18.7501 10 19.6842 10 20.8334V27.5001C10 28.6492 10.9342 29.5834 12.0833 29.5834H14.5833C15.4841 29.5834 16.2541 29.0084 16.5441 28.2059C17.2375 28.5626 18.1708 28.7501 18.75 28.7501H26.3992C27.3067 28.7501 28.1009 28.1384 28.2875 27.2951C28.3833 26.8601 28.3275 26.4226 28.1375 26.0426C28.7525 25.7334 29.1667 25.0976 29.1667 24.3751C29.1667 24.0801 29.0992 23.7976 28.9717 23.5426C29.5867 23.2326 30 22.5976 30 21.8751ZM28.2425 22.9034C28.0817 22.9226 27.9458 23.0317 27.8942 23.1859C27.8434 23.3401 27.8859 23.5092 28.0042 23.6209C28.2159 23.8201 28.3334 24.0884 28.3334 24.3751C28.3334 24.9009 27.9359 25.3426 27.41 25.4034C27.2492 25.4226 27.1134 25.5317 27.0617 25.6859C27.0109 25.8401 27.0534 26.0092 27.1717 26.1209C27.4459 26.3792 27.5559 26.7417 27.4734 27.1151C27.3709 27.5801 26.9192 27.9167 26.3992 27.9167H18.75C18.0733 27.9167 16.9383 27.5992 16.545 27.2051C16.4258 27.0867 16.2458 27.0517 16.0908 27.1151C15.935 27.1792 15.8333 27.3317 15.8333 27.5001C15.8333 28.1892 15.2725 28.7501 14.5833 28.7501H12.0833C11.3941 28.7501 10.8333 28.1892 10.8333 27.5001V20.8334C10.8333 20.1442 11.3941 19.5834 12.0833 19.5834H15.8333V20.0001C15.8333 20.1442 15.9083 20.2784 16.0316 20.3551C16.1533 20.4284 16.3066 20.4359 16.4366 20.3726L17.27 19.9559C17.3541 19.9142 17.4216 19.8442 17.4616 19.7584L19.9616 14.3417C19.9866 14.2867 20 14.2267 20 14.1667V11.4759C20.1733 11.3801 20.4742 11.2501 20.8333 11.2501C21.29 11.2501 22.5 12.3851 22.5 13.7501C22.5 15.2167 21.7017 17.3309 21.6942 17.3517C21.6459 17.4792 21.6625 17.6234 21.74 17.7367C21.8183 17.8492 21.9467 17.9167 22.0833 17.9167H27.8175C28.5125 17.9167 29.1025 18.4142 29.1608 19.0492C29.205 19.5242 28.9766 19.9759 28.5675 20.2284C28.44 20.3067 28.3642 20.4484 28.37 20.5992C28.3758 20.7501 28.4625 20.8851 28.5958 20.9542C28.9483 21.1334 29.1666 21.4867 29.1666 21.8751C29.1667 22.4009 28.7692 22.8426 28.2425 22.9034Z" fill="#2BB663"/>
	                           <path d="M16.2497 19.5833C16.0197 19.5833 15.833 19.7699 15.833 19.9999V27.4999C15.833 27.7299 16.0197 27.9166 16.2497 27.9166C16.4797 27.9166 16.6664 27.7299 16.6664 27.4999V19.9999C16.6664 19.7699 16.4797 19.5833 16.2497 19.5833Z" fill="#2BB663"/>
	                           <rect x="0.5" y="0.5" width="39" height="39" rx="19.5" stroke="#2BB663"/>
	                           </svg>
	                        </div>
	                        <div class="like dis-like-js">
	                           <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
	                           <path class="dis-like-icon" d="M10 18.1249C10 18.6258 10.1992 19.0924 10.5425 19.4366C10.1533 19.8624 9.955 20.4333 10.0092 21.0274C10.1067 22.0866 11.0609 22.9166 12.1825 22.9166H17.33C17.075 23.6908 16.6667 25.1099 16.6667 26.2499C16.6667 28.0574 18.2025 29.5833 19.1667 29.5833C20.0317 29.5833 20.6509 29.0958 20.6767 29.0758C20.7759 28.9966 20.8334 28.8766 20.8334 28.7499V25.9241L23.2342 20.7249L23.3334 20.6741V20.8333C23.3334 21.0633 23.52 21.25 23.75 21.25H27.9167C29.0658 21.2499 30 20.3158 30 19.1666V12.4999C30 11.3508 29.0658 10.4166 27.9167 10.4166H25.4167C24.5159 10.4166 23.7459 10.9916 23.4559 11.7941C22.7625 11.4374 21.8292 11.2499 21.25 11.2499H13.6008C12.6933 11.2499 11.8991 11.8616 11.7125 12.7049C11.6167 13.1399 11.6725 13.5774 11.8625 13.9574C11.2475 14.2666 10.8333 14.9024 10.8333 15.6249C10.8333 15.9199 10.9008 16.2024 11.0283 16.4574C10.4133 16.7674 10 17.4024 10 18.1249ZM11.7575 17.0966C11.9183 17.0774 12.0542 16.9683 12.1058 16.8141C12.1566 16.6599 12.1141 16.4908 11.9958 16.3791C11.7841 16.1799 11.6666 15.9116 11.6666 15.6249C11.6666 15.0991 12.0641 14.6574 12.59 14.5966C12.7508 14.5774 12.8866 14.4683 12.9383 14.3141C12.9891 14.1599 12.9466 13.9908 12.8283 13.8791C12.5541 13.6208 12.4441 13.2583 12.5266 12.8849C12.6291 12.4199 13.0808 12.0833 13.6008 12.0833H21.25C21.9267 12.0833 23.0617 12.4008 23.455 12.7949C23.5742 12.9133 23.7542 12.9483 23.9092 12.8849C24.065 12.8208 24.1667 12.6683 24.1667 12.4999C24.1667 11.8108 24.7275 11.2499 25.4167 11.2499H27.9167C28.6059 11.2499 29.1667 11.8108 29.1667 12.4999V19.1666C29.1667 19.8558 28.6059 20.4166 27.9167 20.4166H24.1667V19.9999C24.1667 19.8558 24.0917 19.7216 23.9684 19.6449C23.8467 19.5716 23.6934 19.5641 23.5634 19.6274L22.73 20.0441C22.6459 20.0858 22.5784 20.1558 22.5384 20.2416L20.0384 25.6583C20.0134 25.7133 20 25.7733 20 25.8333V28.5241C19.8267 28.6199 19.5258 28.7499 19.1667 28.7499C18.71 28.7499 17.5 27.6149 17.5 26.2499C17.5 24.7833 18.2983 22.6691 18.3058 22.6483C18.3541 22.5208 18.3375 22.3766 18.26 22.2633C18.1817 22.1508 18.0533 22.0833 17.9167 22.0833H12.1825C11.4875 22.0833 10.8975 21.5858 10.8392 20.9508C10.795 20.4758 11.0234 20.0241 11.4325 19.7716C11.56 19.6933 11.6358 19.5516 11.63 19.4008C11.6242 19.2499 11.5375 19.1149 11.4042 19.0458C11.0517 18.8666 10.8334 18.5133 10.8334 18.1249C10.8333 17.5991 11.2308 17.1574 11.7575 17.0966Z" fill="#B62B2B"/>
	                           <path d="M23.7503 20.4167C23.9803 20.4167 24.167 20.2301 24.167 20.0001V12.5001C24.167 12.2701 23.9803 12.0834 23.7503 12.0834C23.5203 12.0834 23.3336 12.2701 23.3336 12.5001V20.0001C23.3336 20.2301 23.5203 20.4167 23.7503 20.4167Z" fill="#B62B2B"/>
	                           <rect x="39.5" y="39.5" width="39" height="39" rx="19.5" transform="rotate(-180 39.5 39.5)" stroke="#B62B2B"/>
	                           </svg>
	                        </div>
	                     </div>
	                  </div>
	                  <div class="info__social-col">
	                     <div class="info__social-name">Поделиться статьёй:</div>
	                     <div class="info__social-block">
	                        <script src="https://yastatic.net/share2/share.js"></script>
	                        <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-services="vkontakte,odnoklassniki,telegram,whatsapp"></div>
	                     </div>
	                  </div>
	                  <!-- <div class="info__social-col">
	                     <div class="info__social-name">Мы в Inst</div>
	                     <div class="info__social-block">
	                        <a title="Мы в Inst" href="https://www.instagram.com/mayoly.ru/" class="info__social-inst" target="_blank">
								<span style="display:none;">Мы в Inst</span>
							</a>
	                     </div>
	                  </div> -->
	               </div>
	            </div>
	            <div class="info__item-dzen">
	               <div class="dzen__zag">
	                  <div class="dzen__zag-title">Приглашаем на наш канал в</div>
	                  <img src="/bitrix/templates/chophytolTemplates/images/articles/logo-dzen.svg" class="dzen__zag-logo" alt="Яндекс Дзен" width="224" height="38">
	               </div>
	               <div class="dzen__info">
	                  <?$APPLICATION->IncludeComponent(
	                     "bitrix:main.include",
	                     "",
	                     Array(
	                        "AREA_FILE_SHOW" => "file",
	                        "AREA_FILE_SUFFIX" => "inc",
	                        "EDIT_TEMPLATE" => "",
	                        "PATH" => "/bitrix/templates/probiolog_rf/include/articles/dzen-count.php"
	                     )
	                  );?>
	               </div>
	            </div>
	         </div>
	         <div class="info__item">
	            <div class="info__form info__form-comments-js">
	               <div class="info__form-title">Оставьте свой комментарий:</div>
	               <input type="text" class="info__form-input comments-name" placeholder="Ваше имя">
	               <textarea class="info__form-textarea comments-text" placeholder="Сообщение"></textarea>
	               <div class="button-buy info__form-btn info__form-btn-js" data-id="<?=$arResult['ID']?>">Отправить</div>
	            </div>
	            <div class="info__reviews">
	               <?
	               $arOrder = Array("ID"=>"DESC");
	               $arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PROPERTY_DATE");
	               $arFilter = Array("IBLOCK_ID"=>42, "ACTIVE"=>"Y", "PROPERTY_ID_ARTICLES"=>$arResult['ID']);
	               $res = CIBlockElement::GetList($arOrder, $arFilter, false, Array(), $arSelect);
	               while($ob = $res->GetNextElement()){
	                  $arFields = $ob->GetFields();?>
	                  <div class="info__reviews-item">
	                     <div class="info__reviews-title">
	                        <div class="info__reviews-name"><?=$arFields['NAME']?></div>
	                        <div class="info__reviews-date"><?=$arFields['PROPERTY_DATE_VALUE']?></div>
	                     </div>
	                     <div class="info__reviews-text"><?=$arFields['PREVIEW_TEXT']?></div>
	                  </div>
	               <?}?>
	            </div>
	         </div>
	         <div class="info__item">
	            <div class="info__item-vnimanie">
	               <b>Внимание!</b> Информация, представленная в статье, носит ознакомительный характер. Материалы статьи не призывают к самостоятельному лечению. Только квалифицированный врач может поставить диагноз и дать рекомендации по лечению, исходя из индивидуальных особенностей конкретного пациента.<br>
	               Нашли в тексте ошибку? Выделите её, нажмите <b>Ctrl + Enter</b> и мы всё исправим!
	            </div>
	            <div class="info__item-podpis">
	               <div class="podpis__form">
	                  <input type="text" class="podpis__form-input" placeholder="Ваше E-mail">
	                  <div class="button-buy podpis__form-btn podpis__form-btn-js">Подписаться</div>
	               </div>
	               <div class="checkbox">
	                  <input class="custom-checkbox" type="checkbox" id="agree-1" name="agree-1" value="indigo">
	                  <label for="agree-1">Я согласен с политикой конфиденциальности, политикой обработки данных и получением рекламы</label>
	               </div>
	            </div>
	         </div>
	         <div class="info__item info__item-tags">
	            <?
				#echo '<pre style="display:none;">';print_r($arParams);echo '</pre>';
	            //Собираем массив тегов
	            $massTags = Array();
	            $arOrder1 = Array("ID"=>"ASC");
	            $arSelect1 = Array("ID", "NAME", "TAGS", "DETAIL_PAGE_URL", "CODE");
	            $arFilter1 = Array("IBLOCK_ID"=>35, "ACTIVE"=>"Y", "ID"=>$arResult['ID'], "!TAGS"=>false);
	            $res1 = CIBlockElement::GetList($arOrder1, $arFilter1, false, Array(), $arSelect1);
	            while($ob1 = $res1->GetNextElement()){
	               $arFields1 = $ob1->GetFields();
	               $mass = Array();
	               $mass1 = Array();
	               $mass = explode(',', $arFields1['TAGS']);

	               foreach ($mass as $key => $value) {
	                  $mass1[$key]['NAME'] = $value;
	                  #$linkTags = '/'.$sectionUrl['1'].'/?tags='.trim($value);
					   #$linkTags = $arParams['COMPARE_PATH'] .'?tags='.trim($value);
					   $linkTags = $arParams['COMPARE_PATH'] .'tag/'.urlencode($value).'/';
	                  $mass1[$key]['LINK'] = $linkTags;
	               }

	               $massTags = array_merge($mass1, $massTags);
	               /*echo "<pre>";
	               print_r($arFields1);
	               echo "</pre>";*/
	            }
	               /*echo "<pre>";
	               print_r($massTags);
	               echo "</pre>";*/
	            ?>
	            <?if($massTags){?>
	               <div class="tags__title">Теги:</div>
	               <?foreach($massTags as $resTags){?>
	                  <a href="<?=$resTags['LINK']?>" class="tags__link"><?=$resTags['NAME']?></a>
	               <?}?>
	            <?}?>
	         </div>
	      </div>
	   </div>
	</div>
    <div class="section">
        <p class="text">Факт дня</p>
        <div class="fact fact-slider mt60">
        <?
        $arOrder3 = Array("SORT"=>"ASC");
        $arSelect3 = Array("ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT");
        $arFilter3 = Array("IBLOCK_ID"=>37, "ACTIVE"=>"Y");
        $res3 = CIBlockElement::GetList($arOrder3, $arFilter3, false, Array(), $arSelect3);
        while($ob3 = $res3->GetNextElement()){
            $arFields3 = $ob3->GetFields();?>
            <div>
                <div class="fact__item">
                    <div class="fact__circle">
                        <?=$arFields3['PREVIEW_TEXT']?>
                    </div>
                    <div class="fact__info">
                        <div class="fact__info-text">
                            <?=$arFields3['DETAIL_TEXT']?>
                        </div>
                        <div class="fact__info-nav">
                            <div class="fact__dots"></div>
                            <div class="button-buy fact__info-nav-next fact__info-nav-next-js">Узнать ещё</div>
                        </div>
                    </div>
                </div>
            </div>
        <?}?>
        </div>
		<?/*?>
        <p class="text mt150">Мы в <span class="instagram">Instagram</span> <img alt="Instagram" src="/bitrix/templates/chophytolTemplates/images/articles/instagram.png"></p>
         <?
          $accessToken = "IGQVJWTWxKcHBqOEhCVEpOVlA3VHRuN0pjODB0WUxOcEoxTHZANWkplUVN2NTNUcGgwQnlUanVoTU80TjFCYjN5SVhFZAWZAlNlVSejFuUW1hYkJQemFRc1RPTkwyUVJiVUg3SVpTWTQzTFQ0TmtBenNudgZDZD";
          $url = "https://graph.instagram.com/me/media?fields=id,media_type,media_url,caption,timestamp,thumbnail_url,permalink,top_likers&limit=50&access_token=" . $accessToken;
          $instagramCnct = curl_init(); // инициализация cURL подключения
          curl_setopt($instagramCnct, CURLOPT_URL, $url); // адрес запроса
          curl_setopt($instagramCnct, CURLOPT_RETURNTRANSFER, 1); // просим вернуть результат
          $media = json_decode(curl_exec($instagramCnct)); // получаем и декодируем данные из JSON
          curl_close($instagramCnct); // закрываем соединение

          $instaFeed = array();

          foreach ($media->data as $mediaObj) {
              $text = $mediaObj->caption;
              $pos = strpos($text, '#ПробиоЛог<sup>®</sup>');
              if($pos !== false){
                $instaFeed[$mediaObj->id]['img'] = $mediaObj->thumbnail_url ?: $mediaObj->media_url;
                $instaFeed[$mediaObj->id]['link'] = $mediaObj->permalink;
                
                $text2 = str_replace(array("\r\n", "\r", "\n"), '',  strip_tags($mediaObj->caption));
                $text1 = mb_strimwidth($text2, 0, 130, "...");
                $instaFeed[$mediaObj->id]['caption'] = $text1;
              }
          }
          ?>
          <div id="instafeed"></div>
         <div class="section_box2">
           <div class="section_box2_foto section_box2_foto_slider">
              <?foreach($instaFeed as $key => $instaFeedValue){?>
                <div>
                    <a href="<?=$instaFeedValue['link']?>" class="inst_box" target="_blank">
                        <div class="section_box2_foto1 foto_instagram" style="background-image: url(<?=$instaFeedValue['img']?>)">
                          
                        </div>
                        <p><?=$instaFeedValue['caption']?></p>
                    </a>  
                </div>
              <?}?>
           </div> 
         </div>
		 <?*/?>
		 	 <?$APPLICATION->IncludeComponent(
		   "bitrix:main.include",
		   "",
		   Array(
			   "AREA_FILE_SHOW" => "file",
			   "AREA_FILE_SUFFIX" => "inc",
			   "EDIT_TEMPLATE" => "",
			   "PATH" => SITE_TEMPLATE_PATH."/include/instasuka.php"
		   )
		);?>
         <?
         $massArt = Array();
         $arOrder2 = Array("RAND"=>"ASC");
         $arSelect2 = Array("ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_TEXT");
         $arFilter2 = Array("IBLOCK_ID"=>35, "ACTIVE"=>"Y", "!ID"=>$arResult['ID'], 'IBLOCK_SECTION_ID'=>$arResult['IBLOCK_SECTION_ID']);
         $res2 = CIBlockElement::GetList($arOrder2, $arFilter2, false, Array("nPageSize"=>4), $arSelect2);
         $p = 0;
         while($ob2 = $res2->GetNextElement()){
            $arFields2 = $ob2->GetFields();
            $arProps2 = $ob2->GetProperties();
            $massArt[$p]['DETAIL_PAGE_URL'] = $arFields2['DETAIL_PAGE_URL'];
            $massArt[$p]['NAME'] = $arFields2['NAME'];
            if($arProps2['PUNKT_TEXT']['VALUE']['0']['TEXT']){
                $massArt[$p]['TEXT'] = TruncateText(strip_tags(htmlspecialcharsBack($arProps2['PUNKT_TEXT']['VALUE']['0']['TEXT'])), 100);
            }else{
                $massArt[$p]['TEXT'] = TruncateText(strip_tags($arFields2['DETAIL_TEXT']), 100);
            }
            $p++;
         ?>
        <?}?>
        <?if($p != 0){?>
             <p class="text mt150">Это интересно</p>
             <div class="section_box3">
                 <?
                 foreach ($massArt as $key => $arArt) {?>
                     <a href="<?=$arArt['DETAIL_PAGE_URL']?>" class="section_box3_article">
                        
                        <h3><?=$arArt['NAME']?></h3>
                        <p><?=$arArt['TEXT']?></p>
                     </a>
                 <?}?>
             </div>
        <?} else {?>
            <p class="text mt150"></p>
        <?}?>
    </div>
</div>
<div class="row section">
   <div class="protivopokaz mt130">
      Имеются противопоказания. Перед применением необходимо проконсультироваться со специалистом
   </div>
</div>
<?/*
<div class="row section">
   <div class="flex istochnik flex-column drop-bg mt130 mb130">
      <?if(!empty($arResult["PROPERTIES"]["SOURCES"]["VALUE"])){?>
        <div class="mb-b08__drop-title flex flex-v-center flex-justify istochnik__click-js">
           <div class="text-middle istochnik__title blue">
              Источники информации
           </div>
           <div class="text-small drop-icon">
              Развернуть
           </div>
        </div>
        <div class="mb-b08__drop">
           <div class="mb-b08__drop-wrap flex flex-column">
              <? foreach ($arResult["PROPERTIES"]["SOURCES"]["VALUE"] as $key => $value): ?>
                    <p class="accordion__content"><? print_r($value); ?></p>
                <? endforeach; ?>
              <?$APPLICATION->IncludeComponent(
                   "bitrix:main.include",
                   "",
                   Array(
                       "AREA_FILE_SHOW" => "file",
                       "AREA_FILE_SUFFIX" => "inc",
                       "EDIT_TEMPLATE" => "",
                       "PATH" => SITE_TEMPLATE_PATH . "/include/source/fact-day.php"
                   )
               );?>
           </div>
        </div>
      <?}?>
   </div>
</div>
*/?>
<?if(!empty($arResult["PROPERTIES"]["SOURCES_NEW"]["VALUE"])){?>

	<div class="info mt130 mb130">
		<div class="container">
			<button class="accordion accordion1">Источники информации<span class="accordion__right">Развернуть</span></button>
			<div class="panel">
					<?/* foreach ($arResult["PROPERTIES"]["SOURCES"]["VALUE"] as $key => $value): ?>
						<p class="accordion__content"><? print_r($value); ?></p>
					<? endforeach; */
					#echo '<pre style="display:none;">';print_r($arResult["PROPERTIES"]["SOURCES_NEW"]);echo '</pre>';
					?>
					 <?=$arResult["PROPERTIES"]["SOURCES_NEW"]["~VALUE"]['TEXT']?>
					 <?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_TEMPLATE_PATH . "/include/source/fact-day.php"
						)
					);?>

			   
			</div>
			<div class="info__consult">БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ</div>  
		</div>
	</div>

<?}?>

<div id="modal_form"><!-- Сaмo oкнo --> 
      <span id="modal_close">X</span> <!-- Кнoпкa зaкрыть --> 
      <!-- Тут любoе сoдержимoе -->
     <div id='content_modal_error'>
     <h2 class="form-error-title">Опишите, пожалуйста, ошибку</h2>
     
     <form name='from_error' id='from_error'>
     <textarea id='modal_form_text' maxlength="500">
     </textarea>
     <br>
     <input type='submit' value='Отправить' class='button13 button-buy' name='sub_from_error' style='margin-left:260px;'>
     </form>
     </div>
</div>
<div id="overlay"></div>
<script>
    window.onload = () => {
        ym(90584818,'reachGoal','read_article');
        ga('send', 'event', 'probiolog', 'read_article');
    }
    document.querySelectorAll('.section_article_2').forEach(function(el) {
        if(el.querySelector('.section_article_3_text')){
            el.classList.add('section_article_3');
            el.classList.remove('section_article_2');
        }
    });
</script>