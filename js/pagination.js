let loading = false;

function loadNextPage(that) {
    let experience = document.querySelector('.advice-content'),
        loadContainer = document.querySelector('.advice__wrapper'),
        loadMore = document.querySelector('.js-pagination-load'),
        loadUrl = that.getAttribute('data-url');

    if (loadUrl !== undefined && !loading) {
        // Устанавливаем индикатор загрузки (защита от дурака, предотвращение повторного нажатия)
        loading = true;

        fetch(loadUrl, {
            method: 'GET',
            headers: {
                'content-type': 'application/x-www-form-urlencoded'
            }
        })
            .then(response => {
                if (response.status !== 200) {
                    return Promise.reject();
                }

                return response.text()
            })
            .then(info => {
                let bodyAll = document.createElement('div');
                bodyAll.innerHTML = info;

                let items = bodyAll.querySelectorAll('.advice-item'),
                    pagination = bodyAll.querySelector('.js-pagination-load');

                // Добавляем элементы со следующей страницы в текущий блок
                items.forEach(item => {
                    loadContainer.insertAdjacentHTML('beforeend', item.outerHTML);
                });

                // Обновляем кнопку "загрузить ещё"
                loadMore.remove();
                if (pagination)
                    experience.insertAdjacentHTML('beforeend', pagination.outerHTML);

                // Снимаем индикатор загрузки
                loading = false;
            })
            .catch(info => {
                console.log(info);
                loading = false;
            });
    }
}