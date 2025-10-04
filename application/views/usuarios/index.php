<h1 class="text-center text-black my-5">Lista de Usuarios</h1>
<div class="table-responsive px-5">
  <table class="table table-bordered table-light ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Rol</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        <?php if(!empty($usuarios)): ?>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <th scope="row"><?php echo $usuario->id; ?></th>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->email; ?></td>
                <td><?php echo $usuario->rol; ?></td>
                <td>
                <button type="button" class="btn btn-danger">
                    <a href="<?php echo base_url('usuarios/delete/') . $usuario->id; ?>" class="text-link" onclick="return confirm('¿Estás seguro de que deseas eliminar este Usuario?');">Eliminar</a>
                </button>
                </td>
            </tr>
        <?php endforeach; ?>    
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center fs-5">No hay usuarios.</td>
            </tr>
        <?php endif; ?>    
    </tbody>
  </table>
</div>