<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('/auth/style.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <img class="mb-3" src="{{ asset('/auth/Admin.png')}}" alt="">
        <h1 class="mb-3">Admin Login</h1>
        <form method="post" action="{{ route('admin.login')}}">
            @csrf
            <input type="text" name="email" placeholder="Email" required="required"/>
            <input type="password" name="password" placeholder="Password" required="required"/>
            <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
        </form>
    </div>
</body>
</html>