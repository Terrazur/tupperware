@extends('layouts.app_user')

@section('content')
	<form enctype="multipart/form-data" action="{{route('order.store')}}" method="POST" oninput="count()">
		{{csrf_field()}}

		<input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->user_id}}">

		<div class="row">
			<div class="col-sm-6">
				<label for="color">Item Color</label>
				<input class="form-control" type="color" id="color" name="color" value="#ff0000" required>
			</div>
			
			<div class="col-sm-3">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="item">Item</label>
							<select class="form-control" id="type" name="type" oninput="detectPrice()" required>
								<option disabled selected>-- All --</option>
								<option>Botol Minum</option>
								<option>Alat Makan</option>
								<option>Kotak Makan</option>
							</select>
						</div>		
					</div>
				</div>
				<input type="hidden" name="prc" id="prc">
			</div>
			<div class="col-sm-3">				
				<label>Quantity</label>
				<input class="form-control" type="number" name="qty" id="qty" oninput="count()" required>
			</div>
		</div>
		<div class="row" style="min-height: 50vh;">
			{{-- design --}}
			<div class="col-sm-6">
				<div class="form-group">
					<label>Design</label>
					<select class="form-control" id="dtype" name="dtype" onclick="detect()" required>
						<option disabled selected>--Choose--</option>
						<option>Default</option>
						<option>Template</option>
						<option>Custom</option>
					</select>
					
					<hr style="border-color: black;">
					
					{{-- template --}}
					<div class="row template">
						<div class="col-sm-12">
							<input class="form-control" type="text" name="final" id="final">
						</div>
						<div class="col-sm-12" style="margin-top: 10px;">
								@foreach($templates as $template)
									<?php
										$i++;
									?>
									<button type="button" id="temp{{$i}}" onclick="set(temp{{$i}})" value="{{$template->image}}">
										<img src="../resources/assets/img/product/template/{{$template->image}}" style="width: 190px;">
									</button>
								@endforeach
						</div>
						<input type="hidden" id="jsfor" value="{{$i}}">
					</div>

					<div class="row custom">
						<div class="col-sm-12">
							<input class="form-control" type="file" name="designs" id="designs">
							<br>
							<center>
								<img src="#" id="custom" style="width: 150px">
							</center>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12">
						<div id="carousel-id" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carousel-id" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-id" data-slide-to="1" class=""></li>
							</ol>
							<div class="carousel-inner">
								<div class="item active">
									<center>
										<img class="img-item" data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" src="../resources/assets/img/main/mug.png">	
									</center>
									
									<div class="container">
										<div class="carousel-caption">
											<h2>Gelas</h2>
										</div>
									</div>
								</div>
								<div class="item">
									<center>
										<img class="img-item" data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" src="../resources/assets/img/main/plate.png">
									</center>									
									<div class="container">
										<div class="carousel-caption">
											<h2>Piring</h2>
										</div>
									</div>
								</div>
							</div>
							<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
							<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">				
						<label>Where to Sent:</label>
						<textarea class="form-control" type="number" name="addr" id="addr" required></textarea>
					</div>
					<div class="col-sm-6">
						<label>Payment Method</label>
						<select class="form-control" id="pay_method" name="pay_method" required>
							<option selected disabled>-- Select Payment Method --</option>
							<option>Cash</option>
							<option>Tupperware Wallet</option>
						</select>
					</div>
				</div>
			</div>
		</div>

		<hr style="border-color: black">

		<div class="row">
			<div class="col-xs-12">
				{{-- detail akhir order --}}
				<div class="row">
					<div class="col-sm-6">
						<label>Harga Barang</label>
						<input class="form-control" type="number" name="price" id="price" readonly required>
					</div>
					<div class="col-sm-6">
						<label>Biaya Pengantaran</label>
						<input class="form-control" type="number" name="send" id="send" readonly required>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<label>Total Harga</label>
						<input class="form-control" type="number" name="total" id="total" readonly required>
					</div>
				</div>
			</div>
		</div>

		<br>

		@if(session('danger'))
			<div class="alert alert-danger">
				{{session('danger')}}
			</div>
		@endif

		<br>
		<div class="row">
			<div class="col-sm-12">
				<center>
					<input type="submit" name="submit" id="submit" class="btn btn-primary">
				</center>
			</div>
		</div>
	</form>
@endsection