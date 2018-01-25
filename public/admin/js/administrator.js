$(document).ready(function() {
	$('#btnadd').on('click',function(){
		window.location = "{{URL::to('/administrator/add')}}";
	});
	$('#btncancel').on('click',function(){
		window.location = "{{URL::to('/administrator')}}";
	});

	setTimeout(function(){ $('#txtmsg').fadeOut(1000); }, 3000);

	$("#admin_listing").dataTable({
    	"bAutoWidth": false,
        "aaSorting": [],
        "aoColumns": [
            { "bSortable": false },
            null,
            null,
            null,
            null,
            { "bSortable": false }
        ]
    });
});
