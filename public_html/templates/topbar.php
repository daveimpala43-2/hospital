<?php
session_start();
if(isset($_SESSION['user'])){
  $logeado = true;
}
else{
  $logeado = false;
}
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8ac6d1;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hospital los Angeles</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
      if($logeado){
      ?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"> 
          <a class="nav-link active" href="#">Consulta</a>
        </li>

        <li class="nav-item"> 
          <a class="nav-link active" href="/view/crud_farma.php">Farmacos</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Paciente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../view/registroPa.php">Registro</a></li>
            <li><a class="dropdown-item" href="../view/IngresoPa.php">Ingreso</a></li>
            <li><a class="dropdown-item" href="../view/AltaPa.php">Dar de Alta</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-flex">
          <button class="btn btn-outline-danger" type="button" id="salir">Salir</button>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
</nav>

<script>
$('#salir').click(function(){
  $.ajax({
    type: "post",
    url: "../php/logout.php",
    success: function (response) {
      window.location.href = '/'
    }
  });
});
</script>