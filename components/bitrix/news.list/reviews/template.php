<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<div class="reviews-slider swiper-container">
    <div class="swiper-wrapper">

        <? foreach ($arResult["ITEMS"] as $arItem): ?>

            <div class="reviews-slide swiper-slide">
                <? /* <div class="reviews-slide-photo<? if (!$arItem["PREVIEW_PICTURE"]["SRC"]) echo ' no-photo'; ?>">
                    <? if ($arItem["PREVIEW_PICTURE"]["SRC"]) { ?>
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>" class="reviews-slide-photo__image">
                    <? } else { ?>
                        <div class="reviews-slide-photo__text">Нет фото</div>
                    <? } ?>
                </div> */ ?>
                <div class="reviews-slide-info">
                    <div class="reviews-slide-info__name"><?= $arItem["NAME"] ?></div>
                    <? if ($arItem["PROPERTIES"]["SUBTITLE"]["VALUE"]): ?>
                        <div class="reviews-slide-info__subtitle"><?= $arItem["PROPERTIES"]["SUBTITLE"]["VALUE"] ?></div>
                    <? endif; ?>
                    <div class="reviews-slide-info__text">
                        <?= $arItem["PREVIEW_TEXT"] ?>
                    </div>
                    <? if ($arItem["PROPERTIES"]["SOURCE"]["VALUE"]): ?>
                        <div class="reviews-slide-info__source">Источник: <a class="js-lazy-url" href="/" data-href="<?= $arItem["PROPERTIES"]["SOURCE"]["VALUE"] ?>" target="_blank"><?= $arItem["PROPERTIES"]["SOURCE"]["VALUE"] ?></a></div>
                    <? endif; ?>
                </div>
            </div>

        <? endforeach; ?>

    </div>
</div>
<div class="reviews-bottom">
    <div class="reviews-bottom-arrow reviews-bottom__prev">
        <svg width="14" height="21" viewBox="0 0 14 21" fill="none">
            <path d="M1.171 10.1212L11.0746 1.15828C11.3078 0.947242 11.6818 0.947242 11.915 1.15828C12.1481 1.36931 12.1481 1.70776 11.915 1.91879L2.4337 10.4995L11.915 19.0802C12.1481 19.2912 12.1481 19.6297 11.915 19.8407C11.8006 19.9443 11.6466 20 11.497 20C11.3474 20 11.1934 19.9482 11.079 19.8407L1.1754 10.8778C0.942216 10.6707 0.942217 10.3283 1.171 10.1212Z" stroke-width="2"/>
        </svg>
    </div>
    <div class="reviews-bottom__pagination swiper-pagination"></div>
    <div class="reviews-bottom-arrow reviews-bottom__next">
        <svg width="14" height="21" viewBox="0 0 13 21" fill="none">
            <path d="M11.8303 10.1212L2.00699 1.15828C1.7757 0.947242 1.40476 0.947242 1.17347 1.15828C0.942177 1.36931 0.942177 1.70776 1.17347 1.91879L10.5779 10.4995L1.17347 19.0802C0.942177 19.2912 0.942177 19.6297 1.17347 19.8407C1.28693 19.9443 1.43967 20 1.58805 20C1.73642 20 1.88916 19.9482 2.00263 19.8407L11.826 10.8778C12.0573 10.6707 12.0573 10.3283 11.8303 10.1212Z" stroke-width="2"/>
        </svg>
    </div>
</div>