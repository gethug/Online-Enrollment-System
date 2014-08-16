@extends('layouts.main3')
@section('levelcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Add Level</h2>

 	{{Form::open(array('route' => 'Level.store', 'class' => 'form-inline'))}}

	<div class="form-group div-filds">

		<div class = "div-text level">
 			{{Form::text('level', '', array('placeholder' => 'Level', 'class' => 'form-control feilds', 'id' => 'filds'))}}
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


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




