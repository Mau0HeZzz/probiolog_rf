<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="footer__wrapper-left">
<?
$i=1;
?>
<?
#echo '<pre style="display:none;">';print_r($arResult);echo '</pre>';
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
		continue;

	if ($arItem["TEXT"] == '')
		continue;
?>
	<? if ($arItem["SELECTED"]): ?>
		<a href="<?=$arItem["LINK"]?>" class="menu_foot<?echo $i?>" <?
            if ($arItem["LINK"] == '/probiolog-instruktsiya/') { ?>
                onclick="ym(90584818,'reachGoal','instruction'); ga('send', 'event', 'probiolog', 'instruction');"
            <? } elseif ($arItem["LINK"] == '/probiolog-gde-kupit/') { ?>
                onclick="ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');"
            <? } ?>><?=$arItem["TEXT"]?></a>
	<? else: ?>
		<a href="<?=$arItem["LINK"]?>" class="menu_foot<?echo $i?><? if ($arItem["LINK"] == '/probiolog-gde-kupit/') echo ' button-buy'; ?>" 
			<? if ($arItem["LINK"] == '/probiolog-instruktsiya/') { ?>
                onclick="ym(90584818,'reachGoal','instruction'); ga('send', 'event', 'probiolog', 'instruction');"
            <? } elseif ($arItem["LINK"] == '/probiolog-gde-kupit/') { ?>
                onclick="ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');" style="display:none;"
            <? } ?>><?=$arItem["TEXT"]?></a>
	<? endif; ?>
	<?$i++;?>
<? endforeach; ?>

</div>
<? endif; ?>