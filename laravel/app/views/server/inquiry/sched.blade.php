@extends('server.dashboard')

@section('enrollstudent')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hische" ).addClass("active1" );
         $( "#hische" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hischea" ).addClass("active" );
          $( "#triische" ).addClass("tri" );
            $("#triische").css("margin-left","87px");
             $('#collapseFour').collapse();
           $('#collapseOne').collapse();


});
</script>

  <script>
        $(document).ready(function() { $("#e2").select2(); });
          $(document).ready(function() { $("#e3").select2(); });
    </script>

    <script type="text/javascript">
  $(document).ready(function(){
   
   
       $('#e2').change(function(){
        misc = 0;
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


     


         });
  </script>


   

  {{Form::open(array('route' => 'Enroll.store'))}}
<div class = "table-responsive" id = "tablet" >
<div class="panel panel-default">
  <div class="panel-body">
    <h2 id = "cat" style = "margin-bottom: 5px;margin-top: 8px;margin-left: 13px;font-size: 26px;"><i class="fa fa-briefcase" style = "margin-right: 10px;"></i>Class Schedule</h2>

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

  


 
  {{Form::close()}}

 



</div>
</div>
</div>
@stop