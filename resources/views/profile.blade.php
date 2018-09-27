{{-- <a class="btn btn-primary" href="{{ route('employee.edit', ['employee'=>$employ->employ_id]) }}">Ubah</a> --}}
@extends('layouts.app_user')

@section('content')

	<div class="row" style="color: white;">
		<div class="col-sm-3">
			<div class="row">
				<div class="col-sm-12 profile-head">
					<center>
						Total Saldo Wallet
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12" style="font-size: 15px;">
					Rp. {{Auth::user()->wallet}}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 profile-head">
					<center>
						<input onclick="topUpForm()" type="button" name="up" id="up" value="Top-Up Wallet" style="background-color: transparent; border:none;">
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 top">
					<form class="form-horizontal" action="{{route('topup.store')}}" method="POST">
						{{csrf_field()}}
						<div class="form-group" style="margin-top: 10px;">
							<div class="row">
								<div class="col-sm-12">
									<input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->user_id}}">
									<input type="hidden" name="status" id="status" value="NV">
									<input class="form-control" type="number" name="final" id="final" readonly>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-4">
									<center>
										<input onclick="topUp(this.id)" type="button" name="price" id="price1" value="50000" class="btn btn-success">
									</center>
								</div>
								<div class="col-sm-4">
									<center>
										<input onclick="topUp(this.id)" type="button" name="price" id="price2" value="100000" class="btn btn-success">
									</center>
								</div>
								<div class="col-sm-4">
									<center>
										<input onclick="topUp(this.id)" type="button" name="price" id="price3" value="200000" class="btn btn-success">
									</center>
								</div>
							</div>
						</div>

						<div class="row">
							<center>
								<input type="submit" name="submit" name="submit" class="btn btn-primary">
							</center>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			@if(session('alert'))
				<div class="alert alert-success">
					{{session('alert')}}
				</div>
			@endif
		</div>

		<div class="col-sm-5">
			<div class="row">
				<center>
					<div class="col-sm-12 profile-head">
						<b>
							{{Auth::user()->name}}'s Profile
						</b>
					</div>
				</center>
			</div>
			<div class="row">
				<div class="col-sm-2 profile-content">Nama</div>
				<div class="col-sm-10" style="border-bottom: 2px solid black;">{{Auth::user()->name}}</div>
			</div>

			<div class="row">
				<div class="col-sm-2 profile-content">Email</div>
				<div class="col-sm-10" style="border-bottom: 2px solid black;">{{Auth::user()->email}}</div>
			</div>

			<div class="row">
				<div class="col-sm-2 profile-content">Alamat</div>
				<div class="col-sm-10 " style="border-bottom: 2px solid black;">{{Auth::user()->addr}}</div>
			</div>

			<div class="row">
				<div class="col-sm-12 profile-head">
					<center>
						<a class="btn btn-primary" href="{{ route('prof.edit', ['prof'=>Auth::user()->user_id]) }}">Ubah</a>
					</center>
				</div>
			</div>	
		</div>
	</div>
	
@endsection