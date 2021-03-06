@extends('server.dashboard')

@section('dis')
<script type="text/javascript">
    $(document).ready(function(){
          $( "#hdis" ).addClass("active1" );
           $( "#hdis" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hdisa" ).addClass("active" );
          $( "#tridis" ).addClass("tri" );
          $("#tridis").css("margin-left","87px");
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = ""><i class="fa fa-rub" style = "margin-right: 10px;"></i> Discount&nbsp;<a href = "Discount/create" style = "text-decoration: none;">+<small style = "color: #428bca;">New</small></a> <br> <small>List of Discount</small></h2>
<div class="panel panel-default">
  <div class="panel-body">
<table class="table table-hover" id = "inlineEditDataTable">
  <thead>
        <tr style = "font-size:12px;" >
             <th class = "text-center">ID</th>
            <th class = "text-center">Name</th>
            <th class = "text-center">Percentage</th>
            <th class = "no-sort"></th>
            <th class = "no-sort"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($discounts as $discount)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center">{{$discount->d_id}} </td>
                <td class = "text-center">{{$discount->d_name}} </td>
                <td class = "text-center">{{$discount->d_per}} </td>
                <td style = "width:13px;">{{ link_to_route('Discount.edit', 'Edit',
                     array($discount->d_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                @if($discount->d_id == 5)
                <td>
                </td>
                 
                    @else
                    <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Discount.destroy', $discount->d_id))) }}                       
                            {{ Form::submit('Delete', array('class'
                    => 'btn btn-danger', 'id' => 'btndel')) }}
                        {{ Form::close() }}
                    </td>
                    
                @endif
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