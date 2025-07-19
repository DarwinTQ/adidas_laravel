# 🏃‍♀️ <span class="es">Adidas Logística - Sistema de Gestión Logística</span><span class="en" style="display:none;">Adidas Logistics - Logistics Management System</span>

<p align="center">
  <button onclick="switchLanguage('es')" class="lang-btn" id="btn-es" style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 25px; cursor: pointer; margin: 5px; font-weight: bold;">
    🇪🇸 Español
  </button>
  <button onclick="switchLanguage('en')" class="lang-btn" id="btn-en" style="background: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 25px; cursor: pointer; margin: 5px; font-weight: bold;">
    �🇸 English
  </button>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-9.52.20-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.0.30-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/CSS3-Glassmorphism-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
</p>

<p align="center">
  <strong>
    <span class="es">Sistema integral de gestión logística desarrollado con Laravel para Adidas</span>
    <span class="en" style="display:none;">Comprehensive logistics management system developed with Laravel for Adidas</span>
  </strong>
</p>

---

## 🚀 <span class="es">Descripción del Proyecto</span><span class="en" style="display:none;">Project Description</span>

<div class="es">
<strong>Adidas Logística</strong> es un sistema web completo diseñado para gestionar operaciones logísticas de manera eficiente y moderna. El proyecto incluye gestión de pedidos, envíos, clientes, productos y repartidores con una interfaz de usuario elegante basada en glassmorphism.
</div>

<div class="en" style="display:none;">
<strong>Adidas Logistics</strong> is a complete web system designed to manage logistics operations efficiently and modernly. The project includes order management, shipments, customers, products, and delivery personnel with an elegant user interface based on glassmorphism.
</div>

### ✨ <span class="es">Características Principales</span><span class="en" style="display:none;">Key Features</span>

<div class="es">
- 📊 <strong>Dashboard Interactivo</strong> - Estadísticas en tiempo real y métricas clave
- 🚚 <strong>Gestión de Envíos</strong> - Control completo del estado de envíos
- 🛒 <strong>Gestión de Pedidos</strong> - Administración de órdenes y detalles
- 👥 <strong>Gestión de Clientes</strong> - Base de datos completa de clientes
- 📦 <strong>Gestión de Productos</strong> - Catálogo y control de inventario
- 🏍️ <strong>Gestión de Repartidores</strong> - Administración del personal de entrega
- 🔍 <strong>Sistema de Búsqueda</strong> - Búsqueda por ID en todas las secciones
- 🎨 <strong>Interfaz Moderna</strong> - Diseño glassmorphism con colores profesionales
- 📱 <strong>Diseño Responsive</strong> - Compatible con todos los dispositivos
</div>

<div class="en" style="display:none;">
- 📊 <strong>Interactive Dashboard</strong> - Real-time statistics and key metrics
- 🚚 <strong>Shipment Management</strong> - Complete control of shipment status
- 🛒 <strong>Order Management</strong> - Order administration and details
- 👥 <strong>Customer Management</strong> - Complete customer database
- 📦 <strong>Product Management</strong> - Catalog and inventory control
- 🏍️ <strong>Delivery Personnel Management</strong> - Delivery staff administration
- 🔍 <strong>Search System</strong> - Search by ID in all sections
- 🎨 <strong>Modern Interface</strong> - Glassmorphism design with professional colors
- 📱 <strong>Responsive Design</strong> - Compatible with all devices
</div>

## 🛠️ <span class="es">Tecnologías Utilizadas</span><span class="en" style="display:none;">Technologies Used</span>

### <span class="es">Backend</span><span class="en" style="display:none;">Backend</span>
- **Laravel 9.52.20** - <span class="es">Framework PHP robusto</span><span class="en" style="display:none;">Robust PHP framework</span>
- **PHP 8.0.30** - <span class="es">Lenguaje de programación</span><span class="en" style="display:none;">Programming language</span>
- **MySQL** - <span class="es">Base de datos relacional</span><span class="en" style="display:none;">Relational database</span>
- **Eloquent ORM** - <span class="es">Mapeo objeto-relacional</span><span class="en" style="display:none;">Object-relational mapping</span>

