<html>

<head>
 <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styleCustomer.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
</head>

<body>
    <div class="wrapper">
        <div id="box">
            <img src="{{asset('assets/images/logo.jpeg')}}" alt="lock" />
            <h3>Meja : {{$no_table}}</h3>
            <h3 class="mb-3">No Pemesanan : {{$no_pesanan}}</h3>
            <form action="{{route('sendNama')}}" method = "POST">
                @csrf
                <input type="hidden" name="no_table" value="{{$no_table}}">
                <input type="hidden" name="no_pesanan" value="{{$no_pesanan}}">
                <label class = "mb-2"for="" style="color: rgb(61, 116, 235); font-weight: bold;">Masukkan Nama</label>
                <input type="text" name="nama_pemesan">
                <button class = "mb-3 mt-2 btn btn-primary" type="Submit">Lanjut Pesan</button>
            </form>
        </div>
    </div>
</body>

</html>




