@extends('layouts.adminPanel')

@section('content')
	<div class="row">
		<center>
			<h3>Update Your data Here!</h3>
		</center>
	</div>
	<form action="{{route('prof.update',[Auth::user()->user_id])}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT"> 
		<div class="row">
			<div class="col-sm-4 form-group">
				<label>User Id</label>
				<input type="number" name="user_id" id="user_id" value="{{Auth::user()->user_id}}" readonly class="form-control">
			</div>
			<div class="col-sm-4">
				<label>Username</label>
				<input type="text" name="name" id="name" value="{{Auth::user()->name}}" class="form-control">
			</div>
			<div class="col-sm-4 form-group">
				<label>Email</label>
				<input type="email" name="email" id="email" value="{{Auth::user()->email}}" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 form-group">
				<label>Password</label>
				<input type="password" name="pass" id="pass" class="form-control" minlength="6">
			</div>
		</div>

		<div class="row">
			<div class="col-xs-2 col-xs-offset-5">
				<center>
					<input class="btn btn-primary" class="form-control" type="submit" name="submit" id="submit">
				</center>
			</div>
		</div>
	</form>
@endsection