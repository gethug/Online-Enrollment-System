@extends('layouts.main3')
@section('medit')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h3 class = "crud-head">Edit Fee</h3>

 	{{Form::open(array('route' => array('Miscellaneous.update', $miscs->m_id), 'class' => 'form-inline', 'method' => 'PUT'))}}

 	<script type="text/javascript">
			    $(document).ready(function(){
			        $("#level option[value= {{$miscs->lvl_id}}]").attr("selected", "selected");
			         $("#fee option[value= {{$miscs->m_type}}]").attr("selected", "selected");
				});
		</script>

		<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text fee" style = "width:100%">
	 			<select class="form-control feilds" style = "width:96%;" name = "fee" id = "fee" >
	 			<option value = "">-Type of Fee-</option>
				<option value = "other">Other School Fee</option>
				<option value = "miscellaneous">Miscellaneous Fee</option>
				</select>
	 		</div>
	 		@if($errors->first('fee')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".fee" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('fee')}}</h6>
			</div>
		@endif
	</div>

	<div class="form-group div-filds" style = "width:100%">
			<div class = "div-text" style = "width:100%">
	 			<select class="form-control feilds" style = "width:96%;" name = "level"  id = "level">
	 			@foreach($levels as $level)
				  <option value = "{{$level->lvl_id}}">{{$level->level}}</option>
				@endforeach
				</select>
	 		</div>
	</div>


	<div class="form-group div-filds">
		<div class = "div-text name">
 			{{Form::text('name', $miscs->m_name, array('placeholder' => 'Name', 'class' => 'form-control feilds', 'id' => 'filds'))}}
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
 			{{Form::text('cost', $miscs->m_fee, array('placeholder' => 'Cost', 'class' => 'form-control feilds', 'id' => 'filds'))}}
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
							 @if($miscs->mandatory == 1)
							  			<label id = "gender" style = "font-size: 17px;">

							  			{{Form::checkbox('mandatory', '1', 'true')}}
							    		Mandatory

							  			</label>

							  @else

							  			<label id = "gender" style = "font-size: 17px;">

							  			{{Form::checkbox('mandatory', '1')}}
							    		Mandatory

							  			</label>


							@endif
								</div>


			</div>
 	</div>



 		{{ Form::submit('Update', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




