@extends('layouts.main3')
@section('mcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h3 class = "crud-head">Add Miscellaneous Fee</h3>

 	{{Form::open(array('route' => 'Miscellaneous.store', 'class' => 'form-inline'))}}



	<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text" style = "width:100%">
	 			<select class="form-control feilds" style = "width:96%;" name = "level" id = "lvl" >
	 			@foreach($levels as $level)
				  <option value = "{{$level->lvl_id}}">{{$level->level}}</option>
				@endforeach
				</select>
	 		</div>
	</div>



	<div class="form-group div-filds" style = "margin-top: -13px; margin-bottom: -17px;">

					 <div class="checkbox" style = "margin-left:10px;">
					  			<label id = "gender" style = "font-size: 14px;">

					  			{{Form::checkbox('lvl', 'all',null,['id' => 'chck'])}}
					    		All Levels

					  			</label>
						</div>


	</div>


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
 			{{Form::text('cost', '', array('placeholder' => 'Cost', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>
 		@if($errors->first('cost')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".cost" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('cost')}}</h6>
			</div>
		@endif


		<div class="form-group div-filds" style = "margin-top: 8px; margin-bottom: -17px;">

							 <div class="checkbox" style = "margin-left:10px;">
							  			<label id = "gender" style = "font-size: 17px;">

							  			{{Form::checkbox('mandatory', '1')}}
							    		Mandatory

							  			</label>
								</div>


			</div>
 	</div>



 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




