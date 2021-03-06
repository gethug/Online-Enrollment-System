@extends('server.dashboard')

@section('add')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#huser" ).addClass("active1" );
         $( "#huser" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#husera" ).addClass("active" );
          $( "#triuser" ).addClass("tri" );
            $("#triuser").css("margin-left","89px");
              $('#collapseThree').collapse();
});
</script>

<div class = "table-responsive" id = "tablet"  >
<h2 id = "cat" style = ""><i class="fa fa-user" style = "margin-right: 10px;"></i>Teachers&nbsp;<a href = "SystemUser/create" style = "text-decoration: none;">+<small style = "color: #428bca;">New</small></a><br> <small>List of Teachers</small></h2>
<div class="panel panel-default">
  <div class="panel-body">
<table class="table table-hover" id = "inlineEditDataTable" >
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">ID</th>
            <th class = "text-center">Name</th>
            <th class = "text-center">UserName</th>
            <th class = "no-sort"></th>
            <th class = "no-sort"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center"> {{ $user->t_id}}</td>
                <td class = "text-center">{{ ucwords($user->fname) . ' ' . ucwords($user->mname) . ' ' . ucwords($user->lname)}} </td>
                <td class = "text-center"> {{ $user->user}}</td>
                <td style = "width:13px;">{{ link_to_route('SystemUser.edit', 'Edit',
                     array($user->t_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('SystemUser.destroy', $user->t_id))) }}                       
                            {{ Form::submit('Delete', array('class'
                    => 'btn btn-danger', 'id' => 'btndel')) }}
                        {{ Form::close() }}
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