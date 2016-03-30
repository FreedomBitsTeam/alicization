function clear(obj) {
	obj.html('');
	return true;
}

function CloseEdu() {
	$("#drag1").css("display", "none");
	$("#helpb").css("display", "block");
	return 0;
}

function OpenEdu() {
	$("#drag1").css("display", "block");
	$("#helpb").css("display", "none");
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
			OpenEdu();
			break;
		default:
			return false;
	}
	return true;
}