@extends("layouts.template")


@section('title')
<h5 class = "mb-3">Daftar Pesanan</h5>
@endsection
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-left">
				<h3 class="mb-3" style="font-weight: bold; color: rgb(106, 89, 255)">Daftar Pesanan </h3>
				<p>Berikut adalah daftar pesanan yang <b>masih diproses</b></p>
			</div>
		</div>
	</div>
	
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	{{-- <button onClick="notif_me()"> tes </button> --}}
	<table class="table table-bordered">
		<tr>
			<th>No Meja</th>
			<th>No Pemesanan</th>
			<th>Nama Pemesan</th>
			<th>Tanggal</th>
			<th>Status Order</th>
			<th>Harga</th>
			<th>Aksi</th>
		</tr>
		@php $no = 1; @endphp
		@foreach ($order as $ord)
		<tr>
			<td>{{$ord->no_meja}}</td>
			<td>{{$ord->id}}</td>
			<td>{{$ord->nama}}</td>
			<td>{{$ord->tanggal}}</td>
			<td>
			@if($ord->status_order == "dipesan")
			<a href="{{url('updateStatus/dibayar/'.$ord->id)}}" class = "btn btn-primary">Dibayar</a>
			@elseif($ord->status_order == "dibayar")br
			<a href="{{url('updateStatus/dimasak/'.$ord->id)}}" class = "btn btn-primary">Dibayar</a>
			@elseif($ord->status_order == "dimasak")
			<a href="{{url('updateStatus/siap/'.$ord->id)}}" class = "btn btn-primary">Dibayar</a>
			@elseif($ord->status_order == "siap")
			<a href="{{url('updateStatus/diantar/'.$ord->id)}}" class = "btn btn-primary">Dibayar</a>
			@elseif($ord->status_order == "diantar")
			<a href="{{url('updateStatus/ditutup/'.$ord->id)}}" class = "btn btn-primary">Dibayar</a>
			@endif
			</td>
			<td>{{$ord->harga}}</td>
			
		</tr>
		@endforeach
	</table>
@endsection