#define la representación de las tablas como objetos de python
from sqlalchemy import create_engine #crea una instancia del engine que funciona como interfas y administrador de conexiones a la base de datos
from sqlalchemy.orm import sessionmaker, declarative_base # crear objetos para realizar operaciones CRUD en la base de datos y el declarative_base permite crear la clase de python
from sqlalchemy import Column, Integer, String, Text, Date, TIMESTAMP, ForeignKey



DATABASE_URL = "mysql+pymysql://csnweb:Eduse.001@localhost:3306/dbencuesta?charset=utf8mb4"


#DATABASE_URL = "mysql://csnweb:Eduse.001@localhost:8000/dbencuesta?charset=utf8mb4" 
# URL de conexión a la base de datos MySQL

engine = create_engine(DATABASE_URL) # crea el engine de la base de datos (sesion)
SessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine) # crea la sesión de la base de datos para cada una de las operaciones CRUD
Base = declarative_base() # crea la clase base para las tablas de la base de datos


class DocenteDB(Base):
    __tablename__ = "docente"
    id = Column(Integer, primary_key=True, index=True)
    apellido = Column(String(255))
    nombre = Column(String(55))
    dni = Column(String(10))
    email = Column(String(255))

class EncuestaDB(Base):
    __tablename__ = "encuestas"
    id = Column(Integer, primary_key=True, index=True)
    fecha_inicio = Column(Date)
    fecha_fin = Column(Date)
    descripcion = Column(Text)
    docente = Column(Integer, ForeignKey("docente.id"), comment='Clave foranea - id docente')
    espacio_curricular = Column(Integer, ForeignKey("espacio_curricular.id"), comment='clave foranea - id espacio curricular')

class EspacioCurricularDB(Base):
    __tablename__ = "espacio_curricular"
    id = Column(Integer, primary_key=True, index=True)
    nombre = Column(String(255))
    plan_estudio = Column(String(255))
    anio = Column(String(4))
    carrera = Column(String(255))

class PreguntaDB(Base):
    __tablename__ = "preguntas"
    id = Column(Integer, primary_key=True, index=True)
    formulacion = Column(Text)
    tipo = Column(Integer)
    opciones = Column(Text)

class RespuestaDB(Base):
    __tablename__ = "respuestas"
    id = Column(Integer, primary_key=True, index=True)
    respuesta = Column(Text)
    fecha = Column(TIMESTAMP)
    pregunta = Column(Text, comment='clave foranea - id pregunta')
    encuesta = Column(Integer, ForeignKey("encuestas.id"), comment='clave foranea - id encuesta')
    encuestado = Column(String(255))


