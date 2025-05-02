# 🎗️ F.U.C.K Cancer 

![Logo del Proyecto](img/logo-web.jpg)


**Plataforma web para asociaciones contra el cáncer** que facilita la gestión de asociaciones, noticias, tratamientos y recursos educativos.
**Web platform for cancer associations** that facilitates the management of associations, news, treatments, and educational resources.


## 🌟 Características Principales / 🌟 Key Features

✅ Sistema completo de autenticación (usuarios/asociaciones) / Complete authentication system (users/associations)  
✅ Gestión de noticias y eventos sobre cáncer / Management of cancer-related news and events 
✅ Directorio interactivo de asociaciones / Interactive directory of associations 
✅ Panel de administración / Admin panel 
✅ Panel de asociaciones / Association panel 

![GitHub repo size](https://img.shields.io/github/repo-size/SpeeDemon3/f_u_c_k_cancer)
![GitHub license](https://img.shields.io/github/license/SpeeDemon3/f_u_c_k_cancer?color=blue)
![Made with](https://img.shields.io/badge/PHP-8.0+-purple)
![Status](https://img.shields.io/badge/status-en%20desarrollo-yellow)

---

## 🚀 Instalación y Configuración / Installation and Setup

### Requisitos previos / Prerequisites
- PHP 8.0+
- MySQL 5.7+ o MariaDB
- Servidor web (Apache/Nginx)
- Git (para clonación)

### Pasos de instalación / Installation Steps

1. **Clonar repositorio / Clone the repository**:

```bash
git clone https://github.com/SpeeDemon3/f_u_c_k_cancer.git
cd f_u_c_k_cancer

# Configurar base de datos / Configure the database::
mysql -u [usuario] -p [nombre_bd] < bd/base_datos.sql

## 📁 Estructura del Proyecto / 📁 Project Structure

```
f_u_c_k_cancer/
├── bd/                  # Scripts SQL y backups / SQL scripts and backups
│   └── base_datos.sql
├── css/                 # Estilos CSS / CSS styles
├── functions/           # Funciones PHP reutilizables / Reusable PHP functions
├── img/                 # Assets visuales / Visual assets
│   ├── logo-asociacion/ # Logos de asociaciones / Association logos
│   └── noticias/        # Imágenes de noticias / News images
├── js/                  # JavaScript
├── login/               # Sistema de autenticación
├── pages/               # Vistas principales / Authentication system
│   ├── asociaciones-web/
│   └── noticias/
├── index.php            # Punto de entrada / Entry point
└── LICENSE              # Licencia GPL-3.0 / GPL-3.0 License
```
---

## ⚙️ Tecnologías Utilizadas / ⚙️ Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Backend**: PHP nativo (sin frameworks) / Native PHP (no frameworks)
- **Base de Datos / Database**: MySQL
- **Control de Versiones / Version Control**: Git
- **Seguridad / Security**: Autenticación personalizada / Custom authentication
- **Entorno de Desarrollo / Development Environment**: Visual Studio Code

---

## 👥 Usuarios de Prueba / 👥 Test Users

| Rol           | Email                       | Contraseña         |
|---------------|-----------------------------|---------------------|
| Administrador | admin@gmail.com             | Password12345!6     |
| Asociación    | aContraelCancer@gmail.com   | Password12345!6     |
| Usuario       | test@test.com               | Password12345!6     |

---

## 🛡️ Licencia / 🛡️ License

Este proyecto está bajo la licencia GPL-3.0.  
This project is licensed under the GPL-3.0 license.

Consulta el archivo [LICENSE](./LICENSE) para más información.
See the LICENSE file for more details.

---

## 🤝 Contribuciones / 🤝 Contributing

¿Quieres mejorar este proyecto? ¡Las contribuciones son bienvenidas!
Want to improve this project? Contributions are welcome!


1. Haz un fork. / Fork the repository.
2. Crea una nueva rama / Create a new branch (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios. / Make your changes.
4. Haz commit / Commit your changes (`git commit -m 'Descripción breve'`).
5. Sube la ram / Push the branch (`git push origin feature/nueva-funcionalidad`).
6. Abre un Pull Request. / Open a Pull Request.
