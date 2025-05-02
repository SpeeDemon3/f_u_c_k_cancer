# 🎗️ F.U.C.K Cancer (Fight Until Cancer Kicks)

**Plataforma web para asociaciones contra el cáncer** que facilita la gestión de pacientes, tratamientos y recursos educativos.

## 🌟 Características Principales

✅ Sistema completo de autenticación (usuarios/asociaciones)  
✅ Gestión de noticias y eventos sobre cáncer  
✅ Directorio interactivo de asociaciones  
✅ Panel de administración con estadísticas  
✅ Sistema de donaciones integrado  

![GitHub repo size](https://img.shields.io/github/repo-size/SpeeDemon3/f_u_c_k_cancer)
![GitHub license](https://img.shields.io/github/license/SpeeDemon3/f_u_c_k_cancer?color=blue)
![Made with](https://img.shields.io/badge/PHP-8.0+-purple)
![Status](https://img.shields.io/badge/status-en%20desarrollo-yellow)

---

## 🚀 Instalación y Configuración

### Requisitos previos
- PHP 8.0+
- MySQL 5.7+ o MariaDB
- Servidor web (Apache/Nginx)
- Git (para clonación)

### Pasos de instalación

1. **Clonar repositorio**:

```bash
git clone https://github.com/SpeeDemon3/f_u_c_k_cancer.git
cd f_u_c_k_cancer

# Configurar base de datos:
mysql -u [usuario] -p [nombre_bd] < bd/bd_contra_cancer.sql

## 📁 Estructura del Proyecto

```plaintext
f_u_c_k_cancer/
├── bd/                  # Scripts SQL y backups
│   └── bd_contra_cancer.sql
├── css/                 # Estilos CSS
├── functions/           # Funciones PHP reutilizables
├── img/                 # Assets visuales
│   ├── logo-asociacion/ # Logos de asociaciones
│   └── noticias/        # Imágenes de noticias
├── js/                  # JavaScript
├── login/               # Sistema de autenticación
├── pages/               # Vistas principales
│   ├── asociaciones-web/
│   └── noticias/
├── index.php            # Punto de entrada
└── LICENSE              # Licencia GPL-3.0

---

## ⚙️ Tecnologías Utilizadas

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Backend**: PHP nativo (sin frameworks)
- **Base de Datos**: MySQL
- **Control de Versiones**: Git
- **Seguridad**: Autenticación personalizada
- **Entorno de Desarrollo**: Visual Studio Code

---

## 👥 Usuarios de Prueba

| Rol           | Email                       | Contraseña         |
|---------------|-----------------------------|---------------------|
| Administrador | admin@gmail.com             | Password12345!6     |
| Asociación    | aContraelCancer@gmail.com   | Password12345!6     |
| Usuario       | test@test.com               | Password12345!6     |

---

## 🛡️ Licencia

Este proyecto está bajo la licencia GPL-3.0.  
Consulta el archivo [LICENSE](./LICENSE) para más información.

---

## 🤝 Contribuciones

¿Quieres mejorar este proyecto? ¡Las contribuciones son bienvenidas!

1. Haz un fork.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios.
4. Haz commit (`git commit -m 'Descripción breve'`).
5. Sube la rama (`git push origin feature/nueva-funcionalidad`).
6. Abre un Pull Request.
