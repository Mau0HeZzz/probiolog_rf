<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Какой ПробиоЛог<sup>®</sup>&nbsp;выбрать? Симптомы, причины дискомфорта: отравления, прием антибиотиков, инфекции, стресс и нарушения режима питания, СРК");
$APPLICATION->SetTitle("Подобрать ПробиоЛог<sup>®</sup>&nbsp;по симптомам онлайн");

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/quiz.js");
?>

<div class="quiz">
    <div class="container container-progress container-progress-1">
        <div class="quiz__item quiz__item_1">
            <div class="quiz__left">
                <div class="title title-quiz">Вопросы:</div>
                <div class="quiz__subtitle">Какие у вас симптомы?</div>
                <div class="quiz__buttons">
                    <a href="#" class="quiz-button quiz-button_border quiz-button-one-js">Диарея</a>
                    <a href="#" class="quiz-button quiz-button_border quiz-button-one-js">Боль в животе</a>
                    <a href="#" class="quiz-button quiz-button_border quiz-button-one-js">Вздутие</a>
                    <a href="#" class="quiz-button quiz-button_border quiz-button-one-js">Метеоризм</a>
                    <a href="#" class="quiz-button quiz-button_border quiz-button-one-js">Дискомфорт</a>
                </div>
                <div class="quiz-down">*возможен множественный вариант ответа</div>
            </div>
            <div class="quiz__right">
                <div class="quiz__numpage">1/3</div>
                <div class="button button-quiz" onclick="quizStep('1');">Дальше</div>
            </div>
        </div>
        <div class="quiz__item quiz__item_2 quiz__item-hidden">
            <div class="quiz__left">
                <div class="title title-quiz">Вопросы:</div>
                <div class="quiz__subtitle">Оцените выраженность симптомов по 10 балльной шкале:</div>
                <fieldset class="formSlider">
                    <div class="__range __range-step">
                        <input value="2" type="range" max="10" min="1" step="1" list="ticks1">
                        <datalist id="ticks1">
                            <option value="1">1 &#128522;</option>
                            <option value="2">2 &#128522;</option>
                            <option value="3">3 &#128528;</option>
                            <option value="4">4 &#128528;</option>
                            <option value="5">5 &#128549;</option>
                            <option value="6">6 &#128549;</option>
                            <option value="7">7 &#128554;</option>
                            <option value="8">8 &#128547;</option>
                            <option value="9">9 &#128555;</option>
                            <option value="10">10 &#128562;</option>
                        </datalist>
                    </div>
                </fieldset>
                <div class="quiz-down">
                    <p>10 баллов – сильно выраженные симптомы​
                    </p>
                    <p>1 балл – слабо выраженное беспокойство</p>
                </div>
            </div>
            <div class="quiz__right">
                <div class="quiz__numpage">2/3</div>
                <div class="quiz__wrapp-buttons">
                    <div class="button button-quizback" onclick="quizPrev('2');">Назад</div>
                    <div class="button button-quiz" onclick="quizStep('2');">Дальше</div>
                </div>
                
            </div>
        </div>
        <div class="quiz__item quiz__item_3 quiz__item-hidden">
            <div class="quiz__up">
                <div class="title title-quiz">Вопросы:</div>
                <div class="quiz__numpage">3/3</div>
            </div>
            <div class="quiz__subtitle">Выберите ситуации, которые для&nbsp;вас актуальны на текущий момент</div>
            <div>
                <a href="#" class="quiz-button quiz-button_border quiz-button_page3 quiz-button-three-js" data-item="a">Я недавно принимал(а) антибиотики / перенесла заболевание или отравление / был(а) на ограничительной диете</a>
                <a href="#" class="quiz-button quiz-button_border quiz-button_page3 quiz-button-three-js" data-item="b">Я сейчас принимаю антибиотики / болею инфекцией с кишечными симптомами</a>
                <a href="#" class="quiz-button quiz-button_border quiz-button_page3 quiz-button-three-js" data-item="c">Имею хронические расстройства пищеварения из-за стрессов или нарушений режима питания / перенес(ла) Covid-19 / страдаю синдромом раздраженного кишечника</a>
            </div>
            
            <div class="quiz__down-wrapp">
                <div class="quiz-down">
                    * только 1 вариант ответа
                </div>
                <div class="quiz__wrapp-buttons">
                    <div class="button button-quizback" onclick="quizPrev('3');">Назад</div>
                    <div class="button button-quiz" onclick="quizStep('3'); ym(90584818,'reachGoal','test'); ga('send', 'event', 'sumbit', 'test');">Дальше</div>
                </div>
            </div>
        </div>

        <!-- result probiolog -->

        <div class="quiz__result quiz__result_1-js quiz__result-hidden">
            <div class="quiz__result-left">
                <div class="quiz__title">Вы прошли тест</div>
                <div>
                    <p class="quiz-subtitle">Результат:</p>
                    <p class="quiz-subtitle quiz-subtitle_700" >Возможно Вам подойдет ПробиоЛог<sup>®</sup></p>
                </div>
                <p class="quiz-text">Способствует</p>
                <ul>
                    <li>Восстановлению баланса микрофлоры<sup>8</sup></li>
                    <li>Снижению продолжительности и тяжести диареи<sup>1</sup></li>
                    <li>Можно принимать 1 раз в день<sup>1</sup></li>
                </ul>
                <div class="quiz__result-buttons">
                    <a href="/probiolog-gde-kupit/" class="button button-result" onclick="ym(90584818,'reachGoal','click_discount'); ga('send', 'event', 'probiolog', 'click_discount');">Где купить?</a>
                    <a href="/probiolog/" class="button button-result button-result-right">Подробнее</a>
                </div>
            </div>
            <div class="quiz__result-right">
                <div class="quiz__result-title">Базовая концентрация
                для&nbsp;восстановления <br> баланса микрофлоры</div>
                <div class="quiz__result-img">
                    <img src="/bitrix/templates/probiolog/img/boxes/products-mainpage1.png" alt="ПробиоЛог<sup>®</sup>">
                </div>
            </div>
            <div class="quiz__conor">с 7 лет</div>
        </div>

        <!-- result probiolog forte -->

        <div class="quiz__result quiz__result_2-js quiz__result-forte quiz__result-hidden">
            <div class="quiz__result-left">
                <div class="quiz__title">Вы прошли тест</div>
                <div>
                    <p class="quiz-subtitle">Результат:</p>
                    <p class="quiz-subtitle quiz-subtitle_700" >Возможно Вам подойдет ПробиоЛог<sup>®</sup>&nbsp;форте</p>
                </div>
                <p class="quiz-text">Способствует</p>
                <ul>
                    <li>Улучшению переносимости антибиотиков<sup>11</sup></li>
                    <li>Восстановлению нормальной микрофлоры<sup>9</sup></li>
                    <li>Снижению риска и тяжести диареи<sup>1</sup></li>
                </ul>
                <div class="quiz__result-buttons">
                    <a href="/probiolog-gde-kupit/" class="button button-result">Где купить?</a>
                    <a href="/probiolog-forte/" class="button button-result button-result-right">Подробнее</a>
                </div>
            </div>
            <div class="quiz__result-right">
                <div class="quiz__result-title quiz__result-title-large">Двойная концентрация <br>
                    для&nbsp;интенсивного восстановления <br>
                    в сложных ситуациях </div>
                <div class="quiz__result-img">
                    <img src="/bitrix/templates/probiolog/img/boxes/products-mainpage2.png" alt="ПробиоЛог<sup>®</sup>">
                </div>
            </div>
            <div class="quiz__conor">с 7 лет</div>
        </div>

        <!-- result probiolog srk -->

        <div class="quiz__result quiz__result_3-js quiz__result-srk quiz__result-hidden">
            <div class="quiz__result-left">
                <div class="quiz__title">Вы прошли тест</div>
                <div>
                    <p class="quiz-subtitle">Результат:</p>
                    <p class="quiz-subtitle quiz-subtitle_700" >Возможно Вам подойдет ПробиоЛог<sup>®</sup>&nbsp;СРК</p>
                </div>
                <p class="quiz-text">Способствует</p>
                <ul>
                    <li>Снижению боли и вздутия живота<sup>3</sup></li>
                    <li>Нормализации моторики и стула<sup>7</sup></li>
                    <li>Улучшению качества жизни при СРК<sup>2</sup></li>
                </ul>
                <div class="quiz__result-buttons">
                    <a href="/probiolog-gde-kupit/" class="button button-result">Где купить?</a>
                    <a href="/probiolog-srk/" class="button button-result button-result-right">Подробнее</a>
                </div>
            </div>
            <div class="quiz__result-right">
                <div class="quiz__result-title quiz__result-title-large">Специальный пробиотик, разработанный для&nbsp;хронических расстройств&nbsp;ЖКТ<sup>2</sup></div>
                <div class="quiz__result-img quiz__result-img-orange">
                    <!-- <a href="/probiolog-gde-kupit/" class="event-button quiz__result-img-event" onclick="ym(90584818,'reachGoal','click_discount_6'); ga('send', 'event', 'probiolog', 'click_discount'); ym(90584818,'reachGoal','link_promo1'); ym(90584818,'reachGoal','probiologgg_where_to_buy'); ga('send', 'event', 'probiolog', 'where_to_buy');">
                        <? /* <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <path d="M29.5313 0H28.1248V0.448C26.1668 0.886 25.8853 2.7035 25.7748 3.398C25.7223 3.7265 25.6158 4.369 25.4838 5.156H0.993812C0.0248118 5.156 -0.0836882 6.0615 0.0428118 6.5625L2.91581 19.246C3.04181 19.747 3.57231 20.156 4.09231 20.156H25.5643C26.0813 20.156 26.5028 20.5765 26.5028 21.0935C26.5028 21.6105 26.0813 22.031 25.5643 22.031H2.12731C1.87867 22.031 1.64021 22.1298 1.4644 22.3056C1.28858 22.4814 1.18981 22.7199 1.18981 22.9685C1.18981 23.2171 1.28858 23.4556 1.4644 23.6314C1.64021 23.8072 1.87867 23.906 2.12731 23.906H3.34231C2.75566 24.2299 2.26661 24.7052 1.9261 25.2823C1.58559 25.8595 1.4061 26.5174 1.40631 27.1875H2.34381C2.34381 28.74 3.60381 30 5.15631 30C6.70881 30 7.96881 28.74 7.96881 27.1875H8.90631C8.90643 26.5173 8.72683 25.8594 8.38624 25.2823C8.04565 24.7051 7.55652 24.2299 6.96981 23.906H20.2168C19.6301 24.2299 19.141 24.7051 18.8004 25.2823C18.4598 25.8594 18.2802 26.5173 18.2803 27.1875H19.2178C19.2317 27.9244 19.5342 28.6264 20.0602 29.1426C20.5862 29.6588 21.2938 29.948 22.0308 29.948C22.7678 29.948 23.4754 29.6588 24.0014 29.1426C24.5274 28.6264 24.8299 27.9244 24.8438 27.1875H25.7813C25.7814 26.5174 25.6018 25.8596 25.2613 25.2824C24.9208 24.7053 24.4319 24.23 23.8453 23.906H25.5653C26.3111 23.9056 27.0262 23.6092 27.5536 23.0818C28.081 22.5544 28.3774 21.8393 28.3778 21.0935C28.3777 20.7241 28.3049 20.3583 28.1635 20.017C28.0221 19.6758 27.8148 19.3657 27.5535 19.1046C27.2923 18.8434 26.9822 18.6362 26.6408 18.4949C26.2995 18.3536 25.9337 18.2809 25.5643 18.281H25.2158L26.4148 10.826C26.7488 8.857 27.4688 4.6035 27.6378 3.5455C27.7228 3.011 27.8053 2.6355 28.1248 2.425V2.812H29.5313C29.6554 2.81161 29.7742 2.76219 29.862 2.67452C29.9497 2.58685 29.9993 2.46805 29.9998 2.344V0.469C29.9995 0.344781 29.9501 0.225718 29.8623 0.137835C29.7745 0.0499516 29.6555 0.000396165 29.5313 0ZM5.15631 28.594C4.78341 28.5936 4.42589 28.4453 4.1622 28.1816C3.89852 27.9179 3.75021 27.5604 3.74981 27.1875H6.56231C6.56191 27.5603 6.41367 27.9178 6.1501 28.1814C5.88652 28.4451 5.52913 28.5935 5.15631 28.594ZM22.0313 28.594C21.6583 28.5937 21.3007 28.4455 21.0369 28.1818C20.7731 27.9181 20.6247 27.5605 20.6243 27.1875H23.4378C23.4371 27.5603 23.2888 27.9177 23.0251 28.1813C22.7615 28.4449 22.4041 28.5933 22.0313 28.594ZM20.8778 7.497C20.8943 7.36992 20.9559 7.25299 21.0513 7.16747C21.1467 7.08195 21.2697 7.03353 21.3978 7.031H24.3663C24.6243 7.031 24.8038 7.239 24.7633 7.4945L24.4693 9.38C24.4303 9.635 24.1858 9.8435 23.9273 9.8435H21.0958C21.0362 9.84508 20.9769 9.83372 20.9221 9.81022C20.8673 9.78671 20.8182 9.75161 20.7783 9.70733C20.7383 9.66304 20.7084 9.61063 20.6906 9.5537C20.6729 9.49676 20.6676 9.43665 20.6753 9.3775L20.8778 7.497ZM20.3733 12.1845C20.3901 12.0575 20.4518 11.9408 20.5471 11.8553C20.6425 11.7699 20.7653 11.7213 20.8933 11.7185H23.6348C23.8933 11.7185 24.0723 11.9265 24.0333 12.182L23.8118 13.599C23.7723 13.854 23.5283 14.0625 23.2698 14.0625H20.6413C20.5817 14.0639 20.5226 14.0524 20.4678 14.0289C20.4131 14.0053 20.3641 13.9702 20.3242 13.926C20.2842 13.8817 20.2543 13.8294 20.2365 13.7725C20.2187 13.7157 20.2133 13.6556 20.2208 13.5965L20.3733 12.1845ZM2.43281 9.3885L1.95781 7.486C1.89581 7.235 2.05681 7.031 2.31531 7.031H5.84481C6.10381 7.031 6.33731 7.2405 6.36481 7.497L6.56681 9.378C6.57431 9.43708 6.56897 9.49707 6.55116 9.5539C6.53335 9.61073 6.5035 9.66304 6.46363 9.70727C6.42376 9.75151 6.37482 9.78662 6.32014 9.81022C6.26547 9.83381 6.20635 9.84534 6.14681 9.844H3.01631C2.75831 9.844 2.49531 9.6385 2.43281 9.3885ZM4.06831 14.0625C3.81031 14.0625 3.54731 13.8575 3.48531 13.6075L3.12731 12.174C3.06481 11.923 3.22481 11.719 3.48331 11.719H6.34781C6.60631 11.719 6.84031 11.9285 6.86781 12.185L7.01981 13.597C7.02739 13.6561 7.02212 13.7161 7.00434 13.773C6.98657 13.8298 6.95671 13.8822 6.91683 13.9265C6.87694 13.9707 6.82797 14.0058 6.77325 14.0294C6.71853 14.053 6.65937 14.0644 6.59981 14.063H4.06831V14.0625ZM7.05281 18.2815H5.12031C4.86081 18.2815 4.59931 18.0765 4.53681 17.8265L4.17881 16.393C4.11681 16.142 4.27681 15.938 4.53581 15.938H6.80081C7.05931 15.938 7.29331 16.1475 7.32181 16.404L7.47281 17.816C7.4804 17.8751 7.47513 17.9351 7.45735 17.9919C7.43957 18.0488 7.40971 18.1011 7.36982 18.1453C7.32992 18.1895 7.28093 18.2246 7.22622 18.2481C7.1715 18.2716 7.11235 18.283 7.05281 18.2815ZM12.7988 17.8125C12.7983 17.9369 12.7486 18.056 12.6605 18.1439C12.5725 18.2318 12.4532 18.2812 12.3288 18.2815H9.88331C9.75528 18.2789 9.63245 18.2304 9.53712 18.1449C9.44179 18.0594 9.3803 17.9425 9.36381 17.8155L9.21181 16.4035C9.20406 16.3444 9.20921 16.2844 9.22689 16.2275C9.24457 16.1706 9.27437 16.1182 9.31423 16.0739C9.3541 16.0296 9.40309 15.9945 9.45782 15.9709C9.51256 15.9474 9.57175 15.936 9.63131 15.9375H12.3288C12.4533 15.9375 12.5727 15.9869 12.6608 16.0748C12.7489 16.1627 12.7985 16.282 12.7988 16.4065V17.8125ZM12.7988 13.594C12.7983 13.7184 12.7486 13.8375 12.6605 13.9254C12.5725 14.0133 12.4532 14.0627 12.3288 14.063H9.42981C9.17181 14.063 8.93881 13.8535 8.90981 13.597L8.75881 12.185C8.75115 12.1259 8.75636 12.0659 8.77407 12.0091C8.79178 11.9522 8.82159 11.8998 8.86143 11.8556C8.90128 11.8113 8.95023 11.7762 9.00493 11.7526C9.05962 11.729 9.11877 11.7176 9.17831 11.719H12.3288C12.4533 11.719 12.5727 11.7684 12.6608 11.8563C12.7489 11.9442 12.7985 12.0635 12.7988 12.188V13.594ZM12.7988 9.375C12.7983 9.4994 12.7486 9.61853 12.6605 9.7064C12.5725 9.79427 12.4532 9.84374 12.3288 9.844H8.97781C8.84969 9.84147 8.72674 9.79305 8.63131 9.70753C8.53588 9.62201 8.47431 9.50508 8.45781 9.378L8.25581 7.497C8.24823 7.43791 8.25351 7.37788 8.27128 7.32101C8.28906 7.26415 8.31891 7.2118 8.3588 7.16755C8.39868 7.12329 8.44766 7.08818 8.50237 7.06461C8.55709 7.04104 8.61625 7.02958 8.67581 7.031H12.3293C12.4538 7.031 12.5732 7.08038 12.6613 7.16831C12.7494 7.25623 12.799 7.37552 12.7993 7.5V9.375H12.7988ZM17.8783 17.8155C17.8617 17.9425 17.8001 18.0594 17.7047 18.1449C17.6093 18.2304 17.4864 18.2789 17.3583 18.2815H15.1483C15.024 18.2812 14.9048 18.2318 14.8168 18.1439C14.7288 18.056 14.6792 17.9369 14.6788 17.8125V16.406C14.6791 16.2816 14.7286 16.1624 14.8166 16.0745C14.9047 15.9866 15.0239 15.9371 15.1483 15.937H17.6103C17.8683 15.937 18.0583 16.1465 18.0303 16.403L17.8783 17.8155ZM18.3313 13.5965C18.3147 13.7235 18.2531 13.8404 18.1577 13.9259C18.0623 14.0114 17.9394 14.0599 17.8113 14.0625H15.1483C15.024 14.0622 14.9048 14.0128 14.8168 13.9249C14.7288 13.837 14.6792 13.7179 14.6788 13.5935V12.187C14.6791 12.0626 14.7286 11.9434 14.8166 11.8555C14.9047 11.7676 15.0239 11.7181 15.1483 11.718H18.0633C18.3218 11.718 18.5113 11.9275 18.4828 12.184L18.3313 13.5965ZM18.7843 9.378C18.7677 9.50503 18.7061 9.62191 18.6107 9.70741C18.5153 9.79291 18.3924 9.84137 18.2643 9.844H15.1483C15.024 9.84374 14.9048 9.79426 14.8168 9.70637C14.7288 9.61849 14.6792 9.49935 14.6788 9.375V7.5C14.6791 7.37561 14.7286 7.25639 14.8166 7.16848C14.9047 7.08057 15.0239 7.03113 15.1483 7.031H18.5668C18.8253 7.031 19.0148 7.2405 18.9873 7.497L18.7843 9.378ZM22.4003 18.2815V18.278L22.3963 18.2815H20.1883C20.1738 18.2815 20.1613 18.2745 20.1468 18.2725C20.1443 18.2555 20.1443 18.2385 20.1413 18.2205L20.1193 18.2665C20.1254 18.2681 20.1316 18.2695 20.1378 18.2705C19.9073 18.244 19.7423 18.0535 19.7688 17.8155L19.9198 16.4035C19.9366 16.2765 19.9983 16.1598 20.0936 16.0743C20.189 15.9889 20.3118 15.9403 20.4398 15.9375H22.9778C23.2363 15.9375 23.4143 16.1455 23.3753 16.401L23.1538 17.818C23.1153 18.073 22.8713 18.2815 22.6128 18.2815H22.4003Z" fill="white"/>
                        </svg> */ ?>
                        Купить по акции
                    </a> -->
                    <img src="/bitrix/templates/probiolog/img/boxes/products-mainpage3.png" alt="ПробиоЛог<sup>®</sup>">
                </div>
            </div>
            <div class="quiz__conor">с 14 лет</div>
        
        </div>
         
        
    </div>
