<?php
  
  session_start();

  if(!isset($_SESSION['authenticate'])){
    header('Location: ../index.php?erro=1');
  }

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
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

    <?php  if(isset($_GET['success']) && $_GET['success'] == 2){  ?>

      <div class='bg-success pt-2 text-white d-flex justify-content-center'>
          <h5>Call successfully placed!</h5>
        </div>

    <?php } ?>

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header text-center">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <a href="./open_call.php">
                    <img src="../Assets/img/logo_open_call.png" width="70" height="70">
                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                   <a href="../Actions/Controller.php?action=display_calls">
                  <img src="../Assets/img/logo_consulting_call.png" width="70" height="70">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>