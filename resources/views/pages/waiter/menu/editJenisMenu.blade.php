@extends("layouts.template")


@section('title')
<h4>Edit Jenis Masakan</h4>
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
		<form method="post" action="{{ route('jenis_masakan.update', $jenisMasakan->id) }}" id="myForm">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="nama_masakan">Nama Jenis Masakan</label>
				<input type="text" name="nama_jenis" class="form-control" id="nama_jenis"
					value="{{ $jenisMasakan->nama_jenis }}" aria-describedby="nama_masakan">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
@endsection