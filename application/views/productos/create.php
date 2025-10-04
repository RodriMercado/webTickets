<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h1 class="text-dark my-5"><?php echo $title; ?></h1>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<form action="<?php echo base_url('productos/store'); ?>" method="POST" enctype="multipart/form-data"
      class="text-black bg-body-secondary rounded-3 border border-light p-4 custom-form-width">

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control bg-white text-dark border" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea class="form-control bg-white text-dark border" id="descripcion" name="descripcion" placeholder="Ingrese una descripción" required></textarea>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio:</label>
        <input type="number" step="0.01" class="form-control bg-white text-dark border" id="precio" name="precio" placeholder="Ingrese el precio" required>
    </div>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad:</label>
        <input type="number" class="form-control bg-white text-dark border" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad" required>
    </div>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Fecha:</label>
        <input type="date" class="form-control bg-white text-dark border" id="fecha" name="fecha" required>
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Añadir Imagen:</label>
        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required>
    </div>

    <div class="d-flex justify-content-center p-3">
        <button type="submit" class="btn btn-primary">Crear evento</button>
    </div>
</form>