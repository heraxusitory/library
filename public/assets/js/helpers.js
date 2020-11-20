
const helpers = {
	setLoader: function(containerToAppend) {
		containerToAppend.html(`
			<div class="loader">
				<img class="img-loader" src="/assets/ajax-loader.gif">
			</div>`
		)
	},

	getPage: function(data) {
		$.ajax({
			method: "GET",
			url: "/app/handlers/showPage.php",
			data: data,
			dataType: 'json',
			beforeSend: function() {
				let content = $('#content');
				helpers.setLoader(content);
			},
			success: function(data) {
				let content = $('#content');
				content.html(data.html);
				content.find('.form_favourite_add').submit(addToFavouriteBook);
				content.find('.form_favourite_remove').submit(removeToFavouriteBook);
				content.find('#form_auth').submit(authRequest);
				content.find('.target').on('click', reloadPage);
				content.find('.back').on('click', backReloadPage);
				let $formToDrop = content.find('.drop');
				if ($formToDrop.length > 0) {
					$formToDrop.submit(dropBook);
				}
				// console.log('Аякс запрос завершился')
			},
			error: function(error) {
				console.log(error);
			}

		})
	},

	returnPageData: () => {
		let queryString = window.location.search;
		const urlParams = new URLSearchParams(queryString);
		let page = '404';
		let data = {};

		if (urlParams.has('page')) {
			switch (urlParams.get('page')) {
				case null :
					page = '/';
				break;
				case 'book':
					page = 'book';
				break;
				case 'authors':
					page = 'authors';
				break;
				case 'favourites':
					page = 'favourites';
				break;
				case 'profile':
					page = 'profile';
				break;
				case 'genres':
					page = 'genres';
				break;
				case 'genre':
					page = 'genre';
				break;
				case 'profile':
					page = 'profile';
				break;
				case 'auth':
					page = 'auth';
				break;
				case 'author':
					page = 'author';
				break;
				default:
					page = '404'; 
				break;
			}
		} else {
			if (!urlParams.toString()) {
				page = '/';
			} else {
				page = '404';
			}
		}

		data = {
			page: page,
			id: urlParams.get('id'),
		};

		return data;
	},

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
	}

}
