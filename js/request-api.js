$(function() {
	
	$("#send").click(function() {
		
		var command = $("#data").val(); // получаем то, что написал пользователь
		var request = 'cmd=' + command; // формируем строку запроса

		if (command) {
			// делаем ajax запрос
			$.ajax({
				type: "GET",
				url: "php/analyze-api.php",
				data: request,
				beforeSend: function(html) { // запустится до вызова запроса
					$("#results").html('');
					$("#string").show();
					$(".command").html(command);
					$("#send").disabled = true;
				},
				success: function(html){ // запустится после получения результатов
					$("#results").show();
					$("#results").append(html);
					$("#send").disabled = false;
				}
			});
		}
		return false;
  });
  
});