<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
    return "";

$strReturn = '';

$strReturn .= '<div class="bread-items" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
        $strReturn .= '<div class="bread-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="'.$arResult[$index]["LINK"].'" itemprop="item"><span itemprop="name">'.$title.'</span></a>
            <meta itemprop="position" content="'.($index + 1).'">
        </div>
        <div class="bread-item">&gt;</div>';
    } else {
        $strReturn .= '<div class="bread-item bread-item-select" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">'.$title.'</span></div>';
    }
}

$strReturn .= '</div>';

return $strReturn;