<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<title>{{ trans('app.title') }}</title>

    <meta name="csrf-param" content="_token">
  	<meta name="csrf-token" content="{{ csrf_token() }}">

  	<link href="{{ elixir('output/site.css') }}" rel="stylesheet">
  </head>
  <body>
  	<nav class="navbar navbar-default">
  		<div class="container-fluid">
  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
  					<span class="sr-only">{{ trans('toggle_navigation') }}</span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				</button>

  				<a class="navbar-brand" href="{{ url('/') }}">{{ trans('app.name') }}</a>
  			</div>

  			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  				<ul class="nav navbar-nav navbar-right">
  					<li><a href="{{ url('/auth/login') }}">{{ trans('app.login') }}</a></li>
  					<li><a href="{{ url('/auth/register') }}">{{ trans('app.register') }}</a></li>
  				</ul>
  			</div>
  		</div>
  	</nav>

  	@yield('content')

  	<script src="{{ elixir('output/site.js') }}"></script>
  </body>
</html>
