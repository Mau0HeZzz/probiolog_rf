window.uteka = window.uteka || {}
window.uteka._host = 'widget.uteka.ru',
    window.uteka._queue = []
window.uteka._loaded = false
window.uteka.onReady = function (callback) {
    if (window.uteka._loaded) {
        return callback()
    }

    window.uteka._queue.push(callback)
}

let utekaJS = document.createElement('script');
    utekaJS.src = 'https://' + window.uteka._host + '/static/widgets/widget.compiled.js?l=' + Date.now();
    utekaJS.async = true;
    utekaJS.onload = () => {
        let widget = document.querySelector('.uteka-widget')

        window.uteka.loadWidget(widget, {
            productIds: ['363321', '359537', '227837']
        })
    }

utekaJS.addEventListener('load', function () {
    window.uteka._loaded = true

    window.uteka._queue.forEach(function (callback) {
        window.uteka.onReady(function () {
            callback();
        })
    })
})

document.head.appendChild(utekaJS)