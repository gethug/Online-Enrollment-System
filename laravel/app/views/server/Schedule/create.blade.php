@extends('layouts.main3')
@section('schedcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con">
  <h2 class = "crud-head">Add Schedule</h2>

 	{{Form::open(array('route' => 'Schedule.store', 'class' => 'form-inline'))}}


<script type="text/javascript">
 	$(document).ready(function(){
		$('#level').change(function(){
                                $.get("{{ url('api/dropdownsec')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                                var sec = $('#section');
                                                sec.empty();
                                               
                                                $(data).each( function(index, element) {
                                            sec.append("<option value='"+ element.sec_id +"''>" + element.section + "</option>");
                                        });
                                        });
                        });

		$('#level').change(function(){
                                $.get("{{ url('api/dropdownsub')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                                var sub = $('#subject');
                                                sub.empty();
                                               
                                                $(data).each( function(index, element) {
                                            sub.append("<option value='"+ element.s_id +"''>" + element.subj_name + "</option>");
                                        });
                                        });
                        });
		     });
	</script>
<!-- div for day////////////////////////////////////////////////////////////////////////////////////////////////////-->

 	<div class="form-group div-filds day" style = "margin-top: -13px; margin-bottom: -17px;">

					 <div class="checkbox" style = "margin-left:10px;">
					  			<label id = "gender">

					  			{{Form::checkbox('day[]', 'M', true)}}
					    		M

					  			</label>
						</div>

					<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day[]', 'T', true)}}
					   					T
					  			</label>
						</div>
						<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day[]', 'W', true)}}
					   					W
					  			</label>
						</div>
						<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day[]', 'TH', true)}}
					   					TH
					  			</label>
						</div>
						<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day[]', 'F', true)}}
					   					F
					  			</label>
						</div>
						<div class="checkbox"  style = "margin-left:5px;">
					  			<label id = "gender">
					    			{{Form::checkbox('day[]', 'S', true)}}
					   					S
					  			</label>
						</div>

						@if (Session::get('derror'))
				<div class = "validte">
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".day" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px" class = "val-lbl">{{ Session::get('derror')}}</h6>
							</div>
				@endif



						<script type="text/javascript">
							$(document).ready(function(){
							var chkArray = [];
							/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
							$(".checkbox:checked").each(function() {
								chkArray.push($(this).val());
							});
							
							/* we join the array separated by the comma */
							var selected;
							selected = chkArray.join(',');
							
							/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
							if(selected.length > 1){
								alert("You have selected " + selected);	
							}

							});
						</script>

	</div>

<!-- div for time //////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">

	$(document).ready(function(){
	 $('#timepicker1').timepicker({
                minuteStep: 5,
                showInputs: false,
                disableFocus: true
            });
	 $('#timepicker2').timepicker({
                minuteStep: 5,
                showInputs: false,
                disableFocus: true
            });
});

</script>


 	<div class="form-group div-filds" style = "width:98%;">
 	<div class = "div-text ID" style = "width: 100%">

 		 <div class="input-append bootstrap-timepicker darbs">
            <input id="timepicker1" type="text" class="input-small form-control " name = "start">
            <span class="add-on ades" ><i class="fa fa-clock-o"></i></span>
        </div>
			
			
		<div class="input-append bootstrap-timepicker darbs">
            <input id="timepicker2" type="text" class="input-small form-control " name = "end">
            <span class="add-on ades"><i class="fa fa-clock-o"></i></span>
        </div>

 		</div>
 	</div>



<!-- div for levels and section ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 		
 	<div class="form-group div-filds" style = "width:50%;">

 <select class="form-control feilds" style = "width:100%;" name = "level" id = "level">
 					<option value = "">-Level-</option>
	 			@foreach($levels as $level)
				  <option value = "{{$level->lvl_id}}">{{ $level->level }}</option>
				@endforeach
				</select>
	

 	</div>


 	<div class="form-group div-filds" style = "width:48%;">

	<select class="form-control feilds" style = "width:100%;" name = "subject" id ="subject">
	 	
				  <option value = "">-Subject-</option>
		
				</select>

				@if (Session::get('serror'))
				<div class = "validte">
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".teacher" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px" class = "val-lbl">{{ Session::get('serror')}}</h6>
							</div>
				@endif

	

 	</div>
 	


<!-- div for subject and rooms ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">

 	
<select class="form-control feilds" style = "width:50%;" name = "section" id = "section">
				  <option value = "">-Section-</option>
				</select>

				@if (Session::get('secerror'))
				<div class = "validte">
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".teacher" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px; float: right;" class = "val-lbl">{{ Session::get('secerror')}}</h6>
							</div>
				@endif



	<select class="form-control feilds" style = "width:48%;" name = "room">
	 			@foreach($rooms as $room)
				  <option value = "{{$room->r_id}}">{{ $room->room }}</option>
				@endforeach
				</select>

				@if (Session::get('rerror'))
				<div class = "validte" style = "float:right;">
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".teacher" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px" class = "val-lbl">{{ Session::get('rerror')}}</h6>
							</div>
				@endif
 	</div> 	


<!-- div for teacher ////////////////////////////////////////////////////////////////////////////////////////////////////-->
 	<div class="form-group div-filds" style = "width:100%;">
 	<select class="form-control feilds teacher" style = "width:98%;" name = "teacher">
 				@foreach($teachers as $teacher)
				  <option value = "{{$teacher->t_id}}">{{ ucwords($teacher->fname) . ' ' . ucwords($teacher->mname) . ' ' . ucwords($teacher->lname)}}</option>
				@endforeach
	 			
				</select>
				@if (Session::get('terror'))
				<div class = "validte">
								<script type="text/javascript">
									 $(document).ready(function(){
				         				$( ".teacher" ).addClass("has-error" );
									 });
								</script>
								<h6 style = "margin: 5px" class = "val-lbl">{{ Session::get('terror')}}</h6>
							</div>
				@endif
 	</div>

	
 	



 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




