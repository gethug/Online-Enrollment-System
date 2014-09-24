@extends('layouts.main3')
@section('Encreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con">
  <h3 class = "crud-head">New Enrolee<br><small>Student Information </small></h3>

 	{{Form::open(array('route' => 'Enrolee.store', 'class' => 'form-inline'))}}



<!-- div for levels //////////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text" style = "width:100%">
	 			<select class="form-control feilds" style = "width:98%;" name = "type">
				  <option value = "New">New</option>
				  <option value = "Old">Old</option>
				  <option value = "Transferee">Transferee</option>
				</select>
	 		</div>
	</div>
<!-- div for levels //////////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text" style = "width:100%">
	 			<select class="form-control feilds" style = "width:98%;" name = "level">
	 			@foreach($levels as $level)
				  <option value = "{{$level->lvl_id}}">{{$level->level}}</option>
				@endforeach
				</select>
	 		</div>
	</div>

<!-- div for mail address ////////////////////////////////////////////////////////////////////////////////////////////////////-->

	<div class="form-group div-filds" style = "width:100%">

		<div class = "div-text id" style = "width:100%">
 			{{Form::text('ID', '', array('placeholder' => 'Student ID', 'class' => 'form-control feilds', 'id' => 'filds', 'style' => 'width:98%;'))}}
 		</div>

 		@if($errors->first('ID')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".id" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('ID')}}</h6>
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

 	<!-- div for Gender////////////////////////////////////////////////////////////////////////////////////////////////////-->

 	<div class="form-group div-filds" style = "margin-top: 12px; margin-bottom: -4px;">

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
<!-- div for home address ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">
 	<div class = "div-text hadd" style = "width: 100%;">
 		{{Form::text('HomeAddress', '', array('placeholder' => 'Home Address', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 98%;'))}}
 		</div>
 		@if($errors->first('HomeAddress')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".hadd" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('HomeAddress')}}</h6>
			</div>
		@endif
 		</div>

<!-- div for city address////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">
 	<div class = "div-text cadd" style = "width: 100%;">
 		{{Form::text('CityAddress', '', array('placeholder' => 'City Address', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 98%;'))}}
 		</div>

 		@if($errors->first('CityAddress')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".cadd" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('CityAddress')}}</h6>
			</div>
		@endif
 		</div>

<!-- div for birth place and birth date////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">
 	<div class = "div-text bplace" style = "width: 70%;">
 		{{Form::text('Birthplace', '', array('placeholder' => 'Place of Birth', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 100%;'))}}
 		</div>

 		<div class = "div-text bdate" style = "width: 28%;">
 		{{Form::text('datebirth', '', array('placeholder' => 'Date of Birth', 'class' => 'form-control feilds', 'id' => 'datetimepicker', 'style' => 'width: 100%;'))}}
 		</div>

 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'Januar','Februar','March','April',
		    'May','June','July','August',
		    'September','Oktober','November','Dezember',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'d.m.Y'
		});
 	 });
 		</script>


 		@if($errors->first('Birthplace')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".bplace" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('Birthplace')}}</h6>
			</div>
		@endif

 		@if($errors->first('datebirth')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".bdate" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('datebirth')}}</h6>
			</div>
		@endif
 		</div>

 <!-- div for nationality and religion////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">
 	<div class = "div-text nat" style = "width: 48%;">
 		{{Form::text('Nationality', '', array('placeholder' => 'Nationality', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 100%;'))}}
 		</div>
 		
 	<div class = "div-text rel" style = "width: 50%;">
 		{{Form::text('Religion', '', array('placeholder' => 'Religion', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 100%;'))}}
 		</div>

 		@if($errors->first('Nationality')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".nat" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('Nationality')}}</h6>
			</div>
		@endif

 		@if($errors->first('Religion')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".rel" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('Religion')}}</h6>
			</div>
		@endif
 		</div>

 <!-- div for prev school and SY////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">
 	<div class = "div-text pschool" style = "width: 65%;">
 		{{Form::text('PreviousSchool', '', array('placeholder' => 'Previous School Attended', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 100%;'))}}
 		</div>

 	<div class = "div-text sy" style = "width: 33%;">
 		{{Form::text('Schoolyear', '', array('placeholder' => 'School Year', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 100%;'))}}
 		</div>

 		@if($errors->first('PreviousSchool')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".pschool" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('PreviousSchool')}}</h6>
			</div>
		@endif

 		@if($errors->first('Schoolyear')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".sy" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('Schoolyear')}}</h6>
			</div>
		@endif
 		</div>

<!-- div for mail address ////////////////////////////////////////////////////////////////////////////////////////////////////-->

	<div class="form-group div-filds" style = "width:100%">

		<div class = "div-text mail" style = "width:100%">
 			{{Form::text('mailaddress', '', array('placeholder' => 'Previous School Mailing Address', 'class' => 'form-control feilds', 'id' => 'filds', 'style' => 'width:98%;'))}}
 		</div>

 		@if($errors->first('mailaddress')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".mail" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('mailaddress')}}</h6>
			</div>
		@endif
 	</div>


<h4 class = "crud-head" style = " margin-top:30px; margin-bottom: -2px;">Parents/Guardian<br><small>Parents/Guardian Information </small></h4>

<!-- div for name ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds">
 	<div class = "div-text pfname">
 		{{Form::text('ParentFirstname', '', array('placeholder' => 'First name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 		</div>
 		{{Form::text('ParentMname', '', array('placeholder' => 'Middle name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 	<div class = "div-text plname">
 		{{Form::text('ParentLastname', '', array('placeholder' => 'Last name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 		</div>

 		@if($errors->first('ParentFirstname')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".pfname" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('ParentFirstname')}}</h6>
			</div>
		@endif


			@if($errors->first('ParentLastname')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".plname" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('ParentLastname')}}</h6>
			</div>
		@endif

 	</div>

 <!-- div for nationality and religion////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">
 	<div class = "div-text age" style = "width: 13%;">
 		{{Form::text('Age', '', array('placeholder' => 'Age', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 100%;'))}}
 		</div>

 		
 	<div class = "div-text hea" style = "width: 84%;">
 		{{Form::text('HEA', '', array('placeholder' => 'Highest Education Attainment', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 100%;'))}}
 		</div>

	@if($errors->first('Age')) 
				<div class = "validte">
					<script type="text/javascript">
						 $(document).ready(function(){
	         				$( ".age" ).addClass("has-error" );
						 });
					</script>
					<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('Age')}}</h6>
				</div>
			@endif

 		@if($errors->first('HEA')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".hea" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('HEA')}}</h6>
			</div>
		@endif
 		</div>
 <!-- div for mail address ////////////////////////////////////////////////////////////////////////////////////////////////////-->

	<div class="form-group div-filds" style = "width:100%">

		<div class = "div-text occ" style = "width:100%">
 			{{Form::text('Occupation', '', array('placeholder' => 'Occupation', 'class' => 'form-control feilds', 'id' => 'filds', 'style' => 'width:98%;'))}}
 		</div>

 		@if($errors->first('Occupation')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".occ" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('Occupation')}}</h6>
			</div>
		@endif
 	</div>

 	<!-- div for nationality and religion////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">
 	<div class = "div-text pnat" style = "width: 47%;">
 		{{Form::text('ParentNationality', '', array('placeholder' => 'Nationality', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 100%;'))}}
 		</div>
 	<div class = "div-text prel" style = "width: 50%;">
 		{{Form::text('ParentReligion', '', array('placeholder' => 'Religion', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 100%;'))}}
 		</div>
 		@if($errors->first('ParentNationality')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".pnat" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('ParentNationality')}}</h6>
			</div>
		@endif

 		@if($errors->first('ParentReligion')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".prel" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('ParentReligion')}}</h6>
			</div>
		@endif
 		</div>


  <!-- div for mail address ////////////////////////////////////////////////////////////////////////////////////////////////////-->

	<div class="form-group div-filds" style = "width:100%">

		<div class = "div-text mnum" style = "width:100%">
 			{{Form::text('MobileNumber', '', array('placeholder' => 'Mobile Number', 'class' => 'form-control feilds', 'id' => 'filds', 'style' => 'width:98%;'))}}
 		</div>

 		@if($errors->first('MobileNumber')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".mnum" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('MobileNumber')}}</h6>
			</div>
		@endif
 	</div>



 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




