<?php
	include_once "./lib/db.php";
	class Espacio_curricular{
		private $con;
		private $id;
		private $nombre;
		private $plan_estudio;
		private $anio;
		private $carrera;

	
		
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
		
		public function get_plan_estudio(){
			return $this->plan_estudio;
		}
		
		public function set_plan_estudio($plan_estudio){
			$this->plan_estudio = $plan_estudio;
		}
		
		public function get_anio(){
			return $this->anio;
		}
		
		public function set_anio($anio){
			$this->anio = $anio;
		}
		
		public function get_carrera(){
			return $this->carrera;
		}
		
		public function set_carrera($carrera){
			$this->carrera = $carrera;
		}
		
		
		public function read($id){
			$sql = "SELECT * FROM espacio_curricular WHERE id = ". $id;
			//echo $sql;
			$res = mysqli_query($this->con, $sql);
			
			if ($res != FALSE){
				$tupla = mysqli_fetch_assoc($res);
				$this->id = $tupla['id'];
				$this->nombre = $tupla['nombre'];
				$this->plan_estudio = $tupla['plan_estudio'];
				$this->anio = $tupla['anio'];
				$this->carrera = $tupla['carrera'];
				$res = TRUE;
			}

			return $res;
		}
		
	}
?>