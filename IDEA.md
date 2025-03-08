Cosas que faltan:

- Probar todo

----------------------------------------------------------------------------------------------------------------------------------------------------------

* Contenidos:

1. Noticias: 
Permite mantener actualizada la información sobre avances, eventos y campañas relacionados con el cáncer.

2. Educación: Ofrece recursos que ayuden a la prevención y la comprensión de la enfermedad, lo cual es muy valioso para los usuarios.

3. Asociaciones: Proporciona un espacio para que las asociaciones que luchan contra el cáncer puedan difundir su labor, conectar con 
la comunidad y promover eventos o campañas.

4. Sistema de Login y Gestión de Roles:
Incluir un sistema de autenticación te permite diferenciar entre usuarios generales y administradores.
El administrador podrá actualizar los contenidos (noticias, recursos, asociaciones, etc.), lo cual es fundamental para mantener 
el sitio siempre relevante y actualizado.

5. Enfoque Integral y Social:
Al combinar información educativa con noticias y una red para asociaciones, tu plataforma no solo informa, sino que también promueve 
la colaboración y el apoyo en la lucha contra el cáncer.
Este enfoque multidisciplinario le da un valor añadido al proyecto, mostrando que eres capaz de integrar diferentes funcionalidades en un solo sitio web.

6. Aspecto Técnico y Práctico:
Usar HTML, CSS, JavaScript, MySQL y PHP para implementar la plataforma te permitirá demostrar tus habilidades en el desarrollo web full-stack básico.
La implementación del login y la gestión de sesiones son aspectos clave que suelen valorar en proyectos finales, 
ya que implican un manejo adecuado de la seguridad y la personalización del contenido.

----------------------------------------------------------------------------------------------------------------------------------------------------------

* ATRIBUTOS DE CADA PERFIL:

    - Administrador: 
        - id: Identificador único (clave primaria) para el administrador.
        - nombre completo: Nombre y apellidos para identificarlo.
        - nombre de usuario: (Opcional) Un alias o username para el login.
        - correo electrónico: Email único para la comunicación y autenticación.
        - contraseña: Contraseña encriptada para el acceso seguro.
        - rol: Puede ser un campo que especifique el tipo de usuario; en este caso, "administrador".
            
        - Asociación:
            - id: Identificador único para la asociación.
            - nombre de la asociación: El nombre oficial de la organización.
            - correo electrónico: Email de contacto oficial.
            - contraseña: Contraseña encriptada para la autenticación.
            - descripción: Un breve resumen de la misión, visión y actividades de la asociación.
            - logotipo o imagen representativa: Para identificar visualmente a la asociación en la plataforma.
            - dirección: Ubicación física (opcional, pero útil si la asociación tiene sede).
            - teléfono de contacto: Número de teléfono para consultas o información adicional.
            - sitio web y redes sociales: Enlaces a sus plataformas digitales para ampliar la información y facilitar la comunicación.

* ROLES:

    - Administrador: 
    
        - Acceso completo a la plataforma.
        - Panel de Control:
            - Gestión de Contenidos:
                Crear, editar y eliminar noticias, artículos educativos, información de asociaciones y cualquier otro contenido.
            - Gestión de Usuarios:
                Suspender cuentas de usuarios registrados.
            - Asignar roles a los usuarios (por ejemplo, convertir un usuario en moderador o editor).
            
       
    - Asociación:

        - Acceso a una Sección Dedicada:
        - Perfil especializado para asociaciones en contra del cáncer.
        - Pueden publicar información sobre eventos, campañas, o proyectos de concienciación.
        - Gestión de Contenidos:
            Crear y actualizar su sección dentro de la plataforma, su descripción, noticias propias o iniciativas.
        Interacción:
        Participar en foros o espacios colaborativos relacionados con campañas y eventos.
        - Limitaciones:
            Su acceso se centraría en su área de contenido; por ejemplo, no podrán gestionar el resto de la plataforma ni modificar contenido que no sea suyo.

