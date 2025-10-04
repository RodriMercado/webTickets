<div class="container mt-4">
    <h1 class="my-4 text-center">Nuestros Eventos</h1>
    <div class="row">
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-4 mb-4"> 
                <div class="card">
                    <a href="<?= site_url('productos/detalles/' . $producto->id) ?>"><img src="<?= base_url('assets/img/' . $producto->imagen) ?>" class="img-fluid" id="card-productos" alt="no-img"></a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $producto->nombre ?></h5>
                        <p class="card-text"><strong>Precio: $<?= number_format($producto->precio, 2) ?> </strong></p>
                        <a href="<?= site_url('productos/detalles/' . $producto->id) ?>" class="btn btn-primary"><i class="fa-solid fa-cart-shopping" style="color: white"></i> Comprar</a>


                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>