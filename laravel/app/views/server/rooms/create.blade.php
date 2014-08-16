@extends('layouts.main3')
@section('rmcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Add Room</h2>

 	{{Form::open(array('route' => 'Room.store', 'class' => 'form-inline'))}}

	<div class="form-group div-filds">

		<div class = "div-text room">
 			{{Form::text('room', '', array('placeholder' => 'Room', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>

 		@if($errors->first('room')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".room" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('room')}}</h6>
			</div>
		@endif


 	</div>


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




