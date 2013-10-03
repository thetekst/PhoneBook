// JavaScript Document
function searchF() {
	var search = $("#queryID").val();
	$.ajax({
		type: "POST",
		url: "ajaxAction.php",
		data: {"search": search},
		cache: false,                              
		success: function(response){
			$(".container").html(response);
		}
	});
}

function test() {
	var textField = $("#queryID").val();
	if(textField == '' || textField == 'Search...')
		$("#queryID").val('Введите имя');
}