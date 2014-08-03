@extends('server.dash')

@section('section')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hsec" ).addClass("active1" );
});
</script>


<div class = "table-responsive" style = "width : 909px; top:-290px; left:187px; position:relative;" >
<h2 id = "cat" style = "">List of Sections</h2>
<table class="table table-striped table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">ID</th>
            <th class = "text-center">Section</th>
            <th class = "text-center">Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sections as $section)
            <tr style = "font-size:11px;">
                <td class = "text-center">{{$section->sec_id}} </td>
                <td class = "text-center">{{$section->section}} </td>
                <td class = "text-center">{{$section->lvl_id}} </td>
                <td style = "width:13px;">{{ link_to_route('Section.edit', 'Edit',
                     array($section->sec_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Section.destroy', $section->sec_id))) }}                       
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