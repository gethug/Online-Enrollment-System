@extends('layouts.main3')
@section('studcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Create Student Account</h2>

 	{{Form::open(array('route' => 'Student.store', 'class' => 'form-inline'))}}


<script type="text/javascript">
	  $(document).ready(function() { $("#e1").select2(); });
</script>
 	<div class="form-group div-filds" style = "width:100%">
      <div class = "div-text teacher" style = "width:100%">
      <div style = "width: 96%;">
         <select class = "feilds "  id="e1" style = "width:100%;border-radius:0px; " name = "student">
           <option value="">-Students-</option>
         @foreach($students as $student)
        <option value="{{$student->en_id}}">{{ ucwords($student->fname) . ' ' . ucwords($student->mname) . ' ' . ucwords($student->lname)}}</option>
        @endforeach
    </select>
    </div>
      </div>

      @if($errors->first('student')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".teacher" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('student')}}</h6>
			</div>
		@endif
  </div>



	<div class="form-group div-filds">

		<div class = "div-text user">
 			{{Form::text('user', '', array('placeholder' => 'Username', 'class' => 'form-control feilds', 'id' => 'filds'))}}
 		</div>
 		<div class = "div-text password">
 			{{Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control feilds', 'id' => 'filds' , 'style' => 'margin-top: 10px;'))}}
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

		@if($errors->first('password')) 
			<div class = "validte" style = "float:right;">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".password" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('password')}}</h6>
			</div>
		@endif


			

 	</div>


 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




