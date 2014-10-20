@extends('server.dashboard')

@section('enrollstudent')
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

  <script>
        $(document).ready(function() { $("#e1").select2(); });
        $(document).ready(function() { $("#e2").select2(); });
          $(document).ready(function() { $("#e3").select2(); });
        $(document).ready(function() { $("#e4").select2(); });
    </script>

    <script type="text/javascript">
  $(document).ready(function(){
    var tui = 0;
  var min = 0;
  var discount;
   var per = 0;
   var name;
   var x;
    $('#e1').change(function(){
                                $.get("{{ url('api/dropdown')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                                var sec = $('#e2');
                                              
                                               
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

                                  $.get("{{ url('api/dropdownhis')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                           $(".llist").empty();
                                                $(data).each( function(index, element) {
                                             $( ".llist" ).append( "<li style = 'display:block;color:#454545;margin-left: -50px;'>" + element.m_name + " <span style ='float:right; margin-right: 50px;'>Php " + element.paid + "</span></li>");
                                            min = min + element.paid;
                                        });


                                        });
                                
                        });
   
       $('#e2').change(function(){
           x = 0;
                                $.get("{{ url('api/dropdownsec')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                                var sub = $('#e3');
                                                sub.empty();
                                                $(data).each( function(index, element) {
                                            sub.append("<option value='"+ element.sec_id +"''>" + element.section + "</option>");
                                        });
                                        });


                                   $.get("{{ url('api/dropdowntui')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                               $(".tlist").empty();
                                                 $(".dlist").empty();
                                                 $(".total").empty();
                                                  $(".total2").empty();
                                                $(data).each( function(index, element) {
                                                  tui = element.tuition;
                                            x = x + element.tuition;
                                            discount = element.tuition;
                                             $( ".tlist" ).append( "<li style = 'display:block;color:#454545;'> Tuition Fee <span style ='float:right;'>Php " + element.tuition + "</span></li>");

                                            if (per != 0){
                                              var y = per / 100;
                                            var dis = discount * y;
                                           $( ".dlist" ).append( "<li style = 'display:block;color:#454545;margin-left: 45px;'>" + name+ " <span style ='float:right;'>Php " + dis + "</span></li>");
                                            }
                                               
                                        });
                                               $( ".total" ).append( "<li style = 'display:block;color:#454545;'> Sub Total <span style ='float:right;'>Php " + x + "</span></li>");    
                                             var total = x - min;
                                             $( ".total2" ).append( "<li style = 'display:block;color:#454545;'> Total Amount<input value = '" + total.toFixed(2) + "'style = 'float:right;' class='form-control' id='total' type='text' name = 'total' placeholder='Disabled input here...' readonly = 'readonly'></li>"); 
                                           if (per != 0){
                                              var y = per / 100;
                                            var dis = discount * y;
                                            var total = x - (min + dis);
                                             $(".total2").empty();
                                          $( ".total2" ).append( "<li style = 'display:block;color:#454545;'> Total Amount<input value = '" + total.toFixed(2) + "'style = 'float:right;' class='form-control' id='total' type='text' name = 'total' placeholder='Disabled input here...' readonly = 'readonly'></li>"); 
                                            }

                                        });


                                 $.get("{{ url('api/dropdownfee')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                               $(".olist").empty();
                                               $(".total").empty();
                                                $(".total2").empty();
                                                $(data).each( function(index, element) {
                                            $( ".olist" ).append( "<li style = 'display:block;color:#454545;'>" + element.m_name + " <span style ='float:right;'>Php " + element.m_fee + "</span></li>");
                                            x = x + element.m_fee;
                                        });
                                         $( ".total" ).append( "<li style = 'display:block;color:#454545;'> Sub Total <span style ='float:right;'>Php " + x + "</span></li>");    
                                          var total = x - min;
                                            $( ".total2" ).append( "<li style = 'display:block;color:#454545;'> Total Amount<input value = '" + total.toFixed(2) + "'style = 'float:right;' class='form-control' name = 'total' id='total' type='text' placeholder='Disabled input here...' readonly = 'readonly'></li>"); 
                                        
                                               if (per != 0){
                                              var y = per / 100;
                                            var dis = discount * y;
                                            var total = x - (min + dis);
                                             $(".total2").empty();
                                           $( ".total2" ).append( "<li style = 'display:block;color:#454545;'> Total Amount<input value = '" + total.toFixed(2) + "'style = 'float:right;' class='form-control' name = 'total' id='total' type='text' placeholder='Disabled input here...' readonly = 'readonly'></li>"); 
                                            }
                                        });

                                 $.get("{{ url('api/dropdownmisc')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                               $(".mlist").empty();
                                               $(".total").empty();
                                                $(".total2").empty();
                                                $(data).each( function(index, element) {
                                            $( ".mlist" ).append( "<li style = 'display:block;color:#454545;'>" + element.m_name + " <span style ='float:right;'>Php " + element.m_fee + "</span></li>");
                                            x = x + element.m_fee;
                                        });
                                      
                                                $( ".total" ).append( "<li style = 'display:block;color:#454545;'>Sub Total <span style ='float:right;'>Php " + x + "</span></li>");
                                                 var total = x - min;
                                             $( ".total2" ).append( "<li style = 'display:block;color:#454545;'> Total Amount<input value = '" + total.toFixed(2) + "'style = 'float:right;' class='form-control' name = 'total' id='total' type='text' placeholder='Disabled input here...' readonly = 'readonly'></li>");      
                                         



                                               if (per != 0){
                                              var y = per / 100;
                                            var dis = discount * y;
                                            var total = x - (min + dis);
                                             $(".total2").empty();
                                          $( ".total2" ).append( "<li style = 'display:block;color:#454545;'> Total Amount<input value = '" + total.toFixed(2) + "'style = 'float:right;' name = 'total' class='form-control' id='total' type='text' placeholder='Disabled input here...' readonly = 'readonly'></li>");  
                                            }

                                        });
   $(".others").css( "visibility", "visible" );
                        });
  $('#e4').change(function(){
                                $.get("{{ url('api/dropdowndisc')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                           $(".dlist").empty();
                                           $(".total2").empty();

                                                $(data).each( function(index, element) {
                                                  per = element.d_per;
                                                  name = element.d_name;
                                                  var y = element.d_per / 100;
                                                  var dis = discount * y;
                                           $( ".dlist" ).append( "<li style = 'display:block;color:#454545;margin-left: -50px;'>" + element.d_name + " <span style ='float:right;margin-right: 50px;'>Php " + dis.toFixed(2) + "</span></li>");
                                          
                                                var total = x - (min + dis);
                                             $( ".total2" ).append( "<li style = 'display:block;color:#454545;'> Total Amount<input value = '" + total.toFixed(2) + "'style = 'float:right;' name = 'total' class='form-control' id='total' type='text' placeholder='Disabled input here...' readonly = 'readonly'></li>");   
                                        });
                                        });

                        });




