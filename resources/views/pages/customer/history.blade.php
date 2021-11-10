<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/styleCustomer.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
	<title>Document</title>
</head>
<body style="background: rgb(255, 234, 192)">
	<div style=" display : flex;justify-content: center;">
		<div
			style="padding: 50px 50px; text-align: center; background: white; box-shadow: -6px 9px 153px -49px rgba(0,0,0,0.30);border-radius: 5px; margin-bottom: 100px">
			<img src="{{asset('assets/images/logo.jpeg')}}" alt="lock" style="width: 50px; margin-bottom: 10px" />
			<h5 style="color: rgb(214, 153, 19)">No Pesanan {{$no_pesanan}}</h5>
			<h5 style="color: rgb(196, 147, 41)">{{$no_table}} / {{$nama_pemesan}}</h5>
			<div style="background :rgb(214, 153, 19); height: 5px">
				<p> </p>
			</div>
			<table class="table table-bordered mt-4">
				<tr>
					<th>No</th>
					<th>Nama Masakan</th>
					<th>Quantity</th>
					<th>Harga Satuan</th>
					<th>Total Harga</th>
				</tr>
				@php $no = 1; @endphp
				@foreach ($pesanan as $p)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$p['name']}}</td>
					<td>{{$p['count']}}</td>
					<td>Rp. {{$p['price']}}</td>
					<td>Rp. {{$p['price']}}</td>
				</tr>
				@endforeach
		
			</table>
			<h5>Total Keseluruhan : Rp. {{$total}}</h5>
			<hr class = "mt-5">
			<p style="font-size: 12px">Silakan tunggu pesanan Anda</p>
			<p style="font-size: 12px">Terima Kasih sudah memesanan di restoran kami</p>
		</div>
		</div>
		

	</div>
</body>
</html>