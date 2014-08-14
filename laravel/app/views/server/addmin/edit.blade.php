@extends('layouts.main3')
@section('adminedit')
<div class="container crud">
  <div class="jumbotron" id = "crud-con">
  <h2 class = "crud-head">Edit Account</h2>

 	{{Form::open(array('route' => array('administrator.update', $admin->a_id), 'class' => 'form-inline', 'method' => 'PUT'))}}


 		<h4 style = "margin-top:15px;">Name</h4>
 	<div class="form-group div-filds" style = "margin-top:0px;">
 	<div class = "div-text fname">
 		{{Form::text('Firstname', $admin->Fname, array( 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 		</div>
 		{{Form::text('Mname', $admin->Mname, array( 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 	<div class = "div-text lname">
 		{{Form::text('Lastname', $admin->Lname, array( 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 		</div>

 		@if($errors->first('Firstname')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".fname" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('Firstname')}}</h6>
			</div>
		@endif


			@if($errors->first('Lastname')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".lname" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('Lastname')}}</h6>
			</div>
		@endif

 	</div>

	<div class="form-group div-filds">

		<div class = "div-text user">
			<h4>Username</h4>
 			{{Form::text('user', $admin->user, array( 'class' => 'form-control feilds', 'id' => 'filds', 'style' => 'width:540px;'))}}
 		</div>

 		@if(Session::has('error'))
 			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".user" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ Session::get('error')}}</h6>
			</div>
 		@endif

 		@if($errors->first('user')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".user" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('user')}}</h6>
			</div>
		@endif	

 	</div>


 		{{ Form::submit('Update', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white; display:block;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




