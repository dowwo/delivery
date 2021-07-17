<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



    <style>
        body {
            background-color: #AB3E5B;
            color: #aaaaaa;
            padding-top: 5%;
        }
        #formulario {
            background-color:rgba(0, 0, 0, 0.5);
            color: #aaaaaa;
            border-radius: 2%;
        }
        .navbar {
            margin-bottom: 0;
            background-color: #AB3E5B;
            z-index: 9999;
            border: 0;
            font-size: 12px !important;
            line-height: 1.42857143 !important;
            letter-spacing: 4px;
            border-radius: 0;
            font-family: Montserrat, sans-serif;
        }
        .navbar li a, .navbar .navbar-brand {
            color: #fff !important;
        }
        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: #AB3E5B !important;
            background-color: #fff !important;
        }
        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }

    </style>

    <title>Login</title>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="delivery-chile.cl">DELIVERY CHILE</a></li>
            </ul>
        </div>
    </div>
</nav>
<div>

</div>



<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-5" id="formulario">
            <h1>Iniciar sesión</h1>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>
            <form action="login/auth" method="post">
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" value="<?= set_value('email') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="InputPassword">
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                <div></div>
                <br>
            </form>
        </div>

    </div>
</div>

<!-- Popper.js first, then Bootstrap JS -->

</body>
</html>