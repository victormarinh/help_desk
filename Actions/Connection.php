<?php

	/**
	 * 	Connection on Database: Mysql(phpmyadmin)
	 */
	class Connection
	{
		private $host = "127.0.0.1";
		private $database = 'help_desk';
		private $user = 'root';
		private $pass = '';

		public function connect(){
			try{
				$connection = new PDO("mysql:host=$this->host;dbname=$this->database", "$this->user", "$this->pass");
				return $connection;
			}catch(PDOException $e){
				echo "Error " . $e->getMessage();
			}
		}
	}


?>