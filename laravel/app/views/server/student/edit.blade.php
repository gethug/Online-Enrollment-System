@extends('layouts.main3')
@section('studedit')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Edit Student Account</h2>

 	{{Form::open(array('route' => array('Student.update', $students->en_id), 'class' => 'form-inline', 'method' => 'PUT'))}}


<script type="text/javascript">
	  $(document).ready(function() {
	   $("#e1").select2(); 
	    $("#e1 option[value= {{$students->en_id}}]").attr("selected", "selected");
	});

</script>
 	



	<div class="form-group div-filds">

		<div class = "div-text user">
 			{{Form::text('user', $students->user, array('placeholder' => 'Username', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>


 		@if($errors->first('user')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".user" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('user')}}</h6>
			</div>
		@endif




			

 	</div>


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




