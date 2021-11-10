@extends("layouts.template")


@section('title')
<h4>Edit Menu</h4>
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
    <h3 class="mb-4">Edit Menu Masakan</h3>
    <form method="post" action="{{ route('masakan.update', $masakan->id) }}" id="myForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_masakan">Nama Masakan</label>
            <input type="nama_masakan" name="nama_masakan" class="form-control" id="nama_masakan" aria-
                describedby="nama_masakan" value = "{{$masakan->nama_masakan}}">
        </div>
        <div class="form-group">
            <label for="jenis_masakan">Jenis Masakan</label>
            <select name="jenis_masakan_id" id="jenis_masakan_id" class="form-control">
                @foreach($jenis_masakan as $jm)
                <option value="{{$jm->id}}" {{$masakan->id_jenis == $jm->id ? 'selected' : ''}}>{{$jm->nama_jenis}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="harga" name="harga" class="form-control" id="harga" aria- describedby="harga" value= "{{$masakan->harga}}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="tersedia" {{$masakan->status === 'tersedia' ? 'selected' : ''}}>Tersedia</option>
                <option value="kosong" {{$masakan->status === 'kosong' ? 'selected' : ''}}>Kosong</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gambar">Foto Masakan</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            <img class = "mt-3"src="{{asset('storage/'.$masakan->gambar) }}" width="100px">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection