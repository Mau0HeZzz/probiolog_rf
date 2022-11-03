<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
    "olegpro:olegpro.csscompiler",
    "olegpro",
    array(
        "PATH" => "/bitrix/templates/probiolog/scss/", // Путь к папке с файлами, которые нужно компилировать
        "FILES" => array( // Список файлов для&nbsp;компиляции
            0 => "style.scss",
        ),
        "PATH_CSS" => "/bitrix/templates/probiolog/", // Путь к папке, куда складывать скомпилированный css
        "CLASS_HANDLER" => "\\Olegpro\\Csscompiler\\SCSSCompiler", // PHP класс-обработчик, наследуемый от класса \Olegpro\Csscompiler\Compiler(должен реализовывать метод toCss)
        "USE_SETADDITIONALCSS" => "Y", // Подключать скомпилированный css файл через CMain::SetAdditionalCSS()?
        "REMOVE_OLD_CSS_FILES" => "Y", // Удалять старые скомпилированные css файлы?
        "TARGET_FILE_MASK" => "main_%s.css" // Маска файла для&nbsp;записи css файла. (%s обязателен, он заменится на таймштамп файла)
    ),
    false,
    array(
        "HIDE_ICONS" => "Y"
    )
);?>
<?$curPage = $APPLICATION->GetCurPage(true);?>
<!DOCTYPE html>
<html lang="ru" prefix="og: https://ogp.me/ns#">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=yes">
<meta property = "og:title" content = '<?$APPLICATION->ShowTitle()?>' />
<meta property = "og:image" content = "https://<?=$_SERVER['HTTP_HOST']?>/bitrix/templates/probiolog/images/logo.svg" />
<meta property = "og:type" content = "website" />
<meta property = "og:description" content = "<?$APPLICATION->ShowTitle()?>" />	
<meta property = "og:url" content = "https://<?=$_SERVER['HTTP_HOST']?><?=$curPage?>" />
<?$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);?>
<link rel="canonical" href="https://<?=$_SERVER['HTTP_HOST']?><?=$uri_parts[0]?>" />
    <link rel="stylesheet" href="/bitrix/templates/probiolog/css/mystyle.css">
    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="/bitrix/templates/probiolog/js/myscript.js"></script>





	<?$APPLICATION->ShowHead();?>
	<title>
		<?$APPLICATION->ShowTitle()?>
	</title>


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

    <header id="up" class="header <?=$headerClass?>">
               
        <nav class="<?=$navClass?>">
            <div class="container">
                <div class="navigation">
                    <a href="/" class="header__logo">
                        <img src="/bitrix/templates/probiolog/icons/head-logo.svg" alt="логотип">
                    </a>

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
                </div>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <?if($APPLICATION->GetCurPage() == '/'):?>
    <div class="container">
        <div class="slider">
            <div class="button__wrapper">
                <button class="main-slider-btn main-prev-btn">
                    <img src="/bitrix/templates/probiolog/icons/arrows-left.svg" alt="left">
                </button>
                <button class="main-slider-btn main-next-btn">
                    <img src="/bitrix/templates/probiolog/icons/arrows-right.svg" alt="right">
                </button>
            </div>
            
            <div class="slider-item">
                <div class="slider__left">
                    <div class="slider__left-up">
                        <div class="title__main">Когда кишечник занемог – прими скорей ПробиоЛог<sup>®</sup>!<sup class="title__main-sup">7,8,9</sup></div>
                        <hr class="slider__line">
                        <ul>
                            <li>Восстанавливает микрофлору кишечника</li>
                            <li>Способствует уменьшению 
                                диареи<sup>1</sup></li>
                            <li>Улучшает самочувствие и качество жизни<sup>2</sup></li>
                        </ul>
                    </div>
                    <a href="/#products" class="button button-left">Подробнее</a>
                </div>
                <div class="slider__right slider__right-first">
                    <img src="/bitrix/templates/probiolog/img/main-slide.png" alt="первый слайд" class="slider__img slider__img-main">
                </div>
                <div class="slider-stamp slider-stamp-main"><img src="/bitrix/templates/probiolog/icons/stamp.svg" alt="печать" class="slider__img-stamp"></div>
            </div>
            <div class="slider-item">
                <div class="slider__left">
                    <div class="slider__left-up">
                        <div class="title__main">ПробиоЛог<sup>®</sup></div>
                        <hr class="slider__line">
                        <div class="slider__descr">Базовая концентрация для&nbsp;восстановления баланса кишечной микрофлоры</div>
                        <ul>
                            <li>После приема антибиотиков</li>
                            <li>После заболеваний и отравлений</li>
                        </ul>
                    </div>
                    <a href="/probiolog/" class="button button-left">Подробнее</a>
                </div>
                <div class="slider__right">
                    <img src="/bitrix/templates/probiolog/img/second-slide.png" alt="второй слайд" class="slider__img">
                </div>
                <div class="slider__second-down"><img src="/bitrix/templates/probiolog/icons/second-down.svg" alt="млрд кое"></div>
                <div class="slider-stamp slider-stamp_second"><img src="/bitrix/templates/probiolog/icons/stamp.svg" alt="печать" class="slider__img-stamp"></div>
            </div>
            <div class="slider-item">
                <div class="slider__left">
                    <div class="slider__left-up">
                        <div class="title__main">ПробиоЛог<sup>®</sup>&nbsp;Форте</div>
                        <hr class="slider__line">
                        <div class="slider__descr">Двойная концентрация для&nbsp;интенсивного восстановления в сложных ситуациях</div>
                        <ul>
                            <li>Во время приема антибиотиков</li>
                            <li>При различных инфекциях</li>
                            
                        </ul>
                    </div>
                    <a href="/probiolog-forte/" class="button button-left">Подробнее</a>
                </div>
                <div class="slider__right">
                    <img src="/bitrix/templates/probiolog/img/third-slide.png" alt="третий слайд" class="slider__img">
                </div>
                <div class="slider__third-down"><img src="/bitrix/templates/probiolog/icons/third-slide-down.svg" alt="млрд кое"></div>
                <div class="slider-stamp slider-stamp_third"><img src="/bitrix/templates/probiolog/icons/stamp.svg" alt="печать" class="slider__img-stamp"></div>
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
                    <div class="slider__descr-border">Штаммы включены в рекомендации гастроэнтерологов при СРК и в пандемию Covid-19<sup>4,5,6</sup></div>    
                    <a href="/probiolog-srk/" class="button button-left">Подробнее</a>
                </div>
                <div class="slider__right slider__right-srk">
                    <img src="/bitrix/templates/probiolog/img/four-slide.png" alt="четвертый слайд" class="slider__img">
                </div>
                <div class="slider-stamp slider-stamp_four"><img src="/bitrix/templates/probiolog/icons/stamp-bestseller.svg" alt="печать" class="slider__img-stamp"></div>
            </div>
        </div>
        
    </div>  

    <?endif;?>

    <?if($APPLICATION->GetCurPage() == '/probiolog-forte/'):?>
        <div class="container">
            <div class="first__block">
                <div class="first__block-item">
                    <div class="first__block-left">
                        <div class="first__block-up">
                            <div class="title__main title__main-srk title__main-srk-probio">Двойная концентрация для&nbsp;интенсивного восстановления в сложных ситуациях</div>
                            <ul>
                                <li>После приема антибиотиков</li>
                                <li>После заболеваний и отравлений</li>
                            </ul>
                        </div>
                        <div class="first__block-descr first__block-descr2 first__block-descr-probio">Штаммы включены в рекомендации гастроэнтерологов<sup>5</sup></div>
                        <div class="first__block-descr-rec first__block-descr-rec2">
                            <ul>
                                <li><a href="/bitrix/templates/probiolog/covid.pdf" target="_blank">1. Рекомендации Российского Гастроэнтерологического общества</a><img src="/bitrix/templates/probiolog/img/akarrow.svg" alt=""></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="first__block-right first__block-right-probio">
                        <img src="/bitrix/templates/probiolog/img/forte-page.png" alt="ПробиоЛог<sup>®</sup>&nbsp;форте" class="first__img">
                        <div class="first__block-stamp first__block-stamp-probio">
                            <img src="/bitrix/templates/probiolog/icons/forte-red-circle.svg" alt="1млрд кое" class="first__block-img">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    <?endif;?> 

    <?if($APPLICATION->GetCurPage() == '/probiolog-srk/'):?>
        <div class="container">
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
                        <div class="first__block-descr first__block-descr-srk">Штаммы включены в рекомендации гастроэнтерологов при СРК и в пандемию Covid-19<sup>4,5,6</sup></div>
                        <div class="first__block-descr-rec ">
                            <ul>
                                <li><a href="/bitrix/templates/probiolog/covid.pdf" target="_blank">1. Клинические рекомендации в период пандемии COVID-19</a><img src="/bitrix/templates/probiolog/img/akarrow.svg" alt=""></li>
                                <li><a href="/bitrix/templates/probiolog/recomendation.pdf" target="_blank">2. Клинические рекомендации при СРК</a><img src="/bitrix/templates/probiolog/img/akarrow.svg" alt=""></li>
                                <li><a href="/bitrix/templates/probiolog/globalrec.pdf" target="_blank">3. Глобальные гастроэнтерологические рекомендации</a><img src="/bitrix/templates/probiolog/img/akarrow.svg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                    <div class="first__block-right first__block-right-srk">
                        <img src="/bitrix/templates/probiolog/img/srk-page.png" alt="ПробиоЛог<sup>®</sup>&nbsp;срк" class="first__img">
                        <div class="first__block-stamp"><img src="/bitrix/templates/probiolog/icons/stamp-bestseller.svg" alt="печать" class="first__block-img"></div>
                    </div>
                   
                </div>
            </div>
        </div>
    <?endif;?> 

    <?if($APPLICATION->GetCurPage() == '/probiolog/'):?>
        <div class="container">
            <div class="first__block">
                <div class="first__block-item">
                    <div class="first__block-left">
                        <div class="first__block-up">
                            <div class="title__main title__main-srk title__main-srk-probio">Базовая концентрация для&nbsp;восстановления кишечной микрофлоры</sup></div>
                            <ul>
                                <li>После приема антибиотиков</li>
                                <li>После заболеваний и отравлений</li>
                            </ul>
                        </div>
                        <div class="first__block-descr first__block-descr2 first__block-descr-probio first__block-descr-probio1">Штаммы включены в рекомендации гастроэнтерологов<sup>5</sup></div>
                        <div class="first__block-descr-rec first__block-descr-rec2">
                            <ul>
                                <li><a href="/bitrix/templates/probiolog/covid.pdf" target="_blank">1. Рекомендации Российского Гастроэнтерологического общества</a><img src="/bitrix/templates/probiolog/img/akarrow.svg" alt=""></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="first__block-right first__block-right-probio">
                        <img src="/bitrix/templates/probiolog/img/probiolog-page.png" alt="ПробиоЛог<sup>®</sup>" class="first__img">
                        <div class="first__block-stamp first__block-stamp-probio"><img src="/bitrix/templates/probiolog/icons/probiolog-green-circle.svg" alt="1млрд кое" class="first__block-img"></div>
                    </div>
                    
                </div>
            </div>
        </div>
    <?endif;?> 

<?if($flDiv):?> 
</div>
<?endif;?> 
