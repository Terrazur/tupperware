<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Tupperware</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/resources/assets/framework/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/resources/assets/css/addon.css')}}">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #fff; border-radius: 0px;">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				@guest
					<a class="navbar-brand" href="{{url('/')}}" style="padding-top: 5px;"><img src="{{asset('/resources/assets/img/main/main.png')}}" style="width: 170px;"></a>
				@else
					<a class="navbar-brand" href="{{url('/')}}" style="padding-top: 5px;"><img src="{{asset('/resources/assets/img/main/main.png')}}" style="width: 170px;"></a>
				@endguest
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					@guest
					@else
						<li><a href="{{route('order.create')}}">Order</a></li>
					@endguest
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@guest
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ route('register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{route('prof.index')}}">Profile</a>
								</li>
								<li>
		                            <a href="{{ route('logout') }}"
		                                onclick="event.preventDefault();
		                                         document.getElementById('logout-form').submit();">
		                                Logout
		                            </a>

		                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                                {{ csrf_field() }}
		                            </form>
		                        </li>
							</ul>
						</li>
					@endguest
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<div class="container-fluid" style="margin-top: 70px;">
		@yield('content')
	</div>

	<div class="container-fluid" id="footer">
		<div class="row" style="background-color: white;">
			<div class="col-sm-2">
				<img src="{{asset('/resources/assets/img/main/main.png')}}" style="padding-top: 5px; width: 170px;">
			</div>
			<div class="col-sm-3">
				<br>	
				Tupperware Copyrigth 2018
			</div>
		</div>
	</div> 

	<script type="text/javascript" src="{{asset('/resources/assets/framework/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/resources/assets/framework/bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/resources/assets/js/addon.js')}}"></script>
</body>
</html>