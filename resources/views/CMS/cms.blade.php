@extends('layout')
	@section('content')
	<div class="content">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>CMS</h3>
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
						{{ Form::open(array('url' => '/cms/actionUpdate','method' => 'post')) }}
						{{ Form::hidden('action', '', array('id' => 'action')) }}
						{{ Form::hidden('ids', '', array('id' => 'ids')) }}	
						<div class="inner no-radius" style="float:right !important;">
					      	{{ Form::button('Add',array('class'=>'btn btn-lg btn-success','id'=>'btnadd')) }}
	                		{{ Form::submit('Delete',array('class'=>'btn  btn-lg btn-danger','id'=>'btn-delete')) }}
					    </div>
					</div>
	    				<div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    					<div class="inner">
		      					<!-- Title Bart Start -->
					            <div class="title-bar white">
					              	<h4>List Of CMS</h4>
					            </div>
					            <!-- Title Bart End -->

					            <!-- Table Holder Start -->
		        				<div class="table-holder">
									<table id="datatables-table" class="datatables">
		            					<thead>
		            						<th width="5%" class='checkpadding'><center><input  type="checkbox" name="check_all[]" id="check_all"></center></th>
					                        <th width="25%">Page Code</th>
					                        <th width="14%">Page Title</th>
					                        <th width="6%"><center>Edit</center></th>
							            </thead>
						                <tbody>
							                @foreach($allCMS as $key => $val)
						                       <tr>
						                            <td><center>
						                            	{{ Form::checkbox('iId[]', $val->iCMSId,array('id'=>'iId[]','class'=>'unselectcheck')) }}
						                			</center>
						                            </td>
						                            <td>{{ $val->tCode }}</td>
						 	                        <td>{{ $val->tTitle }}</td>
						                            <td><center>
						                                <a href="cms/edit/{{ $val->iCMSId }}"><i class="fa fa-fw fa-edit"></i></a>
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
		{{ Form::close() }}
<script>
	$(document).ready(function(){
		$('input:checkbox').prop('checked', false);
		setInterval(function() {
	       $('.well_status_space').fadeOut("slow");
        }, 5000);
		$("#datatables-table").dataTable({
	    	"bAutoWidth": false,
	        "aaSorting": [],
	        "aoColumns": [
	            { "bSortable": false },
	            null,
	            null,
	            { "bSortable": false }
	        ]
	    });
	    $('#btnadd').click(function() {
			window.location.href ="{{URL::to('/cms/add')}}";
		});
		$('input[type="checkbox"]').change(function(){
		 	var vals = $(':checkbox:checked').map(function(){
	         	return $(this).val();
	      	}).get().join(',');
	    	$('#ids').val(vals);
		});
	});
</script>
@endsection

