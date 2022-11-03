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

<? if ($arResult["NavPageCount"] > 1) {
    if ($arResult["NavPageNomer"] + 1 <= $arResult["nEndPage"]) {
        $plus = $arResult["NavPageNomer"] + 1;
        $url = $arResult["sUrlPathParams"] . "PAGEN_1=" . $plus ?>
        <div class="advice-load js-pagination-load" data-url="<?= $url ?>" onclick="loadNextPage(this)">
            Ещё статьи
            <svg class="advice-load__svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
                <path d="M14.6231 1.40473L14.6229 1.40495L8.49964 7.20577L2.37715 1.40499C2.37715 1.40499 2.37715 1.40499 2.37714 1.40499C1.99138 1.03948 1.3809 1.05478 1.01431 1.44248C0.648038 1.82912 0.66443 2.43944 1.05109 2.80582L1.05111 2.80583L7.83692 9.23449C8.02211 9.41008 8.26148 9.4988 8.49963 9.4988C8.73751 9.4988 8.97762 9.41026 9.16301 9.23456C9.16303 9.23454 9.16305 9.23453 9.16306 9.23451L15.9489 2.80583L15.9489 2.80581C16.3355 2.43944 16.352 1.82925 15.9858 1.44257C15.6194 1.05423 15.0083 1.04072 14.6231 1.40473Z" stroke-width="0.5"/>
            </svg>
        </div>
    <? } ?>
<? } ?>
