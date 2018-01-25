@extends('layout')
@section('content')
<div class="content">
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Administrator</h3>
			<!-- Row Start -->
  			<div class="row">
  				@if(Session::has('message'))
                <div class="row" id="txtmsg">
                    <div class="col-xs-12 well_status_space">
                        <div class="well well-sm alertnotify no-shadow">{{ Session::get('message') }}</div>
                    </div>
                </div>
                @endif
				<!-- Basic Example Start -->
					<div class="col-sm-12">
						{{ Form::open(array('url' => 'changestatus','method' => 'post',' class' => 'bv-form')) }}
						{{ Form::hidden('action', '', array('id' => 'action')) }}
						{{ Form::hidden('ids', '', array('id' => 'ids')) }}
						
						<div class="inner no-radius" style="float:right !important;">
					      <!-- Large Buttons Start -->
	                		{{ Form::submit('Make Active',array('class'=>'btn btn-lg btn-info','id'=>'btn-active')) }}
					      	{{ Form::submit('Make Inactive',array('class'=>'btn btn-lg btn-warning','id'=>'btn-inactive')) }}
	                		{{ Form::button('Add',array('class'=>'btn btn-lg btn-success','id'=>'btnadd')) }}
	                		{{ Form::submit('Delete',array('class'=>'btn btn-lg btn-danger','id'=>'btn-delete')) }}
					      <!-- Large Buttons End -->
					    </div>
					   
					</div>
    				<div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
    					<div class="inner">
	      					<!-- Title Bart Start -->
				            <div class="title-bar white">
				              <h4>List Of Administrators</h4>
				            </div>
				            <!-- Title Bart End -->

				            <!-- Table Holder Start -->
	        				<div class="table-holder">
								<table id="datatables-table" class="datatables">
	            					<thead>
	            						<th width="5%" class="checkpadding">{{ Form::checkbox('check_all[]', null, null, ['id' => 'check_all']) }}</th>
				                        <th width="25%">Name</th>
				                        <th width="30%">Email ID</th>
				                        <th width="20%">Role</th>
				                        <th width="14%">Status</th>
				                        <th width='5%'>Edit</th>
						            </thead>
					                <tbody>
						                @foreach($allAdmin as $key => $val)
					                       <tr>
					                            <td>
					                            <center>
					                              	{{ Form::checkbox('iId[]', $val->iAdminId) }}
		                                        </center>
					                            </td>
					                            <td>{{ $val->vFirstName }} {{ $val->vLastName }}</td>
					                            <td>{{ $val->vEmail }}</td>
					                            <td>{{ $val->eRole }}</td>
					                            <td>{{ $val->eStatus }}</td>
					                            <td>
					                            	<center>
					                               		<a href="administrator/edit/{{ $val->iAdminId }}"><i class="fa fa-fw fa-edit"></i></a>
					                               </center>
					                            </td>
					                        </tr>
					                    @endforeach
					                </tbody>
	          					</table>
	        				</div>
        				<!-- Table Holder End -->
      				</div>
    			</div>
    		<!-- Basic Example End -->
  		</div>
  	</div>
</div>
<script>
$(document).ready(function(){
	setInterval(function() {
            $('.well_status_space').fadeOut("slow");
        }, 2000);
	
	$("#datatables-table").dataTable({
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
    $('input[type="checkbox"]').change(function(){
	 	var vals = $(':checkbox:checked').map(function(){
         return $(this).val();
      }).get().join(',');
    	$('#ids').val(vals);
	});
    $('#btnadd').click(function() {
		window.location.href ="{{URL::to('/administrator/add')}}";
	});
 });
</script>
@endsection
