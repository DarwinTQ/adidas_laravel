# 🏃‍♀️ Adidas Logística - Sistema de Gestión Logística

<p align="center">
  <a href="#english">
    <img src="https://img.shields.io/badge/🇺🇸_English-Click_Here-blue?style=for-the-badge&logo=translate" alt="English Version">
  </a>
  <a href="#español">
    <img src="https://img.shields.io/badge/🇪🇸_Español-Ver_Aquí-green?style=for-the-badge&logo=translate" alt="Versión en Español">
  </a>
</p>

---

## <a id="español"></a>🇪🇸 Versión en Español

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-9.52.20-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.0.30-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/CSS3-Glassmorphism-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
</p>

<p align="center">
  <strong>Sistema integral de gestión logística desarrollado con Laravel para Adidas</strong>
</p>

## 🚀 Descripción del Proyecto

**Adidas Logística** es un sistema web completo diseñado para gestionar operaciones logísticas de manera eficiente y moderna. El proyecto incluye gestión de pedidos, envíos, clientes, productos y repartidores con una interfaz de usuario elegante basada en glassmorphism.

### ✨ Características Principales

- 📊 **Dashboard Interactivo** - Estadísticas en tiempo real y métricas clave
- 🚚 **Gestión de Envíos** - Control completo del estado de envíos
- 🛒 **Gestión de Pedidos** - Administración de órdenes y detalles
- 👥 **Gestión de Clientes** - Base de datos completa de clientes
- 📦 **Gestión de Productos** - Catálogo y control de inventario
- 🏍️ **Gestión de Repartidores** - Administración del personal de entrega
- 🔍 **Sistema de Búsqueda** - Búsqueda por ID en todas las secciones
- 🎨 **Interfaz Moderna** - Diseño glassmorphism con colores profesionales
- 📱 **Diseño Responsive** - Compatible con todos los dispositivos

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 9.52.20** - Framework PHP robusto
- **PHP 8.0.30** - Lenguaje de programación
- **MySQL** - Base de datos relacional
- **Eloquent ORM** - Mapeo objeto-relacional

### Frontend
- **Blade Templates** - Motor de plantillas de Laravel
- **CSS3 Avanzado** - Glassmorphism, gradientes animados, backdrop-filter
- **Font Awesome 6.0** - Iconografía moderna
- **JavaScript Vanilla** - Funcionalidades interactivas

### Base de Datos
- **adidas_logistica** - Base de datos principal con estructura relacional completa

## 🏗️ Estructura del Proyecto

### Modelos de Datos
```
📁 app/Models/
├── Cliente.php      # Gestión de clientes
├── Pedido.php       # Órdenes de compra
├── Producto.php     # Catálogo de productos
├── Envio.php        # Control de envíos
├── Repartidor.php   # Personal de entrega
├── DetallePedido.php # Detalles de cada pedido
└── User.php         # Usuarios del sistema
```

### Controladores
```
📁 app/Http/Controllers/
└── LogisticaController.php  # Controlador principal con funciones de búsqueda
```

### Vistas
```
📁 resources/views/
├── layouts/
│   └── app.blade.php           # Layout principal con diseño glassmorphism
└── logistica/
    ├── dashboard.blade.php     # Panel de control con estadísticas
    ├── envios.blade.php        # Gestión de envíos con búsqueda
    ├── pedidos.blade.php       # Gestión de pedidos con búsqueda
    ├── clientes.blade.php      # Gestión de clientes con búsqueda
    ├── productos.blade.php     # Gestión de productos con búsqueda
    └── repartidores.blade.php  # Gestión de repartidores con búsqueda
```

### Base de Datos
```sql
🗄️ adidas_logistica
├── clientes         # Información de clientes
├── productos        # Catálogo de productos Adidas
├── pedidos          # Órdenes de compra
├── detalle_pedidos  # Detalles específicos de cada pedido
├── envios           # Control de envíos y estados
└── repartidores     # Personal de entrega
```

## 🚀 Instalación y Configuración

### Prerrequisitos
- PHP >= 8.0
- Composer
- MySQL
- Servidor web (Apache/Nginx) o XAMPP

