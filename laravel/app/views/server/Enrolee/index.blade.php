@extends('server.dash')

@section('Enrolee')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hen" ).addClass("active1" );
         $( "#hen" ).animate({ "margin-left": "-=224px" }, "fast" );
          $( "#hena" ).addClass("active" );
          $( "#hen i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">List of Enrolee&nbsp;/<a href = "Enrolee/create" style = "text-decoration: none;">&nbsp;+<small style = "color: #428bca;">New</small></a></h2>
<table class="table table-hover" id = "inlineEditDataTable">
  <thead>
        <tr style = "font-size:12px;">
            <th class = "text-center">ID</th>
            <th class = "text-center">Level</th>
            <th class = "text-center">Type</th>
            <th class = "text-center">Name</th>
            <th class = "text-center">Gender</th>
            <th class = "text-center">Home Address</th>
            <th class = "text-center">Parents/Guardian</th>
            <th class = "text-center">Cell No.</th>
            <th class = "no-sort"></th>
            <th class = "no-sort"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($enrolees as $teacher)
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
           oTable02.fnSetColumnVis(0, false);

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