$(document).ready(function() {
	$("#drag1").draggable({ 
		handle: 'p', 
		cursor: 'move',
		snap: '.window',
		snapTolerance: 30,
		containment: "body"
	});
});