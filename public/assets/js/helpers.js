
const helpers = {

	loadFormUpdateInModal: (event) => {
	    let button = $(event.currentTarget);
		let modalWindow = $('#modalContent');

        $.ajax({
            url: button.attr('data-url'),
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                modalWindow.html(data.html);
                console.log('success');
            },
            error: function (error) {
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

    sendPUT: (event) => {
	    let form = $(event.currentTarget);

        $.ajax({
            url: form.attr('action'),
            method: 'PUT',
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status === 'ok') {
                    $(location).attr('href', data.url);
                }
                if (data.status === 'error') {
                    if (data.typeName) {
                        $('input[name="name"]').addClass('is-invalid');
                    } else {
                        $('input[name="name"]').removeClass('is-invalid');
                    }
                    if (data.typeDesc) {
                        $('#description').addClass('is-invalid');
                    } else {
                        $('#description').removeClass('is-invalid');
                    }
                }
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        })
        return false;
    }



}