### <span class="es">Frontend</span><span class="en" style="display:none;">Frontend</span>
- **Blade Templates** - <span class="es">Motor de plantillas de Laravel</span><span class="en" style="display:none;">Laravel template engine</span>
- **CSS3 <span class="es">Avanzado</span><span class="en" style="display:none;">Advanced</span>** - Glassmorphism, <span class="es">gradientes animados</span><span class="en" style="display:none;">animated gradients</span>, backdrop-filter
- **Font Awesome 6.0** - <span class="es">Iconografía moderna</span><span class="en" style="display:none;">Modern iconography</span>
- **<span class="es">JavaScript Vanilla</span><span class="en" style="display:none;">Vanilla JavaScript</span>** - <span class="es">Funcionalidades interactivas</span><span class="en" style="display:none;">Interactive functionalities</span>

### <span class="es">Base de Datos</span><span class="en" style="display:none;">Database</span>
- **adidas_logistica** - <span class="es">Base de datos principal con estructura relacional completa</span><span class="en" style="display:none;">Main database with complete relational structure</span>

## 🏗️ <span class="es">Estructura del Proyecto</span><span class="en" style="display:none;">Project Structure</span>

### <span class="es">Modelos de Datos</span><span class="en" style="display:none;">Data Models</span>
```
📁 app/Models/
├── Cliente.php      # <span class="es">Gestión de clientes</span><span class="en" style="display:none;">Customer management</span>
├── Pedido.php       # <span class="es">Órdenes de compra</span><span class="en" style="display:none;">Purchase orders</span>
├── Producto.php     # <span class="es">Catálogo de productos</span><span class="en" style="display:none;">Product catalog</span>
├── Envio.php        # <span class="es">Control de envíos</span><span class="en" style="display:none;">Shipment control</span>
├── Repartidor.php   # <span class="es">Personal de entrega</span><span class="en" style="display:none;">Delivery personnel</span>
├── DetallePedido.php # <span class="es">Detalles de cada pedido</span><span class="en" style="display:none;">Order details</span>
└── User.php         # <span class="es">Usuarios del sistema</span><span class="en" style="display:none;">System users</span>
```

### <span class="es">Controladores</span><span class="en" style="display:none;">Controllers</span>
```
📁 app/Http/Controllers/
└── LogisticaController.php  # <span class="es">Controlador principal con funciones de búsqueda</span><span class="en" style="display:none;">Main controller with search functions</span>
```

### <span class="es">Vistas</span><span class="en" style="display:none;">Views</span>
```
📁 resources/views/
├── layouts/
│   └── app.blade.php           # <span class="es">Layout principal con diseño glassmorphism</span><span class="en" style="display:none;">Main layout with glassmorphism design</span>
└── logistica/
    ├── dashboard.blade.php     # <span class="es">Panel de control con estadísticas</span><span class="en" style="display:none;">Control panel with statistics</span>
    ├── envios.blade.php        # <span class="es">Gestión de envíos con búsqueda</span><span class="en" style="display:none;">Shipment management with search</span>
    ├── pedidos.blade.php       # <span class="es">Gestión de pedidos con búsqueda</span><span class="en" style="display:none;">Order management with search</span>
    ├── clientes.blade.php      # <span class="es">Gestión de clientes con búsqueda</span><span class="en" style="display:none;">Customer management with search</span>
    ├── productos.blade.php     # <span class="es">Gestión de productos con búsqueda</span><span class="en" style="display:none;">Product management with search</span>
    └── repartidores.blade.php  # <span class="es">Gestión de repartidores con búsqueda</span><span class="en" style="display:none;">Delivery personnel management with search</span>
```

