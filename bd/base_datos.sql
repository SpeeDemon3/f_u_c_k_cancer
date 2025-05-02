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
pagina VARCHAR(255) NOT NULL,
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

/* Registros para llenar las tablas*/
INSERT INTO bd_contra_cancer.users (nombre,email,pass,rol) VALUES
	 (1,'Admin','admin@gmail.com','Password12345!6',3),/*Rol Admin*/
	 (5,'Asociación Española Contra el Cáncer','aContraelCancer@gamil.com','Password12345!6',1),
	 (6,'Asociación de Pacientes Oncológicos','contacto@pacientesonco.org','Password12345!6',1),
	 (7,'criscancer','criscancer@gmail.org','Password12345!613',1),
	 (8,'Asociación Fuck Cancer','fuckcancer@gmail.es','Password12345!6',1),
	 (10,'Asociación Fuck Cancer','fuckcancer3@gmail.es','Password12345!6',1),
	 (11,'Test 23 Asociacion','Test2@Test2.es','Password12345!6',1),
	 (12,'Test 2','Test2@Test2.com','Password12345!6',1),
	 (14,'Test 2','Test2@Test222.com','Password12345!6',1),
	 (15,'Test 2','Test2@Test2222.com','Password12345!6',1);
INSERT INTO bd_contra_cancer.users (nombre,email,pass,rol) VALUES
	 (16,'Test 2','Test2@Test2222e.com','Password12345!6',1),
	 (17,'Test 22','Test22@Test22.es','Password12345!6',1),
	 (18,'Test 211','Test2112@Test2.es','Password12345!6',1),
	 (19,'Test 2dd','asoccFuertesasds@asocc.es','Password12345!6',1),
	 (20,'AECC','marcela.talero@contraelcancer.es','Password12345!6',1),
	 (21,'Lucha Contra el Cáncer','test1contraelcancer@test.es','Password12345!6',1);


INSERT INTO bd_contra_cancer.associations (nombre_asociacion,email,pass,descripcion,logo,telefono,sitio_web,user_id,pagina) VALUES
	 (4,'Asociación Española Contra el Cáncer','aContraelCancer@gamil.com','Password12345!6','Nuestro propósito es aliviar y evitar, en la medida que sea posible, el sufrimiento en las personas producido por el cáncer, cualquier que sea su lugar de residencia y sus circunstancias personales.','img/logo-asociacion/1742047501_asociacion-1.jpg','912345678','https://www.contraelcancer.es/es',5,'pages/asociaciones-web/asociaci-n-espaniola-contra-el-can.php'),
	 (5,'Asociación de Pacientes Oncológicos','contacto@pacientesonco.org','Password12345!6','Grupo de apoyo para pacientes y familiares afectados por el cáncer.','img/logo-asociacion/1742047592_asociacion-4.jpg','923456789','https://www.pacientesonco.org',6,'pages/asociaciones-web/pacientes-oncologicos.php'),
	 (6,'criscancer','criscancer@gmail.org','Password12345!613','Es una organización de carácter privado e independiente cuyo objetivo es fomentar y financiar proyectos de investigación para el tratamiento y cura del cáncer.','img/logo-asociacion/1742047676_asociacion-5.jpg','923226789','https://criscancer.org/es/',7,'pages/asociaciones-web/cris-contra-cancer.php'),
	 (7,'Asociación Fuck Cancer','fuckcancer3@gmail.es','Password12345!6','Esta asociación combate al cáncer.','img/logo-asociacion/1742147831_asociacion-5.jpg','923456789','https://www.fuckcancer.es',10,'pages/asociaciones-web/asociación-fuck-cancer.php'),
	 (9,'Test 22','Test22@Test22.es','Password12345!6','soy un nuevo test','img/logo-asociacion/1742149972_asociacion-4.jpg','666666666','https://www.contraelcancer.ees/es',17,'pages/asociaciones-web/test-22.php'),
	 (10,'Test 2dd','asoccFuertesasds@asocc.es','Password12345!6','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.','img/logo-asociacion/1742150282_asociacion-5.jpg','666666666','https://www.contraelcancer.es',19,'pages/asociaciones-web/test-2dd.php'),
	 (11,'AECC','marcela.talero@contraelcancer.es','Password12345!6','La Fundación Jiménez Díaz contra el cáncer es una iniciativa dedicada a la investigación, prevención, diagnóstico y tratamiento del cáncer, vinculada al prestigioso Hospital Universitario Fundación Jiménez Díaz en Madrid, España.','img/logo-asociacion/1744440180_asociacion-1.jpg','655776532','https://www.fjd.es/',20,'pages/asociaciones-web/aecc.php'),
	 (12,'Lucha Contra el Cáncer','test1contraelcancer@test.es','Password12345!6','Esto es un test de prueba para la descripción editada','img/logo-asociacion/1745564392_asociacion-5.jpg','912345678','https://www.contraelcancer.es/es',21,'pages/asociaciones-web/lucha-contra-el-c-ncer.php');


