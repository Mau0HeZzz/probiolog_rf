<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? /*$APPLICATION->IncludeComponent(
    "olegpro:olegpro.csscompiler",
    "olegpro",
    array(
        "PATH" => "/bitrix/templates/probiolog_rf/scss/", // Путь к папке с файлами, которые нужно компилировать
        "FILES" => array( // Список файлов для&nbsp;компиляции
            0 => "style.scss",
        ),
        "PATH_CSS" => "/bitrix/templates/probiolog_rf/", // Путь к папке, куда складывать скомпилированный css
        "CLASS_HANDLER" => "\\Olegpro\\Csscompiler\\SCSSCompiler", // PHP класс-обработчик, наследуемый от класса \Olegpro\Csscompiler\Compiler(должен реализовывать метод toCss)
        "USE_SETADDITIONALCSS" => "Y", // Подключать скомпилированный css файл через CMain::SetAdditionalCSS()?
        "REMOVE_OLD_CSS_FILES" => "Y", // Удалять старые скомпилированные css файлы?
        "TARGET_FILE_MASK" => "main_%s.css" // Маска файла для&nbsp;записи css файла. (%s обязателен, он заменится на таймштамп файла)
    ),
    false,
    array(
        "HIDE_ICONS" => "Y"
    )
);*/ ?>
<? $curPage = $APPLICATION->GetCurPage(true); ?>
<!DOCTYPE html>
<html lang="ru" prefix="og: https://ogp.me/ns#">
<head>
	<? if(isset($_GET) && count($_GET)>0) { ?>
		<meta name="robots" content="noindex,nofollow">
	<? } ?>
    <? if ($USER->IsAdmin()) $APPLICATION->ShowHeadStrings(); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <? $APPLICATION->ShowMeta('description'); ?>
    <? if ($APPLICATION->ShowMeta('keywords')) { ?>
        <meta name="keywords" content="<? $APPLICATION->ShowMeta('keywords'); ?>">
    <? } ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=yes">

    <meta property="og:title" content='<? $APPLICATION->ShowTitle() ?>' />
    <meta property="og:image" content="<?= SITE_TEMPLATE_PATH ?>/images/logo.svg" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<? $APPLICATION->ShowTitle() ?>" />
    <meta property="og:url" content="https://<?=$_SERVER['HTTP_HOST']?><?=$curPage?>" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?$APPLICATION->ShowTitle()?>">
    <meta name="twitter:image" content="https://probiolog.ru/bitrix/templates/probiolog_rf/icons/head-logo.svg">
    <meta name="twitter:url" content="https://<?=$_SERVER['HTTP_HOST']?><?=$uri_parts[0]?>">

    <!-- <meta name="facebook-domain-verification" content="zs8j1wam3vad7kkrb6ku7nzcenh7ij" /> -->

    <link rel="icon" href="/favicon.svg" type="image/svg">

    <? $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2); ?>
	<!--
    <link rel="canonical" href="https://<?=$_SERVER['HTTP_HOST']?><?= $uri_parts[0] ?>" />
-->

	 <link rel="canonical" href="<?=(($APPLICATION->IsHTTPS() ? 'https://' : 'http://').SITE_SERVER_NAME . explode("?", $_SERVER['REQUEST_URI'])[0]);?>" />
	<?
	    $APPLICATION->ShowCSS();

        use Bitrix\Main\Page\Asset;

        // Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/mystyle.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/animations.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/common.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/swiper.css");
        if($APPLICATION->GetCurPage() == '/'): 
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/home.css");
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/reviews.css");
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/freshnews.css");
        elseif($APPLICATION->GetCurPage() == '/chto-takoe-srk/'): 
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/chtotakoesrk.css");
        elseif($APPLICATION->GetCurPage() == '/kviz/'): 
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/kviz.css");
        elseif($APPLICATION->GetCurPage() == '/poleznye-sovety/'): 
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/poleznyesovety.css");
        elseif($APPLICATION->GetCurPage() == '/probiolog/' or $APPLICATION->GetCurPage() == '/probiolog-forte/'): 
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/product.css");
        elseif($APPLICATION->GetCurPage() == '/probiolog-srk/'): 
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/product.css");
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/decomposition/chtotakoesrk.css");
        endif;
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/articles-new.css");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery-3.5.1.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/myscript.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/blazy.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.maskedinput.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/animation.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/forms.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/script.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/metrika.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.activity.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/event.js");
	?>
</head>

<?
// Класс для&nbsp;тега nav
$navClass = '';
if($APPLICATION->GetCurPage() == '/'):
    $navClass = 'desctop-menu';
elseif($APPLICATION->GetCurPage() == '/probiolog-forte/'):
    $navClass = 'nav-forte';
elseif($APPLICATION->GetCurPage() == '/probiolog-srk/'):
    $navClass = 'nav-srk';
elseif($APPLICATION->GetCurPage() == '/probiolog/'):
    $navClass = 'nav-probiolog';
else:
    $navClass = 'nav';
endif;
?>

<body class="body-wrap flex flex-column">

    <div id="panel">
        <?$APPLICATION->ShowPanel();?>
    </div>

<?
$flDiv = false;
?>

<?if($APPLICATION->GetCurPage() == '/'):?>
<div class="promo" id="up">
<?$flDiv = true;?>
<?endif;?>
<?if($APPLICATION->GetCurPage() == '/politika-konfidentsialnosti/'):?>
<div class="confid"> 
    <?$flDiv = true;?>
<?endif;?>
<?if($APPLICATION->GetCurPage() == '/probiolog-forte/'):?>
<div class="forte"> 
    <?$flDiv = true;?>
<?endif;?>
<?if($APPLICATION->GetCurPage() == '/probiolog-srk/'):?>
<div class="srk"> 
    <?$flDiv = true;?>
<?endif;?>
<?if($APPLICATION->GetCurPage() == '/probiolog/'):?>
<div class="probiolog"> 
    <?$flDiv = true;?>
<?endif;?>

