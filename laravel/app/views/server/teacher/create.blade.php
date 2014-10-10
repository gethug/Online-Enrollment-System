@extends('layouts.main3')
@section('tcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con">
  <h2 class = "crud-head">Add Teacher</h2>

 	{{Form::open(array('route' => 'Teacher.store', 'class' => 'form-inline'))}}





<!-- div for ID //////////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:98%;">
 	<div class = "div-text ID" style = "width: 100%">
 		{{Form::text('id', '', array('placeholder' => 'ID', 'class' => 'form-control feilds', 'style' => 'width:100%;'))}}
 		</div>
 		@if($errors->first('id')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".ID" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('id')}}</h6>
			</div>
		@endif
 	</div>

<!-- div for name ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds">
 	<div class = "div-text fname">
 		{{Form::text('Firstname', '', array('placeholder' => 'First name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 		</div>
 		{{Form::text('Mname', '', array('placeholder' => 'Middle name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 	<div class = "div-text lname">
 		{{Form::text('Lastname', '', array('placeholder' => 'Last name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
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

<!-- div for degree and AGe ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds">

 
 		<div class = "div-text age">
 			{{Form::text('age', '', array('placeholder' => 'Age', 'class' => 'form-control feilds', 'style' => 'width:177px;'))}}
 		</div>


		@if($errors->first('age')) 
			<div class = "validte" style = "float: right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".age" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('age')}}</h6>
			</div>
		@endif

 	</div>

 	<!-- div for Gender////////////////////////////////////////////////////////////////////////////////////////////////////-->

 	<div class="form-group div-filds" style = "margin-top: 12px; margin-bottom: -2px;">

					 <div class="radio" style = "margin-left:10px;">
					  			<label id = "gender">

					  			{{Form::radio('gender', 'male', true)}}
					    		Male

					  			</label>
						</div>

					<div class="radio"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::radio('gender', 'female')}}
					   					Female
					  			</label>
						</div>

	</div>

<!-- div for contact ////////////////////////////////////////////////////////////////////////////////////////////////////-->
			<div class="form-group div-filds" style = "width:98%;">
			 	<div class = "div-text contc input-group" style = "width:100%;">
			 	<div class="input-group-addon" style = "font-weight: bold; background-color: white;">+63</div>
			 		{{Form::text('contact', '', array('placeholder' => 'Contact', 'class' => 'form-control feilds', 'style' => 'width:100%;'))}}
			 		</div>

			 		@if($errors->first('contact')) 
						<div class = "validte">
							<script type="text/javascript">
								 $(document).ready(function(){
			         				$( ".contc" ).addClass("has-error" );
								 });
							</script>
							<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('contact')}}</h6>
						</div>
					@endif
			 	</div>


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




