@extends('server.dashboard')

@section('sy')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hsy" ).addClass("active1" );
         $( "#hsy" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hsya" ).addClass("active" );
          $( "#trisy" ).addClass("tri" );
          $("#trisy").css("margin-left","66px");
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = ""><i class="fa fa-calendar" style = "margin-right: 10px;"></i>School Year&nbsp;<a href = "SY/create" style = "text-decoration: none;">+<small style = "color: #428bca;">New</small></a> <br> <small>List of School year</small></h2>
<div class="panel panel-default">
  <div class="panel-body">
<table class="table table-hover" id = "inlineEditDataTable">
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">ID</th>
            <th class = "text-center">School Year</th>
            <th class = "no-sort"></th>
             <th class = "no-sort"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($schoolyears as $sy)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center">{{$sy->sy_id}} </td>
                <td class = "text-center">{{ ucwords($sy->start) . '-' . ucwords($sy->end)}} </td>
                @if($sy->Active != 1)
                <td style = "width:13px;">{{ link_to_route('SY.edit', 'Activate',
                     array($sy->sy_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                @else
                  <td style = "width:13px;">{{ link_to_route('SY.edit', 'Activate',
                     array($sy->sy_id), array('class' => 'btn btn-lg btn-primary','disabled' => 'disabled', 'id' => 'btnedit')) }}
                </td>
                @endif
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('SY.destroy', $sy->sy_id))) }}                       
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