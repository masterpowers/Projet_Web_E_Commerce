<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="E-commerce">
<title>E-Commerce</title>
{{ HTML::style('css/lib/bootstrap/bootstrap.min.css') }}
{{ HTML::style('css/lib/bootstrap/bootstrap-theme.min.css') }}
{{ HTML::style('css/lib/jquery-ui.min.css') }}

{{ HTML::style('css/style.css') }}
</head>
<body>
<div class="navbar-wrapper">
	<div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand title-href" href="#"><img src="/img/ecommerce-logo.png" alt=""></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href={{URL::to('index')}}>Home</a></li>
						<li><a href={{URL::to('users/create')}}>S'inscrire</a></li>
						<li><a href={{URL::to('users/login')}}>Se connecter</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>

<div class="errorcontainer">
    @if(Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message') }}</p>
    @elseif(Session::has('error'))
    <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
</div>

<div class="container index-body">
	@yield('content')
</div>

<div id="footer">
	<div class="container">
	<p class="text-muted">This is a footer</a></p>
	</div>
</div>


{{ HTML::script('js/lib/jquery.min.js') }}
{{ HTML::script('js/lib/jquery-ui.min.js') }}
{{ HTML::script('js/lib/bootstrap.min.js') }}
</body>
</html>
