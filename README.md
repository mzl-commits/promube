# PROMUBE

Plataforma web desarrollada con **Laravel 12**, **Livewire Volt**, **Fortify** y **Vite** para la gestión y difusión de becas, beneficiados, noticias, sedes y preguntas frecuentes. El proyecto incluye una zona pública para visitantes y un panel administrativo protegido para la gestión de contenidos.

## Estado actual del proyecto

En esta versión el sistema ya incorpora:

- sitio público con páginas informativas de PROMUBE
- catálogo público de becas
- detalle público de cada beca mediante `slug`
- panel administrativo protegido por autenticación
- control de acceso para administradores mediante middleware `is_admin`
- CRUD administrativo de **becas**
- seguridad base con **login**, **registro**, **recuperación de contraseña**, **verificación de correo** y **autenticación en dos pasos (2FA)**
- limitación de intentos de inicio de sesión mediante rate limiting de Fortify
- seeders para datos iniciales y usuario administrador local
- pruebas automáticas con Pest para autenticación y configuración del usuario

## Tecnologías utilizadas

- **PHP 8.2+**
- **Laravel 12**
- **Laravel Fortify**
- **Livewire Volt**
- **Livewire Flux**
- **SQLite** por defecto en desarrollo
- **Vite**
- **Tailwind CSS**
- **Pest** para testing

## Módulos del sistema

### Zona pública

El sitio público expone las siguientes rutas principales:

- `/` → inicio
- `/becas` → listado de becas
- `/becas/{slug}` → detalle de beca
- `/beneficiados` → listado de beneficiados
- `/sedes` → sedes y cobertura
- `/noticias` → noticias
- `/preguntas-frecuentes` → preguntas frecuentes

### Panel administrativo

El panel administrativo está dentro de rutas protegidas por:

- `auth`
- `is_admin`

Rutas administrativas detectadas en el proyecto:

- `/admin` → dashboard
- `/admin/becas` → listado de becas
- `/admin/becas/crear` → crear beca
- `/admin/becas/{beca}/editar` → editar beca
- `/settings/profile`
- `/settings/password`
- `/settings/appearance`

## Seguridad implementada

El proyecto ya cuenta con una base de seguridad clara:

### 1. Control de acceso por rol

Se agregó el campo `is_admin` a la tabla `users`. El middleware `IsAdmin` verifica que el usuario esté autenticado y que tenga privilegios de administrador antes de permitir el acceso al panel.

```php
if (! auth()->check() || ! auth()->user()->is_admin) {
    abort(403, 'No tienes permisos de administrador.');
}
```

### 2. Autenticación con Laravel Fortify

Se detectó el uso de Fortify para:

- inicio de sesión
- registro
- recuperación de contraseña
- verificación de correo electrónico
- autenticación en dos factores (2FA)

### 3. Rate limiting

Fortify limita los intentos de login y de doble factor para reducir abuso y fuerza bruta.

### 4. Contraseñas seguras

Las contraseñas se almacenan con hash. Además, el modelo `User` usa:

```php
'password' => 'hashed'
```

### 5. Datos sensibles ocultos

El modelo `User` oculta campos sensibles como:

- `password`
- `two_factor_secret`
- `two_factor_recovery_codes`
- `remember_token`

## CRUD implementado

Actualmente el CRUD detectado y completamente conectado al panel es el de **becas**.

### Funcionalidades del CRUD de becas

- listar becas
- buscar por nombre
- crear nuevas becas
- editar becas existentes
- eliminar becas
- generar `slug` automáticamente a partir del nombre
- cargar imágenes de portada y banner
- administrar beneficios dinámicos
- administrar pasos dinámicos
- guardar beneficios y pasos en formato JSON

### Campos de la entidad `Beca`

- `nombre`
- `slug`
- `imagen_portada`
- `banner`
- `titulo`
- `subtitulo`
- `descripcion`
- `beneficios`
- `pasos`

### Estructura dinámica de beneficios

Cada beneficio puede incluir:

- icono en texto
- icono como imagen subida al sistema
- título
- descripción

### Estructura dinámica de pasos

Cada paso puede incluir:

- título
- descripción

## Base de datos

