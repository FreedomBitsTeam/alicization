$(function() {
	
	$("#send").click(function() {
		
		var input = $("#data");					// где берем даные
		var command = input.val(); 			// получаем то, что написал пользователь
		var request = 'cmd=' + encodeURIComponent(command); // формируем строку запроса	
		var container = $('.messages');	// где лежат сообщения
		var results = $("#results");		// куда положим результат

		if (command) {
			if (!PreProcCom(command)) {
				// делаем ajax запрос
				$.ajax({
					type: "GET",
					url: "php/analyze.php",
					data: request,
					beforeSend: function(html) { // запустится до вызова запроса
						input.val('');
						results.append('<div class="my msg">'+command+'<div class="msg-right"></div></div>');	
    	    	container[0].scrollTop = container[0].scrollHeight;
    				ReachGoal('SendRequest');
					},
					success: function(html) { // запустится после получения результатов
						ReachGoal('GetAnswer');
						results.append(html);
    	    	container[0].scrollTop = container[0].scrollHeight;
					}
				});
			}
		}
		return false;
  });
  
});