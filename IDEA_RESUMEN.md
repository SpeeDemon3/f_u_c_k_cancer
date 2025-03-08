# Contenidos

## 1. Noticias
Permite mantener actualizada la información sobre avances, eventos y campañas relacionados con el cáncer.

## 2. Educación
Ofrece recursos que ayuden a la prevención y la comprensión de la enfermedad, lo cual es muy valioso para los usuarios.

## 3. Asociaciones
Proporciona un espacio para que las asociaciones que luchan contra el cáncer puedan difundir su labor, conectar con la comunidad y promover eventos o campañas.

## 4. Sistema de Registro
Permitir registrarse a asociaciones.

## 4. Sistema de Login y Gestión de Roles
Incluir un sistema de autenticación permite diferenciar entre asociaciones y administradores.

- **Administrador:** Puede actualizar los contenidos (noticias, recursos, asociaciones, etc.), lo cual es fundamental para mantener el sitio siempre relevante y actualizado.

## 5. Enfoque Integral y Social
Combinar información educativa con noticias y una red para asociaciones, la plataforma no solo informa, sino que también promueve la colaboración y el apoyo en la lucha contra el cáncer.

## 6. Aspecto Técnico y Práctico
Tecnologías **HTML, CSS, JavaScript, MySQL y PHP** permitirá demostrar habilidades en desarrollo web full-stack básico.

---

# Atributos de Cada Perfil

## Administrador
- `id`: Identificador único (clave primaria) para el administrador.
- `nombre_completo`: Nombre y apellidos.
- `nombre_usuario`: (Opcional) Alias o username para el login.
- `correo_electronico`: Email único para comunicación y autenticación.
- `contraseña`: Contraseña encriptada.
- `rol`: Especifica "administrador".

## Asociación
- `id`: Identificador único.
- `nombre_asociacion`: Nombre oficial.
- `correo_electronico`: Email de contacto.
- `contraseña`: Contraseña encriptada.
- `descripcion`: Breve resumen de la misión y actividades.
- `logotipo`: Imagen representativa.
- `direccion`: Ubicación física (opcional).
- `telefono`: Contacto telefónico.
- `sitio_web`: Enlaces a plataformas digitales.

---

# Roles

## Administrador
- Acceso completo a la plataforma.
- **Panel de Control:**
  - Gestión de Contenidos (crear, editar y eliminar noticias, recursos y asociaciones).
  - Gestión de Usuarios (suspender cuentas, asignar roles).

## Asociación
- **Acceso a Sección Dedicada:**
  - Publicar información sobre eventos y campañas.
  - Crear y actualizar su perfil y contenido.
  - Mostrar todas sus noticias permitiendo crear, modificar y eliminar.
- **Limitaciones:** No pueden gestionar la plataforma ni modificar contenido ajeno.

---

# Tablas SQL

