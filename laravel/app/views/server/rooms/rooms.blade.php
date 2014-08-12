@extends('server.dash')

@section('rooms')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hrm" ).addClass("active1" );
          $( "#hrma" ).addClass("active" );
          $( "#hrm i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">List of Rooms</h2>
<table class="table table-striped table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">Room No.</th>
            <th class = "text-center">Rooms</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
            <tr style = "font-size:11px;">
                <td class = "text-center">{{$room->r_id}} </td>
                <td class = "text-center">{{$room->room}} </td>
                <td style = "width:13px;">{{ link_to_route('Room.edit', 'Edit',
                     array($room->r_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Room.destroy', $room->r_id))) }}                       
                            {{ Form::submit('Delete', array('class'
                    => 'btn btn-danger', 'id' => 'btndel')) }}
                        {{ Form::close() }}
                    </td>
            </tr>
        @endforeach

    </tbody>
</table>
</div>

@stop