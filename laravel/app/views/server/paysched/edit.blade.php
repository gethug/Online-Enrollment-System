@extends('layouts.main3')
@section('paycreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style= "width:35%;">
  <h2 class = "crud-head">Payment Schedule</h2>

 	{{Form::open(array('route' => array('PaySched.update', $scheds->sy_id), 'class' => 'form-inline', 'method' => 'PUT'))}}

 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text start" style = "width: 100%;">
 		{{Form::text('first', $scheds->first, array('placeholder' => 'First Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('first')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".start" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('first')}}</h6>
			</div>
		@endif
 		
 		

 	</div>
	<div class="form-group div-filds" style = "width: 100%;">

		<div class = "div-text end" style = "width: 100%;">
 		{{Form::text('second', $scheds->sec, array('placeholder' => 'Second Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker1', 'style' => 'width: 100%;cursor: pointer;', 'readonly'))}}
 		
 			<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker1').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:"F d, Y"
		});
 	 });
 		</script>

 		</div>

 		@if($errors->first('second')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".end" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('second')}}</h6>
			</div>
		@endif


			

 	</div>




 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text three" style = "width: 100%;">
 		{{Form::text('third', $scheds->third, array('placeholder' => 'Third Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker3', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker3').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('third')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".three" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('third')}}</h6>
			</div>
		@endif
 		
 		

 	</div>


 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text four" style = "width: 100%;">
 		{{Form::text('fourth', $scheds->forth, array('placeholder' => 'Fourth Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker4', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker4').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('fourth')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".four" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('fourth')}}</h6>
			</div>
		@endif
 		
 		

 	</div>


 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text five" style = "width: 100%;">
 		{{Form::text('fifth', $scheds->fifth, array('placeholder' => 'Fifth Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker5', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker5').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('fifth')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".five" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('fifth')}}</h6>
			</div>
		@endif
 		
 		

 	</div>


 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text six" style = "width: 100%;">
 		{{Form::text('sixth', $scheds->sixth, array('placeholder' => 'Sixth Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker6', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker6').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('sixth')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".six" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('sixth')}}</h6>
			</div>
		@endif
 		
 		

 	</div>



 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text seven" style = "width: 100%;">
 		{{Form::text('seventh', $scheds->svnth, array('placeholder' => 'Seventh Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker7', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker7').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('seventh')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".seven" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('seventh')}}</h6>
			</div>
		@endif
 		
 		

 	</div>




 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text start" style = "width: 100%;">
 		{{Form::text('eight', $scheds->eyth, array('placeholder' => 'Eight Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker8', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker8').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('eight')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".eight" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('eight')}}</h6>
			</div>
		@endif
 		
 		

 	</div>



 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text nine" style = "width: 100%;">
 		{{Form::text('ninth', $scheds->ninth, array('placeholder' => 'Ninth Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker9', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker9').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('ninth')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".nine" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('ninth')}}</h6>
			</div>
		@endif
 		
 		

 	</div>



 	<div class="form-group div-filds" style = "width: 100%;">
 	<div class = "div-text ten" style = "width: 100%;">
 		{{Form::text('tenth', $scheds->tenth, array('placeholder' => 'Tenth Payment', 'class' => 'form-control feilds', 'id' => 'datetimepicker10', 'style' => 'width: 100%;cursor:pointer;', 'readonly'))}}
 		<script type="text/javascript">
 	 $(document).ready(function(){
 		$('#datetimepicker10').datetimepicker({
		 lang:'de',
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Di", "Mi", 
		    "Do", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'F d, Y'
		});
 	 });
 		</script>
 		</div>

@if($errors->first('tenth')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".ten" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('tenth')}}</h6>
			</div>
		@endif
 		
 		

 	</div>


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