El proyecto está configurado por defecto para usar **SQLite** en desarrollo.

Migraciones detectadas:

- creación de usuarios
- cache
- jobs
- columnas para 2FA en usuarios
- beneficiados
- sedes
- noticias
- faqs
- becas
- campo `is_admin` en usuarios

## Seeder inicial

El `DatabaseSeeder` crea un usuario administrador local y carga becas de ejemplo.

### Credenciales locales detectadas en el seeder

- **Email:** `admin@promube.com`
- **Password:** `password123`

Estas credenciales sirven para entorno local. No deben usarse en producción.

## Instalación del proyecto

### 1. Clonar el repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
cd promube
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Instalar dependencias de frontend

```bash
npm install
```

### 4. Configurar variables de entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Crear enlace simbólico para almacenamiento público

```bash
php artisan storage:link
```

### 6. Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

### 7. Levantar el entorno de desarrollo

En una terminal:

```bash
php artisan serve
```

En otra terminal:

```bash
npm run dev
```

También se puede usar el script definido en Composer:

```bash
composer run dev
```

## Acceso al panel administrador

1. Iniciar sesión en `/login`
2. Entrar con un usuario que tenga `is_admin = true`
3. El sistema redirige al panel `/admin`

## Cómo promover un usuario a administrador

Si se desea convertir un usuario existente en administrador, se puede hacer por base de datos o con Tinker.

### Opción con Tinker

```bash
php artisan tinker
```

```php
$user = App\Models\User::where('email', 'correo@ejemplo.com')->first();
$user->is_admin = true;
$user->save();
```

## Estructura general del proyecto

```text
app/
├── Actions/Fortify/
├── Http/
│   ├── Controllers/Public/
│   └── Middleware/IsAdmin.php
├── Models/
resources/
├── views/
│   ├── public/
│   ├── livewire/admin/becas/
│   ├── livewire/auth/
│   └── components/
routes/
├── web.php
database/
├── migrations/
├── seeders/
public/
```

## Pruebas

El proyecto incluye pruebas de autenticación y configuración de usuario con **Pest**.

Para ejecutar las pruebas:

```bash
php artisan test
```

O también:

```bash
./vendor/bin/pest
```

## CI / Calidad de código

Se detectaron workflows de GitHub Actions para:

- ejecutar pruebas
- ejecutar Pint (formateo/lint)

Esto ayuda a mantener consistencia y validar cambios antes de despliegues.

## Observaciones técnicas del análisis

Durante la revisión del proyecto se identificó lo siguiente:

- el CRUD implementado y conectado al panel corresponde a **becas**
- los módulos de beneficiados, sedes, noticias y faqs tienen salida pública, pero en este paquete no se observó un CRUD administrativo equivalente al de becas
- el registro de usuarios está habilitado por Fortify, pero los usuarios nuevos no son administradores por defecto
- la aplicación usa cache en el home para algunas consultas públicas
- el proyecto incluye un `database.sqlite`, lo que facilita pruebas locales rápidas
- el panel administrativo ya está separado del sitio público y protegido correctamente a nivel de rutas

## Recomendaciones para siguientes iteraciones

- agregar CRUD administrativo para beneficiados, noticias, sedes y preguntas frecuentes
- restringir o revisar el registro público si no es parte del flujo real de negocio
- crear políticas o gates además del middleware para permisos más finos
- mover credenciales de ejemplo únicamente a entornos de desarrollo
- añadir pruebas específicas para el middleware `is_admin` y para el CRUD de becas
- documentar despliegue en producción con variables de entorno reales
- evitar incluir archivos como `.env`, `node_modules` o bases locales en entregables comprimidos finales

## Autoría y propósito

Este proyecto fue construido como una plataforma funcional para PROMUBE, con una parte pública orientada a informar y una parte administrativa orientada a gestionar contenido de manera segura y controlada.

---

## Resumen ejecutivo

PROMUBE ya cuenta con una base sólida: autenticación moderna, 2FA, verificación de correo, panel administrativo protegido y un CRUD funcional de becas con manejo dinámico de contenido. La siguiente etapa natural del proyecto es extender esa misma arquitectura administrativa al resto de módulos públicos para centralizar por completo la gestión del sitio.
