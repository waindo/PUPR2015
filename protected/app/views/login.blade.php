<!doctype html>
<html>
<head>
<title>Login</title>
</head>
<body>
<?
@extends('layout')
@section('content')
    
    <a id="menu-toggle" href="#" class="btn btn-primary btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-primary btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top">Login</a>
            </li>            
            <li>
                <a href="#register">Register</a>
            </li>
            <li>
                <a href="#about">About</a>
            </li>
            <li>
                <a href="#contact">Contact</a>
            </li>
        </ul>
    </nav>

    <header id="top" class="header">
        <div class="container">

        <hr />
        <center><h2 class="panel-primary">Web Aplikasi Database Sungai dan Banjir</h2></center>
        <hr />
        <?= '<span style="color:red">' .Session::get('login_error') . '</span>' ?>

            <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        
                            <fieldset>
                                {{Form::open(array('action' => 'RegistrationController@authenticate')) }}
                                {{Form::label('usersxemailxx', 'Email') }}
                                {{Form::text('usersxemailxx', '', array('Input::old(usersxemailxx)','class' => 'form-control','placeholder' => 'Email'))}}

                                {{Form::label('password', 'Password') }}
                                {{Form::password('password', array('class' => 'form-control','placeholder' => 'Password'))}}
                                <br>
                                {{Form::submit('Login', array('class' => 'btn btn-lg btn-primary btn-block')) }}
                                {{Form::close() }}
                                <br>
                                <a href="#register" class="btn btn-lg btn-primary btn-block">Register</a>
                            </fieldset>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </header>

    <section id="register" class="register">
        <div class="container"> 
        	<div class="row">
            <div class="col-md-4 col-md-offset-4">
            <hr />
			  <h2>Registrasi User</h2> 
			<hr />
			<br> <br> <br>  
			  <?php $messages = $errors->all('<p style="color:red">:message</p>') ?>
			  <?php foreach ($messages as $msg): ?>
			  <?= $msg ?>
			  <?php endforeach; ?>

			  {{Form::open(array('action' => 'RegistrationController@store')) }}
              {{Form::label('usersxuseridx', 'User ID') }} 
              {{Form::text('usersxuseridx', '', array('Input::old(usersxuseridx)','class' => 'form-control'))}} 

              {{Form::label('usersxusernam', 'User Name') }} 
              {{Form::text('usersxusernam', '', array('Input::old(usersxusernam)','class' => 'form-control'))}} 

              {{Form::label('password', 'Password') }} 
              {{Form::password('password', array('class' => 'form-control'))}}
              
              {{Form::label('password_confirm', 'Retype-Password') }} 
              {{Form::password('password_confirm', array('class' => 'form-control'))}}                

			  {{Form::label('usersxemailxx', 'Email') }} 
			  {{Form::text('usersxemailxx', '', array('Input::old(usersxemailxx)','class' => 'form-control'))}}
			  
              {{Form::label('usersxlevelxx', 'Level') }} 
              {{Form::select('usersxlevelxx', array('Admin' => 'Admin', 'User' => 'User', 'Operator' => 'Operator'), Input::old('usersxlevelxx'), array('class' => 'form-control')) }}

			  <br>    
			  {{Form::submit('Register', array('class' => 'btn btn-lg btn-primary btn-block')) }} 
			 {{ Form::close() }} 

			 <br> <br> <br> <br> <br> <br>  <br> <br> <br> <br>
			</div>
			</div>
		</div>
    </section>

    <section id="about" class="about bg-primary">
        <div class="container">
        	<div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>About</h2>
                	<hr class="small">
                </div>
            </div>
        </div>
    </section>

	<section id="contact" class="contact btn-success">
	<div class="container">
    	<div class="row text-center">
            <div class="col-lg-10 col-lg-offset-1">
                <h2>Contact</h2>
            	<hr class="small">
            </div>
        </div>
    </div>
	</section>

@stop
?>
</body>
</html>