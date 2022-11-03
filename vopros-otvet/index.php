<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Преимущества Пробиолог – пробиотики для микрофлоры кишечника. Лактобактерии, СРК, дисбактериоз");
$APPLICATION->SetTitle("Ответы на частые вопросы о Пробиолог");
?>
<div class="question">
    <div class="container">
        <div class="bread-items" itemscope itemtype="http://schema.org/BreadcrumbList">
            <div class="bread-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="/" itemprop="item">
                    <span itemprop="name">Главная</span>
                </a>
                <meta itemprop="position" content="1" />
            </div>
            <div class="bread-item">&#62;</div>
            <div class="bread-item bread-item-select" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="/vopros-otvet/" itemprop="item">
                    <span itemprop="name">Вопрос-ответ</span>
                </a>
                <meta itemprop="position" content="2" />
            </div>
        </div>
        <div class="title">Вопрос &mdash; ответ</div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "vopros-otvet",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
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
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "40",
                "IBLOCK_TYPE" => "pr_rf",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "20",
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
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N"
            )
        );?>
        
        <a href="#" data-modal="consultation" class="button button-advice">Задать свой вопрос</a>
        <button class="accordion accordion1 accordionqt" style="margin-top: 87px;">Источники информации<span class="accordion__right">Развернуть</span></button>
                <div class="panel">
                    <p class="accordion__content">
                         <?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/bitrix/templates/probiolog_rf/include/vopros-otvet.php"
							)
						);?>
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
                    </p>
                </div>
        
        <div class="question__info">БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ</div>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
