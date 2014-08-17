@extends('layouts.main3')
@section('tuedit')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Edit Tuition</h2>


 	{{Form::open(array('route' => array('Tuition.update', $tuitions->tu_id), 'class' => 'form-inline', 'method' => 'PUT'))}}

			<script type="text/javascript">
			    $(document).ready(function(){
			        $("#level option[value= {{$tuitions->lvl_id}}]").attr("selected", "selected");
				});
			</script>


	<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text level" style = "width:100%">
	 			<select class="form-control feilds" style = "width:96%;" name = "level" id = "level">
	 			@foreach($levels as $level)
				  <option value = "{{$level->lvl_id}}">{{$level->level}}</option>
				@endforeach
				</select>
	 		</div>

	 			@if($errors->first('level')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".level" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('level')}}</h6>
			</div>
		@endif

	</div>

	<div class="form-group div-filds">
		<div class = "div-text fee">
 			{{Form::text('tuition', $tuitions->tuition, array('placeholder' => 'Tuition', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>
 		@if($errors->first('tuition')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".fee" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('tuition')}}</h6>
			</div>
		@endif
 	</div>


 		{{ Form::submit('Update', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