### <span class="es">Base de Datos</span><span class="en" style="display:none;">Database</span>
```sql
🗄️ adidas_logistica
├── clientes         # <span class="es">Información de clientes</span><span class="en" style="display:none;">Customer information</span>
├── productos        # <span class="es">Catálogo de productos Adidas</span><span class="en" style="display:none;">Adidas product catalog</span>
├── pedidos          # <span class="es">Órdenes de compra</span><span class="en" style="display:none;">Purchase orders</span>
├── detalle_pedidos  # <span class="es">Detalles específicos de cada pedido</span><span class="en" style="display:none;">Specific order details</span>
├── envios           # <span class="es">Control de envíos y estados</span><span class="en" style="display:none;">Shipment control and status</span>
└── repartidores     # <span class="es">Personal de entrega</span><span class="en" style="display:none;">Delivery personnel</span>
```

## 🚀 <span class="es">Instalación y Configuración</span><span class="en" style="display:none;">Installation and Configuration</span>

### <span class="es">Prerrequisitos</span><span class="en" style="display:none;">Prerequisites</span>
- PHP >= 8.0
- Composer
- MySQL
- <span class="es">Servidor web (Apache/Nginx) o XAMPP</span><span class="en" style="display:none;">Web server (Apache/Nginx) or XAMPP</span>

### <span class="es">Pasos de Instalación</span><span class="en" style="display:none;">Installation Steps</span>

<div class="es">

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

</div>

<div class="en" style="display:none;">

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

</div>

## 📊 <span class="es">Funcionalidades del Sistema</span><span class="en" style="display:none;">System Features</span>

### <span class="es">Dashboard Principal</span><span class="en" style="display:none;">Main Dashboard</span>
<div class="es">
- <strong>Métricas en tiempo real</strong>: Total de pedidos, envíos, clientes, productos y repartidores
- <strong>Estadísticas visuales</strong>: Cards con efectos glassmorphism y animaciones
- <strong>Navegación intuitiva</strong>: Menú responsive con iconos Font Awesome
</div>

<div class="en" style="display:none;">
- <strong>Real-time metrics</strong>: Total orders, shipments, customers, products, and delivery personnel
- <strong>Visual statistics</strong>: Cards with glassmorphism effects and animations
- <strong>Intuitive navigation</strong>: Responsive menu with Font Awesome icons
</div>

### <span class="es">Gestión de Envíos</span><span class="en" style="display:none;">Shipment Management</span>
<div class="es">
- ✅ Visualización completa de envíos
- 🔍 Búsqueda por ID de envío
- 📊 Estados: En Almacén, En Camino, Entregado
- 🎨 Badges coloridos con animaciones
</div>

<div class="en" style="display:none;">
- ✅ Complete shipment visualization
- 🔍 Search by shipment ID
- 📊 Status: In Warehouse, On Route, Delivered
- 🎨 Colorful badges with animations
</div>

### <span class="es">Gestión de Pedidos</span><span class="en" style="display:none;">Order Management</span>
<div class="es">
- 🛒 Control total de órdenes
- 🔍 Búsqueda por ID de pedido
- 💰 Estados: Pendiente, Pagado
- 📋 Detalles completos de cada pedido
</div>

<div class="en" style="display:none;">
- 🛒 Complete order control
- 🔍 Search by order ID
- 💰 Status: Pending, Paid
- 📋 Complete order details
</div>

### <span class="es">Gestión de Clientes</span><span class="en" style="display:none;">Customer Management</span>
<div class="es">
- 👥 Base de datos completa
- 🔍 Búsqueda por ID de cliente
- 📧 Información de contacto
- 📍 Direcciones de entrega
</div>

<div class="en" style="display:none;">
- 👥 Complete database
- 🔍 Search by customer ID
- 📧 Contact information
- 📍 Delivery addresses
</div>

### <span class="es">Gestión de Productos</span><span class="en" style="display:none;">Product Management</span>
<div class="es">
- 📦 Catálogo completo Adidas
- 🔍 Búsqueda por ID de producto
- 💵 Control de precios
- 📊 Gestión de stock
</div>

<div class="en" style="display:none;">
- 📦 Complete Adidas catalog
- 🔍 Search by product ID
- 💵 Price control
- 📊 Stock management
</div>

### <span class="es">Gestión de Repartidores</span><span class="en" style="display:none;">Delivery Personnel Management</span>
<div class="es">
- 🏍️ Personal de entrega
- 🔍 Búsqueda por ID de repartidor
- 📞 Información de contacto
- 🚚 Asignación de envíos
</div>

