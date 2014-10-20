@extends('layouts.main3')
@section('tedit')
<div class="container crud">
  <div class="jumbotron" id = "crud-con">
  <h2 class = "crud-head">Edit teacher</h2>

 	{{Form::open(array('route' => array('Teacher.update', $teachers->t_id), 'class' => 'form-inline', 'method' => 'PUT'))}}





<!-- div for name ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds">
 	<div class = "div-text fname">
 		{{Form::text('Firstname', $teachers->fname, array('placeholder' => 'First name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 		</div>
 		{{Form::text('Mname', $teachers->mname, array('placeholder' => 'Middle name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 	<div class = "div-text lname">
 		{{Form::text('Lastname', $teachers->lname, array('placeholder' => 'Last name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
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





 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop









