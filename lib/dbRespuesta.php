<?php
	include_once "./lib/db.php";
	class Respuesta{
		private $con;
		private $id;
		private $respuesta;
		private $fecha;
		private $pregunta;
		private $encuesta;

	
		
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
		
		public function get_respuesta(){
			return $this->respuesta;
		}
		
		public function set_respuesta($respuesta){
			$this->respuesta = $respuesta;
		}
		
		public function get_fecha(){
			return $this->fecha;
		}
		
		public function set_fecha($fecha){
			$this->fecha = $fecha;
		}
		
		public function get_pregunta(){
			return $this->pregunta;
		}
		
		public function set_pregunta($pregunta){
			$this->pregunta = $pregunta;
		}
		
		public function get_encuesta(){
			return $this->encuesta;
		}
		
		public function set_encuesta($encuesta){
			$this->encuesta = $encuesta;
		}
		
		public function get_encuestado(){
			return $this->encuestado;
		}
		
		public function set_encuestado($encuestado){
			$this->encuestado = $encuestado;
		}
		
		
		public function read($id){
			$sql = "SELECT * FROM respuestas WHERE id = ". $id;
			//echo $sql;
			$res = mysqli_query($this->con, $sql);
			
			if ($res != FALSE){
				$tupla = mysqli_fetch_assoc($res);
				$this->id = $tupla['id'];
				$this->respuesta = $tupla['respuesta'];
				$this->fecha = $tupla['fecha'];
				$this->pregunta = $tupla['pregunta'];
				$this->encuesta = $tupla['encuesta'];
				$res = TRUE;
			}

			return $res;
		}
		
		public function add(){
			$sql = "INSERT INTO `respuestas` (`respuesta`, `pregunta`, `encuesta`, `encuestado`) VALUES ('";
			$sql .= $this->respuesta . "', '";
			$sql .= $this->pregunta . "', '";
			$sql .= $this->encuesta . "', '";
			$sql .= $this->encuestado . "')";
			
			//echo $sql;
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

			return $res;
		}
		
		public function respuestas_pregunta($pregunta){
			$sql = "SELECT * FROM respuestas WHERE pregunta = ". $pregunta;
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
		
		public function respuestas_encuesta($encuesta){
			$sql = "SELECT * FROM respuestas WHERE encuesta = ". $encuesta;
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
		
		public function respuestas_docente($docente){
			$sql = "SELECT * FROM respuestas, encuestas WHERE respuestas.encuesta = encuesta.id AND encuesta.docente = ". $docente;
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
		
		public function respuestas_espacio_curricular($espacio_curricular){
			$sql = "SELECT * FROM respuestas, encuestas WHERE respuestas.encuesta = encuesta.id AND encuesta.espacio_curricular = ". $espacio_curricular;
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