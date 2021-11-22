@extends("layouts.template")


@section('title')
<h4>Menu Criteria</h4>
@endsection
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-left">
				<h2>Jenis Masakan</h2>
			</div>
			<div class="float-left my-3">
				<a class="btn btn-primary" href="{{ route('jenis_masakan.create') }}"> + Tambah Data</a>
			</div>
		</div>
	</div>

	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif

	<table class="table table-bordered" id="menuJenisTable">
		<thead>
		<tr>
			<th>No</th>
			<th>Nama Jenis</th>
			<th width="280px">Action</th>
		</tr>
		</thead>
		<tbody>
		@php $no = 1; @endphp
		@foreach ($jenisMasakan as $item)
		
		<tr>
			<td>{{$no++}}</td>
			<td>{{ $item->nama_jenis }}</td>
			<td>
				<form action="{{ route('jenis_masakan.destroy',['jenis_masakan'=>$item->id]) }}" method="POST">
					<a class="btn btn-warning" href=" {{route('jenis_masakan.edit',$item->id) }}"><i class="ti-marker-alt"></i></a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger"><i class="ti-trash"></i></button>
				</form>
			</td>
		</tr>
		
		@endforeach
		</tbody>
	</table>
@endsection