<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h1 class="text-dark my-5"><?php echo $title; ?></h1>


<form action="<?php echo base_url('productos/update/') . $producto->id; ?>" method="POST" enctype="multipart/form-data"
  class="text-black bg-body-secondary rounded-3 border border-light p-4 custom-form-width">

  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control bg-white text-dark border" id="nombre" name="nombre" 
           value="<?php echo $producto->nombre; ?>" placeholder="Ingrese el nombre">
  </div>

  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción:</label>
    <textarea class="form-control bg-white text-dark border" id="descripcion" name="descripcion" 
    placeholder="Ingrese una descripción" required><?php echo $producto->descripcion; ?></textarea>
  </div>


  <div class="mb-3">
    <label for="precio" class="form-label">Precio:</label>
    <input type="text" class="form-control bg-white text-dark border" id="precio" name="precio" 
           value="<?php echo $producto->precio; ?>" placeholder="Ingrese el precio">
  </div> 

  <div class="mb-3">
    <label for="cantidad" class="form-label">Cantidad:</label>
    <input type="text" class="form-control bg-white text-dark border" id="cantidad" name="cantidad" 
           value="<?php echo $producto->cantidad; ?>" placeholder="Ingresar la cantidad">
  </div>

  <div class="mb-3">
    <label for="fecha" class="form-label">Fecha:</label>
    <input type="date" class="form-control bg-white text-dark border" id="fecha" name="fecha" 
           value="<?php echo $producto->fecha; ?>">
  </div>

  <label for="imagen_actual" class="form-label">Imagen Actual:</label>
  <div class="mb-3">
    <?php if ($producto->imagen): ?>
      <img src="<?php echo base_url('assets/img/' . $producto->imagen); ?>" alt="Imagen del Producto" 
           class="img-thumbnail" style="max-width: 150px;">
    <?php else: ?>
      <p>No hay imagen disponible</p>
    <?php endif; ?>
  </div>

  <div class="d-flex justify-content-center p-3">
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>

</form>