<div class="en" style="display:none;">
- 🏍️ Delivery staff
- 🔍 Search by delivery personnel ID
- 📞 Contact information
- 🚚 Shipment assignment
</div>

## 🎨 <span class="es">Características de Diseño</span><span class="en" style="display:none;">Design Features</span>

### <span class="es">Glassmorphism UI</span><span class="en" style="display:none;">Glassmorphism UI</span>
<div class="es">
- <strong>Efectos de cristal</strong>: `backdrop-filter: blur()`
- <strong>Transparencias avanzadas</strong>: `rgba()` con opacidad variable
- <strong>Gradientes animados</strong>: Fondos dinámicos que cambian de color
- <strong>Sombras suaves</strong>: `box-shadow` para profundidad
</div>

<div class="en" style="display:none;">
- <strong>Glass effects</strong>: `backdrop-filter: blur()`
- <strong>Advanced transparencies</strong>: `rgba()` with variable opacity
- <strong>Animated gradients</strong>: Dynamic backgrounds that change color
- <strong>Soft shadows</strong>: `box-shadow` for depth
</div>

### <span class="es">Colores Profesionales</span><span class="en" style="display:none;">Professional Colors</span>
<div class="es">
- <strong>Paleta principal</strong>: Azules y grises neutros
- <strong>Gradientes</strong>: Transiciones suaves entre tonos
- <strong>Estados dinámicos</strong>: Colores específicos para cada estado
- <strong>Hover effects</strong>: Interacciones visuales fluidas
</div>

<div class="en" style="display:none;">
- <strong>Main palette</strong>: Blues and neutral grays
- <strong>Gradients</strong>: Smooth transitions between tones
- <strong>Dynamic states</strong>: Specific colors for each state
- <strong>Hover effects</strong>: Smooth visual interactions
</div>

### <span class="es">Responsividad</span><span class="en" style="display:none;">Responsiveness</span>
<div class="es">
- <strong>Mobile First</strong>: Diseño adaptado a dispositivos móviles
- <strong>Breakpoints</strong>: Responsive en tablets y desktop
- <strong>Flexbox/Grid</strong>: Layouts modernos y flexibles
</div>

<div class="en" style="display:none;">
- <strong>Mobile First</strong>: Design adapted to mobile devices
- <strong>Breakpoints</strong>: Responsive on tablets and desktop
- <strong>Flexbox/Grid</strong>: Modern and flexible layouts
</div>

## 🔧 <span class="es">Rutas del Sistema</span><span class="en" style="display:none;">System Routes</span>

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

## 🔍 <span class="es">Sistema de Búsqueda</span><span class="en" style="display:none;">Search System</span>

<div class="es">
Cada sección incluye búsqueda por llave primaria:
- <strong>Envíos</strong>: Búsqueda por `id_envio`
- <strong>Pedidos</strong>: Búsqueda por `id_pedido`
- <strong>Clientes</strong>: Búsqueda por `id_cliente`
- <strong>Productos</strong>: Búsqueda por `id_producto`
- <strong>Repartidores</strong>: Búsqueda por `id_repartidor`
</div>

<div class="en" style="display:none;">
Each section includes search by primary key:
- <strong>Shipments</strong>: Search by `id_envio`
- <strong>Orders</strong>: Search by `id_pedido`
- <strong>Customers</strong>: Search by `id_cliente`
- <strong>Products</strong>: Search by `id_producto`
- <strong>Delivery Personnel</strong>: Search by `id_repartidor`
</div>

### <span class="es">Características de Búsqueda</span><span class="en" style="display:none;">Search Features</span>
<div class="es">
- 🎯 <strong>Búsqueda exacta</strong> por ID
- 🧹 <strong>Botón limpiar</strong> para mostrar todos los registros
- ⚡ <strong>Búsqueda instantánea</strong> sin recarga de página
- 🎨 <strong>Interfaz glassmorphism</strong> integrada
</div>

