@extends("layouts.template")


@section('title')
<h4>Daftar Pesanan</h4>
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="pull-left">
			<h3 class = "mb-3" style="font-weight: bold; color: rgb(106, 89, 255)" >Daftar Pesanan </h3>
			<p>Berikut adalah daftar pesanan yang sudah selesai</p>
		</div>
	</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
{{-- <button onClick="notif_me()"> tes </button> --}}
<a href="{{url('print')}}" class="btn btn-primary">Print Laporan</a>
<table class="table table-bordered" id="closeOrderTable">
	<thead>
	<tr>
		<th>No Meja</th>
		<th>No Pemesanan</th>
		<th>Nama Pemesan</th>
		<th>Tanggal</th>
		<th>Status Order</th>
		<th>Harga</th>
		<th>Aksi</th>
	</tr>
	</thead>
	<tbody>
	@php $no = 1; @endphp
	@foreach ($order as $ord)
	<tr>
		<td>{{$ord->no_meja}}</td>
		<td>{{$ord->id}}</td>
		<td>{{$ord->nama}}</td>
		<td>{{$ord->tanggal}}</td>
		<td>
			<div id="status{{$ord->status_order }}">
				<center>
					<div style="background-color: rgb(202, 250, 195) !important; color:rgb(45, 161, 35); border-radius:50px; padding: 5px; min-width: 100px; font-weight: bold">
						Selesai
					</div>
				</center>
			</div>
		</td>
		<td>{{$ord->harga}}</td>
		<th><a href="{{url('waiter/detailorder/'.$ord->id)}}" class = "btn btn-primary">Lihat detail</a></th>
	</tr>
	@endforeach
	</tbody>
</table>
@endsection