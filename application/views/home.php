<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/styles.css">

  <title>WebTickets</title>
</head>
<body class="d-flex flex-column min-vh-100 m-0 p-0 ">
<?php 
    $this->load->view('componentes/navbar');
?>
  <main class="bg-light flex-grow-1 text-white w-100">

  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url('assets/img/home.jpg')?>" class="d-block w-100" id="carrousel-style" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <div class="carrousel-txt">
              <h3 id="title-slider">WEB<span class="azul">TICKETS</span></h3>
              <p id="txt-slider">Tu destino para vivir la música en su máxima expresión. Encuentra entradas para los eventos más emocionantes y prepárate para disfrutar de momentos inolvidables en cada show. ¡La mejor experiencia musical te espera!</p>
        
            </div>
        </div>

      </div>
  </div>

    <div class="container">
      <div id="eventos-destacados">
      <br><br>
      <hr>

      <h2>Eventos Destacados</h2>

        <div class="row">
            <?php foreach ($productos as $producto): ?>
                <div class="col-4">
                    <div class="card">
                    <a href="<?= site_url('productos/detalles/' . $producto->id) ?>"><img src="<?= base_url('assets/img/' . $producto->imagen) ?>" class="card-img-top" id="card-productos" alt="no-img"></a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $producto->nombre ?></h5>
                            <p class="card-text"><strong>Precio: $<?= number_format($producto->precio, 2) ?> </strong></p>
                            <a href="<?= site_url('productos/detalles/' . $producto->id) ?>" class="btn btn-primary">
                                <i class="fa-solid fa-cart-shopping" style="color: white"></i> Comprar
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
      </div>



        <div class="row mt-3">
          <div class="col text-center">
            <a class="btn btn-primary" href="productos" role="button">Ver más eventos</a>
          </div>
        </div>

        <div class="sobre-nosotros" id="sobre-nosotros">
          <hr>
          <br>
          <h2>Sobre Nosotros</h2>
          <br>
            <p>
            Bienvenidos a WebTickets, tu mejor opción para comprar entradas a los eventos musicales más destacados. Nuestra misión es acercarte a experiencias inolvidables, desde grandes conciertos y festivales hasta actuaciones exclusivas.</p>
            <p>En WebTickets creemos que cada show es una oportunidad de vivir momentos únicos. Por eso, te ofrecemos una amplia selección de tickets a precios competitivos, asegurando que encuentres lo que buscas de forma rápida y cómoda.</p>
            <p>Nuestro equipo, formado por apasionados de la música y expertos en atención al cliente, está comprometido en brindarte un servicio excepcional. Nos dedicamos a hacer que tu compra sea sencilla y agradable, desde elegir tus entradas hasta el acceso al evento.</p>
            <p>Agradecemos tu confianza y esperamos ayudarte a disfrutar de cada espectáculo al máximo. Si tienes preguntas o necesitas asistencia, contáctanos. ¡Prepárate para vivir la música en grande con WebTickets!</p>
        </div>

        <div class="sobre-nosotros" id="sobre-nosotros">
          <hr>
          <br>
          
          <br>

        </div>
  </main>

<?php 
    $this->load->view('componentes/footer');
?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/b166b6605d.js" crossorigin="anonymous"></script>
</body>
</html>