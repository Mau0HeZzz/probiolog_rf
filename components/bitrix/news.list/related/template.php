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

<? if (count($arResult["ITEMS"]) > 0): ?>
<div class="related">
    <div class="related-caption">Читайте также</div>
    <div class="related-block">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>

            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="related-block-item">
                <div class="related-block-item__image">
                    <img loading="lazy" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>">
                </div>
                <div class="related-block-item__caption"><?= $arItem['NAME'] ?></div>
            </a>

        <? endforeach; ?>
    </div>
</div>
<? endif; ?>