### Pasos de Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/DarwinTQ/adidas_laravel.git
cd adidas_laravel
```

2. **Instalar dependencias**
```bash
composer install
```

3. **Configurar el archivo de entorno**
```bash
cp .env.example .env
```

4. **Configurar la base de datos en `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adidas_logistica
DB_USERNAME=root
DB_PASSWORD=
```

5. **Generar la clave de la aplicación**
```bash
php artisan key:generate
```

6. **Crear la base de datos**
- Crear la base de datos `adidas_logistica` en MySQL
- Importar la estructura de datos necesaria

7. **Ejecutar migraciones (si están disponibles)**
```bash
php artisan migrate
```

8. **Iniciar el servidor de desarrollo**
```bash
php artisan serve
```

El sistema estará disponible en: `http://127.0.0.1:8000/logistica`

## 📊 Funcionalidades del Sistema

### Dashboard Principal
- **Métricas en tiempo real**: Total de pedidos, envíos, clientes, productos y repartidores
- **Estadísticas visuales**: Cards con efectos glassmorphism y animaciones
- **Navegación intuitiva**: Menú responsive con iconos Font Awesome

### Gestión de Envíos
- ✅ Visualización completa de envíos
- 🔍 Búsqueda por ID de envío
- 📊 Estados: En Almacén, En Camino, Entregado
- 🎨 Badges coloridos con animaciones

### Gestión de Pedidos
- 🛒 Control total de órdenes
- 🔍 Búsqueda por ID de pedido
- 💰 Estados: Pendiente, Pagado
- 📋 Detalles completos de cada pedido

### Gestión de Clientes
- 👥 Base de datos completa
- 🔍 Búsqueda por ID de cliente
- 📧 Información de contacto
- 📍 Direcciones de entrega

### Gestión de Productos
- 📦 Catálogo completo Adidas
- 🔍 Búsqueda por ID de producto
- 💵 Control de precios
- 📊 Gestión de stock

### Gestión de Repartidores
- 🏍️ Personal de entrega
- 🔍 Búsqueda por ID de repartidor
- 📞 Información de contacto
- 🚚 Asignación de envíos

## 🎨 Características de Diseño

### Glassmorphism UI
- **Efectos de cristal**: `backdrop-filter: blur()`
- **Transparencias avanzadas**: `rgba()` con opacidad variable
- **Gradientes animados**: Fondos dinámicos que cambian de color
- **Sombras suaves**: `box-shadow` para profundidad

### Colores Profesionales
- **Paleta principal**: Azules y grises neutros
- **Gradientes**: Transiciones suaves entre tonos
- **Estados dinámicos**: Colores específicos para cada estado
- **Hover effects**: Interacciones visuales fluidas

### Responsividad
- **Mobile First**: Diseño adaptado a dispositivos móviles
- **Breakpoints**: Responsive en tablets y desktop
- **Flexbox/Grid**: Layouts modernos y flexibles

## 🔧 Rutas del Sistema

```php
Route::prefix('logistica')->name('logistica.')->group(function () {
    Route::get('/dashboard', [LogisticaController::class, 'dashboard'])->name('dashboard');
    Route::get('/envios', [LogisticaController::class, 'envios'])->name('envios');
    Route::get('/pedidos', [LogisticaController::class, 'pedidos'])->name('pedidos');
    Route::get('/clientes', [LogisticaController::class, 'clientes'])->name('clientes');
    Route::get('/productos', [LogisticaController::class, 'productos'])->name('productos');
    Route::get('/repartidores', [LogisticaController::class, 'repartidores'])->name('repartidores');
});
```

## 🔍 Sistema de Búsqueda

Cada sección incluye búsqueda por llave primaria:
- **Envíos**: Búsqueda por `id_envio`
- **Pedidos**: Búsqueda por `id_pedido`
- **Clientes**: Búsqueda por `id_cliente`
- **Productos**: Búsqueda por `id_producto`
- **Repartidores**: Búsqueda por `id_repartidor`

### Características de Búsqueda
- 🎯 **Búsqueda exacta** por ID
- 🧹 **Botón limpiar** para mostrar todos los registros
- ⚡ **Búsqueda instantánea** sin recarga de página
- 🎨 **Interfaz glassmorphism** integrada

## 👨‍💻 Desarrollo

### Requisitos de Desarrollo
- Visual Studio Code o IDE similar
- Extensión PHP Intelephense
- Extensión Laravel Blade Snippets
- Git para control de versiones

