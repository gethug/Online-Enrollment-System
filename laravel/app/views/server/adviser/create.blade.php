@extends('layouts.main3')
@section('advcreate')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Add Section</h2>

 	{{Form::open(array('route' => 'Adviser.store', 'class' => 'form-inline'))}}

<script>
        $(document).ready(function() { $("#e1").select2(); });
        $(document).ready(function() { $("#e2").select2(); });
    </script>


	<div class="form-group div-filds" style = "width:100%">
      <div class = "div-text section" style = "width:100%">
      <label style="display: inline-block;">
        Section
      </label>
      <div style = "width: 100%;">
         <select class = "feilds "  id="e1" style = "width:100%;border-radius:0px; " name = "section">
           <option value="">-Section-</option>
         @foreach($sections as $section)
        <option value="{{$section->sec_id}}">{{$section->section}}</option>
        @endforeach
    </select>
    </div>
      </div>
      @if($errors->first('section')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".section" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('section')}}</h6>
			</div>
		@endif
  </div>

	<div class="form-group div-filds" style = "width:100%">
      <div class = "div-text teacher" style = "width:100%">
      <label style="display: inline-block;">
        Adviser
      </label>
      <div style = "width: 100%;">
         <select class = "feilds "  id="e2" style = "width:100%;border-radius:0px; " name = "teacher">
           <option value="">-Adviser-</option>
         @foreach($teachers as $teacher)
        <option value="{{$teacher->t_id}}">{{ ucwords($teacher->fname) . ' ' . ucwords($teacher->mname) . ' ' . ucwords($teacher->lname)}}</option>
        @endforeach
    </select>
    </div>
      </div>
      @if($errors->first('teacher')) 
			<div class = "validte">
				<script type="text/javascript">
					 $(document).ready(function(){
         				$( ".teacher" ).addClass("has-error" );
					 });
				</script>
				<h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('teacher')}}</h6>
			</div>
		@endif
  </div>

 	

<!-- <button style="position:absolute">BACK</button> -->
 		{{ Form::submit('Save', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
 	{{Form::close()}}
</div>
</div>

@stop




