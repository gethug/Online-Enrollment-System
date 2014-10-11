@extends('server.dashboard')

@section('gra')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#higra" ).addClass("active1" );
         $( "#higra" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#higraa" ).addClass("active" );
          $( "#triigra" ).addClass("tri" );
            $("#triigra").css("margin-left","105px");
             $('#collapseFour').collapse();
           $('#collapseOne').collapse();


});
</script>

  <script>
        $(document).ready(function() { $("#e1").select2(); });
        $(document).ready(function() { $("#e2").select2(); });
         $(document).ready(function() { $("#e3").select2(); });
    </script>

    <script type="text/javascript">
  $(document).ready(function(){
    $('#e1').change(function(){
                                $.get("{{ url('api/dropdownsec')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                                var sec = $('#e2');
                                              sec.empty();
                                                $(data).each( function(index, element) {
                                            sec.append("<option value='"+ element.sec_id +"''>" + element.section + "</option>");
                      
                                        });
                                        });

                              
                                
                        });
         });
  </script>

   <script type="text/javascript">
  $(document).ready(function(){
       $('#e2').change(function(){
                                
                                 $.get("{{ url('api/dropdownsubj')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                           var subj = $('#e3');
                                              subj.empty();
                                                $(data).each( function(index, element) {
                                                    subj.append("<option value='"+ element.s_id +"''>" + element.subj_name+ "</option>");
                                        });
                                        });
                        });
         });
  </script>


     <script type="text/javascript">
  $(document).ready(function(){
       $('#e3').change(function(){
                                
                                 $.get("{{ url('api/dropdowngra')}}", 
                                        { option: $(this).val() }, 
                                        function(data) {
                                          var x = "";
                                                $(data).each( function(index, element) {
                                                  x += "<tr> <td>" + element.fname + " " + element.mname + " " + element.lname + "</td><td>" + element.subj_name + "</td><td class = 'text-center'>"+ element.first +"</td><td class = 'text-center'>" + element.second + "</td><td class = 'text-center'>" + element.third + "</td><td class = 'text-center'>" + element.fourth + "</td></tr>";
                                            
                                        });
                                           $(".paylist tbody").html(x);     
                                        });
                        });
         });
  </script>

<div class = "table-responsive" id = "tablet" >
<div class="panel panel-default">
  <div class="panel-body">
    <h2 id = "cat" style = "margin-bottom: 5px;margin-top: 8px;margin-left: 13px;font-size: 26px;"><i class="fa fa-bar-chart" style = "margin-right: 10px;"></i>Grade</h2>

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
        Year Level
      </label>
      <div style = "margin-left: 266px;width: 100%;">
         <select class = "feilds "  id="e1" style = "width:50%;border-radius:0px; " name = "level">
           <option value="">-Year Level-</option>
         @foreach($levels as $level)
        <option value="{{$level->lvl_id}}">{{$level->level}}</option>
        @endforeach
    </select>
    </div>
      </div>
  </div>



     <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
        Section
      </label>
         <div style = "margin-left: 266px;width: 100%;">
         <select class = "feilds "  id="e2" style = "width:50%;border-radius:0px; " name = "section">
        <option value="">-Section-</option>
     </select>
    </div>
      </div>
  </div>


   <div class="form-group div-filds" style = "width:100%">
      <div class = "div-text level" style = "width:100%">
      <label style="display: inline-block;margin-left: 266px;">
       Subject
      </label>
         <div style = "margin-left: 266px;width: 100%;">
         <select class = "feilds "  id="e3" style = "width:50%;border-radius:0px; " name = "subject">
        <option value="">-Subject-</option>
     </select>
    </div>
      </div>
  </div>

 




  <div class="form-group div-filds paylist" style = "width:65%;margin: 0px auto;" id = "tblpaylist">
      <table class="table table-bordered" id = "paylist">
        <thead>
        <tr style = "font-size:12px;" >
             <th class = "text-center">Student</th>
            <th class = "text-center">Subject</th>
              <th class = "text-center">First</th>
                <th class = "text-center">Second</th>
                  <th class = "text-center">Third</th>
                    <th class = "text-center">Fourth</th>
            </tr>
    </thead>
    <tbody>
            
    </tbody>
 
      </table>
  </div>



 



</div>
</div>
</div>
@stop