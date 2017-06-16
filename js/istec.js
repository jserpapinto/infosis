$(document).ready(function() {
	$(".form-chosen").on('submit', function() {
	  $('#chosen-error').remove();
	  if ($(this).find(".chosen").val() == "") {
	    $(this).find(".chosen").closest(".form-group").append('<div id="chosen-error">fail</div>')
	    return false;
	  }
	});
});

$(document).ready(function() {
	$(".sweet-delete").on('click', function() {
		var destination = $(this).data('destination');
		swal({
		  title: 'Tem a certeza?',
		  text: "Não será capaz de reverter!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Sim, apagar!'
		}).then(function() {
			window.location.href = destination;
		});
	})
});




