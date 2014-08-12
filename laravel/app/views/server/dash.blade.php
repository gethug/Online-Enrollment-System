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


<div class = "container-fluid" style = "padding: 0px;">
		<div class="sidebar" id = "sidebar">
			<h4 class = "sdehead" ><i class="fa fa-file-text"></i>&nbsp;&nbsp;File</h4>
			<ul class = "lsthead" id = "file">
				<li id = "hsec"> <i class="fa fa-users icon"></i><a class = "subs" id = "hseca" href = "Section">  Section</a></li>
				<li id = "hrm"> <i class="fa fa-sign-in icon"></i><a class = "subs" id = "hrma" href = "Room">&nbsp;&nbsp;Rooms</a></li>
				<li id = "hsubj"><i class="fa fa-book icon"></i><a class = "subs" id = "hsubja" href = "Subject">&nbsp;&nbsp;Subjects</a></li>
				<li id = "hsy"><i class="fa fa-calendar icon"></i><a class = "subs" id = "hsya" href = "SY">&nbsp;&nbsp;School year</a></li>
				<li id = "hlvl"><i class="fa fa-level-up icon"></i><a class = "subs" id = "hlvla" href = "Level">&nbsp;&nbsp;&nbsp;levels</a></li>
				<li id = "hstud"><i class="fa fa-male icon"></i><a class = "subs" id = "hstuda" href = "#Student">&nbsp;&nbsp;&nbsp;Student</a></li>
				<li id = "hteachr"><i class="fa fa-briefcase icon"></i><a class = "subs" id = "hteachra" href = "Teacher">&nbsp;Teacher</a></li>
				<li  id = "hcash"><i class="fa fa-money icon"></i><a class = "subs" id = "hcasha" href = "#Cashier">&nbsp;Cashier</a></li>
				<li id = "hadmin"><i class="fa fa-user icon"></i><a class = "subs" id = "hadmina" href = "administrator">&nbsp;&nbsp;Administrator</a></li>

			</ul>

			
			


		</div>
		@yield('add')
		@yield('rooms')
		@yield('section')
		@yield('level')
		@yield('sy')
		@yield('subject')
		@yield('teacher')
	</div>
@stop