<nav class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
      <img src="<?php echo base_url('assets/img/logo/logo3.png'); ?>" alt="WebTickets" style="height: 30px;">
    </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>"><i class="fa-solid fa-house"style="color: white;"></i> Inicio</a>
        <a class="nav-link" href="<?php echo base_url(); ?>#sobre-nosotros"><i class="fas fa-info-circle"style="color: white;"></i> Sobre Nosotros</a>
        <a class="nav-link" href="<?php echo base_url(); ?>#eventos-destacados"><i class="fas fa-calendar"style="color: white;"></i> Eventos Destacados</a>
        <a class="nav-link" aria-current="page" href="<?php echo base_url('productos'); ?>"><i class="fa-solid fa-ticket"style="color: white;"></i> Eventos</a>
      </div>

    
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
      
      <!-- Administrador Dropdown -->
      <li class="nav-item dropdown">
            <?php if($this->session->userdata('UserLoginSession') && $this->session->userdata('UserLoginSession')['rol'] == 'admin'): ?>
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Administrador
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo base_url('ventas/lista'); ?>"><i class="fa-solid fa-list" style="color: white;"></i> Lista de ventas</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('productos/lista'); ?>"><i class="fa-solid fa-list" style="color: white;"></i> Lista de productos</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('productos/create'); ?>"><i class="fa-solid fa-plus" style="color: white;"></i> Crear producto</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('usuarios'); ?>"><i class="fa-solid fa-user" style="color: white;"></i> Usuarios</a></li>
                </ul>
            <?php endif; ?>
        </li>
    </ul>


    <!-- Botones de Login, Registro, Logout -->
    <div class="navbar-nav">
        <?php if ($this->session->userdata('UserLoginSession')): ?>
            <form action="<?php echo base_url('usuarios/logout'); ?>" method="post" class="d-inline">
                <button type="submit" class="btn btn-danger ms-1">
                    <i class="fa-solid fa-sign-out-alt" style="color:white"></i> Logout
                </button>
            </form>
        <?php else: ?>
            <a href="<?php echo base_url('usuarios/login'); ?>" class="btn btn-primary text-white ms-1">
                <i class="fa-solid fa-sign-in-alt" style="color:white"></i> Login
            </a>
            <a href="<?php echo base_url('usuarios/registro'); ?>" class="btn btn-light text-black ms-1">
                <i class="fa-solid fa-user-plus" style="color:black"></i> Registro
            </a>
        <?php endif; ?>
    </div>

      </div>
    </div>
</nav>