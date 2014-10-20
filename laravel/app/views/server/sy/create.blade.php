@extends('layouts.main3')
@section('sycreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Add School year</h2>

 	{{Form::open(array('route' => 'SY.store', 'class' => 'form-inline'))}}

	<div class="form-group div-filds" style = "width: 100%">



		<script type="text/javascript">
			$(document).ready(function(){
					$( "#start" ).change(function () {

					    var str = "";
					    $( "#start option:selected" ).each(function() {
					      str += $( this ).text();
					      str++;
					    });
					    $("#end" ).val( str );
					  })
					  .change();



					  $( "#end" ).change(function () {

					    var str = "";
					    $( "#end option:selected" ).each(function() {
					      str += $( this ).text();
					      str--;
					    });
					    $("#start" ).val( str );
					  })
					  .change();
			});
		</script>


		<div class = "div-text start" style = "width:40%">
	 			<select class="form-control feilds" style = "width:96%;" name = "schoolyear" id = "start">
	 			@for ($sy = 2000; $sy <= 2030 ;$sy++)
				  <option value = "{{$sy}}">{{$sy}}</option>
				@endfor
				</select>
	 		</div>
	 			<span class = "sydash"> - </span>
	 		<div class = "div-text end" style = "width:40%">
	 			<select class="form-control feilds" style = "width:90%; margin-left:45px;" name = "end" id = "end" readonly>
	 			@for ($sy = 2001; $sy <= 2031 ;$sy++)
				  <option value = "{{$sy}}">{{$sy}}</option>
				@endfor
				</select>
	 		</div>


	 		@if($errors->first('schoolyear')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".start" ).addClass("has-error" );
         				$( ".end" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('schoolyear')}}</h6>
			</div>
		@endif

 	</div>


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




