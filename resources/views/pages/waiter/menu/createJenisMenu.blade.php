@extends("layouts.template")

@section('title')
<h4>Create New Jenis Menu</h4>
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
<h4 class = "mb-3">Masukan Jenis Masakan Baru</h4>
<form method="post" action="{{ route('jenis_masakan.store') }}" id="myForm">
	@csrf
	<div class="form-group">
		<label for="nama_masakan">Nama Jenis Masakan</label>
		<input type="nama" name="nama_jenis" class="form-control" id="nama_jenis">

	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection