@extends('layouts.main3')
@section('seccreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Add Section</h2>

 	{{Form::open(array('route' => 'Section.store', 'class' => 'form-inline'))}}

	<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text" style = "width:100%">
	 			<select class="form-control feilds" style = "width:96%;" name = "level">
	 			@foreach($levels as $level)
				  <option value = "{{$level->lvl_id}}">{{$level->level}}</option>
				@endforeach
				</select>
	 		</div>
	</div>

	<div class="form-group div-filds">
		<div class = "div-text sec">
 			{{Form::text('section', '', array('placeholder' => 'Section', 'class' => 'form-control feilds', 'id' => 'filds'))}}
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
 			{{Form::text('minimum', '', array('placeholder' => 'Min', 'class' => 'form-control feilds', 'id' => 'filds', 'style' => 'width:69px;'))}}
 		</div>
 		<div class = "div-text max" style = "width: 30%; display: inline-block;">
 			{{Form::text('maximum', '', array('placeholder' => 'max', 'class' => 'form-control feilds', 'id' => 'filds', 'style' => 'width:69px;'))}}
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

<!-- <button style="position:absolute">BACK</button> -->
 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




