@extends('layouts.main2')

@section('dash')

<div class = "container-fluid" style = "height:48px; background-color:#2980b9;padding:0px;">

<div  class = "part">
</div>

		<div class="btn-group" style = "float:right;">
		  <button id = "btn-settings" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
		    <i class = "fa fa-cog" style = "font-size: 17px;"></i> <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" role="menu" style = "left: -108px; padding:4px 0;">
		    <li><a href = "#">Log out</a></li>
		  </ul>
		</div>
</div>


<div class = "container-fluid" style = "padding: 0px; height: 100%;">
		<div class="sidebar" id = "sidebar">
		
			
<div class="panel-group" id="accordion">
  <div class="panel panel-default"  id = "accrdn">
    <div class="panel-heading" id = "colps">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <i class="fa fa-files-o"></i>&nbsp;&nbsp;File
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body" style = "padding:0px;">
     <ul class = "lsthead" id = "file">
				<li class = "Enrolee" id = "hen" style = "margin-top: 15px;"> <i class="fa fa-users icon"></i><a class = "subs" id = "hena" href = "Enrolee">&nbsp;Enrolee</a></li>
				<li class = "Section" id = "hsec"> <i class="fa fa-users icon"></i><a class = "subs" id = "hseca" href = "Section">  Section</a></li>
				<li class = "Room" id = "hrm"> <i class="fa fa-sign-in icon"></i><a class = "subs" id = "hrma" href = "Room">&nbsp;&nbsp;Rooms</a></li>
				<li class = "Subject" id = "hsubj"><i class="fa fa-book icon"></i><a class = "subs" id = "hsubja" href = "Subject">&nbsp;&nbsp;Subjects</a></li>
				<li class = "SY" id = "hsy"><i class="fa fa-calendar icon"></i><a class = "subs" id = "hsya" href = "SY">&nbsp;&nbsp;School year</a></li>
				<li class = "Level" id = "hlvl"><i class="fa fa-level-up icon"></i><a class = "subs" id = "hlvla" href = "Level">&nbsp;&nbsp;&nbsp;levels</a></li>
				<li id = "hstud"><i class="fa fa-male icon"></i><a class = "subs" id = "hstuda" href = "#Student">&nbsp;&nbsp;&nbsp;Student</a></li>
				<li class = "Teacher" id = "hteachr"><i class="fa fa-briefcase icon"></i><a class = "subs" id = "hteachra" href = "Teacher">&nbsp;Teacher</a></li>
				<li  class = "Cashier" id = "hcash"><i class="fa fa-money icon"></i><a class = "subs" id = "hcasha" href = "Cashier">&nbsp;Cashier</a></li>
				<li class = "administrator" id = "hadmin"><i class="fa fa-user icon"></i><a class = "subs" id = "hadmina" href = "administrator">&nbsp;&nbsp;Administrator</a></li>
				<li class = "Tuition" id = "htuition"><i class="fa fa-rub icon"></i><a class = "subs" id = "htuitiona" href = "Tuition">&nbsp;&nbsp;Tuition fees</a></li>
			</ul>

      </div>
    </div>
  </div>

  <div class="panel panel-default" id = "accrdn">
    <div class="panel-heading" id = "colps">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <i class="fa fa-file-text"></i>&nbsp;&nbsp;Transaction
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body" style = "padding:0px;">
       <ul class = "lsthead" id = "file">
				<li class = "Schedule" id = "hsched"> <i class="fa fa-list-ul icon"></i><a class = "subs" id = "hscheda" href = "Schedule">  Schedule</a></li>
				<li id = "hcash"> <i class="fa fa-money icon"></i><a class = "subs" id = "hcasha" href = "Cashering">  Cashering</a></li>
			</ul>
      </div>
    </div>
  </div>
</div>













	
			
			


		</div>
		@yield('add')
		@yield('rooms')
		@yield('section')
		@yield('level')
		@yield('sy')
		@yield('subject')
		@yield('teacher')
		@yield('cashier')
		@yield('tuition')
		@yield('schedule')
		@yield('Enrolee')
	</div>
@stop



