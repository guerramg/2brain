<!DOCTYPE html>
<html lang='pt' class=''>

<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
</head>

<body>
    <div class="login">
        <div class="img">
            <img src="{{ URL::asset('img/brain.png') }}" alt="" width="100" height="100">
        </div>
        <form method="post" action="{{ Route('login.user') }}">
            @csrf
            <input type="text" name="login" placeholder="Login" autocomplete="off"/>
            @error('login')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            <input type="password" name="password" placeholder="Senha"/>
            @error('password')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            <button type="submit" class="btn btn-primary btn-block btn-large">Logar-se</button>
        </form>

    
    </div>

</body>

</html>