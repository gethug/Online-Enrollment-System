@extends('layouts.main2')

@section('dash')

	<div  class = "navbr">
				<nav class="navbar navbar-default" role="navigation" id = "navbr">
						<div style = "height : 70px; background-color: #14b9d5; width: 5px;position:absolute;margin-top:23px;">
						</div>
			  <div class="container" id = "navbr1">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#"><h1 id = "logo"><strong>SAI</strong> 
			      <small id = "sub">Saint Augustine Insitute</small></h1></a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#" id = "links"><strong><i id = "icn" class="fa fa-user"></i>{{Auth::user()->user}}</strong></a></li>
			        <li><a href="#" id = "links"><strong>Logout</strong></a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
				</div>
<div class = "container-fluid" style = "height:48px; background-color:#81CFE0;">
	<div class="container" style = "padding: 0px;" >

	 	<ol class="breadcrumb" id = "dirc">
	 		<i class="fa fa-folder-open" style = "font-size: 23px; margin-right:7px; margin-left:25px;"></i>
		  <li><a href="#">File</a></li>
		  <li><a href="#">Rooms</a></li>
		  <li class="active">Add</li>
		</ol>

	</div>
	<div class = "container" >
		<div class="sidebar">
			<h4 class = "sdehead" >File</h4>
			<ul class = "lsthead" id = "file">
				<li><a class = "subs" href = "#">Student</a></li>
				<li><a class = "subs" href = "#">Teacher</a></li>
				<li><a class = "subs" href = "#">Section</a></li>
				<li><a class = "subs" href = "#">Rooms</a></li>
				<li><a class = "subs" href = "#">Subjects</a></li>
				<li><a class = "subs" href = "#">School year</a></li>
				<li><a class = "subs" href = "#">levels</a></li>
			</ul>

			<h4 class = "sdehead" >Transaction</h4>
			<ul class = "lsthead" id = "file">
				<li><a class = "subs" href = "#">Enrollment</a></li>
				<li><a class = "subs" href = "#">Billing</a></li>
				
			</ul>
			
		</div>
	</div>
</div>
@stop