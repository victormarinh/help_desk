<?php

  session_start();

  if(isset($_SESSION['authenticate'])){
    header('Location: ./Pages/home.php');
  }

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="./Assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
        Help Desk
      </a>
    </nav>

    <?php  if(isset($_GET['success']) && $_GET['success'] == 1){  ?>

      <div class='bg-success pt-2 text-white d-flex justify-content-center'>
          <h5>Registered with Success!</h5>
        </div>
    <?php }else if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>

      <div class='bg-danger pt-2 text-white d-flex justify-content-center'>
          <h5>Sign in to your account!</h5>
      </div>

    <?php } ?>
    <?php if(isset($_GET['create']) && $_GET['create'] == 'user'){ ?>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header text-center">
              Create a New User
            </div>
            <div class="card-body">

              <form action="./Actions/Controller.php?action=register" method="post">

                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="pass" type="password" class="form-control" placeholder="Password">
                </div>

                <button class="btn btn-lg btn-info btn-block" type="submit">Sign Up</button>

                <a href="index.php" class="btn btn-mg stretched-link btn-block">Already a user? Log In here!</a>
                
              </form>

            </div>
          </div>
        </div>
    </div>

  <?php }else{ ?>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header text-center">
              Login
            </div>
            <div class="card-body">

              <form action="./Actions/Controller.php?action=login" method="post">

                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="pass" type="password" class="form-control" placeholder="Password">
                </div>

                <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
                
                <a href="index.php?create=user" class="btn btn-mg stretched-link btn-block">A new user? Sign up here!</a>
              </form>

            </div>
          </div>
        </div>
    </div>

  <?php } ?>
  </body>
</html>