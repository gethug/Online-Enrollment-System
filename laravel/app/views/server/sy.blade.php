@extends('server.dash')

@section('sy')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hsy" ).addClass("active1" );
});
</script>


<div class = "table-responsive" style = "width : 909px; top:-290px; left:187px; position:relative;" >
<h2 id = "cat" style = "">List of School Year</h2>
<table class="table table-striped table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">ID</th>
            <th class = "text-center">School Year</th>
        </tr>
    </thead>
    <tbody>
        @foreach($schoolyears as $sy)
            <tr style = "font-size:11px;">
                <td class = "text-center">{{$sy->sy_id}} </td>
                <td class = "text-center">{{$sy->SY}} </td>
                <td style = "width:13px;">{{ link_to_route('SY.edit', 'Edit',
                     array($sy->sy_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('SY.destroy', $sy->sy_id))) }}                       
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