----------------------------------------------------------------------------------------------------------------------------------------------------------

* Tablas SQL:

1. Tabla: usuarios
    Esta tabla contendrá la información básica de los usuarios que pueden iniciar sesión (es decir, las asociaciones y el administrador).
    Campos sugeridos:

    id (INT, PRIMARY KEY, AUTO_INCREMENT): Identificador único del usuario.
    email (VARCHAR, UNIQUE): Correo electrónico para el login.
    password (VARCHAR): Contraseña encriptada.
    rol (ENUM('admin', 'asociacion')): Define si el usuario es el administrador o una asociación.
    nombre (VARCHAR): Nombre del administrador o persona de contacto; en el caso de las asociaciones, se podría dejar información básica.
    created_at (TIMESTAMP): Fecha y hora de creación del registro.
    updated_at (TIMESTAMP): Fecha y hora de la última actualización del registro.

2. Tabla: asociaciones
    Esta tabla se utiliza para almacenar información específica de las asociaciones registradas. Se relaciona con la tabla usuarios mediante el campo usuario_id.
    Campos sugeridos:

    id (INT, PRIMARY KEY, AUTO_INCREMENT): Identificador único de la asociación.
    usuario_id (INT, FOREIGN KEY): Hace referencia al id en la tabla usuarios.
    nombre_asociacion (VARCHAR): Nombre oficial de la asociación.
    descripcion (TEXT): Breve descripción de la misión, visión y actividades de la asociación.
    logotipo (VARCHAR): Ruta o URL de la imagen representativa (logotipo).
    direccion (VARCHAR): Dirección física de la asociación (opcional).
    telefono (VARCHAR): Número de contacto.
    sitio_web (VARCHAR): URL del sitio web de la asociación.
    created_at (TIMESTAMP)
    updated_at (TIMESTAMP)

3. Tabla: noticias
    Esta tabla almacena las noticias relacionadas con avances, eventos y campañas sobre el cáncer.
    Campos sugeridos:

    id (INT, PRIMARY KEY, AUTO_INCREMENT): Identificador único de la noticia.
    titulo (VARCHAR): Título de la noticia.
    contenido (TEXT): Contenido completo o artículo de la noticia.
    imagen (VARCHAR): Ruta o URL de la imagen destacada.
    fecha_publicacion (DATETIME): Fecha en la que se publicó la noticia.
    autor_id (INT, FOREIGN KEY): Puede referenciar el id del usuario (por ejemplo, el administrador o alguna asociación que publique la noticia).
    estado (ENUM('publicado','borrador')): Permite gestionar el flujo de publicación.

4. Tabla: educacion
    Esta tabla contendrá el contenido educativo (artículos, infografías, vídeos, etc.) destinados a la prevención y comprensión de la enfermedad.
    Campos sugeridos:

    id (INT, PRIMARY KEY, AUTO_INCREMENT): Identificador único del recurso.
    titulo (VARCHAR): Título del recurso.
    contenido (TEXT): Contenido descriptivo o instructivo.
    tipo (ENUM('articulo', 'video', 'infografia')): Tipo de recurso para poder filtrarlo.
    url (VARCHAR): Enlace externo, en caso de que el recurso sea un vídeo o un documento alojado en otra parte.
    imagen (VARCHAR): Ruta o URL de una imagen o miniatura representativa.
    fecha_publicacion (DATETIME): Fecha en que se publicó el recurso.
    estado (ENUM('publicado','borrador')): Para gestionar la visibilidad del recurso.

5. Consideraciones Adicionales

        - Relaciones e Integridad:
            La tabla asociaciones se relaciona con usuarios mediante el campo usuario_id.
            En noticias, el campo autor_id se puede relacionar con usuarios para identificar quién publica la noticia.

        - Seguridad:
            Utilizar consultas preparadas en PHP para evitar inyecciones SQL.
            Almacenar las contraseñas utilizando funciones de encriptación como password_hash().


