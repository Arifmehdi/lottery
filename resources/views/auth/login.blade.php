{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



<?php
$chars = 'NAVRATNACOUPON0123456789';
$length = 5;
$random_text = '';
for ($i = 0; $i < $length; $i++) {
	$random_text .= $chars[rand(0, strlen($chars) - 1)];
}
?>

<!DOCTYPE html>
<html lang="en-US"
	prefix="og: https://ogp.me/ns#" >
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N9VH7L909J"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-N9VH7L909J');

</script>
	<meta charset="UTF-8">

		<title>Golden Navratna Coupon | Navratan Yantra</title>
	<meta name="description" content="Golden navaratna Coupon, Lucky is online best lottery game which gives a chance to win millions. It is based on navaratna Coupon lottery system.">
    <meta name="keywords" content="Golden navaratna Coupon Lucky is online best lottery game which gives a chance to win millions. It is based on navaratna Coupon lottery system. Navratna Coupon, Golden Navratna Coupon, Raja Rani Coupon, Golden Navratna Coupon Nepal, Navratna Coupon, Raja Rani Result, Chetak Results, Golden Navratna Yantra, Navratna Yantra, Gold Navratan Lottery, Raja Rani Gold Coupon, Lotto Land, Navratna Coupo, Golden Navratna Coupon, Golden Navratna Coupon Nepal, Royal Yantra, Raja Rani Welcome, Play India Lottery, New India Lottery">
    <META NAME="Author" content="Golden Navratna Coupon, https://navratnacoupon.com/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/login.css')}}">
</head>
<body style="background: #F46E8F;">



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
                <a href="index.php">
                    <i class="fa fa-close close"></i>
                </a>
            </div>
            <?php } ?>
        <br>

            {{-- </center><input type="submit" value="REGISTER" style="float:right;" onclick="window.location.href='https://navratnacoupon.com/Registration.php'"> --}}
            </center><input type="submit" value="REGISTER" style="float:right;" onclick="window.location.href='{{ url('register') }}'">

        <br>
            <marquee scrolldelay="100"><font color="#F46E8F"><span style="text-shadow: 0px 0px 0px; font-size 31px">GoldeNavratnaCoupon.com & NavratnaCoupon.com Results Chart Update</b></span></font></marquee>
 </tr>
   <br>
            </td>
            <div class="panel-heading mb-4 mt-2">
                <h4 class="panel-title text-center">
                    Please Login
                </h4>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        {{-- <input type="text" class="form-control" placeholder="User ID" name="username" required> --}}
                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="User ID" name="username" required>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        {{-- <input type="password" class="form-control"  name="password" required> --}}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group d-flex captcha-bg">
                        <input type="text" class="form-control captcha" name="captcha" style="width:100px;height:45px" value="<?php echo $random_text; ?>" readonly>
                        <a href="#" onclick="location.reload();" style="padding: 0rem 1rem;line-height:2rem;margin-top:4px;height:38px;margin-left:5px" class="btn btn-sm btn-success captcha-btn">Change</a>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter The Above Captcha" name="recaptcha" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="form-control btn btn-success" value="LOGIN">
                        <a href="{{route('result')}}" class="form-control btn btn-warning mt-3" <button class="w3-button w3-black">RESULTS CHART</b></a>
                    </div>
                </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


</body>
</html>
