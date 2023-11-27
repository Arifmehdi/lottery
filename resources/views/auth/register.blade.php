{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en-US"
	prefix="og: https://ogp.me/ns#" >
<head>
	<meta charset="UTF-8">
		<title>Register | Golden Navratna Coupon</title>
<meta name="keywords" content="Purchase of lottery using this website is strictly prohibited in the states where lotteries are banned. You must be above 18 years to New India Lottery.">
    <meta name="description" content="Navratna Coupon, Golden Navratna Coupon, Raja Rani Coupon, Golden Navratna Coupon Nepal, Navratna Coupon, Raja Rani Result, Chetak Results, Golden Navratna Yantra, Navratna Yantra, Gold Navratan Lottery, Raja Rani Gold Coupon, Lotto Land, Navratna Coupon, Golden Navratna Coupon, Golden Navratna Coupon Nepal, Royal Yantra, Raja Rani Welcome, Play India Lottery, New India Lottery">
    <META NAME="Author" content="Navratna Coupon, https://www.navratnacoupon.com/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/login.css')}}"

</head>

<body style="background: #F46E8F;">

<br>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <?php
            if (isset($_GET['success']) or isset($_GET['error'])) {
                if (isset($_GET['success'])) {
                    $class = 'success';
                    $message = $_GET['success'];
                } else {
                    $class = 'error';
                    $message = $_GET['error'];
                }

            ?>
            <div class="<?php echo $class; ?> d-flex">
                <h4 class="message">
                    <?php echo $message; ?>
                </h4>
                <a href="Registration.php">
                    <i class="fa fa-close close"></i>
                </a>
            </div>
            <?php } ?>

            </center><input type="submit" value="LOGIN" style="float:right;" onclick="window.location.href='{{url('login')}}'">

        <br>
      <br>
      <br>
            <div class="panel-heading mb-4 mt-2">
                <h4 class="panel-title text-center">
                    Please Register
                </h4>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">

                        {{-- <input  type="text" class="form-control required autocomplete="name" autofocus> --}}




                       <input type="number"  id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  placeholder="Enter Your Phone No" >
                            @error('phone')
                            <span class="invalid-feedback text-dark" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Enter User ID" name="username" >
                        @error('username')
                        <span class="invalid-feedback text-dark" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password" name="password">
                        @error('password')
                        <span class="invalid-feedback text-dark" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" id="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror "  placeholder="Confirm Your Password" name="password_confirmation" >
                        @error('password-confirm')
                        <span class="invalid-feedback text-dark" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" class="form-control btn btn-success" value="REGISTER">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


</body>
</html>
