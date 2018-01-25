@extends('layout')
@section('content')
<div class="content">
    <div class="row">
        <div class='col-md-12'>
            <!-- Breadcrumbs Start -->
            <div class="row breadcrumbs">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="{{URL::to('/administrator')}}">Administrator</a></li>
                        <li><a href="#">{{ ucfirst($mode) }} Administrators</a></li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumbs End -->
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Administrator</h3>
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
                {{ Form::open(array('url' => 'administrator/'.$mode,'method' => 'post',' class' => 'bv-form')) }}
				@if($mode=='edit')
			    {{ Form::hidden('iAdminId', $singleAdminRecord->iAdminId, array('id' => 'iAdminId')) }}
			    @endif
                
            </div>
            <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="inner">
                    <!-- Title Bart Start -->
                    <div class="title-bar white">
                        <h4>{{ucfirst($mode)}} Administrator</h4>
                    </div>
                    <!-- Title Bart End -->

                    <!-- Table Holder Start -->
                    <div class="table-holder">
                        <div class="col-md-12">
							<div class="col-md-6">
								<div class="form-group">
					                {{ Form::label('lblfname', 'Firstname ') }}
					                {{ Form::text('vFirstName', ($mode=='edit') ? $singleAdminRecord->vFirstName : '',array('class'=>'form-control','placeholder'=>'')) }}
					            </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
					                {{ Form::label('lbllname', 'Lastname ') }}
					                {{ Form::text('vLastName', ($mode=='edit') ? $singleAdminRecord->vLastName : '',array('class'=>'form-control','placeholder'=>'')) }}
					            </div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<div class="form-group">
									{{ Form::label('lblemail', 'Email ID ') }}
					                {{ Form::text('vEmail', ($mode=='edit') ? $singleAdminRecord->vEmail : '',array('class'=>'form-control','placeholder'=>'',($mode=='edit') ? 'disabled' : '')) }}
								</div>
							</div>
                            @if($mode=='add')
							<div class="col-md-6">
								<div class="form-group">
									{{ Form::label('lblpassword', 'Password ') }}
					                {{ Form::password('vPassword',array('class'=>'form-control','placeholder'=>'Password')) }}
								</div>
							</div>
                            @endif
						</div>
                        <div class="col-md-12">
							<div class="col-md-6">
								<div class="form-group">
									<?php $status_arr = array(''=>'Select Status','Active'=>'Active','Inactive'=>'Inactive'); ?>
								    {{ Form::label('lblstatus', 'Status ') }}
								    {{ Form::select('eStatus', $status_arr, ($mode=='edit') ? $singleAdminRecord->eStatus : null, array('class' => 'form-control')) }}
								</div>  
							</div>
							<div class="col-md-6">
								<div class="form-group">
									{{ Form::label('', '',array('id'=>'formtoplabl')) }}
								    {{ Form::submit(($mode=='add') ? 'Save' : 'Save Changes',array('class'=>'btn btn-lg btn-success','id'=>'btn-save')) }}
                                    {{ Form::button('Cancel',array('class'=>'btn btn-lg btn-danger','id'=>'btncancel')) }}
                                </div>
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
    $('#btncancel').click(function() {
        window.location.href ="{{URL::to('/')}}";
    });
    
 });
</script>



@endsection
