@extends('server.dash')

@section('tuition')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#htuition" ).addClass("active1" );
          $( "#htuitiona" ).addClass("active" );
          $( "#htuition i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">List of Level with Tuition Fee&nbsp;/<a href = "Tuition/create" style = "text-decoration: none;">&nbsp;+<small style = "color: #428bca;">New</small></a></h2>
<table class="table table-striped table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">ID</th>
            <th class = "text-center">Level</th>
            <th class = "text-center">Tuition Fee</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tuitions as $tuition)
            <tr style = "font-size:11px;">
                <td class = "text-center">{{$tuition->tu_id}} </td>
                <td class = "text-center">{{$tuition->level}} </td>
                <td class = "text-center">{{$tuition->tuition}} </td>
                <td style = "width:13px;">{{ link_to_route('Tuition.edit', 'Edit',
                     array($tuition->tu_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Tuition.destroy', $tuition->tu_id))) }}                       
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