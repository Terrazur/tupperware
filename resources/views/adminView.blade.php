@extends('layouts.adminPanel')

@section('content')

	@if(Auth::user()->role == 'CS')
		{{-- order --}}
		<div class="row">
			<div class="col-sm-6">
				<div class="row" id="table-1" style="background-color: #006064;">
					<center>
						<h3>Verify Cash Order</h3>
					</center>
				</div>
				@if($ttlOdr == 0)
					<center>
						Tidak ada Transaksi Cash
					</center>
				@else
					<div class="row rows" id="header-1">
						<center>
							<div class="col-sm-2">
								Order ID
							</div>

							<div class="col-sm-2">
								User ID
							</div>

							<div class="col-sm-2">
								Item
							</div>

							<div class="col-sm-2">
								Quantity
							</div>

							<div class="col-sm-2">
								Price
							</div>

							<div class="col-sm-2">
								Action
							</div>
						</center>
					</div>

					@foreach($orders as $order)
						@if($order->pay_method == 'Cash' && $order->pay_status == 'NV')
							<div class="row rows" style="background-color: #80DEEA">
								<center>
									<div class="col-sm-2">
										{{$order->order_id}}
									</div>

									<div class="col-sm-2">
										{{$order->user_id}}
									</div>
						            
									<div class="col-sm-2">
										{{$order->item}}
									</div>

						            <div class="col-sm-2">
										{{$order->qty}}
									</div>

									<div class="col-sm-2">
										@if($order->item == 'Botol Minum')
											{{15000*$order->qty+9000}}
										@elseif($order->item == 'Kotak Makan')
											{{20000*$order->qty+9000}}
										@elseif($order->item == 'Alat Makan')
											{{20000*$order->qty+9000}}
										@endif
									</div>

									<div class="col-sm-2">
										<center>
											<form action="orderVerify" method="POST">
												{{csrf_field()}}
												<input type="hidden" name="order_id" id="order_id" value="{{$order->order_id}}">
												<input type="hidden" name="payStatus" id="payStatus" value="V">
												<input type="hidden" name="orderStat" id="orderStat" value="SP">
												<input type="submit" name="submit" id="submit" value="Verify" class="btn btn-primary">
											</form>
										</center>
									</div>
								</center>
							</div>
						@endif
					@endforeach
				@endif
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-5">
				<div class="row">
					<div class="col-sm-12" id="table-2">
						<center>
							<h3>Wallet Top-Up</h3>
						</center>
					</div>
				</div>
				@if($ttlTop == 0)
					<center>
						Tidak ada Top-Up Wallet
					</center>
				@else
				<div class="row rows" id="header-2">
					<center>
						<div class="col-sm-4">
							Name
						</div>
						<div class="col-sm-4">
							Amount
						</div>
						<div class="col-sm-4">
							Action
						</div>
					</center>
				</div>
				@foreach($tops as $top)
					@foreach($users as $user)
						@if($top->status != 'V')
							@if($user->user_id == $top->user_id)
								<div class="row rows" style="background-color: #CDDC39;">
									<center>
										<div class="col-sm-4">
											{{$user->name}}
										</div>
										<div class="col-sm-4">
											Rp. {{$top->amount}}
										</div>
										<div class="col-sm-4">
											<center>
												<form action="topVerif" method="POST">
													{{csrf_field()}}
													<input type="hidden" name="amount" id="amount" value="{{$top->amount}}">
													<input type="hidden" name="user_id" id="user_id" value="{{$user->user_id}}">
													<input type="hidden" name="id" id="id" value="{{$top->id}}">
													<input type="submit" name="submit" id="submit" value="Verify" class="btn btn-primary">
												</form>
											</center>
										</div>
									</center>
								</div>
							@endif
						@endif
					@endforeach
				@endforeach
				@endif
			</div>
		</div>

		{{-- top up --}}
		<div class="row">
			
		</div>

	@elseif(Auth::user()->role == 'PD')
		<div class="row" style="margin-bottom: 20px;">
			{{-- pending order --}}
			<div class="col-sm-4">
				<div class="row">
					<div class="col-sm-11">
						<div class="row" style="border-top-left-radius: 15px; background-color: #C2185B; color: white;">
					<div class="col-sm-12">
						<center>
							<h3>Pending Order</h3>
						</center>
					</div>
				</div>
				<div class="row" style="background-color: #880E4F; color: white;">
					<center>
						<div class="col-sm-6">
							Order ID
						</div>
						<div class="col-sm-6">
							Action
						</div>	
					</center>
				</div>
				@foreach($orders as $order)
					@if($order->order_status == "SP")
						<div class="row vertical" style="background-color: #C51162; color: white;">
							<div class="col-sm-6">
								<center>
									{{$order->order_id}}
								</center>
							</div>
							<div class="col-sm-6">
								<center>
									<form action="updateStatus" method="POST">
										{{csrf_field()}}
										<input type="hidden" name="order_id" id="order_id" value="{{$order->order_id}}">
										<input type="submit" name="submit" id="submit" value="update" class="btn btn-primary">
									</form>
								</center>
							</div>
						</div>
					@endif
				@endforeach		
					</div>
					<div class="col-sm-1"></div>
				</div>
			</div>

			{{-- on packaging --}}				
			<div class="col-sm-8">
				<div class="row" style="color:white; background-color: #0D47A1; border-top-right-radius: 15px;">
					<center>
						<h3>On Packaging</h3>
					</center>
				</div>
						
				<div class="row" style="background-color: #82B1FF">
					<center>
						<div class="col-sm-3">Order ID</div>
						<div class="col-sm-2">Item</div>
						<div class="col-sm-5">Alamat</div>
						<div class="col-sm-2">Action</div>
					</center>
				</div>
				@foreach($orders as $order)
					@if($order->order_status == 'OP2')
						<div class="row vertical" style="border-bottom-right-radius: 15px; background-color: #26A69A;">
							<center>
								<div class="col-sm-3">{{$order->order_id}}</div>
								<div class="col-sm-2">{{$order->item}}</div>
								<div class="col-sm-5">{{$order->addr}}</div>
								<div class="col-sm-2">
									<form action="updateStatus" method="POST">
										{{csrf_field()}}
										<input type="hidden" name="order_id" id="order_id" value="{{$order->order_id}}">
										<input type="submit" name="submit" id="submit" value="update" class="btn btn-primary">
									</form>
								</div>
							</center>
						</div>
					@endif
				@endforeach
			</div>
		</div>

		<div class="row">
			{{-- on production --}}
			<div class="col-sm-7">
				<div class="row" style="background-color: #E65100; color: white; border-top-left-radius: 15px;">
					<div class="col-sm-12">
						<center>
							<h3>On Production</h3>
						</center>
					</div>
				</div>
				<div class="row" style="background-color: #FFD600; padding-bottom: 10px; padding-top: 10px;">
					<center>
						<div class="col-sm-2">
							Order ID
						</div>
						<div class="col-sm-2">
							Color
						</div>
						<div class="col-sm-6">
							Design
						</div>
						<div class="col-sm-2">
							Action
						</div>
					</center>
				</div>
				
				@foreach($orders as $order)
					@if($order->order_status == 'OP1')
						<div class="row vertical" style="background-color: #FFC107">
							<center>
								<div class="col-sm-2">
									{{$order->order_id}}
								</div>
								<div class="col-sm-2" style="background-color: {{$order->color}}; height: 100px"></div>
								<div class="col-sm-6">
									@if($order->design_type == 'Default')
										Default
									@elseif($order->design_type == 'Template')
										<img src="resources/assets/img/product/template/{{$order->design}}" style="width: 200px;">
									@elseif($order->design_type == 'Custom')
										<img src="resources/assets/img/product/custom/{{$order->design}}" style="width: 200px;">
									@endif		
								</div>

								<div class="col-sm-2">
									<form action="updateStatus" method="POST">
										{{csrf_field()}}
										<input type="hidden" name="order_id" id="order_id" value="{{$order->order_id}}">
										<input type="submit" name="submit" id="submit" value="update" class="btn btn-primary">
									</form>	
								</div>
							</center>
						</div>
					@endif
				@endforeach		
			</div>

			<div class="col-sm-5">
				{{-- on delivery --}}
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-sm-1"></div>
					<div class="col-sm-11">
						<div class="row" style="background-color: #827717;">
							<div class="col-sm-12">
								<center><h3>On Delivery</h3></center>
							</div>
						</div>
						<div class="row" style="background-color: #CDDC39;">
							<center>
								<div class="col-sm-4">
									Order Id
								</div>
								<div class="col-sm-4">
									Alamat
								</div>
								<div class="col-sm-4">
									Action
								</div>
							</center>
						</div>
						@foreach($orders as $order)
							@if($order->order_status == 'OD')
								<div class="row rows" style="background-color: #C6FF00;">
									<center>
										<div class="col-sm-4">{{$order->order_id}}</div>
										<div class="col-sm-4">{{$order->addr}}</div>
										<div class="col-sm-4">
											<form action="updateStatus" method="POST">
												{{csrf_field()}}
												<input type="hidden" name="order_id" id="order_id" value="{{$order->order_id}}">
												<input type="submit" name="submit" id="submit" value="update" class="btn btn-primary">
											</form>
										</div>
									</center>
								</div>
							@endif
						@endforeach
					</div>
				</div>

				{{-- arrived --}}
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-11">
						<div class="row" style="background-color: #3F51B5;">
							<div class="col-sm-12" style="color: white;">
								<center><h3>Arrive</h3></center>
							</div>
						</div>
						<div class="row white" style="background-color: #5C6BC0;">
							<center>
								<div class="col-sm-4">
									Order Id
								</div>
								<div class="col-sm-4">
									Alamat
								</div>
								<div class="col-sm-4">
									Action
								</div>
							</center>
						</div>
						@foreach($orders as $order)
							@if($order->order_status == 'AR')
								<div class="row rows" style="background-color: #9FA8DA;">
									<center>
										<div class="col-sm-4">{{$order->order_id}}</div>
										<div class="col-sm-4">{{$order->addr}}</div>
										<div class="col-sm-4">
											<form action="updateStatus" method="POST">
												{{csrf_field()}}
												<input type="hidden" name="order_id" id="order_id" value="{{$order->order_id}}">
												<input type="submit" name="submit" id="submit" value="update" class="btn btn-primary">
											</form>
										</div>
									</center>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
		
	@endif

@endsection