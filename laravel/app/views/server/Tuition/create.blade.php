@extends('layouts.main3')
@section('tucreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Add Tuition fee</h2>

 	{{Form::open(array('route' => 'Tuition.store', 'class' => 'form-inline'))}}

	<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text level" style = "width:100%">
	 			<select class="form-control feilds" style = "width:96%;" name = "level">
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
 			{{Form::text('tuition', '', array('placeholder' => 'Tuition fee', 'class' => 'form-control feilds', 'id' => 'filds'))}}
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


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




