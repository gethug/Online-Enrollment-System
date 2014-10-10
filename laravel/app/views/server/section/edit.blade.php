@extends('layouts.main3')
@section('secedit')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Edit Section</h2>


 	{{Form::model($section, array('route' => array('Section.update', $section->sec_id), 'class' => 'form-inline', 'method' => 'PUT'))}}

			<script type="text/javascript">
			    $(document).ready(function(){
			        $("#level option[value= {{$section->lvl_id}}]").attr("selected", "selected");
				});
			</script>


	<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text" style = "width:100%">
	 			<select class="form-control feilds" style = "width:96%;" name = "level" id = "level">
	 			@foreach($levels as $level)
				  <option value = "{{$level->lvl_id}}">{{$level->level}}</option>
				@endforeach
				</select>
	 		</div>
	</div>

	<div class="form-group div-filds">
		<div class = "div-text sec">
 			{{Form::text('section', null, array('placeholder' => 'Section', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>
 		@if($errors->first('section')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".sec" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('section')}}</h6>
			</div>
		@endif
 	</div>

 	<div class="form-group div-filds">
 	<label style = "width: 100%;">
 		No. of Students
 	</label>
		<div class = "div-text min" style = "width: 30%; display: inline-block;">
 			{{Form::text('minimum', $section->min, array('placeholder' => 'Min', 'class' => 'form-control feilds', 'id' => 'filds', 'style' => 'width:69px;'))}}
 		</div>
 		
 		<div class = "div-text max" style = "width: 30%; display: inline-block;">
 			{{Form::text('maximum', $section->max, array('placeholder' => 'max', 'class' => 'form-control feilds', 'id' => 'filds', 'style' => 'width:69px;'))}}
 		</div>
 		@if($errors->first('minimum')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".min" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('minimum')}}</h6>
			</div>
		@endif

		@if($errors->first('maximum')) 
			<div class = "validte" >
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".max" ).addClass("has-error" );
					 });
				</script>
			
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('maximum')}}</h6>
			</div>
		@endif

 	</div>


 		{{ Form::submit('Update', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




