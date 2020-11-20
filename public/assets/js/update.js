$(document).ready(function() {
	let $formToDrop = $('.drop');
	console.log($formToDrop);
	$formToDrop.submit(dropBook);
});

function dropBook() {
	let conf = confirm('Are you sure?');
	if (conf) {
		let form = $(this);
		$.ajax({
			method: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			datatype: 'json',

			success: function(data) {
				loadPage();
				console.log(data);
			},

			error: function(error) {
				console.log(error);
			}

		});
	}

	return false;
}



