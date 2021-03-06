@extends('server.dashboard')

@section('add')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hadmin" ).addClass("active1" );
         $( "#hadmin" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hadmina" ).addClass("active" );
          $( "#tria" ).addClass("tri" );
            $("#tria").css("margin-left","57px");
              $('#collapseThree').collapse();
});
</script>

<div  id = "tablet"  >
<h2 id = "cat" style = ""><i class="fa fa-user" style = "margin-right: 10px;"></i>Administrator&nbsp;<a href = "administrator/create" style = "text-decoration: none;">+<small style = "color: #428bca;">New</small></a><br> <small>List of administrator</small></h2>
<div class="panel panel-default">
  <div class="panel-body">
<table class="table table-hover" id = "inlineEditDataTable" >
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">ID</th>
            <th class = "text-center">Name</th>
            <th class = "text-center">UserName</th>
            <th class = "no-sort"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center"> {{ $admin->a_id}}</td>
                <td class = "text-center">{{ ucwords($admin->Fname) . ' ' . ucwords($admin->Mname) . ' ' . ucwords($admin->Lname)}} </td>
                <td class = "text-center"> {{ $admin->user}}</td>
                <td style = "width:13px;">{{ link_to_route('administrator.edit', 'Edit',
                     array($admin->a_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
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