<?
$headerClass = '';
if(($APPLICATION->GetCurPage() != '/') && ($APPLICATION->GetCurPage() != '/politika-konfidentsialnosti/') && ($APPLICATION->GetCurPage() != '/probiolog-forte/') && ($APPLICATION->GetCurPage() != '/probiolog-srk/') && ($APPLICATION->GetCurPage() != '/probiolog/')):
    $headerClass = 'header-min';
endif;
?>

<? $pngToWebp = (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) ? 'webp' : 'png'; ?>

    <header id="up" class="header <?=$headerClass?>">
               
        <nav class="<?=$navClass?>">
            <div class="container">
                <div class="navigation">
                    <a href="/" class="header__logo">
                        <img src="/bitrix/templates/probiolog_rf/icons/head-logo.svg" alt="логотип">
                    </a>

                    <a href="/probiolog-gde-kupit/" class="where-buy header-where-buy" onclick="ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');">Где купить</a>

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "menu-header",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "N"
                        )
                    );?>
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <? if($APPLICATION->GetCurPage() == '/' || $APPLICATION->GetCurPage() == '/tenprc/' || $APPLICATION->GetCurPage() == '/thirdprc/'): ?>
    <!-- <div class="container">
        <div class="slider">
            <div class="button__wrapper">
                <button class="main-slider-btn main-prev-btn">
                    <img class="b-lazy" src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/icons/right-arrow.svg" alt="left">
                </button>
                <button class="main-slider-btn main-next-btn">
                    <img class="b-lazy" src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/icons/left-arrow.svg" alt="right">
                </button>
            </div>
            
            <div class="slider-item">
                <div class="slider__left">
                    <div class="slider__left-up">
                        <div class="title__main">Когда кишечник занемог, прими скорей ПробиоЛог<sup>®</sup>!<sup class="title__main-sup" style="display:none;">7, 8, 9</sup></div>
                        <hr class="slider__line">
                        <ul>
                            <li>Восстанавливает микрофлору кишечника</li>
                            <li>Способствует уменьшению диареи<sup>1</sup></li>
                            <li>Улучшает самочувствие и качество жизни<sup>2</sup></li>
                        </ul>
                    </div>
                    <a href="/#products" class="button button-left">Подробнее</a>
                </div>
                <div class="slider__right slider__right-first">
                    <? $pngToWebp = (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) ? 'webp' : 'png'; ?>
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="<?= SITE_TEMPLATE_PATH ?>/img/boxes/main-slide2022-new.<?=$pngToWebp?>"  data-src-small="<?= SITE_TEMPLATE_PATH ?>/img/boxes/main-slide-small2022-new.<?= $pngToWebp ?>" alt="первый слайд" class="slider__img slider__img-main slider__img-main-mob b-lazy" style="">
                </div>
                <span class="absoluteText">ТЕПЕРЬ В НОВЫХ УПАКОВКАХ!</span>
                
                <div class="slider-stamp slider-stamp-main"><img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/icons/stamp2021.svg" alt="печать" class="slider__img-stamp b-lazy"></div>
            </div>
            <div class="slider-item">
                
                <div class="slider__left">
                    <div class="slider__left-up">
                        <div class="title__main">ПробиоЛог<sup>®</sup>&nbsp;СРК</div>
                        <hr class="slider__line">
                        <div class="slider__descr">Специальный пробиотик, разработанный для&nbsp;хронических расстройств ЖКТ<sup>2</sup></div>
                        <ul>
                            <li>При синдроме раздраженного кишечника</li>
                            <li>При кишечных последствиях вирусной инфекции</li>
                        </ul>
                    </div>
                    <div class="slider__descr-border">Штаммы включены в&nbsp;рекомендации гастроэнтерологов при&nbsp;СРК и&nbsp;в&nbsp;пандемию Covid-19<sup>4,5,6</sup></div>
                    <a href="/probiolog-srk/" class="button button-left">Подробнее</a>
                </div>
                <div class="slider__right slider__right-srk">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/boxes/four-slide2022.png" alt="четвертый слайд" class="slider__img b-lazy">
                </div>
                <div class="slider-stamp slider-stamp_four">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/icons/stamp-bestseller2021.svg" alt="печать" class="slider__img-stamp b-lazy">
                </div>
            </div>
            <div class="slider-item">
                <div class="slider__left">
                    <div class="slider__left-up">
                        <div class="title__main">ПробиоЛог<sup>®</sup>&nbsp;Форте</div>
                        <hr class="slider__line">
                        <div class="slider__descr">Двойная концентрация для&nbsp;интенсивного восстановления в&nbsp;сложных ситуациях</div>
                        <ul>
                            <li>Во время приема антибиотиков</li>
                            <li>При различных инфекциях</li>
                        </ul>
                    </div>
                    <a href="/probiolog-forte/" class="button button-left">Подробнее</a>
                </div>
                <div class="slider__right">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/boxes/third-slide2022.png" alt="третий слайд" class="slider__img b-lazy">
                </div>
                <div class="slider__third-down"><img class="b-lazy" src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/icons/third-slide-down2021.svg" alt="млрд кое"></div>
                <div class="slider-stamp slider-stamp_third"><img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/icons/stamp2021.svg" alt="печать" class="slider__img-stamp b-lazy"></div>
            </div>
            <div class="slider-item">
                <div class="slider__left">
                    <div class="slider__left-up">
                        <div class="title__main">ПробиоЛог<sup>®</sup></div>
                        <hr class="slider__line">
                        <div class="slider__descr">Базовая концентрация для&nbsp;восстановления баланса кишечной&nbsp;микрофлоры</div>
                        <ul>
                            <li>После приема антибиотиков</li>
                            <li>После заболеваний и отравлений</li>
                        </ul>
                    </div>
                    <a href="/probiolog/" class="button button-left">Подробнее</a>
                </div>
                <div class="slider__right">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="<?= SITE_TEMPLATE_PATH ?>/img/boxes/second-slide2022.png" alt="второй слайд" class="slider__img b-lazy">
                </div>
                <div class="slider__second-down"><img class="b-lazy" src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/icons/second-down2021.svg" alt="млрд кое"></div>
                <div class="slider-stamp slider-stamp_second"><img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/icons/stamp2021.svg" alt="печать" class="slider__img-stamp b-lazy"></div>
            </div>
      </div> -->

      
