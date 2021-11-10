@extends("layouts.template")


@section('title')
<h4>Edit Menu Extra</h4>
@endsection
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<h4>Edit Jenis Masakan</h4>
<form method="post" action="{{ route('extra.update', $extra->id) }}" id="myForm">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="nama_extra">Nama Menu Extra</label>
		<input type="text" name="nama_extra" class="form-control" id="nama_extra" value="{{ $extra->nama_extra }}"
			aria-describedby="harga">
	</div>
	<div class="form-group">
		<label for="harga">Nama Menu Extra</label>
		<input type="text" name="harga" class="form-control" id="harga" value="{{ $extra->harga }}"
			aria-describedby="harga">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection