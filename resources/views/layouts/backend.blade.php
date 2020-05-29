<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    header{color:red;font-size:25px};
    footer{color:blue;font-size:25px};
    </style>
</head>
<body>
    <header>Đầu trang @yield('heade')</header>
    <hr>
     @yield('noi_dung')
     @yield('list')
    <hr>
    <footer>Cuối trang</footer>
</body>
</html>