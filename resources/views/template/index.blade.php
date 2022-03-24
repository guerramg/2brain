@if(Auth::check())

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
        <link rel="icon" type="image/x-icon" href="{{ URL::asset('img/favicon.png') }}">

    <title>:: 2 Brain - A ajuda que eu precisava! ::</i></title>

</head>

<body class="container">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="navbar-brand" href="#">
                        <i class="fas fa-brain fa-3x d-inline-block align-text-top" style="color: orangered" title="2 Brain - A ajuda que eu precisava!"></i>
                      </a>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard.index') }}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Usuários</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('birthdays.index') }}">Aniversários</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('passwords.index') }}">Senhas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('debitos.index') }}">Débitos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('stickies.index') }}">Lembretes</a>
                      </li>

                    </ul>
                  </div>
                </div>

                <a href="{{ route('logout.user') }}" class="fa">
                    <i class="fas fa-sign-out-alt fa-2x nav-fa" title="Sair"></i>
                </a>
                    
              </nav>
        </header>

        <section class="content">

            <!-- Conteúdo yield do laravel -->

            @yield('content')

        </section>

            <footer class="text-center text-white">
                <!-- Grid container -->
                <div class="container pt-4">
                  <!-- Section: Social media -->
                  <section class="mb-4">              
                    <!-- Instagram -->
                    <a
                      class="btn btn-link btn-floating btn-lg text-dark m-1"
                      href="#!"
                      role="button"
                      data-mdb-ripple-color="dark"
                      ><i class="fab fa-instagram"></i
                    ></a>
              
                    <!-- Linkedin -->
                    <a
                      class="btn btn-link btn-floating btn-lg text-dark m-1"
                      href="#!"
                      role="button"
                      data-mdb-ripple-color="dark"
                      ><i class="fab fa-linkedin"></i
                    ></a>
                    <!-- Github -->
                    <a
                      class="btn btn-link btn-floating btn-lg text-dark m-1"
                      href="#!"
                      role="button"
                      data-mdb-ripple-color="dark"
                      ><i class="fab fa-github"></i
                    ></a>
                  </section>
                  <!-- Section: Social media -->
                </div>
                <!-- Grid container -->
              
                <!-- Copyright -->
                <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                  © {{ date('Y') }} Copyright: 2 Brain - A ajuda que eu precisava!
                </div>
                <!-- Copyright -->
              </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</html>

@endif


