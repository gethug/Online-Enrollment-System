@extends('server.dash')

@section('schedule')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hsched" ).addClass("active1" );
         $( "#hsched" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hscheda" ).addClass("active" );
          $( "#hsched i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">Schedules&nbsp;/<a href = "Schedule/create" style = "text-decoration: none;">&nbsp;+<small style = "color: #428bca;">New</small></a></h2>
<table class="table table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
            <th class = "text-center">Subject Code</th>
            <th class = "text-center">Subject Name</th>
            <th class = "text-center">Time</th>
            <th class = "text-center">Day</th>
            <th class = "text-center">Teacher</th>
            <th class = "text-center">Room</th>
              <th class = "text-center">Section</th>
             <th class = "text-center">Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach($scheds as $sched)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center">{{ $sched->subj_code}}</td>
                <td class = "text-center"> {{ $sched->subj_name}}</td>
                <td class = "text-center">{{ ucwords($sched->start) . ' - ' . ucwords($sched->end)}}</td>
                <td class = "text-center"> {{ $sched->day}}</td>
                <td class = "text-center">{{ ucwords($sched->fname) . ' ' . ucwords($sched->mname) . ' ' . ucwords($sched->lname)}} </td>
                <td class = "text-center"> {{ $sched->room}}</td>
                <td class = "text-center">{{ $sched->section}}</td>
                <td class = "text-center"> {{ $sched->level}}</td>
                <td style = "width:13px;">{{ link_to_route('Schedule.edit', 'Edit',
                     array($sched->sched_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Schedule.destroy', $sched->sched_id))) }}                       
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