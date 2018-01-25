@extends('layout')
	@section('content')
	<div class="content">
		<div class="row">
			<div class='col-md-12'>
				<!-- Breadcrumbs Start -->
			  	<div class="row breadcrumbs">
			    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			      		<ul class="breadcrumbs">
		        			<li><a href="{{URL::to('/cms')}}">CMS</a></li>
			        		<li><a href="#">{{ ucfirst($mode) }} CMS</a></li>
			      		</ul>
			    	</div>
			  	</div>
				<!-- Breadcrumbs End -->
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>CMS</h3>
				<!-- Row Start -->
	  			<div class="row">
	  				@if(count($errors)>0)
	                    <div class="row" id="txtmsg">
	                        <div class="col-xs-12 well_status_space">
	                            <div class="well well-sm alerterror no-shadow">
	                                @foreach($errors->all() as $error)
	                                    {{ $error }} <br>
	                                @endforeach      
	                            </div>
	                        </div>
	                    </div>
	                @endif
					<!-- Basic Example Start -->
					<div class="col-sm-12">
						{{ Form::open(array('url' => 'cms/'.$mode,'method' => 'post',' class' => 'bv-form')) }}
						@if($mode=='edit')
					    	{{ Form::hidden('iCMSId', $singleCMSRecord->iCMSId, array('id' => 'iCMSId')) }}
						@endif
					</div>
    				<div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    				<div class="inner">
		      					<!-- Title Bart Start -->
					        <div class="title-bar white">
				              	<h4>{{ ucfirst($mode) }} CMS</h4>
				            </div>
					            <!-- Title Bart End -->

					            <!-- Table Holder Start -->
		        	 		<div class="table-holder">
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
										    {{ Form::label('lblstatus', 'Page Code') }}
										    {{ Form::text('tCode',($mode=='edit') ?  $singleCMSRecord->tCode:'' ,array('class'=>'form-control','placeholder'=>'Page Code')) }}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    {{ Form::label('lblstatus', 'Page Title ') }}
										    {{ Form::text('tTitle',  ($mode=='edit') ? $singleCMSRecord->tTitle:'',array('class'=>'form-control','placeholder'=>'Page Title')) }}
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-12">
										<div class="form-group">
							                {{ Form::label('lbltitle', 'Description ') }}
							                {{ Form::textarea('tDescription', ($mode=='edit') ? $singleCMSRecord->tDescription:'', ['size' => '30x5'],['id'=>'tDescription']) }}
							            </div>
									</div>
								</div>
								<div class='col-md-12'>
									<div class="col-md-6">
										{{ Form::submit('Save ',array('class'=>'btn btn-lg btn-success','id'=>'btn-save')) }}
						                {{ Form::button('Cancel',array('class'=>'btn btn-lg btn-danger','id'=>'btncancel')) }}
									</div>
								</div>
							</div>
	        				<!-- Table Holder End -->
	      				</div>
	    			</div>
	    		<!-- Basic Example End -->
	  		</div>
	  	</div>
	</div>
	<script>
	    setInterval(function() {
            $('.well_status_space').fadeOut("slow");
        }, 5000);
	    $(document).ready(function(){
	    	CKEDITOR.replace('tDescription');
			$(".textarea").wysihtml5();
		});
		$('#btncancel').click(function() {
			window.location.href ="{{URL::to('/cms')}}";
		});
	</script>
	@endsection

