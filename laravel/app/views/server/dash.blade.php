@extends('layouts.main2')

@section('dash')

<div class = "container-fluid" style = "height:48px; background-color:#2980b9;padding:0px;">



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

				

				<li class = "Section" id = "hsec" style = "margin-top:10px;">
					<i class="fa fa-sitemap icon"></i><a class = "subs" id = "hseca" href = "Section">  Section</a>
					<div id = "trisec" class = "gide">
				</li>

				<li class = "Room" id = "hrm"> 
					<i class="fa fa-sign-in icon"></i><a class = "subs" id = "hrma" href = "Room">&nbsp;&nbsp;Rooms</a>
					<div id = "trir" class = "gide">
				</li>

				<li class = "Subject" id = "hsubj">
					<i class="fa fa-book icon"></i><a class = "subs" id = "hsubja" href = "Subject">&nbsp;&nbsp;Subjects</a>
					<div id = "tris" class = "gide">
				</li>

				<li class = "SY" id = "hsy">
					<i class="fa fa-calendar icon"></i><a class = "subs" id = "hsya" href = "SY">&nbsp;&nbsp;School year</a>
					<div id = "trisy" class = "gide">
				</li>

				<li class = "Level" id = "hlvl">
					<i class="fa fa-level-up icon"></i><a class = "subs" id = "hlvla" href = "Level">&nbsp;&nbsp;&nbsp;Levels</a>
					<div id = "tril" class = "gide">
				</li>

				<li class = "Systemuser" id = "hteachr">
					<i class="fa fa-users icon"></i><a class = "subs" id = "hteachra" href = "Systemuser">&nbsp;System User</a>
					<div id = "trit" class = "gide">
				</li>

				<li  class = "Usertype" id = "hcash">
					<i class="fa fa-male icon"></i><a class = "subs" id = "hcasha" href = "Usertype">&nbsp;&nbsp;&nbsp;User Types</a>
					<div id = "tric" class = "gide">
				</li>

				<li class = "administrator" id = "hadmin">
					<i class="fa fa-user icon"></i><a class = "subs" id = "hadmina" href = "administrator">&nbsp;&nbsp;Administrator</a>
					<div id = "tria" class = "gide">
				</li>

				<li class = "Tuition" id = "htuition">
					<i class="fa fa-money icon"></i><a class = "subs" id = "htuitiona" href = "Tuition">&nbsp;Tuition fees</a>
					<div id = "tritu" class = "gide">
				</li>

				<li class = "Miscellaneous" id = "hmisc">
					<i class="fa fa-rub icon"></i><a class = "subs" id = "hmisca" href = "Miscellaneous">&nbsp;&nbsp;Miscellaneous fees</a>
					<div id = "trimisc" class = "gide">
				</li>
				<li class = "Discount" id = "hdis">
					<i class="fa fa-rub icon"></i><a class = "subs" id = "hdisa" href = "Discount">&nbsp;&nbsp;Discount</a>
					<div id = "tridis" class = "gide">
				</li>

				
			</ul>

      </div>
    </div>
  </div>

  <div class="panel panel-default"  id = "accrdn">
    <div class="panel-heading" id = "colps">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <i class="fa fa-files-o"></i>&nbsp;&nbsp;Transaction
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body" style = "padding:0px;">
      	 <ul class = "lsthead" id = "file">


				<li class = "Enrolee" id = "hen" style = "margin-top: 15px;"> 
					<i class="fa fa-users icon"></i><a class = "subs" id = "hena" href = "Enrolee">&nbsp;Enrolee</a>
					<div id = "trie" class = "gide">
					</div>
				</li>

      	 	<li class = "Schedule" id = "hsched"> 
					<i class="fa fa-clock-o icon"></i><a class = "subs" id = "hscheda" href = "Schedule">  Schedule</a>
					<div id = "trisc" class = "gide">
				</li>


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
		@yield('misc')
		@yield('dis')
	</div>
@stop



