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
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="./home.php">
        <img src="../Assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
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

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header text-center">
             Call Opening
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form method="POST" action="../Actions/Controller.php?action=open_call">
                    <div class="form-group">
                      <label>Title</label>
                      <input name="title" type="text" class="form-control" placeholder="Title">
                    </div>
                    
                    <div class="form-group">
                      <label>Categories</label>
                      <select class="form-control" name="categories">
                        <option>Choose</option>
                        <option>Printer</option>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Network</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a href="./home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>