$('#e3').change(function(){
                                $.get("{{ url('api/dropdownsched')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                          var x = "";
                                                $(data).each( function(index, element) {
                                                   x += "<tr> <td>" + element.subj_name + "</td><td>" + element.start + " - " + element.end + "</td><td class = 'text-center'>"+ element.day +" </td><td class = 'text-center'>" + element.fname + " " + element.mname + " " + element.lname + "</td><td class = 'text-center'>" + element.room + "</td></tr>";
                                        });
                                                 $(".paylist tbody").html(x);
                                                  $(".paylist").css( "visibility", "visible" );
                                                   $(".paylist").css( "height", "100%" );
                                        });

                        });




        $('.instal').click(function() {
           if($('#radio1').is(':checked')) {
             $(".flist").empty();
             if(per == 0)
             {
              var total = x - min;
          $('#total').val(total.toFixed(2));
             }
             else
             {
                var dis = ((per / 100) * tui);
                var total = (x - min) - dis;
              $('#total').val(total.toFixed(2));
             }
            

                var totaled = $('#total').val();
                var broke = totaled / 10;
             $("#frst").text(broke.toFixed(2));
              $("#scnd").text(broke.toFixed(2));
               $("#thrd").text(broke.toFixed(2));
                $("#frth").text(broke.toFixed(2));
                 $("#ffth").text(broke.toFixed(2));
                  $("#sxth").text(broke.toFixed(2));
                   $("#svnth").text(broke.toFixed(2));
                    $("#eight").text(broke.toFixed(2));
                     $("#ninth").text(broke.toFixed(2));
                      $("#tenth").text(broke.toFixed(2));

                       $(".installment").css( "visibility", "visible" );
                        $(".installment").css( "height", "100%" );
          }
        });

         $('.fpay').click(function() {
           if($('#radio2').is(':checked')) {


            if(per == 0)
            {
               var fulldis = {{$discs[0]->d_per}};
            var total = x - min;
             var fulldisc = total - ((fulldis / 100) * tui);
             var full = (fulldis / 100) * tui;
          $('#total').val(fulldisc.toFixed(2));
           $( ".flist" ).append( "<li style = 'display:block;color:#454545;margin-left: -50px;'>Full Payment Discount <span style ='float:right; margin-right: 50px;'>Php " + full.toFixed(2) + "</span></li>");
            }

            else
            {
              var dis = ((per / 100) * tui);
            var fulldis = {{$discs[0]->d_per}};
            var total = (x - min) - dis;
            var fulldisc = total - ((fulldis / 100) * tui);
            var full = (fulldis / 100) * tui;
          $('#total').val(fulldisc.toFixed(2));
           $( ".flist" ).append( "<li style = 'display:block;color:#454545;margin-left: -50px;'>Full Payment Discount <span style ='float:right; margin-right: 50px;'>Php " + full.toFixed(2) + "</span></li>");
            }
           


      
          $(".installment").css( "visibility", "hidden" );
          $(".installment").css( "height", "0px" );


          }
        });


         });
  </script>


   

  {{Form::open(array('route' => 'Enroll.store'))}}
