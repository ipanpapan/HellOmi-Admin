$(function() {
	var error_tempat = false;

	$("#form-tempat").focusout(function(){
		check_tempat();
	});

	function check_tempat() {
		if ($("#"+id).val()==null || $("#"+id).val()=="") {
			var div = $("#"+id).closest("div");
			div.addClass("has-error");
			alert("hallo");
			return false;
		};
	}
});