CREATE DATABASE bd_contra_cancer;
use bd_contra_cancer;


/* Tabla general para usuarios*/
create table if not exists users (
id int primary key auto_increment,
nombre varchar(255),
email varchar(255) UNIQUE,
pass varchar(255),
rol INT DEFAULT 1 -- Rol por defecto: 1 (asociación)
);

/* Tabla pasa asociaciones*/
create table if not exists associations (
id int primary key auto_increment,
nombre_asociacion varchar(255),
email varchar(255) UNIQUE,
pass varchar(255),
descripcion text,
logo varchar(255),
telefono varchar(10),
sitio_web varchar(255),
user_id INT UNIQUE, -- Clave foránea que referencia a la tabla users
CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

/* Tabla de noticias */
CREATE TABLE IF NOT EXISTS news (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    contenido TEXT NOT NULL,
    imagen_url VARCHAR(255),
    fecha_publicacion VARCHAR(255),
    ruta_pagina VARCHAR(255),
    autor_id INT,
    CONSTRAINT fk_autor FOREIGN KEY (autor_id) REFERENCES users(id) ON DELETE SET NULL
);

/* Tabla de educación */
CREATE TABLE IF NOT EXISTS education (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    contenido TEXT NOT NULL,
    tipo ENUM('articulo', 'video', 'infografia') NOT NULL,
    url VARCHAR(255),
    imagen_url VARCHAR(255)
);

/* Registros para llenar las tablas*/
INSERT INTO users (nombre, email, pass, rol) VALUES
('Admin', 'admin@gmail.com', 'Password12345!6', 3), /*Rol Admin*/
('Asociación Española Contra el Cáncer', 'aContraelCancer@gamil.com', 'Password12345!6', 1),
('Asociación de Pacientes Oncológicos', 'contacto@pacientesonco.org', 'Password12345!6', 1),
('criscancer', 'criscancer@gmail.org', 'Password12345!613', 1);


INSERT INTO associations (nombre_asociacion, email, pass, descripcion, logo, telefono, sitio_web, user_id) VALUES
('Asociación Española Contra el Cáncer', 'aContraelCancer@gamil.com', 'Password12345!6', 'Nuestro propósito
Aliviar y evitar, en la medida que sea posible, el sufrimiento en las personas producido por el cáncer, cualquier que sea su lugar de residencia 
y sus circunstancias personales.', 'img/logo-asociacion/1741119366_asociacion-1.jpg', '912345678', 'https://www.contraelcancer.es/es', 2),
('Asociación de Pacientes Oncológicos', 'contacto@pacientesonco.org', 'pacientes456', 'Grupo de apoyo para pacientes y familiares afectados por el cáncer.', 
'img/logo-asociacion/1741119931_asociacion-6.jpg', '923456789', 'www.pacientesonco.org', 3),
('criscancer', 'criscancer@gmail.org', 'Password12345!613', 'Es una organización de carácter privado e independiente cuyo objetivo es fomentar y financiar proyectos de investigación para el tratamiento y cura del cáncer.', 
'img/logo-asociacion/1741121302_asociacion-4.jpg', '923226789', 'https://criscancer.org/es/', 4);

INSERT INTO news (titulo, contenido, imagen_url, ruta_pagina, autor_id) VALUES
('Nuevo tratamiento para el cáncer de mama', 'Un equipo de investigadores ha desarrollado un tratamiento innovador para el cáncer de mama.', 'img/noticias/67c762c94ea64_noticas-3.jpg', 'pages/noticias/noticia_21.php', 3),
('Campaña de detección temprana de cáncer de piel', 'La Fundación Contra el Cáncer lanza una campaña para promover la detección temprana del cáncer de piel.', 'img/noticias/67c765f5dd382_noticias-1.jpg', 'pages/noticias/noticia_22.php', 2),
('Proyecto CRIS de Radioinmunoterapia en Tumores Cerebrales Infantiles', 'Cada año, 300 niños en España son diagnosticados con tumores cerebrales, una realidad que persiste como la segunda causa de muerte por cáncer en menores de 15 años a pesar de los avances en tratamientos. Entre estos tumores, el Glioma Difuso de la Línea Media (DMG) emerge como uno de los más desafiantes, con apenas un 10% de los niños logrando sobrevivir más allá de los 2 años posteriores al diagnóstico. Aunque la radioterapia sigue siendo un pilar en el tratamiento de tumores cerebrales infantiles, su eficacia en niños con DMG solo prolonga la supervivencia por unos pocos meses.', 'img/noticias/67c768dde05f1_noticias-1.jpg', 'pages/noticias/noticia_23.php', 4),
('CAR4SAR: Ensayo con células CAR-T contra los Sarcomas Infantiless', 'Los tumores en la infancia siguen considerándose, por el bajo número de casos en comparación a los adultos, como enfermedad rara. Sin embargo, actualmente son la principal causa de muerte por enfermedad en la población infantil.
Los sarcomas infantiles son además, poco frecuentes con respecto a otros tipos de cáncer pediátrico, como las leucemias o los tumores cerebrales. Pero, una vez se extienden, las posibilidades de supervivencia son bajas, solamente de un 30%.
Hasta ahora, las posibilidades terapéuticas siempre han girado alrededor de la cirugía y la quimioterapia, pero son poco efectivas en etapas avanzadas de estas enfermedades. Por eso es imprescindible desarrollar nuevas estrategias terapéuticas para tratar eficazmente estos tumores.
La reciente aparición de las terapias CAR-T, en las cuales la Unidad CRIS de terapias Avanzadas es especialista, abre una puerta a la esperanza en este sentido. Consisten en tomar células del sistema inmunitario (linfocitos T) del niño o de un donante, y modificarlas con una especie de detector, que les permite encontrar y eliminar a las células tumorales con gran eficacia. Estas terapias han revolucionado el tratamiento de los cánceres de la sangre, como las leucemias, linfomas, etc. Recientemente están irrumpiendo con fuerza en los tumores sólidos,  algo impensable hace solo unos años.', 'img/noticias/67c769e3279c7_extra-4.jpg', 'pages/noticias/noticia_24.php', 1);

INSERT INTO education (titulo, contenido, tipo, url, imagen_url) VALUES
('Guía para la prevención del cáncer', 'Consejos prácticos para reducir el riesgo de desarrollar cáncer.', 'articulo', 'www.fundacioncancer.org/prevencion', 'prevencion.jpg'),
('Video: Cómo realizar un autoexamen de mama', 'Aprende a realizar un autoexamen de mama para la detección temprana del cáncer.', 'video', 'www.fundacioncancer.org/video-mama', 'autoexamen.jpg'),
('Infografía: Tipos de cáncer más comunes', 'Infografía que describe los tipos de cáncer más frecuentes y sus síntomas.', 'infografia', 'www.fundacioncancer.org/infografia-tipos', 'tipos_cancer.jpg');








