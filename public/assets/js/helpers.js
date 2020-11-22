
const helpers = {

	loadFormUpdateInModal: (button) => {
		let modalWindow = $('#modalContent');
		// console.log(button)
		$.ajax({
			url: '/app/handlers/getModal.php',
			method: 'GET',
			data: {
				id: $(button).attr('data-item-id'),
				modalType: $(button).attr('data-item-type'),
				action: $(button).attr('data-action'),
			},
			dataType: 'json',
			beforeSend: () => {
				helpers.setLoader(modalWindow);
			},
			success: (data) => {
				if (data.result) {
					// Полученный контент (форма) вставляется в модалку
					modalWindow.html(data.html);
					// Получаем саму форму, и записываем ее в переменную
					let formInModal = modalWindow.find('.form');
					// если экшн был update
					if ($(button).attr('data-action') == 'update') {
						// то вешаем на нее обработчик события для update
						formInModal.on('submit', helpers.updateInModal);
					}
					// Находим кнопку в модалке, которая не входит в форму, и вешаем на нее обработчик события на клик
					$('#modalWindow').find('.submit-modal').on('click', function() {
						// в самом обработчике мы сабмитим форму
						formInModal.submit();
					});

				} else {
					modalWindow.text(data.message);
				}
			},
			error: (error)=> {
				console.log(error);
			}
		});
	},

	updateInModal: (event) => {
		let form = $(event.currentTarget);
		console.log(form);
		$.ajax({
			method: 'POST',
			url: "/app/handlers/updateHandler.php",
			data: form.serialize(),
			dataType: 'json',
			success: function(data) {
				$('#modalWindow').find('.closeModal').click();
				loadPage();
				console.log(data);

			},
			error: function(error) {
				console.log(error);
			}

		});
		return false;
	},



}
