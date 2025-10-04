<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">

  <title>WebTickets | Lista de Ventas</title>
</head>
<body class="d-flex flex-column min-vh-100 m-0 p-0">
<?php 
    $this->load->view('componentes/navbar');
?>
  <main class="d-flex flex-column align-items-center bg-light flex-grow-1 text-white w-100">

  <div class="container mt-5">
    <h2 class="text-dark my-5">Lista de Ventas</h2>

    <!-- Mostrar el mensaje de éxito o error -->
    <?php if($this->session->flashdata('message')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>

    <table class="table table-light">
        <thead>
            <tr>
                <th>Nombre del Usuario</th>
                <th>Producto Reservado</th>
                <th>Tickets Reservados</th>
                <th>Fecha de Reserva</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($reservas)): ?>
                <?php foreach($reservas as $reserva): ?>
                    <tr>
                        <td><?php echo $reserva['usuario']; ?></td>
                        <td><?php echo $reserva['producto']; ?></td>
                        <td><?php echo $reserva['cantidad']; ?></td>
                        <td><?php echo $reserva['fecha_reserva']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                <td colspan="5" class="text-center fs-7">No hay productos.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
    
  </main>

<?php 
    $this->load->view('componentes/footer');
?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/b166b6605d.js" crossorigin="anonymous"></script>
</body>
</html>