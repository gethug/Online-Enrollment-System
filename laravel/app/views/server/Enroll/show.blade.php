@extends('server.dashboard')

@section('enroll')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#henroll" ).addClass("active1" );
         $( "#henroll" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#henrolla" ).addClass("active" );
          $( "#trienroll" ).addClass("tri" );
            $("#trienroll").css("margin-left","104px");
             $('#collapseTwo').collapse();
           $('#collapseOne').collapse();
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = ""><i class="fa fa-users" style = "margin-right: 10px;"></i>Enrolled Students&nbsp;<a href = "Enroll/create" style = "text-decoration: none;">+<small style = "color: #428bca;">Enroll</small></a> <br> <small>List of Enrolled Students</small></h2>
<div class="panel panel-default">
  <div class="panel-body">
<table class="table table-hover" id = "inlineEditDataTable">
  <thead>
        <tr style = "font-size:12px;">
            <th class = "text-center">ID</th>
            <th class = "text-center">Name</th>
            <th class = "text-center">Year Level</th>
            <th class = "text-center">Section</th>
        </tr>
    </thead>
    <tbody>
        @foreach($enrolls as $enroll)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center"> {{ $enroll->en_id}}</td>
                <td class = "text-center">{{ ucwords($enroll->fname) . ' ' . ucwords($enroll->mname) . ' ' . ucwords($enroll->lname)}} </td>
                <td class = "text-center"> {{ $enroll->level}}</td>
                <td class = "text-center"> {{ $enroll->section}}</td>
            </tr>
        @endforeach

    </tbody>
</table>
</div>
</div>

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