@extends("layouts.template")

@section('title')
<h4>Detail Order</h4>
@endsection
@section('content')

<div>
<center>
	<img src="{{asset('assets/images/logo.jpeg')}}" alt="lock" style="width: 50px; margin-bottom: 10px" />

	<h5>No Pesanan : {{$order->id}}</h5>
	<h5>No Meja : {{$order->no_meja}}</h5>
	<h5>No Pemesan : {{$order->nama}}</h5>
	@if ($order->status_order == "diproses")
	<div
			style="background-color: rgb(253, 217, 188) !important; color:rgb(165, 115, 6); border-radius:50px; padding: 5px; max-width: 100px; font-weight: bold">
			di proses</div>
	@elseif ($order->status_order == "dibayar")
	<div
			style="background-color: rgb(253, 217, 188) !important; color:rgb(165, 115, 6); border-radius:50px; padding: 5px; max-width: 100px; font-weight: bold">
			di bayar</div>
	@else
	<div
		style="background-color: rgb(202, 250, 195) !important; color:rgb(45, 161, 35); border-radius:50px; padding: 5px; max-width: 100px; font-weight: bold">
		Selesai</div>
	@endif
</center>
</div>
<hr>
 <center><h5 style="font-weight: bold">Menu yang dipesan</h5></center>
<div>
	<table class="table table-bordered">
		<tr>
			<th>Nama Masakan</th>
			<th>Kuantiti</th>
			<th>Harga Masakan</th>
		</tr>
		@php $no = 1; @endphp
		@foreach ($orderDetail as $od)
		<tr>
			<td>{{$od->masakan->nama_masakan}}</td>
			<td>{{$od->qty}}</td>
			<td>{{$od->masakan->harga}}</td>
		</tr>
		@endforeach
	</table>
	<center>
		<h5 style="font-weight: bold">Total Keseluruhan : Rp. {{$order->harga}}</h5>
	</center>

	@if ($order->status_order == 0)
		<a type="button" class="btn btn-primary btn-outline-primary" href="{{route('orderWaiter.index')}}">back</a>
	@else
		<a type="button" class="btn btn-primary btn-outline-primary" href="{{route('closeOrder')}}">back</a>
	@endif
</div>


@endsection