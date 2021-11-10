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
<h4 class="mb-3">Masukan Karyawan Baru</h4>
<form method="post" action="{{ route('waiter.store') }}" id="myForm">
	@csrf
	<div class="form-group">
		<label for="name">Nama Waiter</label>
		<input type="name" name="name" class="form-control" id="name">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" class="form-control" id="email">
	</div>
	<div class="form-group">
			<label for="password">Password</label>
			<input type="text" name="password" class="form-control" id="password">
	</div>
	<div class="form-group">
		<input type="hidden" name="level" class="form-control" id="level" value="2">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection