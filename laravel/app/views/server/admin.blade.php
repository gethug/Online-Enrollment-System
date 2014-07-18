@extends('layouts.main')

@section('content')


	<div class="container" >

		<div class="row">
				  <div class="col-xs-12 col-md-12" style = "height: 131px; margin-top: 50px;">
						<h1 class="text-center" id = "sai" ><strong>SAI</strong></h1>
						<h3 class="text-center" id = "saint">Saint Augustine Institute</h3>
				   </div>
				</div>

				<div class = "login" style = "margin: 0px auto;">

						<div class="row">
							  <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4" id = "login">

							  	<div  id = "head">
							  			<div id = "ap">
							  			<h4 class="text-center" id = "sign"> SIGN IN TO YOUR ACCOUNT</h4>
							  			</div>
							  	</div>

							  			@if (Session::get('error'))

							  			<div class="bg-danger text-center" id = "error">
							  			<p style = "margin: 8px">{{ Session::get('error')}}</p>
							  			</div>

							  			@endif

							  			@if($errors->first('idnumber')) 

							  			<div class="bg-danger text-center" id = "error2">
							  			<p style = "margin: 5px">{{ $errors->first('idnumber')}}</p>
							  			</div>

										@endif

										@if($errors->first('password')) 

							  			<div class="bg-danger text-center" id = "error3">
							  			<p style = "margin: 5px">{{ $errors->first('password')}}</p>
							  			</div>
							  			
										@endif




							  	{{ Form::open(array('route' => 'login.store', 'id' => 'form-signin', 'class' => 'form-signin')) }}

										 <div class="input-group" id = "IDN">
										      <div class="input-group-addon" style = " background-color: #008ddd;"><i class="fa fa-user" style = "color: white;"></i></div>
										      {{ Form::text('idnumber', '', array('placeholder' => 'ID Number', 'autofocus' => '', 'class' => 'form-control')) }}
										    </div>

										 <div class="input-group" id = "pass">
										      <div class="input-group-addon" style = " background-color: #008ddd;"><i class="fa fa-lock" style = "color: white;"></i></div>
										       {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
										   </div>

										   		{{ Form::submit('Sign In', array('class' => 'btn btn-info', 'id' => 'submit')) }}

								{{ Form::close() }}
								
							  </div>
						</div>

			</div>
		
	</div>
	

@stop

