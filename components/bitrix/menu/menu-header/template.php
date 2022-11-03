<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="menu">
<?
$i=1;
?>
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
		continue;
?>
	<? if ($arItem["SELECTED"]): ?>
    <li class="menu_item"><a href="<?=$arItem["LINK"]?>" class="menu_link menu_link<?echo $i?>" <?
        if ($arItem["LINK"] == '/probiolog-instruktsiya/') { ?>
            onclick="ym(90584818,'reachGoal','instruction'); ga('send', 'event', 'probiolog', 'instruction');"
        <? } elseif ($arItem["LINK"] == '/probiolog-gde-kupit/') { ?>
            onclick="ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');"
        <? } ?>><?=$arItem["TEXT"]?></a></li>
	<? else: ?>
		<li class="menu_item"><a href="<?=$arItem["LINK"]?>" class="menu_link menu_link<?echo $i?><? if ($arItem["LINK"] == '/probiolog-gde-kupit/') echo ' button-buy'; ?>" <?
            if ($arItem["LINK"] == '/probiolog-instruktsiya/') { ?>
                onclick="ym(90584818,'reachGoal','instruction'); ga('send', 'event', 'probiolog', 'instruction');"
            <? } elseif ($arItem["LINK"] == '/probiolog-gde-kupit/') { ?>
                onclick="ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');"
            <? } ?>><?=$arItem["TEXT"]?></a></li>
	<? endif ?>

	<? $i++; ?>

<?endforeach?>

</ul>
<?endif?>


<div class="dropdown-menu_item">
    <ul>
        <li><a href="/probiolog/">ПробиоЛог<sup>®</sup></a></li>
        <li><a href="/probiolog-forte/">ПробиоЛог<sup>®</sup>&nbsp;форте</a></li>
        <li><a href="/probiolog-srk/">ПробиоЛог<sup>®</sup>&nbsp;СРК</a></li>
    </ul>
</div>
