<?php
	include_once "./lib/db.php";
	class Encuesta{
		private $con;
		private $id;
		private $fecha_inicio;
		private $fecha_fin;
		private $descripcion;
		private $docente;
		private $espacio_curricular;
	
		
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
		
		public function get_fecha_inicio(){
			return $this->fecha_inicio;
		}
		
		public function set_fecha_inicio($fecha_inicio){
			$this->fecha_inicio = $fecha_inicio;
		}
		
		public function get_fecha_fin(){
			return $this->fecha_fin;
		}
		
		public function set_fecha_fin($fecha_fin){
			$this->fecha_fin = $fecha_fin;
		}
		
		public function get_descripcion(){
			return $this->descripcion;
		}
		
		public function set_descripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		
		public function get_docente(){
			return $this->docente;
		}
		
		public function set_docente($docente){
			$this->docente = $docente;
		}
		
		public function get_espacio_curricular(){
			return $this->espacio_curricular;
		}
		
		public function setespacio_curricular($espacio_curricular){
			$this->espacio_curricular = $espacio_curricular;
		}
		
		
		public function read($id){
			$sql = "SELECT * FROM encuestas WHERE id = ". $id;
			//echo $sql;
			$res = mysqli_query($this->con, $sql);
			
			if ($res != FALSE){
				$tupla = mysqli_fetch_assoc($res);
				$this->id = $tupla['id'];
				$this->fecha_inicio = $tupla['fecha_inicio'];
				$this->fecha_fin = $tupla['fecha_fin'];
				$this->descripcion = $tupla['descripcion'];
				$this->docente = $tupla['docente'];
				$this->espacio_curricular = $tupla['espacio_curricular'];				
				$res = TRUE;
			}

			return $res;
		}
		
		public function encuestas_docente($docente){
			$sql = "SELECT * FROM encuestas WHERE docente = ". $docente;
			//echo $sql;
			$res = mysqli_query($this->con, $sql);
			
			if($res){
				while($row = mysqli_fetch_array($res)){
					$rows[] = $row;
				}
			}else
				$rows=FALSE;

			return $rows;
		}
		
		public function encuestas_espacio_curricular($espacio_curricular){
			$sql = "SELECT * FROM encuestas WHERE espacio_curricualr = ". $espacio_curricular;
			//echo $sql;
			$res = mysqli_query($this->con, $sql);
			
			if($res){
				while($row = mysqli_fetch_array($res)){
					$rows[] = $row;
				}
			}else
				$rows=FALSE;

			return $rows;
		}
		
	}
?>