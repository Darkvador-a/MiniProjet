$(function() {
	
	$(".form-control").jqBootstrapValidation({
		preventSubmit: true,
		submitError: function($form, event, errors) {
			// additional error messages or events
		},
		submitSuccess: function(form, event) {
			event.preventDefault(); // prevent default submit behaviour
			// get values from FORM
			console.log("create form");
			var title = $("input#title").val();
			var description = $("textarea#description").val();
			var address = $("input#address").val();
			var link = $("input#link").val();
			var data  =  {
					title:title, 
					description:description ,
					address:address, 
					link:link,
					form: "createForm"
			};
			
			$.ajax({
				url: "../create_address.php",
				type: "POST",
				data: data,
				cache: false,
				success: function(data) {
					// Success 
					$('#success').html("<div class='alert alert-success'>");
					$('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
					.append("</button>");
					$('#success > .alert-success')
					.append("<strong>L'ajout de la nouvelle adresse est faite!!. </strong>");
					$('#success > .alert-success')
					.append('</div>');
//					console.log(data);
//				
//					
//					table.destroy();
//					table = $("#table_id").dataTable({
//						"ajax": "../create_address.php"
//					} );
//					table.api().ajax.reload();
					
				},
				error: function() {
					// Fail message
					$('#success').html("<div class='alert alert-danger'>");
					$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
					.append("</button>");
					$('#success > .alert-danger').append("<strong>Sorry " + title + ", it seems that my mail server is not responding. Please try again later!");
					$('#success > .alert-danger').append('</div>');
					//clear all fields
					$('#createForm').trigger("reset");
				},
			})
		},
		filter: function() {
			return $(this).is(":visible");
		},
	});

	$("a[data-toggle=\"tab\"]").click(function(e) {
		e.preventDefault();
		$(this).tab("show");
	});
	/*When clicking on Full hide fail/success boxes */
	$('#name').focus(function() {
		$('#success').html('');
	});
});