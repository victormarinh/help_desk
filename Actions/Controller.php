<?php
	
	session_start();

	require './Connection.php';
	require './Model.php';
	require './Service.php';

	$action = isset($_GET['action']) ? $_GET['action'] : $action;
	// echo $action;


	if($action == 'login'){
		$model = new Model();
		$connection = new Connection();

		$model->__set('email', $_POST['email']);
		$model->__set('pass', $_POST['pass']);

		$service = new Service($connection, $model);
		$user = $service->login();

		$_SESSION['authenticate'] = $user["0"]["id_access"];
		$_SESSION['id_user'] = $user["0"]['id'];
		
		header('Location: ../pages/home.php');

	}else if($action == 'logoff'){

		session_destroy();

		header('Location: ../index.php');

	}else if($action == 'register'){
		$model = new Model();
		$connection = new Connection();

		$model->__set('email', $_POST['email']);
		$model->__set('pass', $_POST['pass']);

		$service = new Service($connection, $model);
		$service->register();

		header('Location: ../index.php?success=1');

	}else if($action == 'open_call'){
		$model = new Model();
		$connection = new Connection();

		$model->__set('title', $_POST['title']);
		$model->__set('categories', $_POST['categories']);
		$model->__set('description', $_POST['description']);
		$model->__set('id_user', $_SESSION['id_user']);

		$service = new Service($connection, $model);
		$result = $service->openCall();

		header('Location: ../pages/home.php?success=2');

	}else if($action == 'display_calls'){
		$model = new Model();
		$connection = new Connection();
		$service = new Service($connection, $model);

		$calls = $service->displayCalls();

		$_SESSION['calls'] = $calls;
		// echo '<pre>' . print_r($calls, 1) . '</pre>';

		header('Location: ../pages/consulting_call.php');

	}else if($action == 'delete'){
		$model = new Model();
		$connection = new Connection();

		$model->__set('id_call', $_GET['id']);

		$service = new Service($connection, $model);
		$calls = $service->delete();

		$_SESSION['calls'] = $calls;

		header('Location: ../pages/consulting_call.php');
		
	}







?>