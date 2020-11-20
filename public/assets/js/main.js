function backReloadPage(evt) {
	evt.preventDefault();
	console.log('click');
	history.go(-1);
	// console.log(history.go(-1))
	// let queryString = window.location;
	// console.log(queryString);
	// const urlParams = new URLSearchParams();
	// let data = {
	// 	page: urlParams.get('page'),
	// 	// page: $(this).attr('href').replace('?page=', ''),
	// 	id: urlParams.get('id'),
	// };
	// console.log(data.page, data.id)
	// loadPage();

}

function reloadPage(evt) {

	evt.preventDefault();
	history.pushState(null, null, $(this).attr('href'));

	let data = helpers.returnPageData();

	helpers.getPage(data);
}

function loadPage() {

	let data = helpers.returnPageData();

	helpers.getPage(data);
}



$(document).ready(function() {
	window.addEventListener('popstate', loadPage);
	loadPage();
	// console.log("Загрузка страницы завершилась")
	$('.target').on('click', reloadPage);
	// $('.back').on('click', backReloadPage);
	// $('.step-back').on('click', backReloadPage);
});
