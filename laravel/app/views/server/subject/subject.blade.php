@extends('server.dash')

@section('subject')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hsubj" ).addClass("active1" );
          $( "#hsubja" ).addClass("active" );
          $( "#hsubj i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">List of Subjects&nbsp;/<a href = "Subject/create" style = "text-decoration: none;">&nbsp;+<small style = "color: #428bca;">New</small></a></h2>
<table class="table table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
            <th class = "text-center">ID</th>
            <th class = "text-center">Subject Code</th>
            <th class = "text-center">Subject</th>
            <th class = "text-center">Unit</th>
            <th class = "text-center">Prerequisite</th>
            <th class = "text-center">Level</th>
            <th class = "text-center">Cost</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center"> {{ $subject->s_id}}</td>
                <td class = "text-center"> {{ $subject->subj_code}}</td>
                <td class = "text-center"> {{ $subject->subj_name}}</td>
                <td class = "text-center"> {{ $subject->unit}}</td>
                <td class = "text-center"> {{ $subject->prerequisite}}</td>
                <td class = "text-center"> {{ $subject->level}}</td>
                <td class = "text-center"> {{ $subject->cost}}</td>
                <td style = "width:13px;">{{ link_to_route('Subject.edit', 'Edit',
                     array($subject->s_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Subject.destroy', $subject->s_id))) }}                       
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