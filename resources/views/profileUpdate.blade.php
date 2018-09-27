@extends('layouts.app_user')

@section('content')		
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="row">
		                <div class="col-sm-12">
		                    <center>
		                        <img src="{{asset('/resources/assets/img/main/main.png')}}" style="width: 500px;">
		                    </center>
		                </div>
		            </div>
		            <div class="row" style="margin-top: 45px;">
		                <form class="form-horizontal" method="POST" action="{{ route('prof.update', [Auth::user()->user_id]) }}">

		                    {{ csrf_field() }}

							<input type="hidden" name="_method" value="PUT">  
							                  
		                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		                        <label for="name" class="col-md-4 control-label">id</label>

		                        <div class="col-md-6">
		                            <input class="form-control" type="text" name="id" id="id" value="{{Auth::user()->user_id}}" readonly>
		                        </div>
		                    </div>

		                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		                        <label for="name" class="col-md-4 control-label">Name</label>

		                        <div class="col-md-6">
		                            <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autofocus>

		                            @if ($errors->has('name'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('name') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>

		                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

		                        <div class="col-md-6">
		                            <input id="email" type="email" class="form-control" name="email" value="{{Auth::user()->email}}" required>

		                            @if ($errors->has('email'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('email') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>

		                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
		                        <label for="phone" class="col-md-4 control-label">Nomor Telephon/HP</label>

		                        <div class="col-md-6">
		                            <input id="phone" type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" maxlength="11" minlength="6" required>

		                            @if ($errors->has('phone'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('phone') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>

		                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                        <label for="password" class="col-md-4 control-label">Password</label>

		                        <div class="col-md-6">
		                            <input id="password" type="password" class="form-control" name="password" required>

		                            @if ($errors->has('password'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('password') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

		                        <div class="col-md-6">
		                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		                        </div>
		                    </div>

		                    <div class="form-group{{ $errors->has('addr') ? ' has-error' : '' }}">
		                        <label for="addr" class="col-md-4 control-label">Address</label>

		                        <div class="col-md-6">
		                            <textarea id="addr" type="text" class="form-control" name="addr" required>{{Auth::user()->addr}}</textarea>
		                            @if ($errors->has('addr'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('addr') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <div class="col-md-6 col-md-offset-4">
		                            <button type="submit" class="btn btn-primary">
		                                Register
		                            </button>
		                        </div>
		                    </div>
		                </form>
		            </div>

		        </div>
		    </div>
		</div>
	</form>
@endsection