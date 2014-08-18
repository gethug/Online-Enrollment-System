@extends('server.dash')

@section('teacher')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hteachr" ).addClass("active1" );
         $( "#hteachr" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hteachra" ).addClass("active" );
          $( "#hteachr i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">List of Teachers&nbsp;/<a href = "Teacher/create" style = "text-decoration: none;">&nbsp;+<small style = "color: #428bca;">New</small></a></h2>
<table class="table table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
            <th class = "text-center">ID</th>
            <th class = "text-center">Name</th>
            <th class = "text-center">Age</th>
            <th class = "text-center">Gender</th>
            <th class = "text-center">Degree</th>
            <th class = "text-center">Email</th>
            <th class = "text-center">Contact</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center"> {{ $teacher->t_id}}</td>
                <td class = "text-center">{{ ucwords($teacher->fname) . ' ' . ucwords($teacher->mname) . ' ' . ucwords($teacher->lname)}} </td>
                <td class = "text-center"> {{ $teacher->age}}</td>
                <td class = "text-center"> {{ $teacher->gender}}</td>
                <td class = "text-center"> {{ $teacher->degree}}</td>
                <td class = "text-center"> {{ $teacher->email}}</td>
                <td class = "text-center"> {{ $teacher->contact}}</td>
                <td style = "width:13px;">{{ link_to_route('Teacher.edit', 'Edit',
                     array($teacher->t_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Teacher.destroy', $teacher->t_id))) }}                       
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