@extends('layouts.main3')
@section('cashcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con"  style = "width:35%">
  <h2 class = "crud-head">Add User type</h2>

 	{{Form::open(array('route' => 'Usertype.store', 'class' => 'form-inline'))}}

			<div class="form-group div-filds">

					<div class = "div-text level">
			 			{{Form::text('usertype', '', array('placeholder' => 'Usertype', 'class' => 'form-control feilds', 'id' => 'filds'))}}
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


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