----------------------------------------------------------------------------------------------------------------------------------------------------------

* Componente NAV:

    - Menú de Navegación Para Visitantes (Usuarios No Registrados)
        - El menú público, visible para cualquier visitante, puede incluir las siguientes opciones:

            1. Inicio:
                Regresa a la página principal, que ofrece una visión general de las secciones más importantes.

            2. Noticias:
                Acceso a la sección donde se publican las últimas novedades sobre avances, eventos y campañas relacionadas con el cáncer.
        
            3. Educación:
                Espacio con recursos educativos, artículos, infografías y vídeos de prevención y comprensión de la enfermedad.
    
            4. Asociaciones:
                Directorio y presentación de las asociaciones que colaboran en la lucha contra el cáncer, 
                mostrando información básica y, si procede, algún testimonio o historia de éxito.

            5. Iniciar Sesión / Registro:
                Enlace para que las asociaciones o el administrador puedan acceder a su panel de gestión.
                Nota: Al hacer clic, se dirigirá a una página de login. Luego de autenticarse, 
                dependiendo de su rol, se redirigirá a un panel específico (Panel de Administración para el admin o Panel de Asociación para las asociaciones).

    - Menú para Usuarios Autenticados:
        Una vez que se haya iniciado sesión, el menú puede modificarse para mostrar opciones específicas según el rol:

        * Si es Administrador:
            -Panel de Administración: Acceso a la gestión de contenidos (noticias, educación, asociaciones) y usuarios.
            -Cerrar Sesión.
        
        * Si es una Asociación:
            -Mi Perfil/Panel de Asociación: Donde pueden actualizar su información, publicar eventos o noticias propias, 
            y gestionar su contenido dentro de la sección de asociaciones.
            -Cerrar Sesión.
        Consejo: Mantén la opción de "Inicio", "Noticias" y "Educación" accesibles para que, incluso en el panel, 
        puedan navegar fácilmente por el contenido público.
        Paneles de Gestión:
        Una vez autenticados, los usuarios (administrador o asociaciones) contarán con su panel privado donde podrán actualizar su información, 
        publicar contenido propio o gestionar secciones de la plataforma.

----------------------------------------------------------------------------------------------------------------------------------------------------------

* Página Principal (Home)
    La página principal debe ser accesible a todo público y estar diseñada para resaltar la información y recursos de la plataforma. 
    Una posible estructura es:

    1. Header / Cabecera:
        Logo y Nombre de la Plataforma: Para reforzar la identidad.
        Menú de Navegación: Con las opciones mencionadas anteriormente.
        Barra de Búsqueda: Para facilitar el acceso rápido a noticias o artículos.
    2. Banner o Slider Principal:
        Imagen o Carrusel de Imágenes: Destacando campañas de concienciación, avances importantes o eventos próximos.
        Llamados a la Acción (CTAs):
        Un botón "Leer más" que dirija a las noticias o campañas destacadas.
        Un botón "Asóciate" o "Inicia Sesión" que invite a las asociaciones y al administrador a ingresar.
    3. Sección de Noticias Destacadas
        Contenido Visual y Resumido: Presenta las últimas noticias con imágenes, títulos y extractos breves.
        Botón "Ver todas las noticias": Redirige a la página completa de noticias.
    4. Sección de Educación
        Recursos y Artículos: Muestra algunos recursos destacados (artículos, infografías o vídeos) orientados a la prevención y la comprensión del cáncer.
        Botón "Más recursos": Enlace a la sección educativa completa.
    5. Sección de Asociaciones
        Presentación Destacada: Muestra un carrusel o un listado de algunas asociaciones participantes, con su logotipo, nombre y breve descripción.
        Botón "Conoce todas las asociaciones": Permite al usuario acceder a la página con el directorio completo y más información sobre cada organización.
    6. Footer / Pie de Página
        Información de Contacto: Datos de contacto, direcciones de redes sociales, correo, etc.
        Enlaces Secundarios: Política de privacidad, términos de uso, FAQ, etc.
        Créditos y Agradecimientos: Información sobre el equipo o colaboraciones, si aplica.

