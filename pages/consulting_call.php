<?php
  
  session_start();

  if(!isset($_SESSION['authenticate'])){
    header('Location: ../index.php?erro=1');
  }
  
  $calls = $_SESSION['calls'];
  // echo '<pre>' . print_r($calls, 1) . "</pre>";

?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="./home.php">
        <img src="../Assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="../Actions/Controller.php?action=logoff" class="nav-link">
          EXIT
          </a>
        </li>
      </ul>
    </nav>


    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header text-center">
              Query of Called
            </div>
            
            <div class="card-body">

            <?php 
              // $authenticate = $_SESSION['authenticate'] == 1 ? $_SESSION['authenticate'] : 2;

              if($_SESSION['authenticate'] == 2){
                foreach($calls as $key => $call){
                    if($call['id_user'] == $_SESSION['id_user']){ ?>
              

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $call['title'] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $call['categories'] ?></h6>
                  <p class="card-text"><?= $call['description'] ?></p>
                </div>
              </div>

            <?php } } } else if($_SESSION['authenticate'] == 1){
                         foreach($calls as $key => $call){ ?>

              <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $call['title'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $call['categories'] ?></h6>
                    <p class="card-text"><?= $call['description'] ?></p>
                    <a href="../Actions/Controller.php?action=delete&id=<?= $call['id'] ?>"><button type="button" class="btn btn-danger mr-3">Delete</button></a>
                  </div>
                </div>

            <?php } } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="./home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>