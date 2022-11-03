<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="disclaimer">
    <div class="container">
        Информация, представленная на сайте, носит исключительно ознакомительный характер и не является медицинской консультацией, а также не подменяет необходимость обращения к врачу при появлении признаков заболевания.
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer_wrapper">
            <div class="footer__up">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "menu-footer",
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
                <!--
                <button onclick="document.location='/probiolog-gde-kupit/'" class="button button-footer">Где купить?</button>
                -->
            </div>
            <hr class="footer__line">
            <div class="footer__down">
                <div class="footer__down-left">© <?=date('Y')?> ПробиоЛог<sup>®</sup>&nbsp;| Все права защищены</div>
                <a href="https://mayoly-spindler.ru/" target="_blank" class="footer__logo">
                    <img loading="lazy" src="/bitrix/templates/probiolog_rf/icons/footer-logo.svg" alt="логотип">
                </a>
                <a href="https://probiolog.ru/Politika_PDn_Majoli_Spindler_rus.pdf" target="_blank" class="footer__privacy" style="color:#fff;">
                    Политика конфиденциальности
                </a>
                <div class="footer__down-right">
                    <a href="https://restart-online.com/" target="_blank"><img loading="lazy" src="/bitrix/templates/probiolog_rf/icons/logorestartwhite.svg" alt="логотип"></a>
                    <!--
                    <a href="#" class="footer__email">Mayoly Spindler@mail.ru</a>
                    <a class="footer__phone" href="tel:+73472588610">8 (347) 258-86-10</a>
                    -->
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- cookies -->
<style>
  .cookies {
    background-color: rgba(0, 0, 0, 0.7);
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 15px;
    transition: all 0.3s ease 0s;
    color: #fff;
    font-size: 12px;
  }

  .cookies._hide {
    transform: translateY(100%);
  }

  .cookies  *{
    transition: all 0.3s ease 0s;
  }
  .cookies__content {
    display: flex;
    align-items: center;
    column-gap: 15px;
    color: #fff !important;
  }
  .cookies__content span {
    color: #fff !important;
    max-height: 55px;
    overflow-y: auto;
  }
  .cookies__content div {
    color: #fff;
    font-size: 12px;
  }
  .cookies__btn {
    padding: 5px;
    background-color: #fff;
    border: none;
    outline: none;
    border-radius: 15px;
    color: #000 !important;
    cursor: pointer;
    font-size: 12px;
    min-width: 65px;
  }
</style>

<div class="cookies _hide" data-delay="3000">
  <div class="cookies__container container">
    <div class="cookies__content">
      <span>Продолжая использовать наш сайт, вы даете согласие на обработку файлов cookie,  пользовательских данных (сведения о местоположении; тип  и версия ОС; тип и версия Браузера; тип устройства и разрешение его  экрана; источник откуда пришел на сайт пользователь; с какого сайта или  по какой рекламе; язык ОС и Браузера; какие страницы открывает и на  какие кнопки нажимает пользователь; ip-адрес) в целях функционирования сайта, проведения ретаргетинга  и проведения статистических исследований и обзоров. Если вы не хотите, чтобы ваши данные обрабатывались, покиньте сайт.</span>
      <button class="cookies__btn">Закрыть</button>
    </div>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const cookies = document.querySelector('.cookies');
    const cookiesBtn = document.querySelector('.cookies__btn');
    let cookiesDelay = cookies.dataset.delay;
    let cookiesOk = localStorage.getItem('cookiesOk');
    cookiesBtn.addEventListener('click', function () {
    cookies.classList.add('_hide');
    localStorage.setItem('cookiesOk', 'ok');
    })
    if (!cookiesOk) {
        setTimeout(function () {
            cookies.classList.remove('_hide');
        }, cookiesDelay);
    } else {
		cookies.remove();
	}
})
</script>
<!-- /cookies -->

<!-- page_up   -->
<a href="#up" class="pageup">
    <img src="/bitrix/templates/probiolog_rf/icons/upscroll.svg" alt="скролл вверх">
</a>

