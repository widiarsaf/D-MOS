@extends("layouts.template")


@section('title')
<h4>Menu Criteria</h4>
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="pull-left">
			<h2>Daftar Extra Menu</h2>
		</div>
		<div class="float-left my-3">
			<a class="btn btn-primary" href="{{ route('extra.create') }}"> + Tambah Data</a>
		</div>
	</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered" id="myTable">
	<thead>
	<tr>
		<th>No</th>
		<th>Nama Extra</th>
		<th>Harga</th>
		<th width="280px">Action</th>
	</tr>
	</thead>
	@php $no = 1; @endphp
	@foreach ($extra as $item)
	<tbody>
	<tr>
		<td>{{$no++}}</td>
		<td>{{ $item->nama_extra }}</td>
		<td>{{ $item->harga }}</td>
		<td>
			<form action="{{ route('extra.destroy',['extra'=>$item->id]) }}" method="POST">
				<a class="btn btn-primary" href=" {{route('extra.edit',$item->id) }}">Edit</a>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</td>
	</tr>
	</tbody>
	@endforeach
</table>
@endsection