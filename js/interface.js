
function clear(obj) {
		
	obj.html('');
	return true;
		
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
		default:
			return false;
	}
	return true;
}