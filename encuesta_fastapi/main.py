from fastapi import FastAPI, Depends, HTTPException # importa las librerias necesarias de fastapi
from models import SessionLocal, engine, Base # importa la sesión de la base de datos y el engine para crear la base de datos
from sqlalchemy.orm import Session
from schemas import InfoEncuesta, RespuestaEncuesta, DocenteInfo, EspacioCurricularInfo

app=FastAPI() # instancia de la aplicación fastapi

#@app.get("/") # decorador que indica que esta función es un endpoint de la api

def get_db(): #obtener una instancia de la base de datos
    db = SessionLocal() #almacena instancia de la sesion de la BD
    try:
        yield db #palabra clave que convierte a una función en un generador, devuelde la instancia de la base de datos pausandola hasta q se necesite de nuevo
    finally:
        db.close()

@app.get("/encuestas/{id_encuesta}", response_model=schemas.InfoEncuesta) # endpoint para obtener la información de una encuesta por su ID
async def obtener_info_encuesta(id_encuesta: int, db: Session = Depends(get_db)): # obtiene la información de una encuesta por su ID
    encuesta_db = db.query(models.EncuestaDB).filter(models.EncuestaDB.id_encuesta == id_encuesta).first()
    if not encuesta_db:
        raise HTTPException(status_code=404, detail="Encuesta no encontrada")
    docente_db = db.query(models.DocenteDB).filter(models.DocenteDB.id_docente == encuesta_db.id_docente).first()
    if not docente_db:
        raise HTTPException(status_code=404, detail="Docente no encontrado")
    espacio_curricular_db = db.query(models.EspacioCurricularDB).filter(models.EspacioCurricularDB.id_espacio_curricular == encuesta_db.id_espacio_curricular).first()
    if not espacio_curricular_db:
        raise HTTPException(status_code=404, detail="Espacio curricular no encontrado")
    return schemas.InfoEncuesta(
        nombre_docente=docente_db.nombre,
        apellido_docente=docente_db.apellido,
        nombre_espacio_curricular=espacio_curricular_db.nombre
    )

@app.post("/encuestas/{id_encuesta}/respuestas") # endpoint para guardar una respuesta a una encuesta
async def guardar_respuesta_encuesta(id_encuesta: int, respuesta: schemas.RespuestaEncuesta, db: Session = Depends(get_db)):
    db_respuesta = models.RespuestaDB(id_encuesta=id_encuesta, **respuesta.dict())
    db.add(db_respuesta)
    db.commit()
    db.refresh(db_respuesta)
    return {"mensaje": "Respuesta guardada exitosamente"}