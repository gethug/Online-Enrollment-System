@extends('layouts.main3')
@section('subjcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con">
  <h2 class = "crud-head">Add Subject</h2>

 	{{Form::open(array('route' => 'Subject.store', 'class' => 'form-inline'))}}

<!-- div for LEvel //////////////////////////////////////////////////////////////////////////////////////////////////////////-->
	<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text" style = "width:100%">
	 			<select class="form-control feilds" style = "width:98%;" name = "level">
	 			@foreach($levels as $level)
				  <option value = "{{$level->lvl_id}}">{{$level->level}}</option>
				@endforeach
				</select>
	 		</div>
	</div>



<!-- div for subject code, name, unit ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds">
 	<div class = "div-text scode">
 		{{Form::text('subjectcode', '', array('placeholder' => 'Subject code', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 		</div>
 	<div class = "div-text sname">
 		{{Form::text('subjectname', '', array('placeholder' => 'Subject name', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 		</div>
 	<div class = "div-text unit">
 		{{Form::text('unit', '', array('placeholder' => 'Unit', 'class' => 'form-control feilds', 'id' => 'n-filds'))}}
 		</div>

 		@if($errors->first('subjectcode')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".scode" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('subjectcode')}}</h6>
			</div>
		@endif


		@if($errors->first('subjectname')) 
			<div class = "validte" style = "margin: auto 0px;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".sname" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('subjectname')}}</h6>
			</div>
		@endif


			@if($errors->first('unit')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".unit" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('unit')}}</h6>
			</div>
		@endif

		@if (Session::get('error'))
				<div class = "validte" style = "float: right;margin-right: 136px;">
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".unit" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px:" class = "val-lbl">{{ Session::get('error')}}</h6>
							</div>
				@endif

 	</div>

<!-- div for prerequisite and cost////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">

 		<div class = "div-text" style = "width:100%;">
 			<select class="form-control feilds" style = "width:98%;" name = "prerequisite">
 				  <option value = "none">none</option>
	 			@foreach($subjects as $subject)
				  <option value = "{{$subject->subj_name}}">{{$subject->subj_name}}</option>
				@endforeach
				</select>
 		</div>

 	</div>



 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