<!-- /*======================================================================================================================================================================*/ -->
<!-- /*======================================================================================================================================================================*/ -->
<!-- /*======================================================================================================================================================================*/ -->
<!-- /* хтмл от Ивана */ -->



<section class="mauohezBlocks">
				<div class="mauohezBlocks__slider slider-mauohezBlocks">
					<div class="slider-mauohezBlocks__container">
						<div class="slider-mauohezBlocks__body">
							<div class="slider-mauohezBlocks__slider swiper">
								<div class="slider-mauohezBlocks__wrapper swiper-wrapper">
									<div class="slider-mauohezBlocks__slide slide-mauohezBlocks swiper-slide">
										<div class="slide-mauohezBlocks__text">
											<div class="slide-mauohezBlocks__title">Когда кишечник занемог, прими скорей ПробиоЛог<sup>®</sup>!</div>
											<ul class="slide-mauohezBlocks__list">
												<li class="slide-mauohezBlocks__li">Восстанавливает микрофлору кишечника</li>
												<li class="slide-mauohezBlocks__li">Способствует уменьшению диареи<sup>1</sup></li>
												<li class="slide-mauohezBlocks__li">Улучшает самочувствие и качество жизни<sup>2</sup></li>
											</ul>
											<a href="/#products" class="slide-mauohezBlocks__button">Подробнее</a>
										</div>
										<div class="slide-mauohezBlocks__image">
											<div class="image-mauohezBlocks image-mauohezBlocks_main">
												<div class="image-mauohezBlocks__stamp image-mauohezBlocks__stamp_main">
													<img src="/bitrix/templates/probiolog_rf/img/frommauohez/stamp2021.svg" alt="image">
												</div>
												<picture><source srcset="/bitrix/templates/probiolog_rf/img/frommauohez/main-slide.webp" type="image/webp"><img src="/bitrix/templates/probiolog_rf/img/frommauohez/main-slide.png" alt="image" class="image-mauohezBlocks__img"></picture>
												<div class="image-mauohezBlocks__bigredtext">ТЕПЕРЬ В НОВЫХ УПАКОВКАХ!</div>
											</div>
										</div>
									</div>
									<div class="slider-mauohezBlocks__slide slide-mauohezBlocks swiper-slide">
										<div class="slide-mauohezBlocks__text">
											<div class="slide-mauohezBlocks__title">ПробиоЛог<sup>®</sup>&nbsp;СРК</div>
											<div class="slide-mauohezBlocks__label">Специальный пробиотик, разработанный для&nbsp;хронических расстройств ЖКТ<sup>2</sup></div>
											<ul class="slide-mauohezBlocks__list">
												<li class="slide-mauohezBlocks__li">При синдроме раздраженного кишечника</li>
												<li class="slide-mauohezBlocks__li">При кишечных последствиях вирусной инфекции</li>
											</ul>
											<div class="slide-mauohezBlocks__info">Штаммы включены в рекомендации гастроэнтерологов при СРК и в пандемию Covid-19<sup>4,5,6</sup></div>
											<a href="/probiolog-srk/" class="slide-mauohezBlocks__button">Подробнее</a>
										</div>
										<div class="slide-mauohezBlocks__image">
											<div class="image-mauohezBlocks">
												<div class="image-mauohezBlocks__stamp image-mauohezBlocks__stamp_top image-mauohezBlocks__stamp_shadow">
													<img src="/bitrix/templates/probiolog_rf/img/frommauohez/stamp-srk-top.svg" alt="image">
												</div>
												<picture><source srcset="/bitrix/templates/probiolog_rf/img/frommauohez/srk.webp" type="image/webp"><img src="/bitrix/templates/probiolog_rf/img/frommauohez/srk.png" alt="image" class="image-mauohezBlocks__img"></picture>
												<div class="image-mauohezBlocks__reg image-mauohezBlocks__reg_right image-mauohezBlocks__reg_right_srk" style="color: #878787;">
													RU.77.99.11.003.R.004558.12.21
												</div>
											</div>
										</div>
									</div>
									<div class="slider-mauohezBlocks__slide slide-mauohezBlocks swiper-slide">
										<div class="slide-mauohezBlocks__text">
											<div class="slide-mauohezBlocks__title">ПробиоЛог<sup>®</sup>&nbsp;Форте</div>
											<div class="slide-mauohezBlocks__label">Двойная концентрация для&nbsp;интенсивного восстановления в сложных ситуациях</div>
											<ul class="slide-mauohezBlocks__list">
												<li class="slide-mauohezBlocks__li">Во время приема антибиотиков</li>
												<li class="slide-mauohezBlocks__li">При различных инфекциях</li>
											</ul>
											<a href="/probiolog-forte/" class="slide-mauohezBlocks__button">Подробнее</a>
										</div>
										<div class="slide-mauohezBlocks__image">
											<div class="image-mauohezBlocks">
												<div class="image-mauohezBlocks__stamp image-mauohezBlocks__stamp_top">
													<img src="/bitrix/templates/probiolog_rf/img/frommauohez/stamp2021.svg" alt="image">
												</div>
												<picture><source srcset="/bitrix/templates/probiolog_rf/img/frommauohez/forte.webp" type="image/webp"><img src="/bitrix/templates/probiolog_rf/img/frommauohez/forte.png" alt="image" class="image-mauohezBlocks__img"></picture>
												<div class="image-mauohezBlocks__stamp image-mauohezBlocks__stamp_bottom">
													<img src="/bitrix/templates/probiolog_rf/img/frommauohez/stamp-forte-bottom.svg" alt="image">
												</div>
												<div class="image-mauohezBlocks__reg image-mauohezBlocks__reg_right" style="color: #878787;">RU.77.99.11.003.R.004578.12.21</div>
											</div>
										</div>
									</div>
									<div class="slider-mauohezBlocks__slide slide-mauohezBlocks swiper-slide">
										<div class="slide-mauohezBlocks__text">
											<div class="slide-mauohezBlocks__title">ПробиоЛог<sup>®</sup></div>
											<div class="slide-mauohezBlocks__label">Базовая концентрация для&nbsp;восстановления баланса кишечной микрофлоры</div>
											<ul class="slide-mauohezBlocks__list">
												<li class="slide-mauohezBlocks__li">После приема антибиотиков</li>
												<li class="slide-mauohezBlocks__li">После заболеваний и отравлений</li>
											</ul>
											<a href="/probiolog/" class="slide-mauohezBlocks__button">Подробнее</a>
										</div>
										<div class="slide-mauohezBlocks__image">
											<div class="image-mauohezBlocks">
												<div class="image-mauohezBlocks__stamp image-mauohezBlocks__stamp_top">
													<img src="/bitrix/templates/probiolog_rf/img/frommauohez/stamp2021.svg" alt="image">
												</div>
												<div class="image-mauohezBlocks__stamp image-mauohezBlocks__stamp_bottom">
													<img src="/bitrix/templates/probiolog_rf/img/frommauohez/stamp-probiolog-bottom.svg" alt="image">
												</div>
												<picture><source srcset="/bitrix/templates/probiolog_rf/img/frommauohez/probiolog.webp" type="image/webp"><img src="/bitrix/templates/probiolog_rf/img/frommauohez/probiolog.png" alt="image" class="image-mauohezBlocks__img"></picture>
												<div class="image-mauohezBlocks__reg image-mauohezBlocks__reg_right" style="color: #878787;">RU.77.99.88.003.R.004577.12.21</div>
											</div>
										</div>
									</div>
								</div>
								<div class="slider-mauohezBlocks__navigation">
									<div class="slider-mauohezBlocks__arrow swiper-button-prev">
										<img src="/bitrix/templates/probiolog_rf/img/frommauohez/left-arrow.svg" alt="image">
									</div>
									<div class="slider-mauohezBlocks__arrow swiper-button-next">
										<img src="/bitrix/templates/probiolog_rf/img/frommauohez/right-arrow.svg" alt="image">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
      <script src="/bitrix/templates/probiolog_rf/js/app_mauohezzz.js"></script>






