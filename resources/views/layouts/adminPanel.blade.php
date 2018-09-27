<!DOCTYPE html>
<html>
<head>
	<title>Tupperware-AdminPanel</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/resources/assets/framework/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/resources/assets/css/admin.css')}}">
</head>
<body>
	 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="border-radius: 0px;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}" style="padding-top: 5px;"><img src="{{asset('/resources/assets/img/main/main.png')}}" style="width: 170px;"></a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        @guest

                        @else
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                             </form>
                        @endguest
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

    @guest
    @else
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2" id="sidenav">
                {{-- sidenav start --}}
                @guest

                @else
                    <div class="row">
                        <center>
                            <div class="col-sm-12 side" id="marg">
                                Welcome,
                            </div>
                            <div class="col-sm-12 side" >
                                {{Auth::user()->role}}
                            </div>
                        </center>
                    </div>
                    <br>
                    <br>
                    
                    {{-- CS part --}}
                    <div class="container-fluid">
                        @if(Auth::user()->role == 'CS')
                            {{-- first --}}
                            <div class="row" id="hub1">
                                <div class="col-sm-12 side">
                                    <a href="{{route('template.index')}}">Template</a>
                                </div>
                            </div>

                        {{-- PD part --}}
                        @elseif(Auth::user()->role == 'PD')
                            <div class="row">
                                <div class="col-sm-12 side">
                                    <a href="">Penjualan</a>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12 side">
                                <a href="{{ route('prof.edit', ['prof'=>Auth::user()->user_id]) }}">Update Profile</a>
                            </div>
                        </div>    
                    </div>
                    
                @endguest
                {{-- sidenav end --}}
            </div>
            @endguest
            <div class="col-sm-2"></div>
            <div class="col-sm-10" style="margin-top: 25px;">
                <br><br>
                <div class="container-fluid">
                @yield('content')
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript" src="{{asset('/resources/assets/framework/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/resources/assets/framework/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/resources/assets/js/admin.js')}}"></script>
</body>
</html>