<?if($APPLICATION->GetCurPage() != '/probiolog-gde-kupit/'):?>
    <div class="fixed-mobile-block">
        <a href="/probiolog-gde-kupit/" class="where-buy fixed-mobile-where-buy" onclick="ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');">Где купить</a>
    </div>
<?endif;?>

<!-- где купить корзина -->
<!--
<a href="/probiolog-gde-kupit/" class="where-buy" onclick="ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');">Где купить</a>
-->

<?
// Установка заголовков H1 и H2 для&nbsp;страниц (необходимо для&nbsp;серанкинга)
// Нужно доработать вывод для&nbsp;страниц с компонентами
$page_h1 = $APPLICATION->AddBufferContent("ShowTitleOrHeader") ?? $APPLICATION->GetProperty("page_h1");
$page_h2 = $APPLICATION->AddBufferContent("ShowTitleOrHeader") ?? $APPLICATION->GetProperty("page_h2");
if (empty($page_h1)) {
    $page_h1 = $APPLICATION->SetPageProperty("page_h1", $APPLICATION->GetTitle());
}
if (empty($page_h2)) {
    $page_h2 = $APPLICATION->SetPageProperty("page_h2", $APPLICATION->GetTitle());
}
?>
<? /* <div style="display: none">
    <h1><? $APPLICATION->ShowProperty("page_h1") ?></h1>
    <h2><? $APPLICATION->ShowProperty("page_h2") ?></h2>
</div> */ ?>

<? if ($APPLICATION->GetCurPage() !== '/'): ?>
<!-- modal and nini-modal -->
<div class="overlay">
    <div class="modal" id="consultation">
        <div class="modal__close">x</div>
        <div class="modal__subtitle">Задайте Ваш вопрос</div>
        <!-- <div class="modal__descr">и мы перезвоним Вам</div> -->
        <form action="#" id="form" class="feed-form">
            <input id="formName" name="name" placeholder="Ваше имя*" type="text" class="form__input _req">
            <input id="formPhone" name="phone" placeholder="Ваш телефон*" type="text" class="form__input _req">
            <input id="formEmail" name="email" placeholder="Ваш E-mail*" type="text" class="form__input _req  _email">
            <textarea id="formMessage" name="message" class="form__input _req" maxlength="1000" rows="8"  placeholder="Введите сообщение" type="textarea"></textarea>
            <input type="checkbox" checked id="cb1" class="checkbox__input _req"> <label for="cb1">согласие на обработку персональных данных<br><a href="/politika-konfidentsialnosti/" class="feedback-link">политика конфиденциальности</a></label>
            <button type="submit" class="button button_submit">отправить</button>
        </form>
    </div>
    
    <div class="modal modal_mini" id="thanks">
        <div class="modal__close">x</div>
        <div class="modal__subtitle modal__subtitle-thanks">Спасибо за Ваше сообщение!</div>
        <!-- <div class="modal__descr">Наш менеджер свяжется с вами в ближайшее время</div> -->
    </div>
</div>
<? endif; ?>

<? require_once($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/modal.php'); ?>
<? require_once($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/meta.php'); ?>

<? $APPLICATION->ShowHeadScripts(); ?>

<script>
    $.fn.setCursorPosition = function(pos) {
        if ($(this).get(0).setSelectionRange) {
            $(this).get(0).setSelectionRange(pos, pos);
        } else if ($(this).get(0).createTextRange) {
            let range = $(this).get(0).createTextRange();
            range.collapse(true);
            range.moveEnd('character', pos);
            range.moveStart('character', pos);
            range.select();
        }
    };

    // Активность 30сек на сайте
    $('body').activity({
        'achieveTime': 30,
        'testPeriod': 10,
        useMultiMode: 1,
        callBack: function (e) {
            ym(90584818,'reachGoal','timeonwebsite');
        }
    });

    $("#center_ok").click(function(){
        $(this).setCursorPosition(3);
    }).mask("+7(999) 999-9999");
</script>






<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1B862MQT9Q"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1B862MQT9Q');
</script>


<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(90584818, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/90584818" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
