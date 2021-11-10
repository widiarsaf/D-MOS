@extends("layouts.template")

@section('title')
<h4>Menu</h4>
<p class="mt-1">Daftar menu makanan dan minuman restoran Ahlan Eatery & Beverage</p>
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="pull-left">
			<h2>Daftar Karyawan Ahlan Eatery & Beverages</h2>
		</div>
		<div class="float-left my-3">
			<a class="btn btn-primary" href="{{ route('waiter.create') }}"> + Tambah Data</a>
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
		<th>Nama</th>
		<th>Email</th>
		<th>Level</th>
		<th width="280px">Action</th>
	</tr>
	@php $no = 1; @endphp
	@foreach ($waiter as $waiter)
	<tr>
		<td>{{$no++}}</td>
		<td>{{ $waiter->name }}</td>
		<td>{{ $waiter->email}}</td>
		<td>@if($waiter->level==1)
			Admin
			@else
			Waiter
			@endif
		</td>
		<td>
			<form action="{{ route('waiter.destroy',['waiter'=>$waiter->id]) }}" method="POST">
				<a class="btn btn-warning" href=" {{route('waiter.edit',$waiter->id) }}"><i class="ti-marker-alt"></i></a>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger"><i class="ti-trash"></i></button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection