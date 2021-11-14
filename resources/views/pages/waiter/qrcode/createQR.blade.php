@extends("layouts.template")

@section('title')
<h4>Create New QR code</h4>
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
<h4 class="mb-3">Masukkan QR code baru</h4>
<form method="post" action="{{ route('qrcode.store') }}" id="myForm" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="code_meja">Code Meja</label>
		<input type="text" name="code_meja" class="form-control" id="code_meja">
	</div>
	<div class="form-group">
		<label for="link">Link</label>
		<input type="text" name="link" class="form-control" id="link">
	</div>
	<div class="form-group">
		<label for="gambar">Gambar </label>
		<input type="file" class="form-control" id="gambar" name="gambar">
	</div>
	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection