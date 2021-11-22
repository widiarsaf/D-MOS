@extends("layouts.template")


@section('title')
<h4>Menu</h4>
<p class = "mt-1">Daftar menu makanan dan minuman restoran Ahlan Eatery & Beverage</p>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Daftar Menu Ahlan Eatery & Beverage</h2>
        </div>
        <div class="float-left my-3">
            <a class="btn btn-primary" href="{{ route('masakan.create') }}"> + Tambah Data</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
{{-- <button onClick="notif_me()"> tes </button> --}}
<table class="table table-bordered" id="menuTable">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Masakan</th>
        <th>Jenis Masakan</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Gambar</th>
        <th width="280px">Action</th>
    </tr>
    </thead>
    <tbody>
    @php $no = 1; @endphp
    @foreach ($masakan as $msk)
    
        <tr>
            <td>{{$no++}}</td>
            <td>{{ $msk->nama_masakan }}</td>
            <td>{{ $msk->jenis_masakan->nama_jenis}}</td>
            <td>{{ $msk->harga }}</td>
            <td>{{ $msk->status }}</td>
            <th><img width=" 80px" src="{{asset('storage/'.$msk->gambar) }}"></th>
            <td>
                <form action="{{ route('masakan.destroy',['masakan'=>$msk->id]) }}" method="POST">
                    <a class="btn btn-primary" href=" {{route('masakan.edit',$msk->id) }}"><i class="ti-marker-alt"></i></a>
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