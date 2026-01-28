# DevWebCamp - Sistema de Gestión de Conferencias y Eventos

Sistema web para la gestión de conferencias y workshops de desarrollo web, desarrollado con PHP 8 siguiendo el patrón MVC.

## Características

- **Autenticación de usuarios**: Registro, login, logout y recuperación de contraseña
- **Confirmación por email**: Verificación de cuenta y recuperación de contraseña via SMTP
- **Panel de administración**: Dashboard con estadísticas, ingresos y registros recientes
- **Gestión de ponentes**: CRUD completo con soporte para imágenes y redes sociales
- **Gestión de eventos**: Creación de conferencias y workshops con horarios y disponibilidad
- **Sistema de registro**: Múltiples paquetes (gratis, presencial, virtual)
- **Integración con PayPal**: Procesamiento de pagos para paquetes premium
- **Sistema de regalos**: Selección de regalos para asistentes presenciales
- **Paginación**: Navegación eficiente en listados extensos
- **Mapa interactivo**: Ubicación del evento con Leaflet
- **Slider de eventos**: Carrusel con Swiper.js
- **Animaciones**: Efectos de scroll con AOS (Animate On Scroll)
- **Interfaz responsiva**: Diseño adaptable con SASS y metodología BEM

## Requisitos

- PHP 8.0 o superior
- MySQL 5.7 o superior
- Composer
- Node.js y npm
- Servidor web (Apache/Nginx)
- Extensión GD o Imagick para procesamiento de imágenes

## Instalación

1. Clonar el repositorio

```bash
git clone https://github.com/mateopavoni/devwebcamp.git
cd devwebcamp
```

2. Instalar dependencias PHP

```bash
composer install
```

3. Instalar dependencias Node

```bash
npm install
```

4. Configurar variables de entorno

```bash
cp .env.example .env
```

5. Editar `.env` con los datos de tu entorno:

```
DB_HOST=localhost
DB_USER=tu_usuario
DB_PASS=tu_contraseña
DB_NAME=devwebcamp

MAIL_MAILER=smtp
MAIL_HOST=smtp.ejemplo.com
MAIL_PORT=2525
MAIL_USERNAME=tu_usuario_smtp
MAIL_PASSWORD=tu_contraseña_smtp
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=correo@tudominio.com
MAIL_FROM_NAME=DevWebCamp

HOST=http://localhost:3000
```

6. Crear la base de datos con las tablas necesarias (usuarios, ponentes, eventos, categorias, dias, horas, paquetes, registros, regalos, eventos_registros)

7. Compilar assets

```bash
npm run dev
```

8. Configurar el servidor web para apuntar a `/public`

## Estructura del Proyecto

```
├── classes/          # Clases auxiliares (Email, Paginacion)
├── controllers/      # Controladores MVC
│   ├── APIEventos.php
│   ├── APIPonentes.php
│   ├── APIRegalos.php
│   ├── AuthController.php
│   ├── DashboardController.php
│   ├── EventosController.php
│   ├── PaginasController.php
│   ├── PonentesController.php
│   ├── RegalosController.php
│   ├── RegistradosController.php
│   └── RegistroController.php
├── includes/         # Archivos de configuración y funciones
├── models/           # Modelos ActiveRecord
│   ├── ActiveRecord.php
│   ├── Usuario.php
│   ├── Ponente.php
│   ├── Evento.php
│   ├── Categoria.php
│   ├── Dia.php
│   ├── Hora.php
│   ├── Paquete.php
│   ├── Registro.php
│   └── Regalo.php
├── public/           # Punto de entrada y assets compilados
├── src/              # Código fuente
│   ├── scss/         # Estilos SASS organizados por módulos
│   │   ├── admin/    # Estilos del panel de administración
│   │   ├── base/     # Variables, mixins y tipografía
│   │   ├── paginas/  # Estilos de páginas públicas
│   │   ├── registro/ # Estilos de registro
│   │   └── ui/       # Componentes UI (header, footer, formularios)
│   └── js/           # JavaScript modular
├── views/            # Vistas PHP
│   ├── admin/        # Vistas del panel de administración
│   ├── auth/         # Vistas de autenticación
│   ├── paginas/      # Vistas públicas
│   ├── registro/     # Vistas de registro de usuarios
│   └── templates/    # Plantillas reutilizables
├── Router.php        # Sistema de enrutamiento
├── composer.json     # Dependencias PHP
├── package.json      # Dependencias Node
└── gulpfile.js       # Configuración de Gulp
```

## Rutas Principales

### Públicas

- `/` - Página de inicio con resumen del evento
- `/devwebcamp` - Información sobre el evento
- `/paquetes` - Comparación de paquetes disponibles
- `/workshops-conferencias` - Listado de conferencias y workshops

### Autenticación

- `/login` - Iniciar sesión
- `/registro` - Crear cuenta
- `/logout` - Cerrar sesión
- `/olvide` - Recuperación de contraseña
- `/reestablecer` - Reestablecer contraseña
- `/confirmar-cuenta` - Confirmación de cuenta
- `/mensaje` - Mensaje de cuenta creada

### Registro de Asistentes

- `/finalizar-registro` - Selección de paquete
- `/finalizar-registro/gratis` - Registro gratuito
- `/finalizar-registro/pagar` - Procesamiento de pago
- `/finalizar-registro/conferencias` - Selección de eventos (pase presencial)
- `/boleto` - Visualización del boleto

### Panel de Administración

- `/admin/dashboard` - Dashboard con estadísticas
- `/admin/ponentes` - Gestión de ponentes
- `/admin/ponentes/crear` - Crear ponente
- `/admin/ponentes/editar` - Editar ponente
- `/admin/ponentes/eliminar` - Eliminar ponente
- `/admin/eventos` - Gestión de eventos
- `/admin/eventos/crear` - Crear evento
- `/admin/eventos/editar` - Editar evento
- `/admin/eventos/eliminar` - Eliminar evento
- `/admin/registrados` - Listado de usuarios registrados
- `/admin/regalos` - Gráfica de regalos seleccionados

## API REST

- `GET /api/eventos-horario` - Obtener eventos por día y categoría
- `GET /api/ponentes` - Listar todos los ponentes
- `GET /api/ponente?id=` - Obtener ponente por ID
- `GET /api/regalos` - Listar regalos con totales (solo admin)

## Tecnologías

- **Backend**: PHP 8, MVC Pattern, PSR-4 Autoloading
- **Base de datos**: MySQL con ActiveRecord personalizado
- **Frontend**: HTML5, SASS (BEM), JavaScript ES6+
- **Build Tools**: Gulp, Webpack, PostCSS, Autoprefixer
- **Librerías PHP**: PHPMailer, vlucas/phpdotenv, Intervention/Image
- **Librerías JS**: SweetAlert2, Swiper.js, Chart.js
- **Mapas**: Leaflet.js con OpenStreetMap
- **Animaciones**: AOS (Animate On Scroll)
- **Pagos**: PayPal SDK

## Seguridad

- Contraseñas hasheadas con bcrypt (PASSWORD_BCRYPT)
- Tokens únicos para confirmación de cuenta y recuperación de contraseña
- Sanitización de datos con `htmlspecialchars`
- Escape de consultas SQL con `mysqli_real_escape_string`
- Sesiones PHP para autenticación
- Validación de formularios en backend
- Verificación de rol de administrador para rutas protegidas
- Validación de IDs con `FILTER_VALIDATE_INT`

## Autor

Mateo Pavoni - mateopavoni905@gmail.com
