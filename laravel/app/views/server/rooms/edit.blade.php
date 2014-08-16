@extends('layouts.main3')
@section('rmedit')
<div class="container crud">
  <div class="jumbotron" id = "crud-con" style = "width:35%">
  <h2 class = "crud-head">Edit Room</h2>

  {{Form::open(array('route' => array('Room.update',$room->r_id), 'class' => 'form-inline', 'method' => 'PUT'))}}

  <div class="form-group div-filds">

    <div class = "div-text room">
      {{Form::text('room', $room->room, array('placeholder' => 'Room', 'class' => 'form-control feilds', 'id' => 'filds'))}}
    </div>

    @if($errors->first('room')) 
      <div class = "validte">
        <script type="text/javascript">
           $(document).ready(function(){
                $( ".room" ).addClass("has-error" );
           });
        </script>
        <h6 style = "margin: 5px" class = "val-lbl">{{ $errors->first('room')}}</h6>
      </div>
    @endif


  </div>


    {{ Form::submit('Update', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;')) }}
  {{Form::close()}}
</div>
</div>

@stop




