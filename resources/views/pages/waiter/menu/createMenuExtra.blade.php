@extends("layouts.template")

@section('title')
<h4>Create Menu Extra</h4>
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
<h4 class="mb-3">Masukan Menu Extra</h4>
<form method="post" action="{{ route('extra.store') }}" id="myForm">
	@csrf
	<div class="form-group">
		<label for="nama_extra">Nama Menu Extra</label>
		<input type="text" name="nama_extra" class="form-control" id="nama_extra">

	</div>
	<div class="form-group">
		<label for="harga">Harga</label>
		<input type="number" name="harga" class="form-control" id="harga">
	
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection