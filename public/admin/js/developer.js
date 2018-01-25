$(document).ready(function(){
	$("#check_all").click(function(){
		$('input:checkbox').prop('checked', this.checked);
	});
	$("#btn-active").click(function() {
		$("#action").val("Active");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".msg-modal-body").html( "<p class='msgbodytxt'>Please Select Atleast One Record </p>" );
    	    $("#MsgModal").modal('show');
        	return false;
        }
	});
	$("#btn-inactive").click(function() {
		$("#action").val("Inactive");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".msg-modal-body").html( "<p class='msgbodytxt'>Please Select Atleast One Record </p>" );
    	    $("#MsgModal").modal('show');
        	return false;
        }
	});
	$("#btn-delete").click(function() {
		$("#action").val("Deleted");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".msg-modal-body").html( "<p class='msgbodytxt'>Please Select Atleast One Record </p>" );
    	    $("#MsgModal").modal('show');
        	return false;
        }
	});
	$("#btn-approve").click(function(){
		
		$("#action").val("Approve");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".msg-modal-body").html( "<p class='msgbodytxt'>Please Select Atleast One Record </p>" );
    	    $("#MsgModal").modal('show');
        	return false;
        }
	});
});
function common_redirect(url){
	window.location.href = url;
}