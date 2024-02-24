### Laravel 9 API REST - CurrencyShop
###### API simulating a CurrencyShop, with currency conversions based on API: https://docs.awesomeapi.com.br/api-de-moedas

#### Stack
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)
![Redis](https://img.shields.io/badge/redis-%23DD0031.svg?style=for-the-badge&logo=redis&logoColor=white)

#### Get Started
- Make a repository clone
- Create .env file

```sh
cp .env.example .env
```

- Update .env variables
```dosini
APP_NAME=Laravel
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```
- To create the Docker containers, run the following command in the terminal:

  ```dosini
  docker-compose up -d --build
  ```
  
- Inside the laravel container, install the dependencies with composer:

    ```dosini
    docker exec -it "container_name" bash
    composer install
    ```

- Inside the laravel container, make application key:

    ```dosini
       docker exec -it "container_name" bash
    php artisan key:generate
    ```
    
- Inside the laravel container, run migrations:

    ```dosini
       docker exec -it "container_name" bash
    php artisan key:generate
    ```
    
- Inside the laravel container, make JWT secret key:

    ```dosini
       docker exec -it "container_name" bash
    php artisan migrate
    ```
    
- To run tests:
    ```dosini
       php artisan test
    ```
- Generate API Docs:
    ```dosini
      php artisan l5-swagger:generate
    ```
Creates an API documentation in this route: localhost:8989/api/documentation
    
External packages and services
This project is currently extended with the following packages and services. Instructions on how to use them in your own app are linked below.

| Package  | Docs |
| ------------- | ------------- |
| Package                        | Documentation Link                             |
| ------------------------------ | ---------------------------------------------- |
| L5-Swagger OpenAPI             | [GitHub](https://github.com/DarkaOnLine/L5-Swagger/) |
| L5 Repository                  | [GitHub](https://github.com/andersao/l5-repository) |
| JSON API Paginate              | [GitHub](https://github.com/cloudcreativity/laravel-json-api-paginate) |
| Tymon JWT Auth                 | [GitHub](https://github.com/tymondesigns/jwt-auth) |
| Spatie Query Builder           | [Documentation](https://spatie.be/docs/laravel-query-builder) |
