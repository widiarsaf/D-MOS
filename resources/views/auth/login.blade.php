@extends('layouts.templateAuth')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<!-- Authentication card start -->
		<div class="login-card card-block auth-body mr-auto ml-auto">
			<form class="md-float-material" role="form" action="{{ route('login') }}" method="POST">
				@csrf
				<div class="text-center">
					<img src="{{asset('assets')}}/images/logo.jpeg" alt="logo.png" style="height: 100px">
				</div>
				<div class="auth-box">
					<div class="row m-b-20">
						<div class="col-md-12">
							<h3 class="text-left txt-primary">Login</h3>
						</div>
					</div>
					<hr />
					<div class="input-group">
						<input type="text" class="form-control" name="name" placeholder="Enter your name">
						<span class="md-line"></span>
					</div>
					<div class="input-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<span class="md-line"></span>
					</div>
					<div class="row text-right">
						<div class="col-sm-7 col-xs-12">
							<a href="auth-reset-password.html" class="text-right f-w-600 text-inverse"> Forgot Your
								Password?</a>
						</div>
					</div>
					<div class="row m-t-30">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign
								in</button>
						</div>
					</div>
					<hr />
				</div>
			</form>
			<!-- end of form -->
		</div>
		<!-- Authentication card end -->
	</div>
	<!-- end of col-sm-12 -->
</div>
@endsection
