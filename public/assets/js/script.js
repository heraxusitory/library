$(document).ready(function() {

	// Получаем форму и записываем ее в переменную
	let formAuth = $('#form_auth');

	// Вешаем на форму обработчик события
	formAuth.submit(authRequest);
})

function authRequest() {
	// получаю текущую форму и записываю ее в переменную
	let form = $(this);
	/*
	Ключевое слово this тут используется как указатель на DOM - элемент,
	 с которым производилось какое то действие, тк мы находимся в обработчике событий - 
	 отправка формы, this тут выступает как сама форма
	*/
	$.ajax({
		// 1) метод запроса (GET/POST)
		method: form.attr('method'),
		// 2) URL - адрес обработчика, куда отправляем запрос
		url: form.attr('action'),
		// 3) Данные, которые отправляем вместе с запросом
		// .serialize() применим только к форме (JQUERY),
		// он собирает все инпуты с формы и объединяет их в объект
		data: form.serialize(),
		dataType: 'json',
		// 4) Коллбэк-функция в случае успешной отправки запроса
		success: function(data) {
			let messageBox = $('#message_box');
			if (data.status == 'error') {
				if(!(messageBox.hasClass('alert-danger'))) {
					messageBox.addClass('alert-danger');
				}
				if(messageBox.hasClass('alert-success')) {
					messageBox.removeClass('alert-success');
				}
				messageBox.text(data.message);
				messageBox.show();
			}
			if (data.status == 'ok') {
				if (data.action === 'in') {
					$(location).attr('href', '?page=auth');
				} 
				if (data.action === 'out') {
					location.reload();
				}	
			}
		},
		// 5) Коллбэк-функция в случае если произошли ошибки при 
		// попытке отправить запрос (неверный урл, неправильно собран запрос итд)
		error: function (error) {
			console.log('Error: ', error);
		}
	});
	// Чтобы странница не обновлялась - 
	// прерываем базовый процесс отправки формы (тк вручную отправили уже AJAX'ом)
	return false;
}