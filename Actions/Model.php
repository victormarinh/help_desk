<?php

	class Model{
		// Table Users
		private $id_user;
		private $id_access;
		private $email;
		private $pass;

		// Table Content
		private $id_call;
		private $id_call_user;
		private $title;
		private $categories;
		private $description;		

		public function __set($attr, $value){
			$this->$attr = $value;
		}

		public function __get($attr){
			return $this->$attr;
		}

	}



?>