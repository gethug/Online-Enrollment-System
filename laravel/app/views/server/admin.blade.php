@extends('layouts.main')

@section('content')


	<div class="container" >

		<div class="row">
				  <div class="col-xs-12 col-md-12" style = "height: 80px; ">
						
				   </div>
				</div>

				<div class = "login" style = "margin: 0px auto;">

						<div class="row">
							  <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4" id = "login">

							  	<div  id = "head" >
							  		<div id = "des">

							  		</div>
							  			<div id = "ap">
							  			<img src="/assets/images/SAIlogo.png" style = "margin:0px auto;max-width: 70%;" class="img-responsive" alt="Responsive image">
							  			<h4 class="text-center" id = "sign" style = "color:#454545;margin-top: -3px"> Saint Augustine Institute<br><small> Enrollment System</small></h4>
							  			</div>
							  	</div>
							  			<h4 id = "log" > Log in</h4>
							  			@if (Session::get('error'))

							  			<div class="bg-danger text-center" id = "error">
							  			<p style = "margin: 8px">{{ Session::get('error')}}</p>
							  			</div>

							  			@endif

				






							  	{{ Form::open(array('route' => 'login.store', 'id' => 'form-signin', 'class' => 'form-signin')) }}

										 <div class="input-group" id = "IDN">
										      <div class="input-group-addon" id = "rad" style = " background-color: #14b9d5;"><i class="fa fa-user" style = "color: white;"></i></div>
										      {{ Form::text('idnumber', '', array('placeholder' => 'Username', 'autofocus' => '', 'class' => 'form-control', 'id' => 'rad3')) }}
										    </div>

										    		@if($errors->first('idnumber')) 

														  			<div id = "error2">
														  			<p style = "margin: 5px">{{ $errors->first('idnumber')}}</p>
																  			<script>

																  			$(document).ready(function(){
																			  $("#rad3").css("background-color","#F2DEDE");
																			  $("#rad3").css("border","1px solid #EED3D7");
																			  $("#rad3").attr('placeholder','')
																			});
																			
																  			</script>
														  			</div>

													@endif

										 <div class="input-group" id = "pass">
										      <div class="input-group-addon" id = "rad" style = " background-color: #14b9d5;"><i class="fa fa-lock" style = "color: white;"></i></div>
										       {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'id' => 'rad4')) }}
										   </div>
										   			@if($errors->first('password')) 

												  			<div id = "error3">
												  			<p style = "margin: 5px">{{ $errors->first('password')}}</p>
												  			<script>

																  			$(document).ready(function(){
																			  $("#rad4").css("background-color","#F2DEDE");
																			  $("#rad4").css("border","1px solid #EED3D7");
																			  $("#rad4").attr('placeholder','')
																			});
																			
																  			</script>
												  			</div>
										  			
													@endif

										   		{{ Form::submit('Log in', array('class' => 'btn btn-info', 'id' => 'submit', 'style' => 'color:white;')) }}

								{{ Form::close() }}
								
							  </div>
						</div>

			</div>
		
	</div>
	

@stop

