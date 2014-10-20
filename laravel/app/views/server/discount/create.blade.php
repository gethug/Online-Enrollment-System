@extends('layouts.main3')
@section('dcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Add Discount</h2>

 	{{Form::open(array('route' => 'Discount.store', 'class' => 'form-inline'))}}

	<div class="form-group div-filds">
		<div class = "div-text name">
 			{{Form::text('name', '', array('placeholder' => 'Name', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>
 		@if($errors->first('name')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".name" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('name')}}</h6>
			</div>
		@endif
 	</div>

 	<div class="form-group div-filds">
		<div class = "div-text cost">
 			{{Form::text('percentage', '', array('placeholder' => 'Percentage', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>
 		@if($errors->first('percentage')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".cost" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('percentage')}}</h6>
			</div>
		@endif


@if (Session::get('error'))
				<div class = "validte" >
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".cost" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px:" class = "val-lbl">{{ Session::get('error')}}</h6>
							</div>
				@endif
 	</div>


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




