<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <style>
        body {
            background-color: #AB3E5B;
            <!--background-color: rgba(0, 50, 100, 0.5);-->

            padding-top: 5%;
        }
        #formulario {
            background-color:rgba(0, 0, 0, 1);
            opacity: 0.5;
            border-radius: 2%;
        }

    </style>

    <title>Login</title>
</head>
<body>
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