</div>


<div class="info">
    <div class="container">
        
        <button class="accordion">Источники информации<span class="accordion__right">Развернуть</span></button>
        <div class="panel">
        <p class="accordion__content">*Комбинация 3-ех штаммов: Lactobacillus plantarum (CECT 7484  7485) и Pediococcus acidilactic (CECT 7483)
</p>
        <p class="accordion__content">1. Bhalla A. et al. J Clin Pharmacol. 2011; 2 (2): 90 - 94. RU.77.99.11.003.Е.002958.07.18</p>
        <p class="accordion__content">2. В. Лоренцо – Зунига «Новая комбинация пробиотиков I.31 улучшает качество жизни при синдроме раздраженного кишечника». World J Gastroenterol 2014 July 14; 20 (26): 8709-8716
</p>
        <p class="accordion__content">3. Nobaek et al 2000. Nuedzielin et al 2001; Ducrotte et al 2012
</p>
        <p class="accordion__content">7. Инструкция по применению ПробиоЛог<sup>®</sup>&nbsp;СРК
</p>
        <p class="accordion__content">8. Инструкция по применению ПробиоЛог<sup>®</sup></p>
        <p class="accordion__content">9. Инструкция по применению ПробиоЛог<sup>®</sup>&nbsp;форте
</p>
        <p class="accordion__content">11. Black et al. Effect of lactic acid producing bacteria on the human intestinal microflora. Scan J Infect Dis 1991; 23 : 247-254
</p>
        
        </div>
        
        
        
        <div class="info__consult">БАД. НЕ ЯВЛЯЕТСЯ ЛЕКАРСТВЕННЫМ СРЕДСТВОМ</div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
