@extends('server.dash')

@section('teacher')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hsched" ).addClass("active1" );
         $( "#hsched" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hscheda" ).addClass("active" );
          $( "#hsched i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">Schedules&nbsp;/<a href = "Teacher/create" style = "text-decoration: none;">&nbsp;+<small style = "color: #428bca;">New</small></a></h2>
<table class="table table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
            <th class = "text-center">Section</th>
            <th class = "text-center">Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sections as $section)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center">{{ $section->section}}</td>
                <td class = "text-center"> {{ $section->level}}</td>
                <td style = "width:13px;">{{ link_to_route('Schedule.show', 'View Schedule',
                     array($section->sec_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
</div>

@stop