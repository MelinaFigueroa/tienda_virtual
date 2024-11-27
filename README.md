# https://pruebas.alwaysdata.net/ Armonía Verde - Growshop Online 🌱

## Descripción

Armonía Verde es una plataforma de comercio electrónico especializada en la venta de productos de cultivo y jardinería. Ofrece una experiencia de usuario intuitiva con funcionalidades tanto para clientes como para administradores.

## Características Principales

### Para Clientes
- Catálogo de productos detallado
- Carrito de compras interactivo
- Proceso de compra sencillo


### Para Administradores
- Panel de control para gestión de productos
- Administración de pedidos
- Rutas protegidas de acceso

## Tecnologías Utilizadas

- **Backend**: PHP puro
- **Frontend**: HTML, Tailwind CSS, JavaScript
- **Base de Datos**: MySQL
- **Diseño**: Responsive en su mayoría 

## Requisitos Previos

- PHP 7.4 o superior
- MySQL o MariaDB
- Servidor web (Apache o similar)

## Instalación

### 1. Clonar el Repositorio
```bash
git clone https://github.com/MelinaFigueroa/tienda_virtual.git
```

### 2. Configurar Base de Datos
- Crear base de datos en MySQL
- Importar `database.sql`

### 3. Configurar Conexión
Editar `config/database.php` con credenciales:
```php
<?php
$host = 'localhost';
$dbname = 'nombre_de_base_de_datos';
$username = 'usuario';
$password = 'contraseña';
// ... código de conexión
?>
```

### 4. Iniciar Servidor
```bash
php -S localhost:8000
```


## Licencia

Proyecto bajo Licencia MIT.

## Contacto

Para más información, visitar el repositorio del proyecto.

---

¡Gracias por usar Armonía Verde! 🌿
