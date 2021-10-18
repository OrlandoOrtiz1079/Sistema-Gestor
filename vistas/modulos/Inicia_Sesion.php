<!DOCTYPE html>
<html lang="es">

<head>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.4/dist/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.4/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.4/dist/js/uikit-icons.min.js"></script>

  <link rel="shortcut icon" href="../../imagenes/ITILogo.png" type="image/x-icon">
  <!-- <link rel="stylesheet" href="vistas/assets/css/switch-bootstrap4-toggle.min.css"> -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/swichtCSS.css">
  <!-- <link rel="stylesheet" href="vistas/assets/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="../assets/css/Font-Awesome.css">
  <link rel="stylesheet" href="../assets/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/css/metisMenu.css">
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/css/slicknav.min.css">
  <!-- Start datatable css -->
  <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/responsive.jqueryui.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.css">
  <!-- others css -->
  <link rel="stylesheet" href="../assets/css/typography.css">
  <link rel="stylesheet" href="../assets/css/default-css.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/responsive.css">
  <!-- modernizr css -->
  <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <!-- sweetalert2 -->
  <script src="../assets/js/sweetalert2.all.min.js"></script>
</head>


<body>

  <?php
  include "Cabezote.php";
  ?>
  <center>
    <div style="width: 90%; height: 500 px;">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 9"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 10"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10" aria-label="Slide 11"></button>

        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../assets/images/Carrucel/1.jpeg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../assets/images/Carrucel/2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../assets/images/Carrucel/3.png" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="../assets/images/Carrucel/4.png" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="../assets/images/Carrucel/5.jpg" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="../assets/images/Carrucel/6.png" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="../assets/images/Carrucel/7.png" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="../assets/images/Carrucel/8.png" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="../assets/images/Carrucel/9.png" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="../assets/images/Carrucel/10.jpeg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

  </center>
  <?php
  include "footer.php";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</body>

</html>