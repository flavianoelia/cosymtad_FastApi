<?php
	include_once "./lib/db.php";
	class Docente{
		private $con;
		private $id;
		private $nombre;
		private $apellido;
		private $dni;
		private $email;
	
		function __construct(){
			$this->connect_db();
		}
		
		public function connect_db(){
			$c = new DB();
			$this->con = $c->connection();
		}	
		
		public function getId(){
			return $this->id;
		}
		
		public function get_nombre(){
			return $this->nombre;
		}
		
		public function set_nombre($nombre){
			$this->nombre = $nombre;
		}
		
		public function get_apellido(){
			return $this->apellido;
		}
		
		public function set_apellido($apellido){
			$this->apellido = $apellido;
		}
		
		public function get_dni(){
			return $this->dni;
		}
		
		public function set_dni($dni){
			$this->dni = $dni;
		}
		
		public function get_email(){
			return $this->email;
		}
		
		public function set_email($email){
			$this->email = $email;
		}
		
		public function read($id){
			$sql = "SELECT * FROM docente WHERE id = ". $id;
			//echo $sql;
			$res = mysqli_query($this->con, $sql);
			
			if ($res != FALSE){
				$tupla = mysqli_fetch_assoc($res);
				$this->id = $tupla['id'];
				$this->nombre = $tupla['nombre'];
				$this->apellido = $tupla['apellido'];
				$this->dni = $tupla['dni'];
				$this->email = $tupla['email'];	
				$res = TRUE;
			}

			return $res;
		}
		
	}
?>