<div class="en" style="display:none;">
- 🎯 <strong>Exact search</strong> by ID
- 🧹 <strong>Clear button</strong> to show all records
- ⚡ <strong>Instant search</strong> without page reload
- 🎨 <strong>Integrated glassmorphism</strong> interface
</div>

## 👨‍💻 <span class="es">Desarrollo</span><span class="en" style="display:none;">Development</span>

### <span class="es">Requisitos de Desarrollo</span><span class="en" style="display:none;">Development Requirements</span>
<div class="es">
- Visual Studio Code o IDE similar
- Extensión PHP Intelephense
- Extensión Laravel Blade Snippets
- Git para control de versiones
</div>

<div class="en" style="display:none;">
- Visual Studio Code or similar IDE
- PHP Intelephense extension
- Laravel Blade Snippets extension
- Git for version control
</div>

### <span class="es">Comandos Útiles</span><span class="en" style="display:none;">Useful Commands</span>
<div class="es">
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
</div>

<div class="en" style="display:none;">
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
</div>

## 🤝 <span class="es">Contribuciones</span><span class="en" style="display:none;">Contributions</span>

<div class="es">
Las contribuciones son bienvenidas. Para contribuir:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -am 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Crea un Pull Request
</div>

<div class="en" style="display:none;">
Contributions are welcome. To contribute:

1. Fork the project
2. Create a branch for your feature (`git checkout -b feature/new-functionality`)
3. Commit your changes (`git commit -am 'Add new functionality'`)
4. Push to the branch (`git push origin feature/new-functionality`)
5. Create a Pull Request
</div>

## 🐛 <span class="es">Reporte de Bugs</span><span class="en" style="display:none;">Bug Reports</span>

<div class="es">
Si encuentras un bug, por favor crea un issue en el repositorio con:
- Descripción del problema
- Pasos para reproducir
- Comportamiento esperado vs actual
- Screenshots si es necesario
</div>

<div class="en" style="display:none;">
If you find a bug, please create an issue in the repository with:
- Problem description
- Steps to reproduce
- Expected vs actual behavior
- Screenshots if necessary
</div>

## 📝 <span class="es">Licencia</span><span class="en" style="display:none;">License</span>

<span class="es">Este proyecto está bajo la licencia MIT. Ver el archivo `LICENSE` para más detalles.</span>
<span class="en" style="display:none;">This project is under the MIT license. See the `LICENSE` file for more details.</span>

## 👤 <span class="es">Autor</span><span class="en" style="display:none;">Author</span>

**Darwin TQ** - [GitHub](https://github.com/DarwinTQ)

## 🙏 <span class="es">Agradecimientos</span><span class="en" style="display:none;">Acknowledgments</span>

<div class="es">
- Laravel Framework por la excelente base
- Font Awesome por los iconos
- Comunidad de desarrolladores por inspiración en el diseño glassmorphism
</div>

<div class="en" style="display:none;">
- Laravel Framework for the excellent foundation
- Font Awesome for the icons
- Developer community for glassmorphism design inspiration
</div>

<script>
let currentLanguage = 'es';

function switchLanguage(lang) {
    // Ocultar todos los elementos del idioma actual
    const currentElements = document.querySelectorAll(`.${currentLanguage}`);
    currentElements.forEach(element => {
        element.style.display = 'none';
    });
    
    // Mostrar elementos del nuevo idioma
    const newElements = document.querySelectorAll(`.${lang}`);
    newElements.forEach(element => {
        element.style.display = 'inline';
    });
    
    // Actualizar botones
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.style.opacity = '0.6';
        btn.style.transform = 'scale(1)';
    });
    
    const activeBtn = document.getElementById(`btn-${lang}`);
    activeBtn.style.opacity = '1';
    activeBtn.style.transform = 'scale(1.05)';
    
    currentLanguage = lang;
    
    // Guardar preferencia
    localStorage.setItem('preferred-language', lang);
}

// Cargar idioma guardado al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    const savedLang = localStorage.getItem('preferred-language') || 'es';
    switchLanguage(savedLang);
});
</script>

<style>
.lang-btn {
    transition: all 0.3s ease;
}
.lang-btn:hover {
    transform: scale(1.1) !important;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}
</style>
