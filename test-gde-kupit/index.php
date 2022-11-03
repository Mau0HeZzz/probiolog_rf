<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Цена ПробиоЛог<sup>®</sup>, ПробиоЛог<sup>®</sup>&nbsp;Форте, ПробиоЛог<sup>®</sup>&nbsp;СРК: купить онлайн и в аптеках города. Информация о ценах и наличии на официальном сайте");
$APPLICATION->SetTitle("Купить ПробиоЛог<sup>®</sup>&nbsp;онлайн и в аптеках города. ПробиоЛог<sup>®</sup>&nbsp;цена");

use Bitrix\Main\Page\Asset;

// для&nbsp;подключения css
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/uteka.css");

// для&nbsp;подключения скриптов
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/uteka.js");
?>
    <div class="buy">
        <div class="container">
            <div class="bread-items">
                <div class="bread-item">
                    <a href="/">Главная</a>
                </div>
                <div class="bread-item">
                    &gt;
                </div>
                <div class="bread-item bread-item-select">
                    <a href="/probiolog-gde-kupit/">Где купить?</a>
                </div>
            </div>
            <div class="title">
                Где купить ПробиоЛог<sup>®</sup>?
            </div>
        </div>

        <div class="container">

            <? $APPLICATION->IncludeComponent("bitrix:news.list", "gde-kupit-sale", array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
                "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                "AJAX_MODE" => "N",    // Включить режим AJAX
                "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                "AJAX_OPTION_STYLE" => "N",    // Включить подгрузку стилей
                "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
                "CACHE_GROUPS" => "Y",    // Учитывать права доступа
                "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                "CACHE_TYPE" => "A",    // Тип кеширования
                "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
                "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                "DISPLAY_BOTTOM_PAGER" => "N",    // Выводить под списком
                "DISPLAY_DATE" => "N",    // Выводить дату элемента
                "DISPLAY_NAME" => "Y",    // Выводить название элемента
                "DISPLAY_PICTURE" => "Y",    // Выводить изображение для&nbsp;анонса
                "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
                "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
                "FIELD_CODE" => array(    // Поля
                    0 => "NAME",
                    1 => "PREVIEW_PICTURE",
                    2 => "",
                ),
                "FILTER_NAME" => "",    // Фильтр
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
                "IBLOCK_ID" => "13",    // Код информационного блока
                "IBLOCK_TYPE" => "probiolog",    // Тип информационного блока (используется только для&nbsp;проверки)
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
                "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
                "MESSAGE_404" => "",    // Сообщение для&nbsp;показа (по умолчанию из компонента)
                "NEWS_COUNT" => "50",    // Количество новостей на странице
                "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
                "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для&nbsp;обратной навигации
                "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
                "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
                "PAGER_TITLE" => "Новости",    // Название категорий
                "PARENT_SECTION" => "",    // ID раздела
                "PARENT_SECTION_CODE" => "",    // Код раздела
                "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для&nbsp;вывода (только для&nbsp;типа текст)
                "PROPERTY_CODE" => array(    // Свойства
                    0 => "DESCR_FOR_DISC",
                    1 => "SIZE_DISCOUNT",
                    2 => "DRUGS_FOR_PHARMACY",
                    3 => "CLASS_FOR_METRICS",
                ),
                "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
                "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
                "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
                "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
                "SET_STATUS_404" => "N",    // Устанавливать статус 404
                "SET_TITLE" => "N",    // Устанавливать заголовок страницы
                "SHOW_404" => "N",    // Показ специальной страницы
                "SORT_BY1" => "SORT",    // Поле для&nbsp;первой сортировки новостей
                "SORT_BY2" => "ACTIVE_FROM",    // Поле для&nbsp;второй сортировки новостей
                "SORT_ORDER1" => "ASC",    // Направление для&nbsp;первой сортировки новостей
                "SORT_ORDER2" => "DESC",    // Направление для&nbsp;второй сортировки новостей
                "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для&nbsp;показа списка
            ),
                false
            ); ?>


            <div class="buy__section-wrapp">
                <div class="uteka-widget">
                    <!-- Шапка виджета -->
                    <div class="uteka-widget-header">
                        <div class="container">
                            <div class="uteka-widget-header__inner">
                                <a class="uteka-widget-header__logo" href="https://uteka.ru/" target="_blank"> <img
                                            alt="Заказать в Ютеке"
                                            src="https://widget.uteka.ru/static/img/widgets/logo-light.svg"> </a>
                                <div class="uteka-widget-header__title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <iframe allow="geolocation"></iframe>
                </div>
            </div>
            <div class="container">

                <? $APPLICATION->IncludeComponent("bitrix:news.list", "gde-kupit", array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
                    "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                    "AJAX_MODE" => "N",    // Включить режим AJAX
                    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                    "AJAX_OPTION_STYLE" => "N",    // Включить подгрузку стилей
                    "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
                    "CACHE_GROUPS" => "Y",    // Учитывать права доступа
                    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                    "CACHE_TYPE" => "A",    // Тип кеширования
                    "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
                    "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                    "DISPLAY_BOTTOM_PAGER" => "N",    // Выводить под списком
                    "DISPLAY_DATE" => "N",    // Выводить дату элемента
                    "DISPLAY_NAME" => "Y",    // Выводить название элемента
                    "DISPLAY_PICTURE" => "Y",    // Выводить изображение для&nbsp;анонса
                    "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
                    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
                    "FIELD_CODE" => array(    // Поля
                        0 => "NAME",
                        1 => "PREVIEW_PICTURE",
                        2 => "",
                    ),
                    "FILTER_NAME" => "",    // Фильтр
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
                    "IBLOCK_ID" => "13",    // Код информационного блока
                    "IBLOCK_TYPE" => "probiolog",    // Тип информационного блока (используется только для&nbsp;проверки)
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
                    "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
                    "MESSAGE_404" => "",    // Сообщение для&nbsp;показа (по умолчанию из компонента)
                    "NEWS_COUNT" => "50",    // Количество новостей на странице
                    "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
                    "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для&nbsp;обратной навигации
                    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                    "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
                    "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
                    "PAGER_TITLE" => "Новости",    // Название категорий
                    "PARENT_SECTION" => "",    // ID раздела
                    "PARENT_SECTION_CODE" => "",    // Код раздела
                    "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для&nbsp;вывода (только для&nbsp;типа текст)
                    "PROPERTY_CODE" => array(    // Свойства
                        0 => "DESCR_FOR_DISC",
                        1 => "SIZE_DISCOUNT",
                        2 => "DRUGS_FOR_PHARMACY",
                        3 => "CLASS_FOR_METRICS",
                    ),
                    "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
                    "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
                    "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
                    "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
                    "SET_STATUS_404" => "N",    // Устанавливать статус 404
                    "SET_TITLE" => "N",    // Устанавливать заголовок страницы
                    "SHOW_404" => "N",    // Показ специальной страницы
                    "SORT_BY1" => "SORT",    // Поле для&nbsp;первой сортировки новостей
                    "SORT_BY2" => "ACTIVE_FROM",    // Поле для&nbsp;второй сортировки новостей
                    "SORT_ORDER1" => "ASC",    // Направление для&nbsp;первой сортировки новостей
                    "SORT_ORDER2" => "DESC",    // Направление для&nbsp;второй сортировки новостей
                    "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для&nbsp;показа списка
                ),
                    false
                ); ?>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="info__consult" style="margin-top: 0px !important;">
            БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ
        </div>
    </div>
    <div class="none-block">
        <a href="https://probiolog.ru/bitrix/templates/probiolog/instruction/probiolog_forte.pdf">ПробиоЛог<sup>®</sup>&nbsp;форте</a>
        <a href="https://probiolog.ru/bitrix/templates/probiolog/instruction/probiolog_srk.pdf">ПробиоЛог<sup>®</sup>&nbsp;СРК</a>
        <a href="https://probiolog.ru/bitrix/templates/probiolog/instruction/probiolog.pdf">ПробиоЛог<sup>®</sup></a>
        <a href="https://probiolog.ru/bitrix/templates/probiolog/covid.pdf">Ковид</a>
        <a href="https://probiolog.ru/bitrix/templates/probiolog/globalrec.pdf">Пробиотики</a>
    </div>

    <script>
        // Либо так, либо сделать страницу по нормальному, чтоб заполняли контенщики и сами вписывали цели и тд и тп
        // а писать все эти цели в верстке бред)
        document.addEventListener('DOMContentLoaded', () => {
            let buy = document.querySelectorAll('.buy-mini-item-a');

            buy.forEach(item => {
                item.addEventListener('click', () => {
                    ym(90584818, 'reachGoal', 'link_to_apteka');
                    ga('send', 'event', 'probiolog', 'link_to_apteka');
                })
            })

            let pharmacy = [];

            for (let i = 1; i <= 16; i++) {
                pharmacy.push(i);
            }

            pharmacy.forEach(item => {
                let links = document.querySelectorAll(`.js-apteka-${item}`);

                links.forEach(link => {
                    link.addEventListener('click', () => {
                        ym(90584818, 'reachGoal', `link_to_apteka_${item}`);
                    })
                })
            })
        })
    </script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>