* Página de Noticias
    Contenido y Funciones:

        Listado de Noticias:
            Muestra de todas las noticias publicadas, ordenadas cronológicamente o categorizadas (Avances, Eventos, Campañas).
            Cada noticia con imagen, título, resumen y fecha de publicación.

        Filtros/Categorías:
            Opciones para filtrar o buscar noticias por tema o fecha.

        Detalle de Noticia:
            Al hacer clic en una noticia, se abrirá una página individual que muestre el contenido completo de la noticia, 
            imágenes adicionales, enlaces relacionados y, si aplica, opciones de compartir en redes sociales.
        
* Página de Educación
    Contenido y Funciones:

        Listado de Recursos Educativos:
            Artículos, guías, vídeos, infografías y otros materiales.
            Opciones de filtrado o categorías (por ejemplo, “Prevención”, “Tratamientos”, “Investigación”).
        
        Detalle de Recurso:
            Página individual para cada recurso, con el contenido completo, imágenes, 
            enlaces a fuentes o descargas de material adicional (por ejemplo, e-books o manuales).
    
        Llamados a la Acción:
            Invitación a profundizar en determinados temas, con enlaces a recursos relacionados o complementarios.

* Página de Asociaciones (Directorio)
    Contenido y Funciones:

        Listado de Asociaciones:
            Directorio visual con tarjetas para cada asociación que incluya su logotipo, nombre y una breve descripción.
            Filtros o búsqueda para localizar asociaciones por ubicación, área de acción o nombre.

        Detalle de Asociación:
            Página individual que muestre:
                Información completa de la asociación (descripción, misión, datos de contacto).
                Enlaces a su sitio web y redes sociales.
                Publicaciones o noticias propias, si la asociación ha publicado contenido en la plataforma.
                Eventos o campañas próximas.

        Testimonios o Historias de Éxito (Opcional):
            Sección con casos de impacto o colaboración con la comunidad.

*  Página de Login/Registro
    Contenido y Funciones:

        Formulario de Inicio de Sesión:
            Campos para correo electrónico y contraseña.
            Enlace para recuperar contraseña en caso de olvido.
            Formulario de Registro (para Asociaciones y, si fuera necesario, para el Administrador):

        Campos requeridos formulario registro asociacion: 
            nombre de la asociación o nombre del usuario, correo electrónico, contraseña (y confirmación), 
            descripción breve (en el caso de asociaciones) y otros datos de contacto (teléfono, dirección, sitio web, etc.).

        Notas:
            Solo las asociaciones y el administrador se registran; el resto de los visitantes ven contenido público sin autenticarse.
            Tras autenticarse, se redirige según el rol: panel de asociación o panel de administración.
            Validación y mensajes de retroalimentación en formularios.

* Página Panel de Administración (Área Privada para el Administrador)
    Contenido y Funciones:

        Dashboard Principal:
            Resumen de la actividad de la plataforma (número de noticias publicadas, actualizaciones, estadísticas de visitas, etc.).
        
        Gestión de Contenidos:
            Secciones para crear, editar y eliminar noticias, artículos educativos y páginas del directorio de asociaciones.
        
        Gestión de Usuarios:
            Lista de asociaciones registradas.
            Opciones para aprobar, suspender o editar la información de cada asociación.
            Asignar o modificar roles (por ejemplo, designar a un colaborador o moderador si se implementa en el futuro).
                
        Cierre de Sesión:
            Opción para cerrar la sesión de administrador.

* Página Panel de Asociación (Área Privada para Asociaciones Registradas)
    Contenido y Funciones:

        Perfil de la Asociación:
            Información básica editable: nombre, descripción, datos de contacto, logotipo, etc.
        
        Gestión de Contenido Propio:
            Sección para publicar y actualizar noticias, eventos o campañas propias de la asociación.
            Opciones para subir imágenes, establecer fechas de eventos y vincular a recursos externos.
        
        Herramientas de Comunicación:
            Posible integración de mensajes o formularios de contacto para que la comunidad pueda comunicarse directamente con la asociación.
        
        Cierre de Sesión:
            Botón para cerrar sesión y volver a la vista pública.

