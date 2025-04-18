# define la estructura de datos que la api va a enviar y recibir
from pydantic import BaseModel # importa la libreria de pydantic para definir los modelos de datos

class DocenteInfo(BaseModel):
    nombre: str
    apellido: str

class EspacioCurricularInfo(BaseModel):
    nombre: str

class InfoEncuesta(BaseModel):
    docente: DocenteInfo
    espacio_curricular: EspacioCurricularInfo

class RespuestaEncuesta(BaseModel):
    condicion_cursado: str
    asistencia: str
    docente_comision: str
    teoricas: str | None = None
    practicas: str | None = None
    teorico_practicas: str | None = None
    otras: str | None = None
    otras_texto: str | None = None
    asistencia_docente: str
    opiniones: str
    disposicion: str
    respetuoso: str
    interes: str
    contencion: str
    consultas: str
    criterios_evaluacion: str
    correcciones_claras: str
    comunicacion: str
    higiene_seguridad: str
    claridad: str
    ejemplos: str
    relacion_temas: str
    materiales_apoyo: str
    organizacion_materiales: str
    exposiciones: str
    actividades_practicas: str
    temas_evaluados: str
    pensamiento_critico: str
    autonomia: str
    equipo: str
    participacion: str
    formacion: str
    aporte: str
    respuestaPorQue: str | None = None
    valoracion_docente: str
    comentarios: str | None = None