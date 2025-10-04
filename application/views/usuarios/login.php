<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
  <title>WebTickets | Login</title>
</head>
<body class="d-flex flex-column min-vh-100 m-0 p-0">
<?php $this->load->view('componentes/navbar'); ?>
  <main class="d-flex flex-column align-items-center bg-light flex-grow-1 text-white w-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                <div class="card-header text-center">
                    Iniciar sesión
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('usuarios/iniciarSesion') ?>"> <!-- Cambié la acción a 'iniciarSesion' -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" placeholder="Ingresar email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input type="password" placeholder="Ingresar contraseña" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Loguearse</button>
                        </div>

                        <?php 
                        if ($this->session->flashdata('success')) { ?>
                            <p class="text-success text-center"><?= $this->session->flashdata('success') ?></p>
                        <?php } 
                        if ($this->session->flashdata('error')) { ?> <!-- Añadido mensaje de error -->
                            <p class="text-danger text-center"><?= $this->session->flashdata('error') ?></p>
                        <?php } ?>
                    </form>
                    <br>
                    <div class="text-center"><a href="<?= site_url('usuarios/registro/') ?>">Eres nuevo? Registrate</a></div>
                </div>
                </div>
                
            </div>
            <div class="col-md-4"></div>
        </div>
  </main>

<?php $this->load->view('componentes/footer'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/b166b6605d.js" crossorigin="anonymous"></script>
</body>
</html>
