@extends('layouts.main3')
@section('classedit')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style= "width:35%;">
  <h2 class = "crud-head">Class Start</h2>

 	{{Form::open(array('route' => array('ClassStart.update', $starts->sy_id), 'class' => 'form-inline', 'method' => 'PUT'))}}
@if($errors->first('schoolyear')) 
		<div class="alert alert-danger alert-dismissible" role="alert" style = "font-size: 16px;">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> {{ $errors->first('schoolyear')}}
</div>
		@endif


 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text start" style = "width: 100%;">
 		{{Form::text('ClassStart', $starts->class_start, array('placeholder' => 'Start of Class', 'class' => 'form-control feilds', 'id' => 'datetimepicker', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('start')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".start" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('start')}}</h6>
			</div>
		@endif
 		
 		

 	</div>
	<div class="form-group div-filds" style = "width: 100%;">

		<div class = "div-text end" style = "width: 100%;">
 		{{Form::text('ClassEnd', $starts->class_end, array('placeholder' => 'End of Class', 'class' => 'form-control feilds', 'id' => 'datetimepicker1', 'style' => 'width: 100%;cursor: pointer;', 'readonly'))}}
 		
 			<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker1').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:"F d, Y"
		});
 	 });
 		</script>

 		</div>

 		@if($errors->first('end')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".end" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('end')}}</h6>
			</div>
		@endif


			

 	</div>


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