<!-- /* хтмл от Ивана */ -->
<!-- /*======================================================================================================================================================================*/ -->
<!-- /*======================================================================================================================================================================*/ -->
<!-- /*======================================================================================================================================================================*/ -->

        <? //if ($USER->IsAdmin()): ?>
<?
/*			
            <div class="event-promo js-event-promo">
                <a href="/probiolog-gde-kupit/" class="event-promo__block white" onclick="ym(90584818,'reachGoal','click_discount'); ga('send', 'event', 'probiolog', 'click_discount'); ym(90584818,'reachGoal','link_promo1'); ga('send', 'event', 'probiolog', 'link_promo1'); ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');">
                    <div class="event-promo__image white">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/promo_all.png" alt="Скидка 15%">
                    </div>
                    <div class="event-promo__info">
                        <div class="event-promo__text">
                            Скидка
                        </div>
                        <div class="event-promo__discount link">
                            на <span>eapteka.ru</span>
                        </div>
                        <div class="event-promo__button" style="justify-content: center;">
                            Купить
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">-->
<!--                                <path d="M16 16L2 2" stroke="#2CA85E" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M4.33333 16L16 16L16 4.33333" stroke="#2CA85E" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                            </svg>-->
                        </div>
                    </div>
                </a>
                <div class="event-promo__close js-event-promo__close white"></div>
            </div>
*/
?>

			<?
				$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"staticBanner",
					Array(
						"DISPLAY_DATE" => "N",
						"DISPLAY_NAME" => "N",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "probiolog",
						"IBLOCK_ID" => "36",
						"NEWS_COUNT" => "1",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "SORT",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "",
						"FIELD_CODE" => Array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT"),
						"PROPERTY_CODE" => Array(""),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "N",
						"SET_BROWSER_TITLE" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_LAST_MODIFIED" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "N",
						"CACHE_TYPE" => "N",
						"CACHE_TIME" => "3600",
						"CACHE_FILTER" => "Y",
						"CACHE_GROUPS" => "N",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_TITLE" => "Новости",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => "",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"SET_STATUS_404" => "N",
						"SHOW_404" => "N",
						"MESSAGE_404" => "",
						"PAGER_BASE_LINK" => "",
						"PAGER_PARAMS_NAME" => "arrPager",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_ADDITIONAL" => ""
					)
				);
			?>
			
        <?/* endif;/* ?>

            <div class="event-promo js-event-promo">
                <a href="/probiolog-gde-kupit/" class="event-promo__block" onclick="ym(90584818,'reachGoal','click_discount'); ga('send', 'event', 'probiolog', 'click_discount'); ym(90584818,'reachGoal','link_promo1'); ga('send', 'event', 'probiolog', 'link_promo1'); ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');">
                    <div class="event-promo__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/promo_all.png" alt="Скидка 15%">
                    </div>
                    <div class="event-promo__info">
                        <div class="event-promo__text">
                            Скидка
                        </div>
                        <div class="event-promo__discount">
                            на eapteka.ru
                        </div>
                        <div class="event-promo__button" style="justify-content: center;">
                            Купить
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">-->
<!--                                <path d="M16 16L2 2" stroke="#2CA85E" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M4.33333 16L16 16L16 4.33333" stroke="#2CA85E" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                            </svg>-->
                        </div>
                    </div>
                </a>
                <div class="event-promo__close js-event-promo__close"></div>
            </div>
        <a href="/probiolog-gde-kupit/" class="event" onclick="ym(90584818,'reachGoal','click_discount'); ga('send', 'event', 'probiolog', 'click_discount'); ym(90584818,'reachGoal','link_promo1'); ga('send', 'event', 'probiolog', 'link_promo1'); ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');">
            <div class="event-percent">-15%</div>
            <div class="event-text">
                <div class="event-text-red">скидка</div>
                при покупке ПробиоЛог<sup>®</sup>&nbsp;СРК
            </div>
            <div class="event-img">
                <img class="b-lazy" src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="<?= SITE_TEMPLATE_PATH ?>/img/event.png?2" alt="Акция">
            </div>
            <div class="event-button slider-event__button">
                Купить<br>по акции
            </div>
        </a>
        <? endif; */ ?>
    </div>  

    <? endif; ?>

    <? if($APPLICATION->GetCurPage() == '/probiolog-forte/'): ?>
        <div class="container aptsale__container aptsale__container-forte">
            <div class="first__block">
                <div class="first__block-item">
                    <div class="first__block-left">
                        <div class="first__block-up">
                            <div class="title__main title__main-srk title__main-srk-probio title-forte-mob">Двойная концентрация для&nbsp;интенсивного восстановления в&nbsp;сложных ситуациях</div>
                            <ul>
                                <li>Во время приема антибиотиков</li>
                                <li>При различных инфекциях</li>
                            </ul>
                        </div>
                        <div class="first__block-descr first__block-descr2 first__block-descr-probio first__block-descr-probio1">Штаммы включены в рекомендации гастроэнтерологов<sup>5</sup></div>
                        <div class="first__block-descr-rec first__block-descr-rec2">
                            <ul>
                                <li><a data-url="/bitrix/templates/probiolog_rf/recomendation.pdf" class="lazy-pdf" href="#" target="_blank">1. Рекомендации Российского Гастроэнтерологического общества</a><img class="b-lazy" src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/akarrow.svg" alt="img"></li>
                            </ul>
                        </div>
                        <div class="aptsale">
                            <img src="/bitrix/templates/probiolog_rf/img/aptsale-img-1.png" class="aptsale__img" alt="-15% скидка" width="177" height="186">
                            <div class="aptsale__row">
                                <div class="aptsale__row-title">-15% скидка</div>
                                <div class="aptsale__row-preview">на 2 упаковки</div>
                                <a href="https://zdravcity.ru/p_probiolog-forte-kaps-227mg-n30-bad-0090608.html" class="aptsale__row-btn" target="_blank" onclick="ym(90584818,'reachGoal','aptsale');ym(90584818,'reachGoal','probiologgg_where_to_buy');ga('send', 'event', 'probiolog', 'aptsale');ga('send', 'event', 'probiolog', 'where_to_buy');">в здравсити &#10084;</a>
                            </div>
                            <div class="aptsale__row-close">+</div>
                        </div>
                    </div>
                    <div class="first__block-right first__block-right-probio">
                      <div class="mauohezBlocks">
                        <div class="image-mauohezBlocks">
                          <div class="image-mauohezBlocks__stamp image-mauohezBlocks__stamp_top">
                            <img src="/bitrix/templates/probiolog_rf/img/frommauohez/forte-down-products.svg" alt="image">
                          </div>
                          <picture><source srcset="/bitrix/templates/probiolog_rf/img/frommauohez/forte.webp" type="image/webp"><img src="/bitrix/templates/probiolog_rf/img/frommauohez/forte.png" alt="image" class="image-mauohezBlocks__img"></picture>
                          <div class="image-mauohezBlocks__reg image-mauohezBlocks__reg_right" style="color: #000;">RU.77.99.11.003.R.004578.12.21</div>
                        </div>
                      </div>
                        <!-- <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/boxes/forte.<?= $pngToWebp ?>" data-src-small="<?= SITE_TEMPLATE_PATH ?>/img/forte.<?= $pngToWebp ?>" alt="ПробиоЛог<sup>®</sup>&nbsp;форте" class="first__img b-lazy">
                        <div class="first__block-stamp first__block-stamp-probio">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/icons/forte-red-circle.svg?2" alt="1млрд кое" class="first__block-img b-lazy">
                        </div> -->
                    </div>
                    
                </div>
            </div>
        </div>
    <?endif;?> 

    <?if($APPLICATION->GetCurPage() == '/probiolog-srk/'):?>
        <div class="container aptsale__container aptsale__container-srk">
            <div class="first__block first__block-srk">
                <div class="first__block-item">
                    <div class="first__block-left first__block-left-srk">
                        <div class="first__block-up">
                            <div class="title__main title__main-srk title__main-srk-s">Специальный пробиотик, разработанный для&nbsp;хронических расстройств ЖКТ<sup>2</sup></div>
                            <ul>
                                <li>При синдроме раздраженного кишечника</li>
                                <li>При кишечных последствиях вирусной инфекции</li>
                            </ul>
                        </div>
                        <div class="first__block-descr first__block-descr-srk first__block-descr-probio1">Штаммы включены в рекомендации гастроэнтерологов при СРК и в пандемию Covid-19<sup>4, 5, 6</sup></div>
                        <div class="first__block-descr-rec ">
                            <ul>
                                <li><a data-url="/bitrix/templates/probiolog_rf/covid.pdf" href="#" class="lazy-pdf" target="_blank">1. Клинические рекомендации в период пандемии COVID-19</a><img src="/bitrix/templates/probiolog_rf/img/akarrow.svg" alt="img"></li>
                                <li><a data-url="/bitrix/templates/probiolog_rf/recomendation.pdf" href="#" class="lazy-pdf" target="_blank">2. Клинические рекомендации при СРК</a><img src="/bitrix/templates/probiolog_rf/img/akarrow.svg" alt="img"></li>
                                <li><a data-url="/bitrix/templates/probiolog_rf/globalrec.pdf" href="#" class="lazy-pdf" target="_blank">3. Глобальные гастроэнтерологические рекомендации</a><img src="/bitrix/templates/probiolog_rf/img/akarrow.svg" alt="img"></li>
                            </ul>
                        </div>
                        <div class="aptsale">
                            <img src="/bitrix/templates/probiolog_rf/img/aptsale-img-2.png" class="aptsale__img" alt="-15% скидка" width="177" height="186">
                            <div class="aptsale__row">
                                <div class="aptsale__row-title">-15% скидка</div>
                                <div class="aptsale__row-preview">на 2 упаковки</div>
                                <a href="https://zdravcity.ru/p_probiolog-srk-kaps-435-5mg-n15-bad-0095559.html" class="aptsale__row-btn" target="_blank" onclick="ym(90584818,'reachGoal','aptsale');ym(90584818,'reachGoal','probiologgg_where_to_buy');ga('send', 'event', 'probiolog', 'aptsale');ga('send', 'event', 'probiolog', 'where_to_buy');">в здравсити &#10084;</a>
                            </div>
                            <div class="aptsale__row-close">+</div>
                        </div>
                    </div>
                    <div class="first__block-right first__block-right-srk">
                      
                      <div class="mauohezBlocks">
                        <div class="image-mauohezBlocks">
                          <div class="image-mauohezBlocks__stamp image-mauohezBlocks__stamp_top image-mauohezBlocks__stamp_shadow">
                            <img src="/bitrix/templates/probiolog_rf/img/frommauohez/stamp-srk-top.svg" alt="image">
                          </div>
                          <picture><source srcset="/bitrix/templates/probiolog_rf/img/frommauohez/srk.webp" type="image/webp"><img src="/bitrix/templates/probiolog_rf/img/frommauohez/srk.png" alt="image" class="image-mauohezBlocks__img"></picture>
                          <div class="image-mauohezBlocks__reg image-mauohezBlocks__reg_right image-mauohezBlocks__reg_right_srk" style="color: #000;">RU.77.99.11.003.R.004558.12.21</div>
                        </div>
                      </div>
                        <!-- <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/boxes/srk.<?=$pngToWebp?>" data-src-small="<?= SITE_TEMPLATE_PATH ?>/img/srk.<?= $pngToWebp ?>" alt="ПробиоЛог<sup>®</sup>&nbsp;срк" class="first__img b-lazy">
                        <div class="first__block-stamp"><img src="/bitrix/templates/probiolog_rf/icons/stamp-bestseller.svg" alt="печать" class="first__block-img"></div> -->
                    </div>
                   
                </div>
            </div>
        </div>
    <?endif;?> 

    <?if($APPLICATION->GetCurPage() == '/probiolog/'):?>
        <div class="container aptsale__container aptsale__container-probiolog">
            <div class="first__block">
                <div class="first__block-item">
                    <div class="first__block-left">
                        <div class="first__block-up">
                            <div class="title__main title__main-srk title__main-srk-probio">Базовая концентрация для&nbsp;восстановления баланса микрофлоры</div>
                            <ul>
                                <li>После приема антибиотиков</li>
                                <li>После заболеваний и отравлений</li>
                            </ul>
                        </div>
                        <div class="first__block-descr first__block-descr2 first__block-descr-probio first__block-descr-probio1">Штаммы включены в рекомендации гастроэнтерологов<sup>5</sup></div>
                        <div class="first__block-descr-rec first__block-descr-rec2">
                            <ul>
                                <li>
                                    <a data-url="/bitrix/templates/probiolog_rf/recomendation.pdf" href="#" class="lazy-pdf" target="_blank">1. Рекомендации Российского Гастроэнтерологического общества</a>
                                    <img src="/bitrix/templates/probiolog_rf/img/akarrow.svg" alt="img">
                                </li>
                            </ul>
                        </div>
                        <div class="aptsale">
                            <img src="/bitrix/templates/probiolog_rf/img/aptsale-img.png" class="aptsale__img" alt="-15% скидка" width="177" height="186">
                            <div class="aptsale__row">
                                <div class="aptsale__row-title">-15% скидка</div>
                                <div class="aptsale__row-preview">на 2 упаковки</div>
                                <a href="https://zdravcity.ru/p_probiolog-kaps-1mlrd-koe-180mg-n30-0010796.html" class="aptsale__row-btn" target="_blank" onclick="ym(90584818,'reachGoal','aptsale');ym(90584818,'reachGoal','probiologgg_where_to_buy');ga('send', 'event', 'probiolog', 'aptsale');ga('send', 'event', 'probiolog', 'where_to_buy');">в здравсити &#10084;</a>
                            </div>
                            <div class="aptsale__row-close">+</div>
                        </div>
                    </div>
                    <div class="first__block-right first__block-right-probio">
                      <div class="mauohezBlocks">
                        <div class="image-mauohezBlocks">
                          <div class="image-mauohezBlocks__stamp image-mauohezBlocks__stamp_top">
                            <img src="/bitrix/templates/probiolog_rf/img/frommauohez/probiolog-down-products.svg" alt="image">
                          </div>
                          <picture><source srcset="/bitrix/templates/probiolog_rf/img/frommauohez/probiolog.webp" type="image/webp"><img src="/bitrix/templates/probiolog_rf/img/frommauohez/probiolog.png" alt="image" class="image-mauohezBlocks__img"></picture>
                          <div class="image-mauohezBlocks__reg image-mauohezBlocks__reg_right" style="color: #000;">RU.77.99.88.003.R.004577.12.21</div>
                        </div>
                      </div>
                        <!-- <img src="/bitrix/templates/probiolog_rf/img/boxes/probiolog.<?= $pngToWebp ?>" alt="ПробиоЛог<sup>®</sup>" class="first__img">
                        <div class="first__block-stamp first__block-stamp-probio"><img src="/bitrix/templates/probiolog_rf/icons/probiolog-green-circle.svg?2" alt="1млрд кое" class="first__block-img"></div> -->
                    </div>
                    
                </div>
            </div>
        </div>
    <?endif;?> 

