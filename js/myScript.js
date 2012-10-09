// JavaScript Document
function searchF(){
//	alert(1);
	var search = $("#queryID").val();
	if(search != ''){
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
}

function test() {
//	alert(2);
	var textField = $("#queryID").val();
	if(textField == '' || textField == 'Search...')
		$("#queryID").val('Введите имя');
}