<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('img/icons/icon-48x48.png')}}"/>

    <title>Login</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div style="text-align: center;">
                        <img src="{{asset('/img/photos/logobartzgrande.png')}}" width="60%"/>
                    </div>
                    <div class="text-center">
                        <h1 class="h2">apenas usuarios logados</h1>
                        <p class="lead">
                            faça login para continuar
                        </p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form method="POST" action="#">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Usuário</label>
                                        <input class="form-control form-control-lg" type="text" name="username"
                                               id="username" placeholder="Digite seu usuário"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Senha</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                               id="password" placeholder="Digite sua senha"/>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-lg btn-warning">Entrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="{{asset('js/app.js')}}"></script>

</body>

</html>
