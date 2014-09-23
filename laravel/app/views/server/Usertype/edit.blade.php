@extends('layouts.main3')
@section('cashedit')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%;">
  <h2 class = "crud-head">Edit User type</h2>

 	{{Form::open(array('route' => array('Usertype.update', $users->type_id), 'class' => 'form-inline', 'method' => 'PUT'))}}

			<div class="form-group div-filds">

					<div class = "div-text level">
			 			{{Form::text('usertype', $users->type, array('placeholder' => 'Usertype', 'class' => 'form-control feilds', 'id' => 'filds'))}}
			 		</div>


			 		@if($errors->first('usertype')) 
						<div class = "validte">
							<script type="text/javascript">
								 $(document).ready(function(){
			         				$( ".level" ).addClass("has-error" );
								 });
							</script>
							<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('usertype')}}</h6>
						</div>
					@endif


			 	</div>


 		{{ Form::submit('Update', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white; display:block;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




