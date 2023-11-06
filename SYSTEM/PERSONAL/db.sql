CREATE DATABASE colegio;
CREATE TABLE usuarios(
    usu_id INT PRIMARY KEY,
    usu_nombre VARCHAR(250),
    usu_apellido VARCHAR(250),
    usu_mail VARCHAR(500),
    usu_password VARCHAR(600),
    usu_rol INT,
    usu_status INT
)

CREATE TABLE personal (
    per_id INT PRIMARY KEY,
    per_carne VARCHAR(255),
    per_usuario INT,
    per_nombre VARCHAR(250),
    per_apellido VARCHAR(250),
    per_fecha_nacimiento DATE,
    per_status INT,
    FOREIGN KEY (per_usuario) REFERENCES usuarios(usu_id)
);

CREATE TABLE estudiantes (
    est_id INT PRIMARY KEY,
    est_carne VARCHAR(255), -- Adjusted length to 255 characters
    est_usuario INT,
    est_nombre VARCHAR(250),
    est_apellido VARCHAR(250),
    est_fecha_nacimiento DATE, -- Changed to DATE for storing dates
    est_grado INT,
    est_seccion INT,
    est_status INT,
    FOREIGN KEY (est_usuario) REFERENCES usuarios(usu_id)
);

CREATE TABLE encargado_alumno (
    enal_id INT PRIMARY KEY,
    enal_id_estudiante INT,
    enal_nombre_encargado VARCHAR(250),
    enal_rol_encargado VARCHAR(250),
    enal_correo VARCHAR(250),
    enal_telefono VARCHAR(250),
    est_status INT,
    FOREIGN KEY (enal_id_estudiante) REFERENCES estudiantes(est_id)
);

CREATE TABLE documento_alumno (
    docal_id INT PRIMARY KEY,
    docal_id_estudiante INT,
    docal_tipo_documento INT,
    docal_fecha_carga DATE,
    docal_status INT,
    FOREIGN KEY (docal_id_estudiante) REFERENCES estudiantes(est_id)
);
