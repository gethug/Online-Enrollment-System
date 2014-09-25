@extends('server.dashboard')

@section('acc')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hacc" ).addClass("active1" );
         $( "#hacc" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hacca" ).addClass("active" );
          $( "#triacc" ).addClass("tri" );
            $("#triacc").css("margin-left","77px");
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
                                               
                                                $(data).each( function(index, element) {
                                            sec.append("<option value='"+ element.m_id +"''>" + element.m_name + "</option>");
                      
                                        });
                                        });

                                 $.get("{{ url('api/dropdownname')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                               
                                               
                                                $(data).each( function(index, element) {
                                            
                                            $('#n-filds').val(element.fname + " " + element.mname + " " + element.lname);
                                        });
                                        });
                                
                        });

       $('#e2').change(function(){
                                
                                 $.get("{{ url('api/dropdownpay')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                                $(data).each( function(index, element) {
                                            $('.pay').val(element.bal + " Php");
                                        });
                                        });
                        });
         });
  </script>


<div class = "table-responsive" id = "tablet" >
<div class="panel panel-default">
  <div class="panel-body">
    <h2 id = "cat" style = "margin-bottom: 5px;margin-top: 8px;margin-left: 13px;font-size: 26px;"><i class="fa fa-money" style = "margin-right: 10px;"></i>Cashiering</h2>

    <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Student ID
      </label>
      <div style = "margin-left: 266px;width: 100%;">
         <select class = "feilds "  id="e1" style = "width:50%;border-radius:0px; " name = "ID">
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
        {{Form::text('name', '', array('placeholder' => 'Student Name', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 50%;margin: 5px auto;border-radius:0px;', 'readonly'))}}
      </div>
  </div>

     <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Fee
      </label>
         <div style = "margin-left: 266px;width: 100%;">
         <select class = "feilds "  id="e2" style = "width:50%;border-radius:0px; " name = "Fee">
        <option value="aw">Fee</option>
     </select>
    </div>
      </div>
  </div>

  <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Amount Payable
      </label>
     {{Form::text('pay', '', array('placeholder' => 'Amount Payable', 'class' => 'form-control feilds pay', 'id' => 'n-filds', 'style' => 'width: 50%;margin: 5px auto;border-radius:0px;', 'readonly'))}}
      </div>
  </div>

  <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Amount Paid
      </label>
       {{Form::text('Amount', '', array('placeholder' => 'Amount Paid', 'class' => 'form-control feilds', 'id' => 'n-filds', 'style' => 'width: 50%;margin: 5px auto;border-radius:0px;'))}}
      </div>
  </div>


 



</div>
</div>
</div>
@stop