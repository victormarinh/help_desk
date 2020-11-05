<?php

	class Service{
		private $connection;
		private $model;

		public function __construct(Connection $connection, Model $model){
			$this->connection = $connection->connect();
			$this->model = $model;
		}

		public function login(){
			$query = "select id, id_access, email, pass from users where email = ? and pass = ?";
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(1, $this->model->__get('email'));
			$stmt->bindValue(2, $this->model->__get('pass'));
			$stmt->execute();
			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $user;
		}

		public function register(){
			$query = "insert into users(id_access, email, pass) values(?, ?, ?)";
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(1, "2");
			$stmt->bindValue(2, $this->model->__get('email'));
			$stmt->bindValue(3, $this->model->__get('pass'));
			return $stmt->execute();
		}

		public function openCall(){
			$query = "insert into calls(title, categories, description, id_user) values(?, ?, ?, ?)";
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(1, $this->model->__get('title'));
			$stmt->bindValue(2, $this->model->__get('categories'));
			$stmt->bindValue(3, $this->model->__get('description'));
			$stmt->bindValue(4, $this->model->__get('id_user'));
			return $stmt->execute();
		}

		public function displayCalls(){
			$query = 'select * from calls';
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			$calls = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $calls;
		}

		public function delete(){
			$query = 'delete from calls where id = ?';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(1, $this->model->__get('id_call'));
			$stmt->execute();

			$query = 'select * from calls';
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			$calls = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $calls;

		}


	}


?>