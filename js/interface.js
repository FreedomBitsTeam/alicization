var page = 1;

function ElemRemove() {
	$("#wrem").html('');
}

function NextPage() {
	$("#page"+page.toString()).css("display", "none");
	page++;
	$("#page"+page.toString()).css("display", "block");
}

function LastPage() {
	$("#page"+page.toString()).css("display", "none");
	page--;
	$("#page"+page.toString()).css("display", "block");
}

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

$(document).ready(function() {
	$("#drag1").draggable({ 
		handle: '.label', 
		cursor: 'move',
		snap: '.window',
		snapTolerance: 30,
		containment: "body"
	});
});