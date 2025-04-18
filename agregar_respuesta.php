<?php
	include_once("./lib/dbRespuesta.php");
	$encuestado = mt_rand();
	$idEnc = $_POST["idEnc"];
	
	$condicion_cursado = $_POST["condicion-cursado"];
	$resp= new Respuesta;
	$resp->set_respuesta($condicion_cursado);
	$resp->set_pregunta("Condición de cursado al momento de completar la encuesta");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	#$resp->enviarRespuestaAPIDesdeObjeto($resp);	
	unset($resp);
	
	$asistencia = $_POST["asistencia"];
	$resp= new Respuesta;
	$resp->set_respuesta($asistencia);
	$resp->set_pregunta("¿Qué porcentaje de asistencia tuviste en esta asignatura con este/a docente?");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	#$resp->enviarRespuestaAPIDesdeObjeto($resp);	
	unset($resp);
	
	$docente_comision = $_POST["docente-comision"];
	$resp= new Respuesta;
	$resp->set_respuesta($docente_comision);
	$resp->set_pregunta("¿La/el docente corresponde a la comisión en la que cursaste la asignatura?");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	#$resp->enviarRespuestaAPIDesdeObjeto($resp);	
	unset($resp);
	
	if (isset($_POST['teoricas'])) {
		$teoricas = $_POST["teoricas"];
		$resp= new Respuesta;
		$resp->set_respuesta($teoricas);
		$resp->set_pregunta("¿Qué tipo de clases desarrolló la/el docente?");
		$resp->set_encuesta($idEnc);
		$resp->set_encuestado($encuestado);
		$resp->add();
		#$resp->enviarRespuestaAPIDesdeObjeto($resp);	
		unset($resp);
	}
	
	if (isset($_POST['practicas'])) {
		$practicas = $_POST["practicas"];
		$resp= new Respuesta;
		$resp->set_respuesta($practicas);
		$resp->set_pregunta("¿Qué tipo de clases desarrolló la/el docente?");
		$resp->set_encuesta($idEnc);
		$resp->set_encuestado($encuestado);
		$resp->add();
		#$resp->enviarRespuestaAPIDesdeObjeto($resp);	

		unset($resp);
	}
	
	if (isset($_POST['teorico-practicas'])) {
		$teorico_practicas = $_POST["teorico-practicas"];
		$resp= new Respuesta;
		$resp->set_respuesta($teorico_practicas);
		$resp->set_pregunta("¿Qué tipo de clases desarrolló la/el docente?");
		$resp->set_encuesta($idEnc);
		$resp->set_encuestado($encuestado);
		$resp->add();
		#$resp->enviarRespuestaAPIDesdeObjeto($resp);	
        unset($resp);
	}
	
	if (isset($_POST['otras'])) {
		$otras_texto = $_POST["otras-texto"];
		$resp= new Respuesta;
		$resp->set_respuesta($otras_texto);
		$resp->set_pregunta("¿Qué tipo de clases desarrolló la/el docente?");
		$resp->set_encuesta($idEnc);
		$resp->set_encuestado($encuestado);
		$resp->add();
		#$resp->enviarRespuestaAPIDesdeObjeto($resp);	
		unset($resp);
	}
	
	$asistencia_docente = $_POST["asistencia-docente"];
	$resp= new Respuesta;
	$resp->set_respuesta($asistencia_docente);
	$resp->set_pregunta("La/el docente tuvo a su cargo el desarrollo de: ");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$opiniones = $_POST["opiniones"];
	$resp= new Respuesta;
	$resp->set_respuesta($opiniones);
	$resp->set_pregunta("Permitió y respetó opiniones:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);

	$disposicion = $_POST["disposicion"];
	$resp= new Respuesta;
	$resp->set_respuesta($disposicion);
	$resp->set_pregunta("Manifestó buena disposición al responder dudas:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$respetuoso = $_POST["respetuoso"];
	$resp= new Respuesta;
	$resp->set_respuesta($respetuoso);
	$resp->set_pregunta("Fue respetuoso/a en el trato (clases, consultas, evaluaciones):");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$interes = $_POST["interes"];
	$resp= new Respuesta;
	$resp->set_respuesta($interes);
	$resp->set_pregunta("La/el docente manifestó interés al llevar a cabo sus tareas (clases, consultas, evaluaciones):");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$contencion = $_POST["contencion"];
	$resp= new Respuesta;
	$resp->set_respuesta($contencion);
	$resp->set_pregunta("Brindó apoyo y/o contención a sus estudiantes:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$consultas = $_POST["consultas"];
	$resp= new Respuesta;
	$resp->set_respuesta($consultas);
	$resp->set_pregunta("Atendió sus horarios de consulta:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$criterios_evaluacion = $_POST["criterios-evaluacion"];
	$resp= new Respuesta;
	$resp->set_respuesta($criterios_evaluacion);
	$resp->set_pregunta("Los criterios de evaluación fueron explicitados/comunicados:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$correcciones_claras = $_POST["correcciones-claras"];
	$resp= new Respuesta;
	$resp->set_respuesta($correcciones_claras);
	$resp->set_pregunta("La devolución de las correcciones de trabajos y/o evaluaciones fueron claras:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$comunicacion = $_POST["comunicacion"];
	$resp= new Respuesta;
	$resp->set_respuesta($comunicacion);
	$resp->set_pregunta("El/la docente utilizó los canales de comunicación que se acordaron:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$higiene_seguridad = $_POST["higiene-seguridad"];
	$resp= new Respuesta;
	$resp->set_respuesta($higiene_seguridad);
	$resp->set_pregunta("Indicó las normas de higiene y seguridad para el desarrollo de las clases:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$claridad = $_POST["claridad"];
	$resp= new Respuesta;
	$resp->set_respuesta($claridad);
	$resp->set_pregunta("Explicó con claridad las temáticas:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$ejemplos = $_POST["ejemplos"];
	$resp= new Respuesta;
	$resp->set_respuesta($ejemplos);
	$resp->set_pregunta("Propuso ejemplos y/o ejercicios relacionados con la vida real y/o profesional (contexto actual):");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$relacion_temas = $_POST["relacion-temas"];
	$resp= new Respuesta;
	$resp->set_respuesta($relacion_temas)	;
	$resp->set_pregunta("Relacionó los temas nuevos con los anteriores (con otras asignaturas y/u otras unidades):");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$materiales_apoyo = $_POST["materiales-apoyo"];
	$resp= new Respuesta;
	$resp->set_respuesta($materiales_apoyo);
	$resp->set_pregunta("Utilizó materiales de apoyo o complementarios para desarrollar las clases:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$organizacion_materiales = $_POST["organizacion-materiales"];
	$resp= new Respuesta;
	$resp->set_respuesta($organizacion_materiales);
	$resp->set_pregunta("Los materiales de apoyo o complementarios tuvieron adecuada organización y presentación:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$expocisiones = $_POST["exposiciones"];
	$resp= new Respuesta;
	$resp->set_respuesta($expocisiones);
	$resp->set_pregunta("Sus exposiciones/explicaciones (teóricas/teórico-prácticas/prácticas) aportaron a una mejor comprensión de los conceptos desarrollados en la clase y/o bibliografía:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$actividades_practicas = $_POST["actividades-practicas"];
	$resp= new Respuesta;
	$resp->set_respuesta($actividades_practicas);
	$resp->set_pregunta("Mediante las actividades prácticas mostró la utilidad o aplicación de la teoría:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$temas_evaluados = $_POST["temas-evaluados"];
	$resp= new Respuesta;
	$resp->set_respuesta($temas_evaluados);
	$resp->set_pregunta("Todos los temas evaluados fueron dados en clases (teóricas/teórico-prácticas/prácticas) u otros espacios de aprendizaje propuestos por el espacio curricular:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$pensamiento_critico = $_POST["pensamiento-critico"];
	$resp= new Respuesta;
	$resp->set_respuesta($pensamiento_critico);
	$resp->set_pregunta("Promovió el pensamiento crítico (reflexión, análisis):");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$autonomia = $_POST["autonomia"];
	$resp= new Respuesta;
	$resp->set_respuesta($autonomia);
	$resp->set_pregunta("Promovió el trabajo autónomo:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$equipo = $_POST["equipo"];
	$resp= new Respuesta;
	$resp->set_respuesta($equipo);
	$resp->set_pregunta("Promovió el trabajo en equipo de manera colaborativa:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$participacion = $_POST["participacion"];
	$resp= new Respuesta;
	$resp->set_respuesta($participacion);
	$resp->set_pregunta("Impulsó la participación de sus estudiantes para el intercambio de ideas:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$formacion = $_POST["formacion"];
	$resp= new Respuesta;
	$resp->set_respuesta($formacion);
	$resp->set_pregunta("Motivó a participar en diferentes instancias de formación (talleres, jornadas, intercambios estudiantiles, cursos extracurriculares, etc.):");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$aporte = $_POST["aporte"];
	$resp= new Respuesta;
	$resp->set_respuesta($aporte);
	$resp->set_pregunta("Indica si consideras que este espacio curricular (asignatura, módulo, seminario, entre otros) aportó a tu formación:");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$respuestaPorQue = $_POST["respuestaPorQue"];
	$resp= new Respuesta;
	$resp->set_respuesta($respuestaPorQue);
	$resp->set_pregunta("¿Por qué?");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$valoracion_docente = $_POST["valoracion-docente"];
	$resp= new Respuesta;
	$resp->set_respuesta($valoracion_docente);
	$resp->set_pregunta("Utilizando la escala propuesta, ingresa el puntaje con el que calificarías en forma global a la/el docente");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);
	
	$comentarios = $_POST["comentarios"];
	$resp= new Respuesta;
	$resp->set_respuesta($comentarios);
	$resp->set_pregunta("En este espacio puedes comunicar observaciones que le parezcan pertinentes, sobre aspectos del desempeño docente que estén considerados, o no considerados, en esta encuesta");
	$resp->set_encuesta($idEnc);
	$resp->set_encuestado($encuestado);
	$resp->add();
	unset($resp);

	header("location:./out.php");
?>