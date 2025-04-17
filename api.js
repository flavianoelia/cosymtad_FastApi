const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql2');

// Configuración del servidor
const app = express();
app.use(bodyParser.json());

// Configuración de la base de datos
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root', // Cambia esto si usas otro usuario
  password: '', // Cambia esto si tienes una contraseña
  database: 'encuesta' // Nombre de tu base de datos
});

// Verifica la conexión a la base de datos
db.connect((err) => {
  if (err) {
    console.error('Error al conectar a la base de datos:', err);
    return;
  }
  console.log('Conexión exitosa a la base de datos');
});

// Endpoint para insertar una respuesta
app.post('/api/insertar_respuesta', (req, res) => {
  const { respuesta, pregunta, encuesta, encuestado } = req.body;

  // Verifica que todos los datos estén presentes
  if (!respuesta || !pregunta || !encuesta || !encuestado) {
    return res.status(400).json({
      status: 'error',
      message: 'Faltan datos obligatorios',
    });
  }

  // Consulta SQL para insertar la respuesta
  const sql = `
    INSERT INTO respuestas (respuesta, pregunta, encuesta, encuestado)
    VALUES (?, ?, ?, ?)
  `;

  // Ejecuta la consulta
  db.query(sql, [respuesta, pregunta, encuesta, encuestado], (err, result) => {
    if (err) {
      console.error('Error al insertar la respuesta:', err);
      return res.status(500).json({
        status: 'error',
        message: 'Error al insertar la respuesta',
      });
    }

    res.status(201).json({
      status: 'success',
      message: 'Respuesta insertada correctamente',
      insertId: result.insertId, // Devuelve el ID del registro insertado
    });
  });
});

// Inicia el servidor
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});