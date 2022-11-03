<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Применение ПробиоЛог<sup>®</sup>&nbsp;Форте. Решение при диарее, вызванной приемом антибиотиков, пищевых отправлениях. Помощь в восстановлении микрофлоры кишечника после перенесенных заболеваний");
$APPLICATION->SetTitle("ПробиоЛог<sup>®</sup>&nbsp;Форте: после заболеваний и отравлений");
?>

<? $jpgToWebp = (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) ? 'webp' : 'jpg'; ?>

<div class="probio">
    <div class="container">
        <div class="bread-items" itemscope itemtype="http://schema.org/BreadcrumbList">
            <div class="bread-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="/" itemprop="item">
                    <span itemprop="name">Главная</span>
                </a>
                <meta itemprop="position" content="1" />
            </div>
            <div class="bread-item">&#62;</div>
            <div class="bread-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="javascript:void(0);">
                    <span itemprop="name">Продукты</span>
                </a>
                <meta itemprop="position" content="2" />
            </div>
            <div class="bread-item">&#62;</div>
            <div class="bread-item bread-item-select" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="/probiolog-forte/" itemprop="item">
                    <span itemprop="name">ПробиоЛог<sup>®</sup>&nbsp;Форте</span>
                </a>
                <meta itemprop="position" content="3" />
            </div>
        </div>
        <div class="title title-probio">ПробиоЛог<sup>®</sup>&nbsp;форте</div>
        <div class="probio__wrapp">
            <div class="probio-left probio-left_forte">
                <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/boxes/forte.png" alt="ПробиоЛог<sup>®</sup>" class="probio__img b-lazy">
            </div>
            <div class="probio-right">
                <!-- <div class="probio-title">Способствует:</div> -->
                <ul>
                    <li><b>Усиленная концентрация</b>: в 1 капсуле 2,5 миллиарда бактерий, защищенных кислотоустойчивой матрицей<sup>4</sup></li>
                    <a href="#" class="properties-link properties-link_probio" onclick="liknankk('.srk-video')">Подробнее</a>
                    <li>В исследованиях <b>предупреждает диарею</b>, связанную с приемом антибиотиков<sup>11</sup></li>
                    <li>В исследованиях в 2 раза <b>снижает продолжительность и</b> в 3 раза <b>тяжесть диареи</b><sup>1</sup></li>
                    <a href="#" class="properties-link properties-link_probio" onclick="liknankk('.diagrammprobio')">Подробнее</a>
                    <li><b>Восстанавливает бифидо- и лактобактерии, важные для&nbsp;микрофлоры и иммунитета</b><sup>10, 12</sup></li>
                    <a href="#" class="properties-link properties-link_probio" onclick="liknankk('.yakor1')">Подробнее</a>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="animation">
    <div class="container">
        <div class="title title-formob3">Запатентованная технология микрокапсуляции для&nbsp;максимальной выживаемости бактерий<sup>9</sup></div>

        <div class="srk-video" style="margin-bottom: 67px;">
            <video class="product-video" width="100%" height="893px" controls="controls" poster="/bitrix/templates/probiolog_rf/img/prev.<?= $jpgToWebp ?>">
                <source src="/bitrix/templates/probiolog_rf/newvideo.mp4" type="video/ogg; codecs=theora, vorbis">
                <source src="/bitrix/templates/probiolog_rf/newvideo.mp4" type="video/mp4; codecs=avc1.42E01E, mp4a.40.2">
                <source src="/bitrix/templates/probiolog_rf/newvideo.mp4" type="video/webm; codecs=vp8, vorbis">
                Тег video не поддерживается вашим браузером. <a href="/bitrix/templates/probiolog_rf/newvideo.mp4">Скачайте видео</a>.
            </video>
        </div>

        <div class="animation-descr">Штаммы LA-5<sup>&#174;</sup> и BB-12<sup>&#174;</sup> живых бактерий ПробиоЛога<sup>®</sup>&nbsp;Форте<sup>&#174;</sup> получены с применением запатентованной технологии микрокапсуляции, при котором бактерии заключаются в защитную кислотоустойчивую матрицу для&nbsp;эффективной доставки их живыми к месту работы в нужные отделы кишечника.</div>
        <div class="animation-descr">Кислотоустойчивая матрица — это полисахаридная оболочка, которая в желудке превращается в нерастворимый гель, устойчивый к действию кислоты. Благодаря этому осуществляется транспорт живых бактерий в кишечник. По данным исследований 73% бактерий остаются жизнеспособными. Таким образом кислотоустойчивая матрица вместе с кишечнорастворимой оболочкой капсулы обеспечивают высокую эффективность пробиотика.</div>
    </div>
</div>

