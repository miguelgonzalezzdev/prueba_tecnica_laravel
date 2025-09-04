# Prueba Técnica Laravel

## Funcionalidades desarrolladas

- CRUD de Provincias 
- CRUD de Cliente
- CRUD de Presupuestos
- Command para los presupuestos pendientes
- Seeders y Factories para generar datos de prueba automáticamente
- Tests básicos para los CRUDs

## Guía de instalación

### Requisitos
- PHP >= 8.2
- Composer
- Node.js
- npm

### Pasos para la instalación

1. Clona e repositorio:

```bash
git clone https://github.com/miguelgonzalezzdev/prueba_tecnica_laravel.git
```

2. Accede al directorio del proyecto:

    ```bash
    cd prueba_tecnica_laravel
    ```

3. Instala las dependencias de PHP:

    ```bash
    composer install
    ```

4. Instala las dependencias de JavaScript y compila los assets:
    ```bash
    npm install 
    npm run dev
    ```

5. Copia el archivo `.env.example` y renómbralo como `.env`:
    ```bash
    copy .env.example .env  # Windows
    cp .env.example .env    # Linux/Mac
    ```

6. Generar la key de la aplicación:
    ```bash
    php artisan key:generate
    ```

7. Levanta una base de datos en local con el nombre `prueba`

8. Ejecuta migraciones y seeders para crear la base de datos y los datos de prueba:
    ```bash
    php artisan migrate --seed
    ```

9. Levanta el servidor local de desarrollo:
    ```bash
    php artisan serve
    ```

## Inicio rápido

Al ejecutar`php artisan migrate --seed`, se generará automáticamente un usuario de pruebas:

Usuario: **admin@admin.com**  
Contraseña: **admin1234**  

La plataforma incluirá datos de prueba para provincias, clientes y presupuestos.

## Command: Denegar presupuestos pendientes

Para ejecutar el comando:

```bash
php artisan presupuestos:denegar-pendiente
```

El comando buscará todos los presupuestos con fecha anterior a la actual y cuyo estado sea 'Pendiente'. Cambiará su estado a Denegado y enviará un correo al cliente asociado, además de mostrar en consola información de los presupuestos afectados.

## Tests

Se incluyen tests básicos para comprobar el correcto funcionamiento de los CRUD.

Para ejecutar los tests:

```bash
php artisan test
```

*Nota: Después de ejecutar los tests, es necesario volver a generar los datos de prueba:*

```bash
php artisan migrate:fresh --seed
```
