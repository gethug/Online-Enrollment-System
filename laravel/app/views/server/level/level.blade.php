@extends('server.dash')

@section('level')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hlvl" ).addClass("active1" );
          $( "#hlvla" ).addClass("active" );
          $( "#hlvl i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">List of Levels</h2>
<table class="table table-striped table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">ID</th>
            <th class = "text-center">Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach($levels as $level)
            <tr style = "font-size:11px;">
                <td class = "text-center">{{$level->lvl_id}} </td>
                <td class = "text-center">{{$level->level}} </td>
                <td style = "width:13px;">{{ link_to_route('Level.edit', 'Edit',
                     array($level->lvl_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Level.destroy', $level->lvl_id))) }}                       
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