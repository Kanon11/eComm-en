<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style src="{{URL::asset('kc_bootstrap/css/bootstrap.min.css')}}"></style>
    <style src="{{URL::asset('css/kc_style.css')}}"></style>
    <title>eComm-en</title>
</head>
<body>
    <div class="container">
    @yield('content')
    </div>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/kc_script.js')}}"></script>
    <script src="{{URL::asset('kc_bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>