<div class="container mt-5">
    <div class="row">
        <h2 class="text-dark my-5"><?php echo $data['title']; ?></h2>

        <!-- Mostrar el mensaje de éxito o error -->
        <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>


        <div class="col-md-6">
            <form action="<?php echo site_url('reservas/reservar/' . $data['producto']->id); ?>" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad de Entradas:</label>
                    <input type="number" class="form-control" id="cantidad" value="1" name="cantidad" min="1" required>
                </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['producto']->nombre; ?></h5> <!-- Nombre del producto -->
                    <h6 class="card-subtitle mb-2 text-muted">Precio: $<span id="precio"><?php echo $data['producto']->precio; ?></span></h6> <!-- Precio del producto -->

                    <input type="hidden" name="producto_id" value="<?php echo $data['producto']->id; ?>"> <!-- Ocultar ID del producto -->
                    <button type="submit" class="btn btn-primary">Realizar Pedido</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
