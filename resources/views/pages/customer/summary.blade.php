<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Favicon icon -->
	<link rel="icon" href="{{asset('assets/images/logo.jpeg')}}" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
	<!-- themify-icons line icon -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/icon/themify-icons/themify-icons.css')}}">
	<!-- ico font -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/icon/icofont/css/icofont.css')}}">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.mCustomScrollbar.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/styleCustomer.css')}}">
</head>
<body style="background: rgb(255, 234, 192)">
	<div style=" display : flex;justify-content: center; ">
		
		<div style="padding: 50px 50px; text-align: center; background: white; box-shadow: -6px 9px 153px -49px rgba(0,0,0,0.30);border-radius: 5px; margin-bottom: 100px">
				<img src="{{asset('assets/images/logo.jpeg')}}" alt="lock" style="width: 50px; margin-bottom: 10px"/>
				<h5 style="color: rgb(214, 153, 19)">No Pesanan {{$no_pesanan}}</h5>
				<h5 style="color: rgb(196, 147, 41)">{{$no_table}} / {{$nama_pemesan}}</h5>
				<div style="background :rgb(214, 153, 19); height: 5px">
					<p> </p>
				</div>
				<table class = "table table-bordered mt-4" >
					<tr>
						<th>No</th>
						<th>Nama Masakan</th>
						<th>Quantity</th>
						<th>Harga Satuan</th>
						<th>Total</th>
					</tr>
					@php $no = 1; @endphp
					@foreach ($pesanan as $p)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$p['name']}}</td>
							<td>{{$p['count']}}</td>
							<td>Rp. {{$p['price']}}</td>
							<td>Rp. {{$p['total']}}</td>
						</tr>
					@endforeach
					
				</table>
				<h5>Total Keseluruhan : Rp. {{$total}}</h5>
				<input type="Submit" class="btn btn mt-3" style="background:rgb(214, 153, 19); color:rgb(255, 253, 248);" value="Pesan Sekarang" data-toggle="modal" data-target="#konfirmasi">

		</div>
		

	</div>
{{-- Modal --}}
	<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Pesanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="text-align: center">
					<i class="ti-info-alt" style="color: rgb(223, 151, 70); font-size: 100px"></i>
					<p style="font-size: 20px; margin-top: 20px">Pesanan tidak bisa dibatalkan, yakin untuk memesan sekarang?</p>	
				</div>
				<div class="modal-footer">
					<form class="mt-4" action="{{route('order.store')}}" method="POST">
						@csrf
						<input type="hidden" name="no_table" value="{{$no_table}}">
						<input type="hidden" name="no_pesanan" value="{{$no_pesanan}}">
						<input type="hidden" name="nama_pemesan" value="{{$nama_pemesan}}">
						<input type="hidden" name="total" id="total" value="{{$total}}">
						<input type="hidden" name="order-list" id="order-list" value="{{$pesananRaw}}">
					<a type="button" class="btn btn-secondary" style = "color: white" data-dismiss="modal">Close</a>
					<input type="Submit" class="btn" style="background:rgb(214, 153, 19); color:rgb(255, 253, 248);"
						value="Gas Pesan">
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/popper.js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/scriptCustomer.js')}}"></script>
</body>
</html>