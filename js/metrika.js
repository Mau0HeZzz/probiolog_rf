// Цель долистал до блока
let schemeBlock = document.getElementById('js-scheme');
let bingo = 0;

if (schemeBlock && bingo == 0) {
	// window.addEventListener('scroll', showVisible);
}

function isVisible(elem) {
	let coords = elem.getBoundingClientRect();
	let windowHeight = document.documentElement.clientHeight;
	let topVisible = coords.top > 0 && coords.top < windowHeight;
	let bottomVisible = coords.bottom < windowHeight && coords.bottom > 0;

	return topVisible || bottomVisible;
}

// function showVisible() {
// 	if (isVisible(schemeBlock)) {
// 		if (bingo == 0 && yaCounter90584818) {
// 			yaCounter90584818.reachGoal('scrolltoblock');
// 			ga('send', 'event', 'probiolog', 'scroll_to_use_scheme');
// 			bingo = 1;
// 		}
// 	}
// }