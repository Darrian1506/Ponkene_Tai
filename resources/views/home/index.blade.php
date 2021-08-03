@extends('layout.master')

@section('main')

<!doctype html>
    <html lang="en">
    <head>  

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 1000px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        </style>

        <!-- Custom styles for this template -->
        <link href="css/carousel.css" rel="stylesheet">
    </head>
    <body>
    

  <div id="myCarousel" class="carousel slide mt-3" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <img class="first-slide" src="images/frente.jpg" alt="First slide">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Ponkene Tai Restaurant.</h1>    
            <p>Rapa nui! Ven y descubre su sabor...</p>        
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <img class="second-slide" src="images/salon.jpg" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Nuestro Salón.</h1> 
            <p>Visitanos frente a Hana Vare-Vare o Poko- poko</p>           
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <img class="third-slide" src="images/playa.jpg" alt="Third slide">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Zona de playa</h1>    
            <p>Vista previligiada a la costa.</p>       
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <img class="quarter-slide" src="images/patio.jpg" alt="Quarter slide">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Terraza</h1>          
            <p>4 ambientes en 1 solo local!</p> 
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" src="images/foto1.jpg" alt="Generic placeholder image" width="140" height="140">

        <h2>Cócteles</h2>
        
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" src="images/foto2.jpg" alt="Generic placeholder image" width="140" height="140">

        <h2>Variedades de platos</h2>
        
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" src="images/foto3.jpg" alt="Generic placeholder image" width="140" height="140">
        <h2>Jugos naturales</h2>
        
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Ven y prueba nuestro  <span class="text-muted">Atún Encostrado</span></h2>
        <p class="lead">Exquisito medallón de atún encostrado con sésamo en salsa teriyaki, acompañado de una guarnición de arroz y camote frito, adornado con dos deliciosos camarones</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-responsive center-block" src="images/atunEncostrado.jpg" alt="Generic placeholder image" width="500" height="500">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">O mejor aún!, nuestra <span class="text-muted">Tabla Miro Vaikava</span></h2>
        <p class="lead">Sabrosas papas rústicas, mini ceviche de pulpo, camarones y calamares apanados. Acompañado de nuestra especial salsa de la casa.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-responsive center-block" src="images/TablaMiroVaikava.jpg" alt="Generic placeholder image" width="500" height="500">

      </div>
    </div>

    <hr class="featurette-divider">

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Vuelve arriba</a></p>
    <p>&copy; 2020–2021 Ponkene Tai Restaurant. </p>
  </footer>



    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>

@endsection 