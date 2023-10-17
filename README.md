# Integración BICOM - WooCommerce

## Tecnologías Utilizadas

- PHP 8.2+
- Laravel 10.x
- Laravel Sail (Docker)
- MySQL
- Redis

## Configuración del Módulo Setting

Antes de iniciar el proyecto, es crucial que el módulo Setting tenga registros con las siguientes llaves:

- `URL_STORE`: La URL de la tienda WooCommerce.
- `CONSUMER_KEY`: La key para acceder a la API de WooCommerce.
- `CONSUMER_SECRET`: El token para acceder a la API de WooCommerce.

Estas llaves son esenciales para la correcta comunicación con la API de WooCommerce. Asegúrate de que estos registros existan en la base de datos antes de continuar. **Puedes usar el GeneralSettingSeeder**

## Levantar el Proyecto con Laravel Sail

### Requisitos Previos

- Docker

### Pasos para la Instalación

1. **Clonar el Repositorio**: 
    ```bash
    git clone ...
    ```

2. **Ir al Directorio del Proyecto**:
    ```bash
    cd int-bicom-wc
    ```

3. **Copiar el Archivo `.env.example` a `.env`**:
    ```bash
    cp .env.example .env
    ```

4. **Ejecutar el siguiente comando para instalar las dependencias**:
    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs
    ```

5. **Levantar los Contenedores de Docker con Laravel Sail**:
    ```bash
    ./vendor/bin/sail up
    ```

    O si prefieres usar Docker directamente:
    ```bash
    docker-compose up -d
    ```

6. **Ejecutar las Migraciones y Seeders**:
    ```bash
    ./vendor/bin/sail artisan migrate --seed
    ```

