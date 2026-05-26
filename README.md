# 🛠️ FerreMar - Sistema POS e Inventario Premium

¡Bienvenido a **FerreMar**! Un sistema de facturación y control de inventario de gama alta diseñado específicamente para optimizar, agilizar y profesionalizar la gestión comercial de tu ferretería (**FerreMar**). Con una interfaz de usuario premium, flujos de trabajo optimizados y adaptabilidad financiera total, FerreMar representa la solución definitiva para el control total de tu negocio.

---

## 🌟 Características Destacadas (Premium Features)

1. **Identidad Visual Corporativa & Branding Oficial (Tema Claro Premium)**:
   - **Diseño Limpio e Impoluto**: Un entorno visual dominado por tonos blancos y grisáceos (`#ffffff`) que reduce la fatiga visual y proyecta máxima limpieza profesional.
   - **Efecto Glassmorphism**: Barra superior translúcida con efecto de "vidrio flotante" moderno.
   - **Micro-animaciones**: Menú lateral flotante y botones con transiciones suaves en eventos *hover* para incentivar la interacción del usuario.
   - **Logotipo Unificado**: Integración oficial del isotipo y favicon de **FerreMar**, desvinculando la aplicación visualmente de entornos de desarrollo como XAMPP.

2. **Motor Financiero Localizado para Colombia (COP)**:
   - **Formato COP Nativo**: Precios formateados automáticamente en Pesos Colombianos sin decimales redundantes (ej: `$ 20.000 COP`), garantizando consistencia visual en facturas, listados de inventario y saldos de caja.
   - **Sanitizador Inteligente de Miles**: Facilita el ingreso rápido de costos en formularios permitiendo el uso de puntos de miles de manera natural (ej. escribir `25.000` o `30.000` directamente), procesándolos de forma limpia y transparente antes de guardarlos en la base de datos.

3. **Buscador Inteligente con Precarga Dinámica (Live Search)**:
   - **Buscador de Clientes**: El modal de facturación precarga instantáneamente la base de datos de clientes y permite el filtrado predictivo en vivo al digitar cualquier carácter.
   - **Buscador de Productos con Semáforo de Stock**: Muestra de manera inmediata el código de barras, precio e introduce un indicador semafórico visual del inventario (🟢 Verde: Stock disponible, 🔴 Rojo: Nivel crítico o agotado) con búsquedas dinámicas avanzadas y filtrado por Categorías.

4. **Carrito POS Dinámico**:
   - **Recálculo Instantáneo**: Al alterar la cantidad de un producto en el carrito de venta y presionar `Enter` o salir del foco del campo (*blur*), los subtotales e importes finales se recalculan en tiempo real sin recargas de página ni molestas ventanas SweetAlert.

5. **Reportes Avanzados**:
   - Generación rápida de reportes ejecutivos para el control de inventario, historial de ventas y ganancias acumuladas, exportables directamente en formato PDF limpio.

---

## 👥 Perfiles y Roles de Usuario

El sistema cuenta con un sólido control de acceso basado en roles (RBAC) para estructurar el trabajo del equipo:

*   👑 **Administrador**: Posee privilegios globales y control total del aplicativo. Puede gestionar productos, categorías de inventario, crear y editar usuarios, configurar las cajas de venta, anular transacciones y acceder a reportes de rentabilidad y auditoría.
*   📦 **Bodeguero**: Encargado exclusivo del control físico del inventario. Registra las entradas y salidas de mercancía y supervisa los stocks disponibles en tiempo real.
*   💼 **Vendedor / Cajero**: Diseñado para el punto de venta (POS). Realiza transacciones con rapidez, añade clientes al vuelo, consulta la disponibilidad de productos en el semáforo y emite e imprime recibos oficiales de venta.

---

## 🔐 Credenciales de Acceso por Defecto

El sistema incluye usuarios pre-creados en la base de datos listos para probar todos los niveles de privilegios:

| Rol | Usuario (`username`) | Contraseña (`password`) | Descripción del Perfil |
| :--- | :--- | :--- | :--- |
| **Administrador** | `Administrador1` | `123456` | Perfil administrador principal con acceso total. |
| **Vendedor / Cajero** | `will1` | `123456` | Asignado a Wilder Betancourt en la Caja de Ventas 1. |
| **Bodeguero** | `Martad` | `123456` | Asignado a Marta Domínguez en el control de stock de bodega. |