<div class="diagrammprobio">
    <div class="container">
        <div class="title title-formob2">Штаммы LA-5<sup>&#174;</sup> и BB-12<sup>&#174;</sup> ПробиоЛога<sup>®</sup>&nbsp;форте у участников исследований предупреждали развитие диареи, а также в&nbsp;2&nbsp;раза уменьшали продолжительность диареи и в 3 раза уменьшали ее тяжесть<sup>1</sup></div>
        <div class="diagrammprobio__wrapp">
            <div class="diagrammprobio_up diagrammprobio_up-forte">
                <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/dia-forte-second.svg" alt="график" class="diagrammprobio__img b-lazy">
                <div class="diagrammprobio-descr">
                    <p class="diagrammprobio-forte"><span class="strong">Штаммы ПробиоЛога<sup>®</sup>&nbsp;форте помогают:</span></p>
                    <p class="diagrammprobio-forte diagrammprobio-forte_descr"><span class="strong">Предотвратить развитие антибиотик-ассоциированной диареи</span>.</p>
                    <p class="diagrammprobio-forte diagrammprobio-forte_descr"><span class="strong">В 3 раза уменьшить тяжесть диареи</span> при ее возникновении.</p>
                </div>
            </div>
            <div class="diagrammprobio_down diagrammprobio_down-forte">
                <div class="diagrammprobio-descr diagrammprobio-descr_mr50"><span class="strong">Штаммы ПробиоЛога<sup>®</sup>&nbsp;Форте<sup>&#174;</sup> способствуют сокращению продолжительности диареи, обусловленной приемом антибиотиков</span></div>
                <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/dia-forte-first.svg" alt="диаграмма" class="diagrammprobio__img b-lazy">
            </div>
        </div>
        <div class="title yakor1">Не все пробиотики одинаково полезны</div>
        <p class="diagrammprobio-text"><span class="strong">Пробиотики</span> – это живые бактерии-микроорганизмы, которые при применении в адекватных количествах оказывают положительный эффект на здоровье человека.</p>
        <p class="diagrammprobio-text"><span class="strong">Российская Ассоциация гастроэнтерологов в своих рекомендациях определяет требования к пробиотику надлежащего качества<sup>16</sup>:</span></p>
        <ol>
            <li>Капсула или таблетка пробиотика на момент продажи должна содержать не менее 1 миллиарда бактерий с доказанным подавляющим действием на болезнетворные бактерии и без вреда полезным бактериям.</li>
            <li>Оболочка должна обеспечивать <span class="strong">эффективную доставку этих бактерий в кишечник.</span></li>
        </ol>
        <p class="diagrammprobio-text"><span class="strong">ПробиоЛог<sup>®</sup>&nbsp;и ПробиоЛог<sup>®</sup>&nbsp;Форте полностью отвечают этим требованиям и содержат в своём составе 2 вида кишечных прибиотических бактерий с хорошо доказанным прибиотическим действием:</span> лактобактерии Lactobacillus acidophilus LA-5
            и бифидобактерии Bifidumbacterium animalis ssp. Lactis BB-12<sup>8,9<sup></p>
        <div class="diagrammprobio__items">
            <div class="diagrammprobio__left">
                <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/lactobacillus-circle.png" alt="лактобактерии" class="diagrammprobio__left-img b-lazy">
                <div class="diagrammprobio__left-descr">Лактобактерии<br> Lactobacillus acidophilus LA-5<sup>&#174;</sup></div>
            </div>
            <div class="diagrammprobio__right">
                <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/bifidumbacterium-circle.png" alt="бифидобактерии" class="diagrammprobio__right-img b-lazy">
                <div class="diagrammprobio__right-descr">Бифидобактерии<br> Bifidumbacterium animalis ssp. Lactis BB-12<sup>&#174;</sup></div>
            </div>
        </div>
        <p class="diagrammprobio-text"><span class="strong">Именно бифидо- и лактобактерии относятся к обязательной нормальной микрофлоре толстого кишечника</span> и занимают там главное, доминирующее положение, <span class="strong">составляя 90-95% от всех микроорганизмов этой области<sup>12</sup></span></p>
        <p class="diagrammprobio-text diagrammprobio-text_mb131">Поэтому <span class="strong">достаточное количество этих бактерий в кишечнике является ключевым для&nbsp;поддержания нормального баланса кишечной микрофлоры и иммунитета,</span> на которые они непосредственно влияют.</p>
        <div class="title">Механизм действия пробиотических бифидо- и лактобактерий<sup>8,9</sup></div>
        <div class="mechanism__wrapp">
            <div class="mechanism__left">
                <div class="mechanism__left-up">Подавляют рост болезнетворных бактерий</div>
                <div class="mechanism__left-down">Защищают клетки кишечника от прикрепления болезнетворных бактерий</div>
            </div>
            <div class="mechanism__centr">
                <img src="<?= SITE_TEMPLATE_PATH ?>/img/min.png" data-src="/bitrix/templates/probiolog_rf/img/mechanizm-deistvia-bacterium.png" alt="механизм действия бактерий" class="mechanism__img b-lazy">
            </div>
            <div class="mechanism__right">
                <div class="mechanism__right-up">Уменьшают проницаемость слизистой кишечника</div>
                <div class="mechanism__right-down">Поддерживают активность клеток иммунитета</div>
            </div>
        </div>
    </div>
</div>

<div class="info">
    <div class="container">
        <button class="accordion accordion1">Источники информации<span class="accordion__right">Развернуть</span></button>
        <div class="panel">
 
				 <?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_TEMPLATE_PATH . "/include/source/probiolog-forte.php"
					)
				);?> <?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_TEMPLATE_PATH . "/include/source/fact-day.php"
					)
				);?>

           
        </div>
        <div class="info__consult">БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ</div>  
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let video = document.querySelector('video'),
            playing = false;

        video.onplay = () => {
            if (playing) return;

            ym(90584818, 'reachGoal', 'video_probiolog_forte');
            ga('send', 'event', 'sumbit', 'video_probiolog_forte');

            playing = true;
        };
    });
</script>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
