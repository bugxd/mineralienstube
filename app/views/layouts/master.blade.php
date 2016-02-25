<!DOCTYPE html>
<html>
    <head>
        @yield('title')

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		
		<!-- Override Bootstarp -->
		<link rel="stylesheet" href="css/override-bootstrap.css">
		
		@yield('css')
		
		
    </head>
    <body>
	    <div class="container">

	    	<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">Fell und Mineralienstube</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="{{ Request::is('home') ? 'active' : '' }}">
				        <a href="{{ URL::route('home') }}">Home</a>
				    </li>
				    <li class="{{ Request::is('angebote') ? 'active' : '' }}">
				        <a href="{{ URL::route('angebote') }}">Angebote</a>
				    </li>
				    <li class="{{ Request::is('findYstone') ? 'active' : '' }}">
				        <a href="{{ URL::route('findYstone') }}">Finde deinen Stein</a>
				    </li>

				    @if(Auth::check() && Auth::user()->isAdmin())
				    <li class="{{ Request::is('stones-home') ? 'active' : '' }}">
				        <a href="{{ URL::route('stones-home') }}">Stones</a>
				    </li>
				    @endif
			      </ul>
			      <form class="navbar-form navbar-left" id="search_form" method="post" action="{{ URL::route('stones-search') }}" role="search">
			        <div class="form-group">
			          <input id="search_text" name="search_text" type="text" class="form-control" placeholder="Stein">
			        </div>
			        <button id="search_submit" type="submit" class="btn btn-info">Suchen</button>
			        {{Form::token()}}
			      </form>
			      <ul class="nav navbar-nav navbar-right">
			        @if(!Auth::check())
						<li><a href="{{ URL::route('getCreate') }}">Register</a></li>
						<li><a href="{{ URL::route('getLogin') }}">Login</a></li>
					@else
						<li><a href="{{ URL::route('getLogout') }}">Logout</a></li>
					@endif
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>


	    	<div class="row">
	    		<div class="col-md-12">
	    			<div class="jumbotron">
					  <h1>Fell &amp; Mineralienstube</h1>
					  <p></p>
					</div>
	    		</div>
	    	</div>
	        
	    	<div class="row">
	    		<div class="col-md-12">
					@if(Session::has('success'))
						<div class="alert alert-success">
							{{  Session::get('success') }}
						</div>
					@elseif(Session::has('fail'))
						<div class="alert alert-danger">
							{{  Session::get('fail') }}
						</div>
					@endif
				</div>
	    	</div>

			<div class="row">
	    		<div class="col-md-12">
	    			<div class="well">
		    			@yield('content')
		    		</div>
				</div>
	    	</div>

	    	<div class="row">
				<div class="col-md-6">
		    		<div class="embed-responsive embed-responsive-16by9">
					  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2721.6509939101993!2d13.459255415728231!3d46.988189238484374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4770c8752c99042f%3A0x29e70254e6ca0436!2sFell-+u+Mineralien-+Stube+Feistritzer!5e0!3m2!1sde!2sat!4v1452089333098"></iframe>
					</div>
				</div>
				<div class="col-md-6">
					<div class="well">
						<h3>Fell- & Mineralienstube</h3>
						
						<p>
							Heike Feistritzer<br>
							Brandstatt 39<br>
							9854 Malta<br>
							Österreich<br>
						</p>

						<p>
							Tel.: +43 (4733) 396 <br>
							Mobil: +43 (650) 37 530 37<br>
							Fax: +43 (4733) 396<br>
						</p>

						<h4>Unsere Öffnungszeiten:<h4>

						<p>
							Ostern - ca. Ende Oktober<br>
							täglich von 9 - 18 Uhr<br>
							auch Sonn- und Feiertage<br>
						</p>
					</div>
				</div>
			</div>
		</div>
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    	
		

    	@yield('scripts')
    </body>
</html>