> [!WARNING]
> **Recomendación de Seguridad**: Modifique las contraseñas predeterminadas inmediatamente tras realizar la instalación en un entorno público o productivo.

---

## 🚀 Instalación y Despliegue Local (XAMPP)

Siga este paso a paso para desplegar **FerreMar** en su servidor web local:

### 1. Requisitos Previos
*   **Servidor Web**: Apache con **PHP 7.4** o superior (Recomendado PHP 8.0+ / 8.2+).
*   **Motor de Base de Datos**: MySQL o MariaDB.
*   **Suite Recomendada**: [XAMPP](https://www.apachefriends.org/es/index.html).

### 2. Despliegue de Código
1. Descargue o extraiga el proyecto completo.
2. Mueva la carpeta `ferremar-main` al directorio raíz de publicación de su servidor web:
   - **En Windows (XAMPP)**: `C:\xampp\htdocs\ferremar-main`
   - **En Linux (LAMP)**: `/var/www/html/ferremar-main`

### 3. Configuración de la Base de Datos
1. Inicie los servicios de **Apache** y **MySQL** desde el Panel de Control de XAMPP.
2. Ingrese a **phpMyAdmin** en su navegador favorito: [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/).
3. Cree una nueva base de datos con el nombre `ventas` y seleccione la colación `utf8_spanish2_ci`.
4. Haga clic en la pestaña **Importar**, seleccione el archivo `ventas.sql` ubicado en la raíz del proyecto y presione **Continuar** para ejecutar las sentencias SQL que estructurarán el sistema y precargarán los datos demo.

### 4. Ajustar Credenciales del Servidor
Si su entorno local MySQL posee una contraseña de administrador diferente al valor por defecto (vacío en XAMPP), configure las constantes en:
📄 [server.php](file:///c:/Users/angie/Downloads/ferremar-main/ferremar-main/config/server.php)
```php
<?php
const DB_SERVER = "localhost";
const DB_NAME = "ventas";
const DB_USER = "root";  // Usuario de la base de datos
const DB_PASS = '';      // Contraseña de la base de datos
```

### 5. URL del Aplicativo
La ruta web base del proyecto está configurada en:
📄 [app.php](file:///c:/Users/angie/Downloads/ferremar-main/ferremar-main/config/app.php)
```php
const APP_URL = "http://localhost/ferremar-main/";
```
*Si renombró la carpeta del proyecto en `htdocs` o desea subirlo a un hosting web, actualice esta dirección para evitar fallos en la carga de recursos CSS, Javascript e imágenes.*

---

## 📂 Arquitectura del Proyecto (MVC)

El código sigue una arquitectura **Modelo-Vista-Controlador (MVC)** ordenada y limpia para facilitar su escalabilidad:

*   📁 `config/`: Constantes globales del sistema (`app.php`) y lógica de conexión a datos (`server.php`).
*   📁 `app/`:
    *   📁 `controllers/`: Controladores encargados de coordinar la lógica de negocio y las peticiones Ajax (`productController.php`, `saleController.php`, `loginController.php`, etc.).
    *   📁 `models/`: Modelos que interactúan de manera segura con las tablas MySQL a través de consultas parametrizadas con PDO para evitar inyección SQL (`mainModel.php`).
    *   📁 `views/`: Hojas de estilo y maquetación web.
        *   📁 `content/`: Interfaces del usuario final (ej. `dashboard-view.php`, `saleNew-view.php`).
        *   📁 `inc/`: Fragmentos repetitivos reutilizables mediante PHP `require_once` (ej. barra lateral `navlateral.php`, barra superior `navbar.php`, metatags `head.php`).
        *   📁 `css/` & `js/`: Contiene el framework de estilos **Bulma CSS** optimizado y los scripts personalizados para los buscadores dinámicos y el comportamiento del carrito de compras.

---

## 👥 Integrantes del Proyecto

El desarrollo y optimización del sistema **FerreMar** fue realizado por el siguiente equipo de trabajo:

*   👩‍💻 **Angie Fuentes**
*   👩‍💻 **Daniela Heredia**
*   👨‍💻 **Daniel Estrada**
*   👨‍💻 **Wildherman Betancourt**

---
**FerreMar** 🛠️ — *Rapidez, elegancia y precisión para potenciar la gestión de tu ferretería al máximo nivel.*
