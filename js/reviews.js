'use strict';

// Открываем модальное окно
function openModal(args) {
    // Закрываем все открытые окна
    let modals = document.querySelectorAll('.em-modal');
    modals.forEach(item => item.classList.remove('show'));

    if (args === undefined) args = {};

    let form = args.selector !== undefined
        ? document.querySelector(args.selector)
        : document.querySelector('.em-modal-review');

    if (args.title)
        form.querySelector('.em-modal-content__caption').innerText = args.title;

    if (args.topic)
        form.querySelector('input[name="topic"]').value = args.topic;

    if (args.purpose)
        form.querySelector('input[name="purpose"]').value = args.purpose;

    form.querySelector('.js-form').classList.remove('hide');
    if (form.querySelector('.js-form-result')) form.querySelector('.js-form-result').classList.remove('show');
    form.classList.add('show');
}

document.addEventListener("DOMContentLoaded", () => {
    // Закрываем окно по клику на крестик
    let closeModal = document.querySelectorAll('.em-modal__close');
    closeModal.forEach(item => {
        item.addEventListener('click', () => item.closest('.em-modal').classList.remove('show'));
    })

    // Закрываем окно по клику вне окна
    let feedback = document.querySelectorAll('.em-modal');
    feedback.forEach(item => {
        document.addEventListener('click', e => {
            let target = e.target,
                feedbackForm = target.querySelector('.em-modal-content'),
                its_feedback = target === feedbackForm || target.contains(feedbackForm),
                is_open = target.classList.contains('show');

            if (its_feedback && is_open) {
                target.closest('.em-modal').classList.remove('show');
            }
        });
    })
});

const sendButtons = document.querySelectorAll('.js-form__send');

sendButtons.forEach(item => {
    item.addEventListener('click', sendForm);
})

