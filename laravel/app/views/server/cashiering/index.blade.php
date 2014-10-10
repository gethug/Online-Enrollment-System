@extends('server.dashboard')

@section('acc')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hacc" ).addClass("active1" );
         $( "#hacc" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hacca" ).addClass("active" );
          $( "#triacc" ).addClass("tri" );
            $("#triacc").css("margin-left","89px");
             $('#collapseTwo').collapse();
           $('#collapseOne').collapse();


});
</script>

  <script>
        $(document).ready(function() { $("#e1").select2(); });
        $(document).ready(function() { $("#e2").select2(); });
    </script>

    <script type="text/javascript">
  $(document).ready(function(){
    $('#e1').change(function(){
                                $.get("{{ url('api/dropdown')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                                var sec = $('#e2');
                                              sec.empty();
                                                sec.append("<option value='"+ 0 +"''>" + "Fee" + "</option>");
                                                $(data).each( function(index, element) {

                                            sec.append("<option value='"+ element.f_id +"''>" + element.m_name + "</option>");
                      
                                        });
                                        });

                                 $.get("{{ url('api/dropdownname')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                               
                                               
                                                $(data).each( function(index, element) {
                                            
                                            $('.name').val(element.fname + " " + element.mname + " " + element.lname);
                                        });
                                        });

                                  $.get("{{ url('api/dropdownbro')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                                $(data).each( function(index, element) {
                                            
                                           $("#frst").text(element.first);
                                            $("#scnd").text(element.second);
                                             $("#thrd").text(element.third);
                                              $("#frth").text(element.fourth);
                                               $("#ffth").text(element.fifth);
                                                $("#sxth").text(element.sixth);
                                                 $("#svnth").text(element.seventh);
                                                  $("#eight").text(element.eight);
                                                   $("#ninth").text(element.ninth);
                                                    $("#tenth").text(element.tenth);
                                        });
                                        });
                                
                        });
         });
  </script>

   <script type="text/javascript">
  $(document).ready(function(){
       $('#e2').change(function(){
                                
                                 $.get("{{ url('api/dropdown2')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                                $(data).each( function(index, element) {
                                                  if(element.m_name == "Tuition Fee")
                                                  {
                                                    $(".paylist").css( "visibility", "visible" );
                                                    $(".paylist").css( "height", "356px" );
                                                  }
                                                  else
                                                  {
                                                    $(".paylist").css( "visibility", "hidden" );
                                                     $(".paylist").css( "height", "0px" );
                                                  }
                                            $('.pay').val(element.bal + " Php");
                                        });
                                        });
                        });
         });
  </script>

  {{Form::open(array('route' => 'Cashiering.store'))}}
<div class = "table-responsive" id = "tablet" >
<div class="panel panel-default">
  <div class="panel-body">
    <h2 id = "cat" style = "margin-bottom: 5px;margin-top: 8px;margin-left: 13px;font-size: 26px;"><i class="fa fa-money" style = "margin-right: 10px;"></i>Payment</h2>

@if (Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert" style = "font-size: 16px; margin-top: 20px;">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>{{ Session::get('message')}}</strong> 
</div>
@endif

@if($errors->first('ID') or $errors->first('Fee') or $errors->first('Amount') or Session::has('error')) 
<div class="alert alert-danger alert-dismissible" role="alert" style = "font-size: 16px; margin-top: 20px;">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> {{ $errors->first('ID')}}  {{ $errors->first('Fee')}} {{ $errors->first('Amount')}}  {{ Session::get('error')}}

</div>
@endif

    <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Student ID
      </label>
      <div style = "margin-left: 266px;width: 100%;">
         <select class = "feilds "  id="e1" style = "width:50%;border-radius:0px; " name = "ID">
           <option value="">-Student ID-</option>
         @foreach($enrolees as $enrolee)
        <option value="{{$enrolee->en_id}}">{{$enrolee->en_id}}</option>
        @endforeach
    </select>
    </div>
      </div>
  </div>

   <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Student Name
      </label>
        {{Form::text('name', '', array('placeholder' => 'Student Name', 'class' => 'form-control feilds name', 'id' => 'n-filds', 'style' => 'width: 50%;margin: 5px auto;border-radius:0px;', 'readonly'))}}
      </div>
  </div>

     <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Fee
      </label>
         <div style = "margin-left: 266px;width: 100%;">
         <select class = "feilds "  id="e2" style = "width:50%;border-radius:0px; " name = "Fee">
        <option value="">Fee</option>
     </select>
    </div>
      </div>
  </div>

  <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Amount Payable
      </label>
     {{Form::text('pay', '', array('placeholder' => 'Amount Payable', 'class' => 'form-control feilds pay', 'id' => 'n-filds', 'style' => 'width: 50%;margin: 5px auto;border-radius:0px; text-align: right;', 'readonly'))}}
      </div>
  </div>

  <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Amount Paid
      </label>
       {{Form::text('Amount', '', array('placeholder' => 'Amount Paid', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 50%;margin: 5px auto;border-radius:0px;text-align: right;'))}}
      </div>
  </div>


  <div class="form-group div-filds paylist" style = "width:65%;margin: 0px auto;visibility:hidden; height: 0px;" id = "tblpaylist">
      <table class="table table-bordered" id = "paylist">
        <thead>
        <tr style = "font-size:12px;" >
             <th class = "text-left">Payment Date</th>
            <th class = "text-right">Amount</th>
            </tr>
    </thead>
 <tbody>
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->first}} </td>
                <td class = "text-right" id = "frst"> </td>
            </tr>

            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->sec}} </td>
                <td class = "text-right" id = "scnd"> </td>
            </tr>

            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->third}} </td>
                <td class = "text-right" id = "thrd"> </td>
            </tr>

            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->forth}} </td>
                <td class = "text-right" id = "frth"> </td>
            </tr>

            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->fifth}} </td>
                <td class = "text-right" id = "ffth"> </td>
            </tr>

            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->sixth}} </td>
                <td class = "text-right" id = "sxth"> </td>
            </tr>

            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->svnth}} </td>
                <td class = "text-right" id = "svnth"> </td>
            </tr>

            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->eyth}} </td>
                <td class = "text-right" id = "eight"> </td>
            </tr>

            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->ninth}} </td>
                <td class = "text-right" id = "ninth"> </td>
            </tr>

            <tr style = "font-size:11px;" id = "items">
                <td class = "text-left">{{$pays->tenth}} </td>
                <td class = "text-right" id = "tenth"> </td>
            </tr>
    </tbody>
 
      </table>
  </div>


  {{ Form::submit('Submit', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;margin-right: 271px;float: right;')) }}
  {{Form::close()}}

 



</div>
</div>
</div>
@stop