<?if($flDiv):?> 
</div>
<?endif;?>

<?/* if($APPLICATION->GetCurPage() == '/probiolog-srk/'): ?>
    <div class="container">
        <a href="/probiolog-gde-kupit/" class="event event_big" onclick="ym(90584818,'reachGoal','click_discount_4'); ga('send', 'event', 'probiolog', 'click_discount'); ym(90584818,'reachGoal','link_promo1'); ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');">
            <div class="event-percent">-15%</div>
            <div class="event-text">
                <div class="event-text-red">скидка</div>
                при покупке ПробиоЛог<sup>®</sup>&nbsp;СРК
            </div>
            <div class="event-button slider-event__button">
                 <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path d="M29.5313 0H28.1248V0.448C26.1668 0.886 25.8853 2.7035 25.7748 3.398C25.7223 3.7265 25.6158 4.369 25.4838 5.156H0.993812C0.0248118 5.156 -0.0836882 6.0615 0.0428118 6.5625L2.91581 19.246C3.04181 19.747 3.57231 20.156 4.09231 20.156H25.5643C26.0813 20.156 26.5028 20.5765 26.5028 21.0935C26.5028 21.6105 26.0813 22.031 25.5643 22.031H2.12731C1.87867 22.031 1.64021 22.1298 1.4644 22.3056C1.28858 22.4814 1.18981 22.7199 1.18981 22.9685C1.18981 23.2171 1.28858 23.4556 1.4644 23.6314C1.64021 23.8072 1.87867 23.906 2.12731 23.906H3.34231C2.75566 24.2299 2.26661 24.7052 1.9261 25.2823C1.58559 25.8595 1.4061 26.5174 1.40631 27.1875H2.34381C2.34381 28.74 3.60381 30 5.15631 30C6.70881 30 7.96881 28.74 7.96881 27.1875H8.90631C8.90643 26.5173 8.72683 25.8594 8.38624 25.2823C8.04565 24.7051 7.55652 24.2299 6.96981 23.906H20.2168C19.6301 24.2299 19.141 24.7051 18.8004 25.2823C18.4598 25.8594 18.2802 26.5173 18.2803 27.1875H19.2178C19.2317 27.9244 19.5342 28.6264 20.0602 29.1426C20.5862 29.6588 21.2938 29.948 22.0308 29.948C22.7678 29.948 23.4754 29.6588 24.0014 29.1426C24.5274 28.6264 24.8299 27.9244 24.8438 27.1875H25.7813C25.7814 26.5174 25.6018 25.8596 25.2613 25.2824C24.9208 24.7053 24.4319 24.23 23.8453 23.906H25.5653C26.3111 23.9056 27.0262 23.6092 27.5536 23.0818C28.081 22.5544 28.3774 21.8393 28.3778 21.0935C28.3777 20.7241 28.3049 20.3583 28.1635 20.017C28.0221 19.6758 27.8148 19.3657 27.5535 19.1046C27.2923 18.8434 26.9822 18.6362 26.6408 18.4949C26.2995 18.3536 25.9337 18.2809 25.5643 18.281H25.2158L26.4148 10.826C26.7488 8.857 27.4688 4.6035 27.6378 3.5455C27.7228 3.011 27.8053 2.6355 28.1248 2.425V2.812H29.5313C29.6554 2.81161 29.7742 2.76219 29.862 2.67452C29.9497 2.58685 29.9993 2.46805 29.9998 2.344V0.469C29.9995 0.344781 29.9501 0.225718 29.8623 0.137835C29.7745 0.0499516 29.6555 0.000396165 29.5313 0ZM5.15631 28.594C4.78341 28.5936 4.42589 28.4453 4.1622 28.1816C3.89852 27.9179 3.75021 27.5604 3.74981 27.1875H6.56231C6.56191 27.5603 6.41367 27.9178 6.1501 28.1814C5.88652 28.4451 5.52913 28.5935 5.15631 28.594ZM22.0313 28.594C21.6583 28.5937 21.3007 28.4455 21.0369 28.1818C20.7731 27.9181 20.6247 27.5605 20.6243 27.1875H23.4378C23.4371 27.5603 23.2888 27.9177 23.0251 28.1813C22.7615 28.4449 22.4041 28.5933 22.0313 28.594ZM20.8778 7.497C20.8943 7.36992 20.9559 7.25299 21.0513 7.16747C21.1467 7.08195 21.2697 7.03353 21.3978 7.031H24.3663C24.6243 7.031 24.8038 7.239 24.7633 7.4945L24.4693 9.38C24.4303 9.635 24.1858 9.8435 23.9273 9.8435H21.0958C21.0362 9.84508 20.9769 9.83372 20.9221 9.81022C20.8673 9.78671 20.8182 9.75161 20.7783 9.70733C20.7383 9.66304 20.7084 9.61063 20.6906 9.5537C20.6729 9.49676 20.6676 9.43665 20.6753 9.3775L20.8778 7.497ZM20.3733 12.1845C20.3901 12.0575 20.4518 11.9408 20.5471 11.8553C20.6425 11.7699 20.7653 11.7213 20.8933 11.7185H23.6348C23.8933 11.7185 24.0723 11.9265 24.0333 12.182L23.8118 13.599C23.7723 13.854 23.5283 14.0625 23.2698 14.0625H20.6413C20.5817 14.0639 20.5226 14.0524 20.4678 14.0289C20.4131 14.0053 20.3641 13.9702 20.3242 13.926C20.2842 13.8817 20.2543 13.8294 20.2365 13.7725C20.2187 13.7157 20.2133 13.6556 20.2208 13.5965L20.3733 12.1845ZM2.43281 9.3885L1.95781 7.486C1.89581 7.235 2.05681 7.031 2.31531 7.031H5.84481C6.10381 7.031 6.33731 7.2405 6.36481 7.497L6.56681 9.378C6.57431 9.43708 6.56897 9.49707 6.55116 9.5539C6.53335 9.61073 6.5035 9.66304 6.46363 9.70727C6.42376 9.75151 6.37482 9.78662 6.32014 9.81022C6.26547 9.83381 6.20635 9.84534 6.14681 9.844H3.01631C2.75831 9.844 2.49531 9.6385 2.43281 9.3885ZM4.06831 14.0625C3.81031 14.0625 3.54731 13.8575 3.48531 13.6075L3.12731 12.174C3.06481 11.923 3.22481 11.719 3.48331 11.719H6.34781C6.60631 11.719 6.84031 11.9285 6.86781 12.185L7.01981 13.597C7.02739 13.6561 7.02212 13.7161 7.00434 13.773C6.98657 13.8298 6.95671 13.8822 6.91683 13.9265C6.87694 13.9707 6.82797 14.0058 6.77325 14.0294C6.71853 14.053 6.65937 14.0644 6.59981 14.063H4.06831V14.0625ZM7.05281 18.2815H5.12031C4.86081 18.2815 4.59931 18.0765 4.53681 17.8265L4.17881 16.393C4.11681 16.142 4.27681 15.938 4.53581 15.938H6.80081C7.05931 15.938 7.29331 16.1475 7.32181 16.404L7.47281 17.816C7.4804 17.8751 7.47513 17.9351 7.45735 17.9919C7.43957 18.0488 7.40971 18.1011 7.36982 18.1453C7.32992 18.1895 7.28093 18.2246 7.22622 18.2481C7.1715 18.2716 7.11235 18.283 7.05281 18.2815ZM12.7988 17.8125C12.7983 17.9369 12.7486 18.056 12.6605 18.1439C12.5725 18.2318 12.4532 18.2812 12.3288 18.2815H9.88331C9.75528 18.2789 9.63245 18.2304 9.53712 18.1449C9.44179 18.0594 9.3803 17.9425 9.36381 17.8155L9.21181 16.4035C9.20406 16.3444 9.20921 16.2844 9.22689 16.2275C9.24457 16.1706 9.27437 16.1182 9.31423 16.0739C9.3541 16.0296 9.40309 15.9945 9.45782 15.9709C9.51256 15.9474 9.57175 15.936 9.63131 15.9375H12.3288C12.4533 15.9375 12.5727 15.9869 12.6608 16.0748C12.7489 16.1627 12.7985 16.282 12.7988 16.4065V17.8125ZM12.7988 13.594C12.7983 13.7184 12.7486 13.8375 12.6605 13.9254C12.5725 14.0133 12.4532 14.0627 12.3288 14.063H9.42981C9.17181 14.063 8.93881 13.8535 8.90981 13.597L8.75881 12.185C8.75115 12.1259 8.75636 12.0659 8.77407 12.0091C8.79178 11.9522 8.82159 11.8998 8.86143 11.8556C8.90128 11.8113 8.95023 11.7762 9.00493 11.7526C9.05962 11.729 9.11877 11.7176 9.17831 11.719H12.3288C12.4533 11.719 12.5727 11.7684 12.6608 11.8563C12.7489 11.9442 12.7985 12.0635 12.7988 12.188V13.594ZM12.7988 9.375C12.7983 9.4994 12.7486 9.61853 12.6605 9.7064C12.5725 9.79427 12.4532 9.84374 12.3288 9.844H8.97781C8.84969 9.84147 8.72674 9.79305 8.63131 9.70753C8.53588 9.62201 8.47431 9.50508 8.45781 9.378L8.25581 7.497C8.24823 7.43791 8.25351 7.37788 8.27128 7.32101C8.28906 7.26415 8.31891 7.2118 8.3588 7.16755C8.39868 7.12329 8.44766 7.08818 8.50237 7.06461C8.55709 7.04104 8.61625 7.02958 8.67581 7.031H12.3293C12.4538 7.031 12.5732 7.08038 12.6613 7.16831C12.7494 7.25623 12.799 7.37552 12.7993 7.5V9.375H12.7988ZM17.8783 17.8155C17.8617 17.9425 17.8001 18.0594 17.7047 18.1449C17.6093 18.2304 17.4864 18.2789 17.3583 18.2815H15.1483C15.024 18.2812 14.9048 18.2318 14.8168 18.1439C14.7288 18.056 14.6792 17.9369 14.6788 17.8125V16.406C14.6791 16.2816 14.7286 16.1624 14.8166 16.0745C14.9047 15.9866 15.0239 15.9371 15.1483 15.937H17.6103C17.8683 15.937 18.0583 16.1465 18.0303 16.403L17.8783 17.8155ZM18.3313 13.5965C18.3147 13.7235 18.2531 13.8404 18.1577 13.9259C18.0623 14.0114 17.9394 14.0599 17.8113 14.0625H15.1483C15.024 14.0622 14.9048 14.0128 14.8168 13.9249C14.7288 13.837 14.6792 13.7179 14.6788 13.5935V12.187C14.6791 12.0626 14.7286 11.9434 14.8166 11.8555C14.9047 11.7676 15.0239 11.7181 15.1483 11.718H18.0633C18.3218 11.718 18.5113 11.9275 18.4828 12.184L18.3313 13.5965ZM18.7843 9.378C18.7677 9.50503 18.7061 9.62191 18.6107 9.70741C18.5153 9.79291 18.3924 9.84137 18.2643 9.844H15.1483C15.024 9.84374 14.9048 9.79426 14.8168 9.70637C14.7288 9.61849 14.6792 9.49935 14.6788 9.375V7.5C14.6791 7.37561 14.7286 7.25639 14.8166 7.16848C14.9047 7.08057 15.0239 7.03113 15.1483 7.031H18.5668C18.8253 7.031 19.0148 7.2405 18.9873 7.497L18.7843 9.378ZM22.4003 18.2815V18.278L22.3963 18.2815H20.1883C20.1738 18.2815 20.1613 18.2745 20.1468 18.2725C20.1443 18.2555 20.1443 18.2385 20.1413 18.2205L20.1193 18.2665C20.1254 18.2681 20.1316 18.2695 20.1378 18.2705C19.9073 18.244 19.7423 18.0535 19.7688 17.8155L19.9198 16.4035C19.9366 16.2765 19.9983 16.1598 20.0936 16.0743C20.189 15.9889 20.3118 15.9403 20.4398 15.9375H22.9778C23.2363 15.9375 23.4143 16.1455 23.3753 16.401L23.1538 17.818C23.1153 18.073 22.8713 18.2815 22.6128 18.2815H22.4003Z" fill="white"/>
                </svg>
                Купить<br>по акции
            </div>
        </a>
    </div>
<? endif; */?>