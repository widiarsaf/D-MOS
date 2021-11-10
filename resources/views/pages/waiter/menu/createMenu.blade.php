@extends("layouts.template")

@section('title')
<h4>Create New Menu</h4>
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
    <h3 class = "mb-3">Tambah Data Masakan</h3>
    <form method="post" action="{{ route('masakan.store') }}" id="myForm" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nama_masakan">Nama Masakan</label>
            <input type="nama_masakan" name="nama_masakan" class="form-control" id="nama_masakan" aria- describedby="nama_masakan">

        </div>
        <div class="form-group">
            <label for="jenis_masakan">Jenis Masakan</label>
        
            <select name="jenis_masakan_id" id="jenis_masakan_id" class="form-control">
                @foreach($jenis_masakan as $jm)
                <option value="{{$jm->id}}">{{$jm->nama_jenis}}</option>
                @endforeach
            </select>
        
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="harga" name="harga" class="form-control" id="harga" aria- describedby="harga">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="tersedia">Tersedia</option>
                <option value="kosong">Kosong</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gambar">Foto Masakan</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection