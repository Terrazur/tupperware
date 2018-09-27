@extends('layouts.app_user')

@section('content')
    <div id="carousel-id" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-id" data-slide-to="1" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active" style="background-color: grey;">
                    <center>
                        <img alt="First slide" src="resources/assets/img/main/customize.png" style="width: 500px">
                    </center>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Customize Your</h1>
                            <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-color: grey;">
                    <center>
                        <img alt="Second slide" src="resources/assets/img/main/wallet.png" style="width: 500px">    
                    </center>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Try Tupperware Wallet</h1>
                            <p>For 10% discount!</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        
        <hr style="border-color: white;">
        @guest
            <div class="row" style="color: white;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <b style="font-size: 20px;">Our Feature:</b>
                            </center>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <center>
                                    <b style="font-size: 20px;">Tupperware Wallet</b>
                                    <br>
                                    <img src="resources/assets/img/main/wallet.png" style="width: 300px;">
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- order list --}}
            <div class="row">
                <div class="container">
                    <div class="row">
                        {{-- order box --}}
                        <div class="col-sm-5" id="box-order">
                            <div class="row">
                                <div class="col-xs-12">
                                    <center>
                                        <h4>
                                            <b>Your Order</b>    
                                        </h4>
                                    </center>
                                </div>    
                            </div>
                            <div class="row" style="border-bottom: 1px solid black;">
                                <center>
                                    <div class="col-sm-2">
                                        Order ID    
                                    </div>
                                    <div class="col-sm-2">
                                        Item    
                                    </div>
                                    <div class="col-sm-3">
                                        Alamat    
                                    </div>
                                    <div class="col-sm-5">
                                        Status Order
                                    </div>    
                                </center>
                            </div>
                            @foreach($orders as $order)                              
                                @if($order->user_id == Auth::user()->user_id)
                                    @if($order->order_status != 'DONE')
                                        <div class="row box-order-list">
                                            <center>
                                                <div class="col-sm-2">
                                                    {{$order->order_id}}
                                                </div>
                                                <div class="col-sm-2">
                                                    {{$order->item}}
                                                </div>
                                                <div class="col-sm-3">
                                                    {{$order->addr}}
                                                </div>
                                                <div class="col-sm-5">
                                                    @if($order->order_status == 'P')
                                                        Terimakasih telah melakukan pembelian, Silahkan melakukan pembayaran di kantor tupperware terdekat.
                                                    @elseif($order->order_status == 'NV')
                                                        Pembayaran order sedang dalam tahap Verifikasi
                                                    @elseif($order->order_status == 'SP')
                                                        Order Telah Ter Verifikasi dan terkirim ke bagian Produksi
                                                    @elseif($order->order_status == 'OP1')
                                                        Barang pesanan anda sedang dalam tahap produksi 
                                                    @elseif($order->order_status == 'OP2')
                                                        Barang pesanan anda sedang dalam tahap pengepakan
                                                    @elseif($order->order_status == 'OD')
                                                        Barang pesanan anda sedang dalam perjalanan
                                                    @elseif($order->order_status == 'AR')
                                                        Barang pesanan anda sudah sampai pada ditujuan    
                                                    @endif
                                                </div>    
                                            </center>
                                            
                                        </div>
                                    @endif
                                @endif
                            @endforeach        
                        </div>
                        
                        <div class="col-sm-7"></div>
                    </div>
                </div>
            </div>
        @endguest
@endsection
