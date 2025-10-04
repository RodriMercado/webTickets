<div class="container overflow-hidden">
    <div class="row gx-3">

        <!-- Tarjeta Izquierda: Solo imagen -->
        <div class="col-md-5">
            <div class="p-1">
                <div class="card mb-2">
                    <div class="card-body text-center p-2">
                        <img src="<?= base_url('assets/img/' . $producto->imagen) ?>" class="card-img-top" alt="no-img">
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta Derecha: Detalles del Producto -->
        <div class="col-md-7">
            <div class="p-1">
                <div class="card">
                    <div class="card-body">
                        <h1><?php echo $producto->nombre; ?></h1>
                        <br>
                        <p><?php echo $producto->descripcion; ?></p>
                        
                        <div class="producto-info">
            <hr>
                            <p><strong>Precio:</strong> $<?php echo number_format($producto->precio, 2); ?></p>
                            <p><strong>Fecha de inicio:</strong> <?php echo $producto->fecha; ?></p>
                            <p><strong>Tickets disponibles:</strong> <?php echo $producto->cantidad; ?></p>
                        </div>
                        <a href="<?php echo site_url('productos/comprar/' . $producto->id); ?>" class="btn btn-primary"> <i class="fa-solid fa-cart-shopping" style="color:white"></i> Comprar Tickets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Tarjetas inferiores: Ubicacion -->
    <hr>
    <h2>Cómo llegar</h2>
    <div class="container overflow-hidden">
        <div class="row gx-3">
            <div class="col">
            <div class="card">
                <div class="card-body">
                <div class="p-2">
                    <h4> <i class="fa-solid fa-location-dot"></i> Ubicacion</h4>
                    <br>
                    <p>Dirección: Humboldt 450, Buenos Aires</p>

                </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="card">
                <div class="card-body">
                <div class="p-2"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.393154452379!2d-58.44990186996199!3d-34.59421861608511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5eb6fb40a93%3A0x1fcab11b62b55896!2sMovistar%20Arena!5e0!3m2!1ses!2sar!4v1729881923480!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                </div>
            </div>
            </div>
        </div>
        <br>
    </div>

</div>
</div>
