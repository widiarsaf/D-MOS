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
	<title>Document</title>
</head>

<body>
	<nav class="navbar navbar-inverse bg-inverse fixed-top bg-faded" style = "display: flex; justify-content:flex-end">
		<div class="row">
			<div class="col">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span
							class="total-count"></span>)</button><button class="clear-cart btn btn-danger">Clear Cart</button>
				
			</div>
		</div>
	</nav>
</div>
<div class="d-flex align-items-center flex-column mb-4">
<div class="d-flex align-items-end flex-column mb-3">
            <form action="{{ route('order.index') }}" class="form-inline align-items-end" method="GET">
                <p>Sort by:</p>
                <select class="custom-select ml-3" name="sortBy">                
                    <option value="1" >Makanan</option>
                    <option value="2" >Minuman</option>
                </select>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </form>
        </div>      
        </div>   
	<!-- Main -->
	<div class="container">
		<div class= "row">
		
			@foreach ($masakan as $item)
			<div class="card" style="width: 18rem;">
				<img class="card-img-top" src="{{asset('storage/'.$item->gambar)}}" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">{{$item->nama_masakan}}</h5>
					<p class="card-text">{{$item->harga}} | {{$item->status}}</p> 
					<a href="#" data-name="{{$item->nama_masakan}}" data-id="{{$item->id}}" data-price="{{$item->harga}}" class="add-to-cart btn btn-primary">Add to cart</a>

				</div>
			</div>
			@endforeach
			
		</div>

		
		<!-- Modal -->
		<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Cart</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table class="show-cart table">

						</table>
						<div>Total price: Rp <span class="total-cart"></span></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<form action="{{route('orderList')}}" method="POST">
							@csrf
							<input type="hidden" name="no_table" value = "{{$no_table}}">
							<input type="hidden" name="no_pesanan" value= "{{$no_pesanan}}">
							<input type="hidden" name="nama_pemesan" value= "{{$nama_pemesan}}">
							<input type="hidden" name="total" id = "total">
							<input type="hidden" name="order-list" id = "order-list">
							<button type="submit" class="btn btn-primary">Order now</button>
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