# TechSolutionsCRM

Este proyecto es un sistema de gestión de tasaciones que permite a los usuarios crear, editar, y gestionar solicitudes de tasación de propiedades. El sistema está construido con el framework Laravel y utiliza una base de datos SQLite para el almacenamiento de datos.

## Requisitos Previos

Asegúrate de tener instalados los siguientes requisitos en tu máquina:

- [PHP](https://www.php.net/downloads) (>= 7.4)
- [Composer](https://getcomposer.org/download/)
- [XAMPP](https://www.apachefriends.org/index.html) (opcional para servidores locales)

## Instalación

Sigue estos pasos para configurar y ejecutar el proyecto en tu entorno local.

1. **Clona el repositorio:**

   ```bash
   git clone https://github.com/javilm10/TechCrm.git
   cd TechSolutionsCRM
   ```

2. **Instala las dependencias del proyecto:**

   ```bash
   composer install
   ```

3. **Copia el archivo de ejemplo de configuración:**

   ```bash
   cp .env.example .env
   ```

   Si estás usando Windows y el comando `cp` no funciona, puedes crear el archivo manualmente:

   ```bash
   copy .env.example .env
   ```

4. **Genera la clave de la aplicación:**

   ```bash
   php artisan key:generate
   ```

5. **Configura la base de datos:**

   Abre el archivo `.env` y asegúrate de que la configuración de la base de datos sea la siguiente para usar SQLite:

   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/ruta/a/tu/base_de_datos.sqlite
   ```

   Si no tienes una base de datos SQLite, puedes crear una vacía en la ruta especificada.

6. **Ejecuta las migraciones para crear las tablas necesarias:**

   ```bash
   php artisan migrate
   ```

7. **Inicia el servidor de desarrollo:**

   ```bash
   php artisan serve
   ```

   Ahora, deberías poder acceder a la aplicación en `http://localhost:8000`.

## Uso

1. **Registro y autenticación:**
   - Puedes registrarte y autenticarte en la aplicación.
   - El sistema permite crear y gestionar tasaciones una vez que estés autenticado.

2. **Gestión de Tasaciones:**
   - Puedes crear nuevas tasaciones mediante el formulario de creación.
   - Las tasaciones pueden ser editadas y eliminadas según sea necesario.
   - El historial de cambios en cada tasación es almacenado.

## Estructura de Archivos

- `app/Models/`: Contiene los modelos de Eloquent para las entidades de la aplicación.
- `app/Http/Controllers/`: Contiene los controladores que manejan la lógica de la aplicación.
- `resources/views/`: Contiene las vistas de Blade que son renderizadas por los controladores.

## Contribuciones

Las contribuciones son bienvenidas. Si tienes sugerencias o mejoras, por favor abre un issue o envía un pull request.

## Licencia

Este proyecto está licenciado bajo la [MIT License](LICENSE).

