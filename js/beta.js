﻿var stepnum = 0;

function ClickNext(obj) {	
	if ($(obj).attr('id') == "nextstep2") {
		var command = $("#email").val();
		if (command == "") { $("#error1").text("Хммм, поле же пустое!"); return 0; }
		var request = 'cmd=' + encodeURIComponent(command);
		var results = $("#st2");		
		$.ajax({
			type: "GET",
			url: "php/chemail.php",
			data: request,
			beforeSend: function(html) {
				// ...
			},
			success: function(html) {
				results.append(html);
				if ($('#usernameget').text() != "") $('#usercaption').text($('#usernameget').text()+"!");
			}
		});
	}
	if ($(obj).attr('id') == "nextstep3") {
		var email = $("#email").val();
		var uname = $("#username").val();
		if (email == "" || uname == "") { $("#error2").text("Хммм, поле же пустое!"); return 0; }
		var request = 'email=' + encodeURIComponent(email) + '&uname=' + encodeURIComponent(uname);
		var results = $("#st3");
		$.ajax({
			type: "GET",
			url: "php/inemail.php",
			data: request,
			beforeSend: function(html) {
				// ...
			},
			success: function(html) {
				results.append(html);
				$('#usercaption').text(uname+"!");
			}
		});
	}
	$("#st"+stepnum.toString()).css("display", "none");
	stepnum++;
	if ($(obj).attr('id') == "sucstep") {
		$("#overlay").css("display", "none");
	} else {
		$("#st"+stepnum.toString()).css("display", "block");
	}
}

$(function() {
	$(".bigbtn").click(function() { ClickNext(this); });
});
		