* Páginas de Términos y Condiciones / Política de Privacidad
    Por qué:
        Aunque no es estrictamente necesario en un proyecto de fin de curso, incluir estas páginas puede mostrar 
        una mayor preocupación por la seguridad y la transparencia, sobre todo al tratarse de información sensible 
        (aunque la mayor parte del contenido sea público).

    Contenido Sugerido:
        Un resumen de las políticas de uso y protección de datos del usuario.

* Páginas de Error (por ejemplo, 404)
    Por qué:
        Mejoran la experiencia del usuario al informar de forma clara y amigable si una página no se encuentra o ha ocurrido algún error.

    Contenido Sugerido:
        Un mensaje claro de error y enlaces para regresar a la página de inicio u otras secciones relevantes.
        Diseño coherente con el resto del sitio.

----------------------------------------------------------------------------------------------------------------------------------------------------------

* RESUMEN

1. Contenidos y Funcionalidades Principales:

    - Noticias: Página de listado y detalle de noticias sobre avances, eventos y campañas.
    - Educación: Sección con recursos (artículos, infografías, vídeos) para la prevención y comprensión del cáncer.
    - Asociaciones: Directorio y páginas de detalle para que cada asociación presente su labor, 
        incluyendo información completa (descripción, logotipo, contacto, etc.).
    - Sistema de Login y Gestión de Roles:
    - Solo dos tipos de usuarios registrados: Administrador y Asociación.
    - El Administrador tiene un panel de control para gestionar contenidos y usuarios.
    - Las Asociaciones tienen su panel para gestionar su perfil y publicar contenido propio.

2. Atributos de Cada Perfil:

    - Administrador: Incluye id, nombre, correo, contraseña, rol, etc.
    - Asociación: Incluye id, nombre de la asociación, correo, contraseña, descripción, logotipo, dirección, teléfono, sitio web y redes sociales.

3. Estructura de la Base de Datos:

    - Tabla usuarios: Información básica para el login (id, email, password, rol, nombre, created_at, updated_at).
    - Tabla asociaciones: Información específica de las asociaciones (usuario_id como FK, nombre_asociacion, descripción, logotipo, dirección, teléfono, sitio_web, created_at, updated_at).
    - Tabla noticias: Noticias con campos para título, contenido, imagen, fecha_publicacion, autor_id, estado.
    - Tabla educacion: Recursos educativos con campos para título, contenido, tipo, url, imagen, fecha_publicacion, estado.

4. Componentes del Sitio y Navegación:

    - Menú de Navegación Público: Incluye Inicio, Noticias, Educación, Asociaciones y Login/Registro.
    - Menú para Usuarios Autenticados: Se adapta según el rol (Administrador o Asociación), 
      mostrando enlaces al panel de control o panel de asociación, respectivamente.
    
    - Estructura de Páginas:
        - Página Principal (Home): Con header, banner/slider, secciones de noticias, educación, 
            asociaciones y footer con enlaces secundarios (política de privacidad, términos, etc.).
        - Página de Noticias: Listado, filtros y página de detalle de cada noticia.
        - Página de Educación: Listado de recursos y detalle individual.
        - Página de Asociaciones (Directorio): Listado de asociaciones y páginas de detalle.
        - Página de Login/Registro: Formularios para inicio de sesión y registro (solo asociaciones y administrador).
        - Panel de Administración: Dashboard, gestión de contenidos y usuarios, cierre de sesión.
        - Panel de Asociación: Perfil editable, gestión de contenido propio y cierre de sesión.
        - Páginas Adicionales: Páginas de Términos y Condiciones/Política de Privacidad y Páginas de Error (404), para mejorar la experiencia del usuario.