<h1 class="text-center text-black my-5"><?php echo $title; ?></h1>
<div class="table-responsive px-5">
  <table class="table table-bordered table-light">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Imagen</th>
        <th scope="col">Nombre</th>
        <th scope="col" class="col-descripcion">Descripcion</th>
        <th scope="col">Fecha</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $producto->id; ?></td>
            <td><img src="<?= base_url('assets/img/' . $producto->imagen) ?>" class="card-img-top" id="img-show" alt="no-img"></td>
            <td><?php echo $producto->nombre; ?></td>
            <td><?php echo $producto->descripcion; ?></td>
            <td><?php echo $producto->fecha; ?></td>
            <td><?php echo '$'. $producto->precio; ?></td>
            <td><?php echo $producto->cantidad; ?></td>
            <td>
                <button type="button" class="btn btn-success">
                  <a href="<?php echo base_url('productos/edit/') . $producto->id; ?>" class="text-link">Editar</a>
                </button>
                <button type="button" class="btn btn-danger">
                  <a href="<?php echo base_url('productos/delete/') . $producto->id; ?>" class="text-link" onclick="return confirm('¿Estás seguro de que deseas eliminar este evento?');">Eliminar</a>
                </button>
            </td>
        </tr>
    </tbody>
  </table>
</div>
