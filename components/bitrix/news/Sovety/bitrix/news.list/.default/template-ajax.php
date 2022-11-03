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

<div class="advice">
    <div class="container">
        <div class="title">Полезные советы</div>
        <div class="advice__wrapper">
    <?foreach($arResult["ITEMS"] as $arItem):?>

            <div class="advice-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <img class="advice__img" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"/>
                <div class="advice__down">
                    <div class="advice-item__descr">
                        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                            <?echo $arItem["PREVIEW_TEXT"];?>
                        <?endif;?>
                    </div>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="advice-item__icon">
                        <img src="/bitrix/templates/probiolog/icons/arrov-circle.svg" alt="переход">
                    </a>
                </div>

            </div>

    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
        </div>
        <button class="accordion">Источники информации
            <span class="accordion__right">Развернуть</span></button>
        <div class="panel">
            <p class="accordion__content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis maiores deserunt aperiam autem in quibusdam dolores doloribus aliquid corporis alias possimus tempora vero incidunt quasi, laboriosam eveniet expedita ipsum repudiandae?</p>
        </div>
        <div class="info__consult">БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ</div>
    </div>
</div>



<!-- TEST TABS -->


<div class="tab-menu-flex t-2">
    <ul class="tab-menu">

        <?
        $i=0;
        // выборка только активных разделов из инфоблока $IBLOCK_ID, в которых есть элементы
        // со значением свойства SRC, начинающееся с https://
        $arFilter = Array('IBLOCK_ID'=>35, 'GLOBAL_ACTIVE'=>'Y', 'SORT'=>'ASC');
        $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
        while($ar_result = $db_list->GetNext()){?>
            <li class="tab-menu__li <?if ($i == 0){?>active<?}?>">
                <a href="#" class="tab-menu__a a-not-border" onclick="filterBySection(this,'<?echo $ar_result["ID"]?>');"> <?echo $ar_result["NAME"]?>
                </a>
            </li>
            <?$i++;}?>
    </ul>
</div>
<div class="js--news-block">
    <?
    global $arrFilter;
    $arrFilter=array("SECTION_ID"=> 12);
    ?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "",
        Array(
            "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
            "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
            "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
            "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
            "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
            "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
            "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
            "META_KEYWORDS" => $arParams["META_KEYWORDS"],
            "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
            "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
            "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
            "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
            "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
            "SET_TITLE" => $arParams["SET_TITLE"],
            "MESSAGE_404" => $arParams["MESSAGE_404"],
            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
            "SHOW_404" => $arParams["SHOW_404"],
            "FILE_404" => $arParams["FILE_404"],
            "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
            "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
            "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
            "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
            "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
            "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
            "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
            "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
            "CHECK_DATES" => $arParams["CHECK_DATES"],
            "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
            "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
            "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
            "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
            "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
            "USE_SHARE" => $arParams["USE_SHARE"],
            "SHARE_HIDE" => $arParams["SHARE_HIDE"],
            "SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
            "SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
            "SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
            "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
            "ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
            'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),
        ),
        $component
    );?>

</div>

<script>
    function filterBySection(e,id) {
        event.preventDefault();
        $('.tab-menu__li').removeClass('active');
        console.log(e);
        $(e).parent().addClass('active');
        $.ajax({
            type:"POST",
            url:"/bitrix/templates/probiolog/filter_by_section_buyers.php",
            data: {
                "id": id,
            },
            success:function(response){
                console.log(response)
                $('.js--news-block').html(response);
            }
        });

    }
</script>
