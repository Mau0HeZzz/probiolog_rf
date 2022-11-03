<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>


<div class="advice-item">
    <a href="<?= $item["DETAIL_PAGE_URL"] ?>">
        <span style="display: none"><?= $item["NAME"] ?></span>
        <img loading="lazy" class="advice__img" src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $item["NAME"] ?>">
    </a>
    <div class="advice__down">
        <div class="advice-item__caption"><?= $item["NAME"] ?></div>
        <? if ($item["PREVIEW_TEXT"]): ?>
            <div class="advice-item__descr">
                <? echo $item["PREVIEW_TEXT"]; ?>
            </div>
        <? endif; ?>
        <a href="<?= $item["DETAIL_PAGE_URL"] ?>" class="advice-item__more">
            Читать статью
            <svg class="advice-item__more-svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                <path d="M11 11L1 1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.66602 11H10.9993V2.66663" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
</div>