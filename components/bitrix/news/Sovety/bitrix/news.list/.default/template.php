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

        <div class="bread-items">
            <div class="bread-item"><a href="/">Главная</a></div>
            <div class="bread-item">&#62;</div>
            <div class="bread-item bread-item-select"><a href="/poleznye-sovety">Полезные советы</a></div>
        </div>

        <div class="title">Полезные советы</div>
        <div class="advice-category">
            <a href="/poleznye-sovety/" class="advice-category__item<? if (!$_REQUEST['category']) echo ' selected'; ?>">Все</a>
            <? foreach ($arResult["SECTIONS"] as $section): ?>
                <a href="/poleznye-sovety/?category=<?= $section['CODE'] ?>" class="advice-category__item<? if ($_REQUEST['category'] === $section['CODE']) echo ' selected'; ?>"><?= $section['NAME'] ?></a>
            <? endforeach; ?>
        </div>
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
        <button class="accordion accordion1">Источники информации
            <span class="accordion__right">Развернуть</span></button>
        <div class="panel">
            <p class="accordion__content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis maiores deserunt aperiam autem in quibusdam dolores doloribus aliquid corporis alias possimus tempora vero incidunt quasi, laboriosam eveniet expedita ipsum repudiandae?</p>
        </div>
        <div class="info__consult">БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ</div>
    </div>
</div>


