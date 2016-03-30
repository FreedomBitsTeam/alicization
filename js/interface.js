function clear(obj) {
	obj.html('');
	return true;
}

function CloseWin(win) {
	$(win).css("display", "none");
	$(win+"t").css("display", "block");
	return 0;
}

function OpenWin(win) {
	$(win).css("display", "block");
	$(win+"t").css("display", "none");
	return 0;
}

function PreProcCom(cmd) {
	cmd = cmd.toLowerCase();
	switch(cmd) {
		case "очисть":
		case "очисти":
		case "clear":
			clear($("#results"));
			$('#data').val('');
			break;
		case "помощь":
		case "помоги":
		case "инфо":
		case "help":
		case "info":
			$('#data').val('');
			OpenWin("#drag1");
			break;
		default:
			return false;
	}
	return true;
}