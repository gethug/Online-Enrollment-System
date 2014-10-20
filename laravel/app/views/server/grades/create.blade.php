@extends('layouts.main3')
@section('gradecreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Input Grades</h2>

 	{{Form::open(array('route' => array('Grade.update', $grades->g_id), 'class' => 'form-inline', 'method' => 'PUT'))}}

	<div class="form-group div-filds">

		<div class = "div-text first">
		<label>
		First Grading
		</label>
 			{{Form::text('first', $grades->first, array('placeholder' => 'First Grading', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>

 
 		@if($errors->first('first')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".first" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('first')}}</h6>
			</div>
		@endif

		@if (Session::get('ferror'))
				<div class = "validte" >
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".first" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px:" class = "val-lbl">{{ Session::get('ferror')}}</h6>
							</div>
				@endif


 	</div>

 	<div class="form-group div-filds">

		<div class = "div-text second">
		<label>
		Second Grading
		</label>
 			{{Form::text('second', $grades->second, array('placeholder' => 'Second Grading', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>

 
 		@if($errors->first('second')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".second" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('second')}}</h6>
			</div>
		@endif

	@if (Session::get('serror'))
				<div class = "validte" >
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".second" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px:" class = "val-lbl">{{ Session::get('serror')}}</h6>
							</div>
				@endif

 	</div>

 	<div class="form-group div-filds">

		<div class = "div-text third">
		<label>
		Third Grading
		</label>
 			{{Form::text('third', $grades->third, array('placeholder' => 'Third Grading', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>

 
 		@if($errors->first('third')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".third" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('third')}}</h6>
			</div>
		@endif

		@if (Session::get('terror'))
				<div class = "validte" >
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".third" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px:" class = "val-lbl">{{ Session::get('terror')}}</h6>
							</div>
				@endif
 	</div>

 	<div class="form-group div-filds">

		<div class = "div-text fourth">
		<label>
		Fourth Grading
		</label>
 			{{Form::text('fourth', $grades->fourth, array('placeholder' => 'Fourth Grading', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>

 
 		@if($errors->first('fourth')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".fourth" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('fourth')}}</h6>
			</div>
		@endif


@if (Session::get('foerror'))
				<div class = "validte" >
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".fourth" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px:" class = "val-lbl">{{ Session::get('foerror')}}</h6>
							</div>
				@endif

 	</div>




 		{{ Form::submit('Update', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




