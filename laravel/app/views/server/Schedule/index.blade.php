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
<table class="table table-hover" id = "inlineEditDataTable">
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
             <th class = "no-sort"></th>
             <th class = "no-sort"></th>
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
<script>
    $(function() {
      // Add custom class to pagination div
          $.fn.dataTableExt.oStdClasses.sPaging = 'dataTables_paginate paging_bootstrap paging_custom';

          var oTable02 = $('#inlineEditDataTable').dataTable({
            "sDom":
              "R<'row'<'col-md-6'l><'col-md-6'f>r>"+
              "t"+
              "<'row'<'col-md-4 sm-center'i><'col-md-4'><'col-md-4 text-right sm-center'p>>",
            "oLanguage": {
              "sSearch": ""
            },
            "aaSorting": [[ 0, "desc" ]],
            "aoColumnDefs": [
              {   'bSortable': false, 
                'aTargets': [ "no-sort" ] ,
              }
            ],
            "fnInitComplete": function(oSettings, json) {
              $('.dataTables_filter input').attr("placeholder", "Search");
            }
          });

           // hide first column
          // oTable02.fnSetColumnVis(0, false);

          // append add row button to table
          var addRowLink = '<a href="#" id="addRow" class="btn btn-green btn-xs add-row">Print</a>'
          $('#inlineEditDataTable_wrapper').append(addRowLink);

          var nEditing = null;
          
          // delete function
          $(document).on("click", "#inlineEditDataTable a.delete", function(e) {
              var id = $(this).attr('id');
              
              $('input[name="delete-id"]').val(id);
              $('form#delete').attr('action', 'candidate/' + id);
          });

          //initialize chosen
          $('.dataTables_length select').chosen({disable_search_threshold: 10});
    })
  </script>

</div>

@stop