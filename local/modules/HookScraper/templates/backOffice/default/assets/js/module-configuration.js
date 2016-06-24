$('body').on('submit', '.clearfix', function (e) {
	e.preventDefault();
	$.ajax({
		type: $(this).attr('method'),
		url: $(this).attr('action'),
		data: $(this).serialize(),
	})
	.done(function (data, textStatus, request) {
		//$waermebedarf = request.getResponseHeader('waermebedarf');
		//if($waermebedarf != null) 
		//	$('#waermebedarf').text("Wärmebedarf ist: "+$waermebedarf+"KW");
		$("#category-products").empty().append(data);
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
		if (typeof jqXHR.responseJSON !== 'undefined') {
			if (jqXHR.responseJSON.hasOwnProperty('form')) {
				$('#form_body').html(jqXHR.responseJSON.form);
			}
			$('.form_error').html(jqXHR.responseJSON.message);
		} else {
			alert(errorThrown);
		}
	});
});