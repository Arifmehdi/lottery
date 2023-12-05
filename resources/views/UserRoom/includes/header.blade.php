{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
</head>
<body>

<div class="container"> --}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/user_style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
        function showNotification(type, message) {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 2000,
        };

        toastr[type](message);
    }
    function showSuccessNotification() {
        showNotification('success', 'Operation completed successfully.');
    }

    function showErrorNotification() {
        showNotification('error', 'An error occurred while processing your request.');
    }
</script>
</head>
<body>

<div class="container">
    @include('UserRoom.includes.navbar')