### Comandos Útiles
```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Generar componentes
php artisan make:model NuevoModelo
php artisan make:controller NuevoController
php artisan make:migration crear_nueva_tabla

# Ejecutar en desarrollo
php artisan serve --host=0.0.0.0 --port=8000
```

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Para contribuir:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -am 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Crea un Pull Request

## 🐛 Reporte de Bugs

Si encuentras un bug, por favor crea un issue en el repositorio con:
- Descripción del problema
- Pasos para reproducir
- Comportamiento esperado vs actual
- Screenshots si es necesario

## 📝 Licencia

Este proyecto está bajo la licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👤 Autor

**Darwin TQ** - [GitHub](https://github.com/DarwinTQ)

## 🙏 Agradecimientos

- Laravel Framework por la excelente base
- Font Awesome por los iconos
- Comunidad de desarrolladores por inspiración en el diseño glassmorphism

---

## <a id="english"></a>🇺🇸 English Version

# 🏃‍♀️ Adidas Logistics - Logistics Management System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-9.52.20-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.0.30-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/CSS3-Glassmorphism-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
</p>

<p align="center">
  <strong>Comprehensive logistics management system developed with Laravel for Adidas</strong>
</p>

## 🚀 Project Description

**Adidas Logistics** is a complete web system designed to manage logistics operations efficiently and modernly. The project includes order management, shipments, customers, products, and delivery personnel with an elegant user interface based on glassmorphism.

### ✨ Key Features

- 📊 **Interactive Dashboard** - Real-time statistics and key metrics
- 🚚 **Shipment Management** - Complete control of shipment status
- 🛒 **Order Management** - Order administration and details
- 👥 **Customer Management** - Complete customer database
- 📦 **Product Management** - Catalog and inventory control
- 🏍️ **Delivery Personnel Management** - Delivery staff administration
- 🔍 **Search System** - Search by ID in all sections
- 🎨 **Modern Interface** - Glassmorphism design with professional colors
- 📱 **Responsive Design** - Compatible with all devices

## 🛠️ Technologies Used

### Backend
- **Laravel 9.52.20** - Robust PHP framework
- **PHP 8.0.30** - Programming language
- **MySQL** - Relational database
- **Eloquent ORM** - Object-relational mapping

### Frontend
- **Blade Templates** - Laravel template engine
- **Advanced CSS3** - Glassmorphism, animated gradients, backdrop-filter
- **Font Awesome 6.0** - Modern iconography
- **Vanilla JavaScript** - Interactive functionalities

### Database
- **adidas_logistica** - Main database with complete relational structure

## 🏗️ Project Structure

### Data Models
```
📁 app/Models/
├── Cliente.php      # Customer management
├── Pedido.php       # Purchase orders
├── Producto.php     # Product catalog
├── Envio.php        # Shipment control
├── Repartidor.php   # Delivery personnel
├── DetallePedido.php # Order details
└── User.php         # System users
```

### Controllers
```
📁 app/Http/Controllers/
└── LogisticaController.php  # Main controller with search functions
```

### Views
```
📁 resources/views/
├── layouts/
│   └── app.blade.php           # Main layout with glassmorphism design
└── logistica/
    ├── dashboard.blade.php     # Control panel with statistics
    ├── envios.blade.php        # Shipment management with search
    ├── pedidos.blade.php       # Order management with search
    ├── clientes.blade.php      # Customer management with search
    ├── productos.blade.php     # Product management with search
    └── repartidores.blade.php  # Delivery personnel management with search
```

### Database
```sql
🗄️ adidas_logistica
├── clientes         # Customer information
├── productos        # Adidas product catalog
├── pedidos          # Purchase orders
├── detalle_pedidos  # Specific order details
├── envios           # Shipment control and status
└── repartidores     # Delivery personnel
```

## 🚀 Installation and Configuration

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- Web server (Apache/Nginx) or XAMPP

### Installation Steps

1. **Clone the repository**
```bash
git clone https://github.com/DarwinTQ/adidas_laravel.git
cd adidas_laravel
```

2. **Install dependencies**
```bash
composer install
```

3. **Configure environment file**
```bash
cp .env.example .env
```

4. **Configure database in `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adidas_logistica
DB_USERNAME=root
DB_PASSWORD=
```

5. **Generate application key**
```bash
php artisan key:generate
```

6. **Create database**
- Create the `adidas_logistica` database in MySQL
- Import the necessary data structure

7. **Run migrations (if available)**
```bash
php artisan migrate
```

8. **Start development server**
```bash
php artisan serve
```

The system will be available at: `http://127.0.0.1:8000/logistica`

## 📊 System Features

### Main Dashboard
- **Real-time metrics**: Total orders, shipments, customers, products, and delivery personnel
- **Visual statistics**: Cards with glassmorphism effects and animations
- **Intuitive navigation**: Responsive menu with Font Awesome icons

### Shipment Management
- ✅ Complete shipment visualization
- 🔍 Search by shipment ID
- 📊 Status: In Warehouse, On Route, Delivered
- 🎨 Colorful badges with animations

### Order Management
- 🛒 Complete order control
- 🔍 Search by order ID
- 💰 Status: Pending, Paid
- 📋 Complete order details

### Customer Management
- 👥 Complete database
- 🔍 Search by customer ID
- 📧 Contact information
- 📍 Delivery addresses

### Product Management
- 📦 Complete Adidas catalog
- 🔍 Search by product ID
- 💵 Price control
- 📊 Stock management

### Delivery Personnel Management
- 🏍️ Delivery staff
- 🔍 Search by delivery personnel ID
- 📞 Contact information
- 🚚 Shipment assignment

## 🎨 Design Features

### Glassmorphism UI
- **Glass effects**: `backdrop-filter: blur()`
- **Advanced transparencies**: `rgba()` with variable opacity
- **Animated gradients**: Dynamic backgrounds that change color
- **Soft shadows**: `box-shadow` for depth

### Professional Colors
- **Main palette**: Blues and neutral grays
- **Gradients**: Smooth transitions between tones
- **Dynamic states**: Specific colors for each state
- **Hover effects**: Smooth visual interactions

### Responsiveness
- **Mobile First**: Design adapted to mobile devices
- **Breakpoints**: Responsive on tablets and desktop
- **Flexbox/Grid**: Modern and flexible layouts

## 🔧 System Routes

```php
Route::prefix('logistica')->name('logistica.')->group(function () {
    Route::get('/dashboard', [LogisticaController::class, 'dashboard'])->name('dashboard');
    Route::get('/envios', [LogisticaController::class, 'envios'])->name('envios');
    Route::get('/pedidos', [LogisticaController::class, 'pedidos'])->name('pedidos');
    Route::get('/clientes', [LogisticaController::class, 'clientes'])->name('clientes');
    Route::get('/productos', [LogisticaController::class, 'productos'])->name('productos');
    Route::get('/repartidores', [LogisticaController::class, 'repartidores'])->name('repartidores');
});
```

## 🔍 Search System

Each section includes search by primary key:
- **Shipments**: Search by `id_envio`
- **Orders**: Search by `id_pedido`
- **Customers**: Search by `id_cliente`
- **Products**: Search by `id_producto`
- **Delivery Personnel**: Search by `id_repartidor`

### Search Features
- 🎯 **Exact search** by ID
- 🧹 **Clear button** to show all records
- ⚡ **Instant search** without page reload
- 🎨 **Integrated glassmorphism** interface

## 👨‍💻 Development

### Development Requirements
- Visual Studio Code or similar IDE
- PHP Intelephense extension
- Laravel Blade Snippets extension
- Git for version control

### Useful Commands
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Generate components
php artisan make:model NewModel
php artisan make:controller NewController
php artisan make:migration create_new_table

# Run in development
php artisan serve --host=0.0.0.0 --port=8000
```

## 🤝 Contributions

Contributions are welcome. To contribute:

1. Fork the project
2. Create a branch for your feature (`git checkout -b feature/new-functionality`)
3. Commit your changes (`git commit -am 'Add new functionality'`)
4. Push to the branch (`git push origin feature/new-functionality`)
5. Create a Pull Request

## 🐛 Bug Reports

If you find a bug, please create an issue in the repository with:
- Problem description
- Steps to reproduce
- Expected vs actual behavior
- Screenshots if necessary

## 📝 License

This project is under the MIT license. See the `LICENSE` file for more details.

## 👤 Author

**Darwin TQ** - [GitHub](https://github.com/DarwinTQ)

## 🙏 Acknowledgments

- Laravel Framework for the excellent foundation
- Font Awesome for the icons
- Developer community for glassmorphism design inspiration
