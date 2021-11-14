@extends("layouts.template")

@section('title')
<h4>Menu</h4>
<p class="mt-1">Daftar QR code</p>
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="pull-left">
			<h2>Daftar QR code D-MOS</h2>
		</div>
		<div class="float-left my-3">
			<a class="btn btn-primary" href="{{ route('qrcode.create') }}"> + Tambah Data</a>
		</div>
	</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Code Meja</th>
		<th>Link</th>
		<th>Gambar QR code</th>
		<th width="280px">Action</th>
	</tr>
	@php $no = 1; @endphp
	@foreach ($qrcode as $qr)
	<tr>
		<td>{{$no++}}</td>
		<td>{{ $qr->code_meja}}</td>
		<td>{{ $qr->link}}</td>
		<td><img width=" 80px" src="{{asset('storage/'.$qr->gambar_qrcode) }}"></td>
		<td>
			<form action="{{ route('qrcode.destroy',['qrcode'=>$qr->id]) }}" method="POST">
				<a class="btn btn-warning" href=" {{route('qrcode.edit',$qr->id) }}"><i class="ti-marker-alt"></i></a>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger"><i class="ti-trash"></i></button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection