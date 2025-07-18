# Sistema de Logística Adidas Laravel

## Descripción
Este proyecto implementa un sistema de logística para Adidas usando Laravel, que permite gestionar clientes, productos, pedidos, envíos y repartidores con una interfaz moderna y responsive estilo Adidas.

## 🚀 Configuración Rápida

### 1. Configurar el archivo .env
Copia el archivo `.env.example` a `.env` y configura la base de datos:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adidas_logistica
DB_USERNAME=root
DB_PASSWORD=
```

### 2. Crear la base de datos
Ejecuta el script SQL proporcionado para crear la base de datos `adidas_logistica` con todas las tablas.

### 3. Configurar Laravel
```bash
php artisan key:generate
php artisan config:cache
```

### 4. Iniciar el servidor
```bash
php artisan serve
```

## 🎨 Interfaz Web

La aplicación cuenta con una interfaz moderna estilo Adidas con las siguientes secciones:

### 📊 Dashboard Principal (`/`)
- **Resumen ejecutivo** con métricas clave
- **Estadísticas en tiempo real** de clientes, pedidos, productos y envíos
- **Estados de envíos** y pagos
- **Acceso rápido** a todas las secciones

### 🚛 Gestión de Envíos (`/logistica/envios`)
- **Lista completa** de todos los envíos
- **Actualización de estados** en tiempo real (En almacén → En camino → Entregado)
- **Información de clientes** y repartidores
- **Fechas de despacho** y entrega estimada
- **Estadísticas visuales** por estado

### 🛒 Gestión de Pedidos (`/logistica/pedidos`)
- **Vista detallada** de todos los pedidos
- **Información del cliente** completa
- **Productos incluidos** en cada pedido
- **Estados de pago** y envío
- **Montos totales** y direcciones de entrega

### 👥 Gestión de Clientes (`/logistica/clientes`)
- **Base de datos** de clientes registrados
- **Historial de pedidos** por cliente
- **Estados de actividad** (Activo/Nuevo)
- **Modal de detalles** con información completa

### 📦 Catálogo de Productos (`/logistica/productos`)
- **Inventario completo** con precios y stock
- **Alertas de stock** (Alto/Bajo/Agotado)
- **Estadísticas de ventas** por producto
- **Ranking de productos** más vendidos

### 🏍️ Gestión de Repartidores (`/logistica/repartidores`)
- **Lista de repartidores** con información de contacto
- **Estados de disponibilidad** (Disponible/Ocupado)
- **Información de vehículos** y placas
- **Ranking de entregas** completadas

## 🎨 Características de la Interfaz

### Diseño Adidas
- **Paleta de colores** negra y blanca característica de Adidas
- **Gradientes modernos** y efectos visuales
- **Iconografía consistente** con Font Awesome
- **Tipografía limpia** y legible

### Responsividad
- **Adaptable a móviles** y tablets
- **Navegación intuitiva** en todos los dispositivos
- **Grids flexibles** que se ajustan automáticamente

### Funcionalidades Interactivas
- **Actualización de estados** de envío en tiempo real
- **Modales informativos** para detalles
- **Badges de estado** con colores semánticos
- **Estadísticas visuales** con tarjetas animadas

## 📊 Estados del Sistema

### Estados de Envío
- 🏭 **En almacén** - Producto preparado para despacho
- 🚛 **En camino** - Repartidor en ruta de entrega
- ✅ **Entregado** - Entrega completada exitosamente

### Estados de Pago
- ⏳ **Pendiente** - Pago no confirmado
- ✅ **Pagado** - Pago procesado exitosamente

### Estados de Stock
- 🟢 **Stock Alto** - Más de 10 unidades
- 🟡 **Stock Bajo** - Entre 1-10 unidades
- 🔴 **Agotado** - 0 unidades disponibles

## 🔧 Modelos y Relaciones

### Cliente
- **Tabla**: `Clientes`
- **Clave primaria**: `id_cliente`
- **Campos**: `nombre`, `email`, `telefono`, `fecha_registro`
- **Relaciones**: Tiene muchos pedidos

### Producto
- **Tabla**: `Productos`
- **Clave primaria**: `id_producto`
- **Campos**: `nombre_producto`, `descripcion`, `precio`, `stock`
- **Relaciones**: Pertenece a muchos pedidos

### Pedido
- **Tabla**: `Pedidos`
- **Clave primaria**: `id_pedido`
- **Campos**: `id_cliente`, `fecha_pedido`, `direccion_envio`, `ciudad_envio`, `monto_total`, `estado_pago`
- **Relaciones**: Pertenece a un cliente, tiene un envío, pertenece a muchos productos

### Envio
- **Tabla**: `Envios`
- **Clave primaria**: `id_envio`
- **Campos**: `id_pedido`, `id_repartidor`, `fecha_despacho`, `fecha_entrega_estimada`, `fecha_entrega_real`, `estado_envio`
- **Relaciones**: Pertenece a un pedido y un repartidor

### Repartidor
- **Tabla**: `Repartidores`
- **Clave primaria**: `id_repartidor`
- **Campos**: `nombre_completo`, `telefono`, `vehiculo_placa`
- **Relaciones**: Tiene muchos envíos

## 🛠️ Comandos Útiles

### Limpiar caché
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Reiniciar el servidor
```bash
php artisan serve --port=8000
```

## 🌐 URLs de la Aplicación

- **Dashboard**: `http://localhost:8000/`
- **Envíos**: `http://localhost:8000/logistica/envios`
- **Pedidos**: `http://localhost:8000/logistica/pedidos`
- **Clientes**: `http://localhost:8000/logistica/clientes`
- **Productos**: `http://localhost:8000/logistica/productos`
- **Repartidores**: `http://localhost:8000/logistica/repartidores`

## 🎯 Funcionalidades Principales

✅ **Sistema completo de gestión logística**  
✅ **Interfaz moderna estilo Adidas**  
✅ **Actualización de estados en tiempo real**  
✅ **Estadísticas y métricas visuales**  
✅ **Diseño completamente responsivo**  
✅ **Navegación intuitiva**  
✅ **Modelos Eloquent con relaciones**  
✅ **Código limpio y documentado**  

¡Tu sistema de logística Adidas está listo para usar! 🚀
