
$(document).ready(function(){
	$("#expanderHead").click(function(){
		$("#expanderContent").slideToggle();
		if ($("#expanderSign").html() == '<img src="m-images/m-menu-1.png" />'){
			$("#expanderSign").html('<img src="m-images/m-menu-2.png" />')
		}
		else {
			$("#expanderSign").html('<img src="m-images/m-menu-1.png" />')
		}
	});
});