## 1. Tabla `usuarios`
```sql
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    rol ENUM('admin', 'asociacion'),
    nombre VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## 2. Tabla `asociaciones`
```sql
CREATE TABLE asociaciones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    nombre_asociacion VARCHAR(255),
    descripcion TEXT,
    logotipo VARCHAR(255),
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    sitio_web VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
```

## 3. Tabla `noticias`
```sql
CREATE TABLE noticias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255),
    contenido TEXT,
    imagen VARCHAR(255),
    fecha_publicacion DATETIME,
    autor_id INT,
    estado ENUM('publicado', 'borrador'),
    FOREIGN KEY (autor_id) REFERENCES usuarios(id)
);
```

## 4. Tabla `educacion`
```sql
CREATE TABLE educacion (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255),
    contenido TEXT,
    tipo ENUM('articulo', 'video', 'infografia'),
    url VARCHAR(255),
    imagen VARCHAR(255),
    fecha_publicacion DATETIME,
    estado ENUM('publicado', 'borrador')
);
```

---

# Componentes del Sitio

## Menú de Navegación

### **Para Visitantes**
1. Inicio
2. Noticias
3. Educación
4. Asociaciones
5. Iniciar Sesión / Registro

### **Para Usuarios Autenticados**
#### Administrador
- Panel de Administración
- Cerrar Sesión

#### Asociación
- Mi Perfil/Panel de Asociación
- Cerrar Sesión

---

# Estructura de Páginas

## Página Principal (Home)
1. **Header**: Logo, menú, barra de búsqueda.
2. **Banner**: Imágenes destacadas con llamados a la acción.
3. **Sección de Noticias**: Resumen con botón "Ver todas".
4. **Sección de Educación**: Recursos clave con acceso a más.
5. **Sección de Asociaciones**: Listado con enlace al directorio.
6. **Footer**: Información de contacto y enlaces.

## Página de Noticias
- Listado de noticias.
- Página de detalle con opción de compartir en redes.

## Página de Educación
- Listado de recursos educativos.
- Página de detalle con contenido ampliado.

## Página de Asociaciones (Directorio)
- Listado de asociaciones.
- Página individual con descripción, contacto y publicaciones propias.

## Página de Login/Registro
- Formulario de inicio de sesión.
- Registro solo para asociaciones y administrador.
- Redirección según el rol tras autenticarse.

## Panel de Administración
- Gestión de contenidos y usuarios.
- Cierre de sesión.

## Panel de Asociación
- Perfil editable.
- Publicación de eventos y noticias.
- Cierre de sesión.

## Otras Páginas
- **Términos y Condiciones / Política de Privacidad**: Protección de datos y condiciones de uso.
- **Errores (404, etc.)**: Mensajes claros con enlaces de regreso.

---

## Colores web

#3F51B5 (Índigo – Color Primario)
  - Dónde usarlo:
      Cabecera / Barra de Navegación: Como fondo para transmitir confianza y profesionalismo.
      Títulos o Encabezados Destacados: En secciones principales para reforzar la identidad visual.
      Botones Primarios: Para llamadas a la acción (por ejemplo, “Leer más” o “Inicia Sesión”) cuando se quiera destacar una acción importante.
      Elementos de Branding: Como logotipos o íconos que refuercen la imagen de la web.

#9C27B0 (Púrpura – Color Secundario)
    - Dónde usarlo:
        Fondos de Secciones Secundarias: Como bloques de información o tarjetas que necesiten un sutil contraste con el fondo principal.
        Encabezados de Sub-secciones: Para diferenciar y dar énfasis a secciones internas (por ejemplo, subtítulos en áreas de noticias o educación).
        Estados Activos o Hover: En botones o enlaces secundarios para indicar interactividad.

#E91E63 (Rosa Vibrante – Color de Acento)
    - Dónde usarlo:
        Botones de Llamado a la Acción (CTAs): Ideal para botones importantes, ya que destaca sobre los fondos neutros.
        Enlaces o Íconos Destacados: Para resaltar elementos interactivos o información crítica.
        Elementos de Resalte: Pequeños detalles en banners o secciones promocionales que requieran captar la atención.

  Colores Neutrales
    #FFFFFF (Blanco):
        Fondo Principal: Para mantener claridad y legibilidad en la mayor parte de la web (fondo de páginas, contenedores de texto y formularios).
    #212121 (Gris Oscuro):
        Texto Principal: Para asegurar un alto contraste y facilitar la lectura en fondos claros.
    #F5F5F5 (Gris Claro):
        Fondos de Secciones o Tarjetas: Útil en áreas donde se requiera diferenciar bloques de contenido sin perder uniformidad, 
        como secciones informativas o contenedores de noticias.


---

## Tipografía
  Montserrat (o Alternativamente Nunito) – Para Encabezados y Elementos Destacados
    - Dónde usarla:
        Títulos de Páginas y Secciones: H1, H2, H3, etc. para dar impacto visual y coherencia.
        Menú de Navegación: Para que las opciones sean claras y se destaquen.
        Botones y CTAs: En botones primarios para enfatizar las llamadas a la acción.
            Ejemplo en CSS:
              h1, h2, h3, .nav-item, .btn-primary {
                  font-family: 'Montserrat', sans-serif;
                  font-weight: bold;
              }

  Roboto (o Alternativamente Open Sans o Lato) – Para el Cuerpo del Texto
    Dónde usarla:
      Párrafos y Contenido Extenso: En textos de artículos, descripciones, noticias y recursos educativos para mejorar la legibilidad.
      Etiquetas de Formularios y Contenido Secundario: Donde se requiera claridad sin sobrecargar visualmente.
            Ejemplo en CSS:
              p, li, .body-text, .content {
                  font-family: 'Roboto', sans-serif;
                  font-weight: normal;
              }

---

## Ejemplo de Aplicación en el Diseño Web
  Cabecera y Navegación
    Fondo de la Cabecera: #3F51B5
    Texto del Menú: #FFFFFF (usando Montserrat)
    Enlaces Activos/Hover: Se pueden usar toques de #9C27B0 o #E91E63 para indicar interactividad.
  
  Sección Principal (Home)
    Fondo General de la Página: #FFFFFF
    Títulos de Secciones: #212121 o #3F51B5 (usando Montserrat)
    Texto del Cuerpo: #212121 (usando Roboto)
    Botones (CTA): Fondo #E91E63, texto en #FFFFFF y tipografía Montserrat en negrita.
  
  Secciones de Contenido (Noticias, Educación, Asociaciones)
    Fondos de Contenedores o Tarjetas: #F5F5F5 o #FFFFFF, según el contraste deseado.
    Encabezados de Secciones: Utilizar Montserrat en colores #3F51B5 o #212121.
    Texto de Contenido: Roboto en #212121.
  
  Footer
    Fondo: Se puede optar por #3F51B5 o #212121 para contrastar con el contenido principal.
    Texto: #FFFFFF o #F5F5F5, dependiendo del fondo.
    Tipografía: Roboto para párrafos, Montserrat para títulos o enlaces destacados.

---

# **Resumen**

1. **Contenidos y Funcionalidades**:
   - Noticias, Educación y Asociaciones.
   - Sistema de Login y Gestión de Roles (Admin y Asociación).
2. **Base de Datos**:
   - Tablas `usuarios`, `asociaciones`, `noticias`, `educacion`.
3. **Estructura del Sitio**:
   - Menú adaptable según el usuario.
   - Páginas principales, de administración y de error.