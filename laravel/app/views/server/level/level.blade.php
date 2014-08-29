@extends('server.dash')

@section('level')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hlvl" ).addClass("active1" );
         $( "#hlvl" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hlvla" ).addClass("active" );
          $( "#hlvl i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">List of Levels&nbsp;/<a href = "Level/create" style = "text-decoration: none;">&nbsp;+<small style = "color: #428bca;">New</small></a></h2>
<table class="table table-hover table-datatable " id = "inlineEditDataTable">
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center sort-numeric">ID</th>
            <th class = "text-center sort-alpha">Level</th>
            <th class = "no-sort"></th>
            <th class = "no-sort"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($levels as $level)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center">{{$level->lvl_id}} </td>
                <td class = "text-center">{{$level->level}} </td>
                <td style = "width:13px;">{{ link_to_route('Level.edit', 'Edit',
                     array($level->lvl_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Level.destroy', $level->lvl_id))) }}                       
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

