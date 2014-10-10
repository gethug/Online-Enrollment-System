@extends('server.dashboard')

@section('class')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hpay" ).addClass("active1" );
         $( "#hpay" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hpaya" ).addClass("active" );
          $( "#tripay" ).addClass("tri" );
            $("#tripay").css("margin-left","27px");
});
</script>

<div class = "table-responsive" id = "tablet"  >
<h2 id = "cat" style = ""><i class="fa fa-book" style = "margin-right: 10px;"></i>Payment Schedule&nbsp;<a href = "PaySched/create" style = "text-decoration: none;">+<small style = "color: #428bca;">New</small></a></h2>
<div class="panel panel-default">
  <div class="panel-body">
<table class="table table-hover" id = "inlineEditDataTable" >
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">ID</th>
              <th class = "text-center">1st Payment</th>
            <th class = "text-center">2nd Payment</th>
            <th class = "text-center">3rd Payment</th>
             <th class = "text-center">4th Payment</th>
              <th class = "text-center">5th Payment</th>
               <th class = "text-center">6th Payment</th>
                <th class = "text-center">7th Payment</th>
                 <th class = "text-center">8th Payment</th>
                  <th class = "text-center">9th Payment</th>
                   <th class = "text-center">10th Payment</th>
            <th class = "no-sort"></th>
      
        </tr>
    </thead>
    <tbody>
        @foreach($pays as $pay)
            <tr style = "font-size:11px;" id = "items">
             <td class = "text-center"> {{ $pay->sy_id}} </td>
                <td class = "text-center"> {{ $pay->first}} </td>
                <td class = "text-center">{{ $pay->sec}} </td>
                <td class = "text-center"> {{ $pay->third}}</td>
                 <td class = "text-center"> {{ $pay->forth}}</td>
                  <td class = "text-center"> {{ $pay->fifth}}</td>
                   <td class = "text-center"> {{ $pay->sixth}}</td>
                    <td class = "text-center"> {{ $pay->svnth}}</td>
                     <td class = "text-center"> {{ $pay->eyth}}</td>
                      <td class = "text-center"> {{ $pay->ninth}}</td>
                       <td class = "text-center"> {{ $pay->tenth}}</td>
                <td style = "width:13px;">{{ link_to_route('PaySched.edit', 'Edit',
                     array($pay->sy_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
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