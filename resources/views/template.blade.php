@extends('layouts.adminPanel')

@section('content')
	<center>
		<h3>Template</h3>
	</center>
	@if(count($templates)==0)
		<center>
			<h4>Belum ada Template</h4>
		</center>
	@else
		<div class="row">
			<center>
				<div class="col-sm-6">
					ID
				</div>
				<div class="col-sm-6">
					Design
				</div>
			</center>
		</div>
		@foreach($templates as $template)
			<div class="row" style="padding-bottom: 20px; padding-top: 20px;">
				<center>
					<div class="col-sm-6">
						{{$template->id}}
					</div>
					<div class="col-sm-6">
						<img src="resources/assets/img/product/template/{{$template->image}}" style="width: 300px;">
					</div>
				</center>
			</div>
		@endforeach
	@endif
	<center>
		<div class="row">
			<h3>Input New Template Design</h3>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<form enctype="multipart/form-data" action="{{route('template.store')}}" method="POST">
					{{csrf_field()}}
					<input class="form-control" type="file" name="template" id="template">
					<br>
					<input class="btn-primary" type="submit" name="submit">
				</form>
			</div>
		</div>
	</center>
@endsection