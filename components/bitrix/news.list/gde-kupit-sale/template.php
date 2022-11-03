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
    <div class="buy__items top-sale" >
        <? foreach($arResult["ITEMS"] as $arItem): ?>
            <? if($arItem["PROPERTIES"]['SIZE_DISCOUNT']['VALUE'] || $arItem['PROPERTIES']['TEXT_FOR_DISC']['VALUE']): ?>
                <?
                $iblock = 14;
                $section = $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]["VALUE"]['0'];

                $arOrder = array('sort'=>'asc');
                $arSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*", "PREVIEW_PICTURE");
                $arFilter = array("IBLOCK_ID" => $iblock, "SECTION_ID" => $section);
                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

                $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]['ITEMS'] = [];
                $i = 0;

                while ($ob = $res->GetNextElement()) {
                    $arFields = $ob->GetFields();
                    $arProps = $ob->GetProperties();

                    $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]['ITEMS'][$i]['NAME'] = $arFields['NAME'];
                    $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]['ITEMS'][$i]['PICTURE'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
                    $arItem["PROPERTIES"]["DRUGS_FOR_PHARMACY"]['ITEMS'][$i]['PROPS'] = $arProps;

                    $i++;
                }
                ?>

                <div class="buy__itemm-new bin1">
                    <?/*
                    //Старая версия баннера скидки
                     if($arItem['PROPERTIES']['SIZE_DISCOUNT']['VALUE'] || $arItem['PROPERTIES']['TEXT_FOR_DISC']['VALUE']): ?>
                        <div class="buy__itemm-new-event">
                            <div class="buy__itemm-new-event-medium">
                                <?=$arItem['PROPERTIES']['TEXT_FOR_DISC']['VALUE']?>
                            </div>
                            <? if($arItem['PROPERTIES']['SIZE_DISCOUNT']['VALUE']): ?>
                                <div class="buy__itemm-new-event-xl">
                                    <?= $arItem['PROPERTIES']['SIZE_DISCOUNT']['VALUE']?>
                                </div>
                            <? endif; ?>
                            <? if(!empty($arItem['PROPERTIES']['DESCR_FOR_DISC']['VALUE'])): ?>
                                <div class="buy__itemm-new-event-small">
                                    <?= $arItem['PROPERTIES']['DESCR_FOR_DISC']['~VALUE']?>
                                </div>
                            <? endif; ?>
                            <?if($arItem['ID'] == 104):?>
                                <img src="/bitrix/templates/probiolog/img/apteka-ru-sale-img.png" class="buy__itemm-new-event-img" alt="apteka" width="115" height="87">
                            <? endif; ?>
                        </div>
                    <? endif;*/ ?>
                    <?
                    //Новая версия баннера скидки
                     if($arItem['PROPERTIES']['SIZE_DISCOUNT']['VALUE'] || $arItem['PROPERTIES']['TEXT_FOR_DISC']['VALUE']): ?>
                        <div class="buy__itemm-new-event new-banner-sale">
                            <? if($arItem['PROPERTIES']['SIZE_DISCOUNT']['VALUE']): ?>
                                <div class="buy__itemm-new-event-xl">
                                    <?= $arItem['PROPERTIES']['SIZE_DISCOUNT']['VALUE']?>
                                </div>
                            <? endif; ?>
                            <div class="buy__itemm-new-event-medium">
                                <?=$arItem['PROPERTIES']['TEXT_FOR_DISC']['VALUE']?>
                            </div>
                            <? if(!empty($arItem['PROPERTIES']['DESCR_FOR_DISC']['VALUE'])): ?>
                                <div class="buy__itemm-new-event-small">
                                    <?= $arItem['PROPERTIES']['DESCR_FOR_DISC']['~VALUE']?>
                                </div>
                            <? endif; ?>
                        </div>
                    <? endif; ?>
                    <a class="buy__itemm" href="javascript:void(0);" target="_blank"> </a>
                    <div class="buy-mini-items">
                        <a class="buy__itemm" href="javascript:void(0);" target="_blank"> </a>

                        <? foreach ($arItem['PROPERTIES']['DRUGS_FOR_PHARMACY']['ITEMS'] as $drug): ?>

                            <div class="buy-mini-item">

                                <a href="/" rel="nofollow" data-href="<?= $drug['PROPS']['LINK_FOR_PAY']['VALUE']?>" target="_blank" class="buy-mini-item-a js-lazy-url <?= $arItem['PROPERTIES']['CLASS_FOR_METRICS']['VALUE'] ?>" onclick="ym(90584818,'reachGoal','aptsale');">
                                    <img alt="img" src="<?= $drug['PICTURE']?>" class="buy-mini-item-img buy-mini-item-imgs">
                                    <p class="
                                    <? if($drug['PROPS']['COLOR_FOR_ARR']['VALUE_XML_ID'] == 'green'): ?>
                                        buy-mini-item-p
                                    <? endif; ?>
                                    <? if ($drug['PROPS']['COLOR_FOR_ARR']['VALUE_XML_ID'] == 'red'): ?>
                                        buy-mini-item-pf
                                    <? endif; ?>
                                    <? if ($drug['PROPS']['COLOR_FOR_ARR']['VALUE_XML_ID'] == 'orange'): ?>
                                        buy-mini-item-ps
                                    <? endif; ?>
                                    ">
                                        <?= $drug['NAME']?>
                                    </p>

                                    <? if($drug['PROPS']['COLOR_FOR_ARR']['VALUE_XML_ID'] == 'green'): ?>
                                        <img alt="img" src="/bitrix/templates/probiolog/img/Vectormini.svg" class="buy-mini-item-vector">
                                    <? endif; ?>
                                    <? if ($drug['PROPS']['COLOR_FOR_ARR']['VALUE_XML_ID'] == 'red'): ?>
                                        <img alt="img" src="/bitrix/templates/probiolog/img/Vectorminif.svg" class="buy-mini-item-vector">
                                    <? endif; ?>
                                    <? if ($drug['PROPS']['COLOR_FOR_ARR']['VALUE_XML_ID'] == 'orange'): ?>
                                        <img alt="img" src="/bitrix/templates/probiolog/img/Vectorminis.svg" class="buy-mini-item-vector">
                                    <? endif; ?>

                                    <? if($drug['PROPS']['VISIBLE_BUTTON']['VALUE'] == 'Да'): ?>
                                        <div  class="buy-mini-item-event">
                                            купить по акции
                                        </div>
                                    <? endif; ?>

                                </a>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?= $arItem['PREVIEW_PICTURE']['ALT']?>" class="buy__img">
                </div>
            <? endif; ?>
        <? endforeach; ?>
    </div>
