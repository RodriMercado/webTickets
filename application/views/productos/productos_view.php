<h1 class="text-center text-black my-5">Lista de Eventos</h1>
<div class="table-responsive px-5">
  <table class="table table-light">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Fecha</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        <?php if(!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <th scope="row"><?php echo $producto->id; ?></th>
                <td><?php echo $producto->nombre; ?></td>
                <td><?php echo '$' . $producto->precio; ?></td>
                <td><?php echo $producto->cantidad; ?></td>
                <td><?php echo $producto->fecha; ?></td>
                <td> 
                <button type="button" class="btn btn-primary">
                    <a href="<?php echo base_url('productos/show/') . $producto->id; ?>"class="text-link">Ver Detalles</a>
                </button>
                <button type="button" class="btn btn-success">
                    <a href="<?php echo base_url('productos/edit/') . $producto->id; ?>" class="text-link">Editar</a>
                </button>
                <button type="button" class="btn btn-danger">
                    <a href="<?php echo base_url('productos/delete/') . $producto->id; ?>" class="text-link" onclick="return confirm('¿Estás seguro de que deseas eliminar este evento?');">Eliminar</a>
                </button>
              </td>
            </tr>
        <?php endforeach; ?>    
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center fs-7">No hay Eventos.</td>
            </tr>
        <?php endif; ?>    
    </tbody>
  </table>
</div>
