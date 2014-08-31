@extends('layouts.main3')
@section('schedcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con">
  <h2 class = "crud-head">Add Schedule</h2>

 	{{Form::open(array('route' => 'Schedule.store', 'class' => 'form-inline'))}}

<!-- div for day////////////////////////////////////////////////////////////////////////////////////////////////////-->

 	<div class="form-group div-filds" style = "margin-top: -13px; margin-bottom: -17px;">

					 <div class="checkbox" style = "margin-left:10px;">
					  			<label id = "gender">

					  			{{Form::checkbox('day', 'M', true)}}
					    		M

					  			</label>
						</div>

					<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day', 'T')}}
					   					T
					  			</label>
						</div>
						<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day', 'W')}}
					   					W
					  			</label>
						</div>
						<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day', 'TH')}}
					   					TH
					  			</label>
						</div>
						<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day', 'F')}}
					   					F
					  			</label>
						</div>
						<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day', 'S')}}
					   					S
					  			</label>
						</div>

	</div>

<!-- div for time //////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">

	$(document).ready(function(){
	$('#time').timepicker({ 'timeFormat': 'h:i A' , 'step': 15});
	$('#time').timepicker('option', { useSelect: true });
		$('#timend').timepicker({ 'timeFormat': 'h:i A' , 'step': 15});
	$('#timend').timepicker('option', { useSelect: true });
});

</script>
 	<div class="form-group div-filds" style = "width:98%;">
 	<div class = "div-text ID" style = "width: 100%">
 		<select id = "time" name = "start">
				</select>
				<span style = "font-size: 20px;"> - </span>
			<select id = "timend" name = "end">
				</select>
 		</div>
 	</div>




<!-- div for teacher ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">
 	<select class="form-control feilds" style = "width:98%;" name = "teacher">
 				@foreach($teachers as $teacher)
				  <option value = "{{$teacher->t_id}}">{{ ucwords($teacher->fname) . ' ' . ucwords($teacher->mname) . ' ' . ucwords($teacher->lname)}}</option>
				@endforeach
	 			
				</select>

 	</div>

<!-- div for subject and rooms ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">

 	<select class="form-control feilds" style = "width:50%;" name = "subject">
	 			@foreach($subjects as $subject)
				  <option value = "{{$subject->s_id}}">{{ $subject->subj_name }}</option>
				@endforeach
				</select>

	<select class="form-control feilds" style = "width:48%;" name = "room">
	 			@foreach($rooms as $room)
				  <option value = "{{$room->r_id}}">{{ $room->room }}</option>
				@endforeach
				</select>

 	</div>

 	<!-- div for levels and section ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">

 	<select class="form-control feilds" style = "width:50%;" name = "subject">
	 			@foreach($levels as $level)
				  <option value = "{{$level->lvl_id}}">{{ $level->level }}</option>
				@endforeach
				</select>

	<select class="form-control feilds" style = "width:48%;" name = "room">
	 			@foreach($sections as $section)
				  <option value = "{{$section->sec_id}}">{{ $section->section }}</option>
				@endforeach
				</select>

 	</div>

 	



 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




