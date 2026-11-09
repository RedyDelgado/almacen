# Almacen - 2026-ii

Proyecto de ejemplo para el curso Desarrollo de Software I (UAC, Filial Quillabamba).

## Requisitos

Verifica que tengas todo instalado antes de empezar:

| Herramienta | Versión | Comando de verificación |
|---|---|---|
| PHP | 8.4 (obligatorio) | `php -v` |
| Composer | 2.x | `composer -V` |
| MySQL o MariaDB | 8.x / 10.x | `mysql --version` |
| Node.js y npm | 20 o superior | `node -v` y `npm -v` |
| Git | cualquiera | `git --version` |

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/RedyDelgado/almacen.git
cd example-ap
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Crear el archivo de entorno

Windows (CMD):

```cmd
copy .env.example .env
```

### 4. Generar la clave de la aplicación

```bash
php artisan key:generate
```

### 5. Crear la base de datos

Entra a MySQL y crea la base de datos vacía:

```sql
CREATE DATABASE db_almacen CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Configurar el archivo `.env`

Edita estas líneas con tus datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_almacen
DB_USERNAME=root
DB_PASSWORD=
```

El nombre de `DB_DATABASE` debe ser igual al de la base creada en el paso 5.

### 7. Ejecutar migraciones y datos iniciales

```bash
php artisan migrate --seed
```
### 8. Instalar Vite

```bash
npm install tailwindcss @tailwindcss/vite
```

```bash
npm run dev
```

### 9. Iniciar el servidor

```bash
php artisan serve
```

Abre http://127.0.0.1:8000 en el navegador.

## Errores frecuentes

| Error | Causa | Solución |
|---|---|---|
| `Your PHP version does not satisfy that requirement` | PHP distinto de 8.4 | Instalar PHP 8.4 y verificar con `php -v` |
| `could not find driver` | Falta `pdo_mysql` | Activar la extensión en `php.ini` o instalar `php8.4-mysql` |
| `No application encryption key has been specified` | No se generó la clave | Ejecutar `php artisan key:generate` |
| `SQLSTATE[HY000] [1049] Unknown database` | La base de datos no existe | Crearla (paso 5) y revisar `DB_DATABASE` |
| `SQLSTATE[HY000] [1045] Access denied` | Usuario o contraseña incorrectos | Corregir `DB_USERNAME` y `DB_PASSWORD` en `.env` |
| `Vite manifest not found` | Frontend sin compilar | Ejecutar `npm install` y `npm run build` |
| `Class not found` o cambios que no se reflejan | Caché desactualizada | `composer dump-autoload` y `php artisan optimize:clear` |
| Error de permisos en `storage` o `bootstrap/cache` (Linux) | Permisos de escritura | `chmod -R 775 storage bootstrap/cache` |

## Actualizar el proyecto

Si el docente publica cambios:

```bash
git pull
composer install
php artisan migrate
npm install
npm run build
php artisan optimize:clear
```