function sendForm() {
    const form = this.closest('.js-form'),
        formResult = form.parentNode.querySelector('.js-form-result'),
        resultCaption = formResult.querySelector('.js-form-result__caption'),
        resultMessage = formResult.querySelector('.js-form-result__message'),
        elements = form.querySelectorAll('input, textarea');

    // Регулярки для&nbsp;проверки ввода имени / почты / сообщения
    const validationName = /^[a-zA-Zа-яё\s-]+$/i,
        validationEmail	= /^.+@.+\..+$/i,
        validationText	= /[^\<\>\[\]%\&'`]+$/;

    let error = 0,
        purpose,
        errorMessage = {
            '0': 'Введите Ваше реальное имя',
            '1': 'Укажите Вашу электронную почту',
            '2': 'Неверный формат электронной почты',
            '3': 'Укажите Ваш номер телефона',
            '4': 'Ваше сообщение похоже на спам, уберите специальные символы',
            '5': 'Вы не согласились с условиями политики конфиденциальности',
            '6': 'Введите текст отзыва, минимум 30 символов',
        };

    // Создаем объект FormData, в который будем собирать данные из ФОС
    let formData = new FormData();

    for (let el of elements) {
        // Если не указан атрибут name, то пропускаем
        if (el.name === '') continue;

        // Находим соседний элемент с подсказкой об ошибке
        let elParent = el.closest('.js-form-item'),
            message = elParent.querySelector('.js-form-item__message');

        switch (el.nodeName) {
            case 'INPUT':
                switch (el.type) {
                    case 'text':
                        switch (el.name) {
                            // Валидация имени
                            case 'name':
                                let nameCheck = false;

                                if (validationName.test(el.value))
                                    nameCheck = true;

                                if (el.value.trim() === '' || nameCheck === false) {
                                    message.innerText = errorMessage[0];
                                    message.style.display = 'block';
                                    error = 1;
                                } else {
                                    message.style.display = 'none';
                                    formData.append(el.name, el.value);
                                }
                                break;

                            // Валидация электронной почты
                            case 'email':
                                if (el.value === '') {
                                    message.innerText = errorMessage[1];
                                    message.style.display = 'block';
                                    error = 1;
                                } else {
                                    if (validationEmail.test(el.value)) {
                                        message.style.display = 'none';
                                        formData.append(el.name, el.value);
                                    } else {
                                        message.innerText = errorMessage[2];
                                        message.style.display = 'block';
                                        error = 1;
                                    }
                                }
                                break;

                            // Если есть другие поля с типом text, то просто собираем данные из них
                            default:
                                formData.append(el.name, el.value);
                        }
                        break;

                    case 'tel':
                        if (el.name === 'phone') {
                            if (el.value === '') {
                                message.innerText = errorMessage[3];
                                message.style.display = 'block';
                                error = 1;
                            } else {
                                message.style.display = 'none';
                                formData.append(el.name, el.value);
                            }
                        }
                        break;

                    case 'checkbox':
                        // Валидация согласия с политикой
                        if (el.name === 'agree') {
                            if(!el.checked) {
                                message.innerText = errorMessage[5];
                                message.style.display = 'block';
                                error = 1;
                            } else {
                                message.style.display = 'none';
                            }
                        }
                        break;

                    // Собираем данные со скрытых полей (тема письма, метка и т.д)
                    case 'hidden':
                        switch (el.name) {
                            case 'purpose':
                                // Запись purpose необходимо для&nbsp;метрики
                                purpose = el.value;
                                formData.append(el.name, el.value);
                                break;

                            // Собираем данные с остальных полей с типом hidden (в т.ч. тему письма - [name=topic])
                            default:
                                formData.append(el.name, el.value);
                        }
                        break;
                }
                break;

            case 'TEXTAREA':
                switch (el.name) {
                    case 'review':
                        console.log(el.value.trim().length);
                        if (el.value.trim().length < 30) {
                            message.innerText = errorMessage[6];
                            message.style.display = 'block';
                            error = 1;
                        } else {
                            message.style.display = 'none';
                            formData.append(el.name, el.value);
                        }
                    break;

                    default:
                        if (el.value.trim() !== '') {
                            if (validationText.test(el.value)) {
                                message.style.display = 'none';
                            } else {
                                message.innerText = errorMessage[4];
                                message.style.display = 'block';
                                error = 1;
                            }
                        } else {
                            message.style.display = 'none';
                        }

                        formData.append(el.name, el.value);
                }
        }
    }

    // Скрываем сообщения об ошибке через 5 секунд
    if (error === 1) {
        setTimeout(() => {
            form.querySelectorAll('.js-form-item__message').forEach(message => {
                message.style.display = 'none';
            })
        }, 5000);
        return;
    }

    if (error === 0) {
        // Добавляем к собранным данным страницу с котрой отправляется ФОС
        formData.append('page', location.href);

        // для&nbsp;отладки (смотрим в консоль какие данные собираются с ФОС)
        // После отладки нещадно удаляем
        for (let pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
        }

        fetch('/ajax/reviews.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                // Проверяем статус ответа сервера (если не 200, то выбрасываем в catch)
                if (response.status !== 200) {
                    return Promise.reject();
                }

                // Декодируем json пришедший в ответ и переходим в выполнение следующего then
                // (Можно использовать response.text() если ответ приходит не в JSON формате)
                return response.json()
            })
            .then(info => {
                // Выполняем какие-то действия при успехе
                console.log(info)

                // Записываем ответ в соответствующие блоки (если ответ пришел в JSON формате)
                // Иначе дописываем свою обработку данных
                resultCaption.textContent = info.caption;
                resultMessage.textContent = info.message;
                showResult(form, formResult);
            })
            .catch(error => {
                // Выполняем какие-то действия при ошибке
                console.log(error)

                // Записываем сообщения если выполнение не дошло до php или вызвало ошибку
                resultCaption.textContent = 'Ошибка';
                resultMessage.textContent = 'Не удалось отправить отзыв';
                showResult(form, formResult);
            });

        // Очищаем поля формы после успешной отправки
        elements.forEach(el => {
            el.value = '';
        })
    }
}

// Скрываем ФОС и показываем блок с сообщением об успешной / неуспешной отправки
function showResult(form, result) {
    form.classList.add('hide');
    result.classList.add('show');
}