INSERT INTO bd_contra_cancer.news (titulo,contenido,imagen_url,fecha_publicacion,ruta_pagina,autor_id) VALUES
	 (5,'Nuevo tratamiento para el cáncer de mama','Un equipo de investigadores ha desarrollado un tratamiento innovador para el cáncer de mama.','img/noticias/67d5933cd7b97_noticas-2.jpg','2025-03-15 15:48:28','pages/noticias/noticia_5.php',5),
	 (6,'Campaña de detección temprana de cáncer de piel','Cada año, 300 niños en España son diagnosticados con tumores cerebrales, una realidad que persiste como la segunda causa de muerte por cáncer en menores de 15 años a pesar de los avances en tratamientos. Entre estos tumores, el Glioma Difuso de la Línea Media (DMG) emerge como uno de los más desafiantes, con apenas un 10% de los niños logrando sobrevivir más allá de los 2 años posteriores al diagnóstico. Aunque la radioterapia sigue siendo un pilar en el tratamiento de tumores cerebrales infantiles, su eficacia en niños con DMG solo prolonga la supervivencia por unos pocos meses.','img/noticias/67d593a22f76b_noticias-7.jpg','2025-03-15 15:50:10','pages/noticias/noticia_6.php',6),
	 (10,'En un estudio se busca reducir el estigma del cáncer de pulmón enseñando empatía a los profesionales de la salud','Para las personas con antecedentes de tabaquismo, es posible que un diagnóstico de cáncer de pulmón cause sentimientos de culpa y vergüenza debido al estigma que se suele asociar con la enfermedad. Este estigma a veces dificulta la comunicación sincera entre los pacientes y los proveedores de atención de la salud, e impide que reciban el asesoramiento para que los pacientes dejen de fumar. Los investigadores del Centro Oncológico Memorial Sloan Kettering crearon un programa de capacitación para ayudar a los proveedores de atención de la salud a reducir el estigma relacionado con el cáncer de pulmón. En esta entrevista, las encargadas del estudio, la doctora Smita Banerjee, científica especialista en conducta, y la doctora Jamie Ostroff, psicóloga, analizan el efecto del estigma en las personas con cáncer de pulmón, así como un estudio clínico que financia el NCI en el que se evalúa el programa de capacitación.','img/noticias/67e97401e5cc2_noticas-4.jpg','2025-03-30 18:40:33','pages/noticias/noticia_10.php',6),
	 (11,'Los investigadores descubren una nueva función de las proteínas mutadas en algunos de los cánceres más mortales','Los investigadores de los Institutos Nacionales de la Salud (NIH) y sus colaboradores descubrieron una nueva forma en que los genes RAS, que suelen presentar mutaciones en el cáncer, podría impulsar el crecimiento tumoral. Esto es algo diferente de la muy conocida función que tienen estos genes en la señalización de la superficie celular. Según un estudio publicado el 11 de noviembre de 2024 en la revista Nature Cancer, el RAS mutado desencadena una serie de actividades por las que se transportan proteínas nucleares específicasNotificación de salida que llevan un crecimiento tumoral descontrolado.

Los genes RAS están en segundo lugar entre los genes que presentan mutaciones con mayor frecuencia en el cáncer. Las proteínas RAS mutadas son oncoiniciadores clave de algunos de los cánceres más mortales, que incluyen casi todos los cánceres de páncreas, la mitad de los cánceres colorrectales y un tercio de los cánceres de pulmón. En décadas de investigación, se ha demostrado que las mutaciones en las proteínas RAS promueven la formación y el crecimiento tumoral mediante la activación de proteínas específicas en la superficie celular, creando un flujo constante que señaliza a las células la multiplicación.

“Este es el primer estudio que demuestra que los genes RAS mutados pueden promover el cáncer de una manera nueva por completo”, dijo el autor del estudio, el doctor Douglas Lowy, subdirector del Instituto Nacional del Cáncer (NCI) de los NIH. “El hallazgo de esta otra función de las proteínas RAS ofrece posibilidades fascinantes para mejorar el tratamiento”.

Los medicamentos que bloquean las proteínas RAS mutadas solo han estado disponibles para tratar el cáncer desde hace pocos años y la Administración de Alimentos y Medicamentos (FDA) los aprobó para tratar el cáncer de pulmón y el sarcoma. Aunque su desarrollo fue un éxito científico importante, los inhibidores de RAS hasta ahora tuvieron efectos limitados en los desenlaces de los pacientes, ya que mejoran la supervivencia unos pocos meses en la mayoría de las personas. 

Hace más de 35 años, un grupo dirigido por el doctor Lowy aportó a los estudios iniciales en los que se identificó el RAS como gen oncoiniciador y ayudó a explicar cómo este promueve el crecimiento tumoral. En este nuevo estudio, el equipo de investigación descubrió la participación directa del gen RAS mutado en el proceso de liberación de una proteína nuclear llamada EZH2 de un complejo que se transporta desde el núcleo hasta el citoplasma. Una vez liberada, la EZH2 hace que sea más fácil destruir una proteína supresora tumoral llamada DLC1. Bloquear el gen RAS mutado evitó que la EZH2 se liberara, lo que restauró la actividad de la DLC1.

En experimentos con líneas celulares de cáncer de pulmón humano y con modelos murinos de cáncer de pulmón, los investigadores observaron que la combinación de inhibidores de RAS con distintos medicamentos dirigidos para el cáncer que reactivan la actividad supresora tumoral de la DLC1 tuvo una actividad potente contra el cáncer, mucho más potente que con los inhibidores de RAS solos.

Además, en el estudio se comprobó que las proteínas RAS mutadas cumplen la misma función en otros tipos de cáncer; algo que sugiere que este mecanismo tal vez sea característico de los cánceres con genes RAS mutados.

Los investigadores creen que este hallazgo podría tener aplicaciones para el tratamiento de los cánceres que el gen RAS estimula. En particular, comenzaron a analizar esta función del gen RAS en el cáncer de páncreas porque hay muy pocos tratamientos eficaces para este tipo de cáncer.

“Un día se podrían crear nuevas combinaciones de tratamientos que tengan en cuenta esta nueva función del RAS”, comentó el doctor Lowy.

Acerca del Instituto Nacional del Cáncer: El Instituto Nacional del Cáncer (NCI) dirige el Programa Nacional del Cáncer (NCP) y las iniciativas de los Institutos Nacionales de la Salud (NIH) cuyo fin es disminuir la prevalencia del cáncer de forma drástica y mejorar la vida de las personas con cáncer. El NCI financia una variedad amplia de investigaciones y capacitaciones sobre el cáncer mediante subvenciones y contratos fuera de las instituciones. El programa de investigación intrainstitucional lleva a cabo estudios de investigación innovadora clínica y epidemiológica, transdisciplinaria básica y aplicable sobre las causas del cáncer, las formas de prevenirlo, la predicción del riesgo, la detección temprana y el tratamiento. Estos estudios incluyen las actividades de investigación en el Centro Clínico de los NIH, el hospital de investigaciones más grande del mundo. Para obtener más información en inglés sobre los estudios de investigación en el NCI, consulte el sitio web del Centro de Investigación Oncológica. Para obtener más información sobre el cáncer, visite el sitio web del NCI en cancer.gov/espanol o llame al Servicio de Información de Cáncer del NCI al 1-800-422-6237 (1-800-4-CANCER).

Acerca de los Institutos Nacionales de la Salud: Los Institutos Nacionales de la Salud (NIH) son el organismo nacional de investigación médica, integrado por 27 institutos y centros, y es un componente del Departamento de Salud y Servicios Humanos (HHS) de los Estados Unidos. Los NIH son el organismo federal principal que lleva a cabo y apoya la investigación básica, clínica y médica traslacional e investiga las causas, los tratamientos y las curas de enfermedades comunes y raras. Para obtener más información sobre los NIH y sus programas, visite salud.nih.gov.','img/noticias/67e9748ce2f43_noticais-5.jpg','2025-03-30 18:42:52','pages/noticias/noticia_11.php',6);