<div class = "table-responsive" id = "tablet" >
<div class="panel panel-default">
  <div class="panel-body">
    <h2 id = "cat" style = "margin-bottom: 5px;margin-top: 8px;margin-left: 13px;font-size: 26px;"><i class="fa fa-briefcase" style = "margin-right: 10px;"></i>Enroll Student</h2>

@if (Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert" style = "font-size: 16px; margin-top: 20px;">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>{{ Session::get('message')}}</strong> 
</div>
@endif

@if($errors->first('ID') or $errors->first('level') or $errors->first('section'))
<div class="alert alert-danger alert-dismissible" role="alert" style = "font-size: 16px; margin-top: 20px;">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> {{ $errors->first('ID')}}  {{ $errors->first('level')}} {{ $errors->first('section')}} 

</div>
@endif

    <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text id" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Student ID
      </label>
      <div style = "margin-left: 266px;width: 100%;">
         <select class = "feilds "  id="e1" style = "width:50%;border-radius:0px; " name = "ID">
           <option value="">-Student ID-</option>
         @foreach($enrolees as $enrolee)
         {{$love = 'false';}}
         @foreach($enrolls as $enroll)
         @if($enroll->en_id == $enrolee->en_id)
        {{$love = 'true';}}
        @endif
        @endforeach
        @if($love == 'false')
        <option value="{{$enrolee->en_id}}">{{$enrolee->en_id}}</option>
        @endif
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
        Year Level
      </label>
         <div style = "margin-left: 264px;width: 100%;">
         <select class = "feilds "  id="e2" style = "width:50%;border-radius:0px; " name = "level">
        <option value="">Level</option>
          @foreach($levels as $level)
        <option value="{{$level->lvl_id}}">{{$level->level}}</option>
        @endforeach
     </select>
    </div>
      </div>

  </div>


  <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text sec" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Section
      </label>
         <div style = "margin-left: 263px;width: 100%;">
         <select class = "feilds "  id="e3" style = "width:50%;border-radius:0px; " name = "section">
        <option value="">-Section-</option>
     </select>
    </div>
      </div>

  </div>

  <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Discount
      </label>
         <div style = "margin-left: 263px;width: 100%;">
         <select class = "feilds "  id="e4" style = "width:50%;border-radius:0px; " name = "discount">
        <option value="">-Discount-</option>
        @foreach($discounts as $discount)
        <option value="{{$discount->d_id}}">{{$discount->d_name}}</option>
        @endforeach
     </select>
    </div>
      </div>
  </div>

  <div class="form-group div-filds" style = "margin-top: 12px; margin-bottom: -2px; margin-left:241px;">

           <div class="radio instal" style = "margin-left:10px;display: inline-block">
                  <label id = "gender">

                  {{Form::radio('pay', 'installment', false, ['id' => 'radio1'])}}
                  Installment

                  </label>
            </div>

          <div class="radio fpay"  style = "margin-left:-15px;display: inline-block">
                  <label id = "gender">
                    {{Form::radio('pay', 'full', false, ['id' => 'radio2'])}}
                      Full Payment
                  </label>
            </div>

  </div>

 

  <div class="form-group div-filds others" style = "margin-top: 12px; margin-bottom: -4px;margin-left: 118px;margin-right: 40px; visibility: hidden;" >

          <h4 style = "color:#454545;"> Assessment</h4>
            <ul style = "color:#454545;margin-left: 10px;margin-right: 230px;font-weight: bold;" class = "tlist">
            </ul>

             <h5 style = "color:#454545;margin-left: 50px;font-weight: bold;">Other School Fees</h5>
            <ul style = "margin-left: 85px;margin-right: 230px; list-style:none;" class = "olist">
            </ul>

            <h5 style = "color:#454545;margin-left: 50px;font-weight: bold;">Miscellaneous Fees</h5>
            <ul style = "margin-left: 85px;margin-right: 230px; list-style:none;" class = "mlist">
            </ul>

            <ul style = "color:#454545;margin-left: 10px;margin-right: 230px;font-weight: bold;" class = "total">
            </ul>

            

            <h5 style = "color:#454545;margin-left: 50px;font-weight: bold;">Less</h5>
            <ul style = "margin-left: 85px;margin-right: 230px; list-style:none;" class = "llist">
            </ul>
             <ul style = "margin-left: 85px;margin-right: 230px; list-style:none;" class = "flist">
            </ul>

            <h5 style = "color:#454545;margin-left: 70px;font-weight: bold;">Discount</h5>
            <ul style = "margin-left: 85px;margin-right: 230px; list-style:none;" class = "dlist">
            </ul>

            <ul style = "color:#454545;margin-left: 10px;margin-right: 230px;font-weight: bold;" class = "total2">
            </ul>

  </div>


  <div class="form-group div-filds installment" style = "width:65%;margin: 0px auto;visibility:hidden; height: 0px;margin-top: 42px;" id = "tblpaylist">
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


   <div class="form-group div-filds paylist" style = "width:82%;margin: 0px auto;margin-top: 50px;visibility:hidden; height: 0px;" id = "tblpaylist" >
     <h4 style = "color:#454545;"> Class Schedule</h4>
      <table class="table table-bordered" id = "paylist">
        <thead>
        <tr style = "font-size:12px;" >
             <th class = "text-left">Subject Name</th>
            <th class = "text-left">Time</th>
            <th class = "text-left">Day</th>
            <th class = "text-left">Teacher</th>
            <th class = "text-left">Room</th>
            </tr>
    </thead>
 <tbody>
           

    </tbody>
 
      </table>
  </div>

  


  {{ Form::submit('Submit', array('class' => 'btn btn-info', 'id' => 'csubmit', 'style' => 'color:white;margin-right: 271px;float: right; position:relative;')) }}
  {{Form::close()}}

 



</div>
</div>
</div>
@stop