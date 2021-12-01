# Excel

## Demo laravel based Saas app for handling spreadsheets

### Pre-requisites
+ Basic knowledge on laravel - Read the docs here-> https://laravel.com/docs/8.x
+ A working minio server - Read the docs here -> https://docs.min.io/

### Setup

+ Clone this repository onto your machine / environment
```shell
 git clone https://github.com/inziano/excelSaas.git
```

+ Setup env file and add these to the configuration
```env

APP_URL=http://localhost:8000

QUEUE_CONNECTION=database

FILESYSTEM_CLOUD=minio
MINIO_ENDPOINT=http://127.0.0.1:9000
MINIO_KEY=yourminiokey
MINIO_SECRET=yourminiosecret
MINIO_REGION=us-east-1
MINIO_BUCKET=excel


MIX_API_URL="${APP_URL}/api"
MIX_APP_URL="${APP_URL}"

```
+ Run ` npm install` and `composer install` to install dependencies

```shell
    npm install

    composer install
```

+ Run `npm run dev` to compile js resources

```shell
    npm run dev
```

+ Run migrations
```shell
    php artisan migrate
```

+ Run the seeders
```shell
    php artisan db:seed --class=UserSeeder
    php artisan db:seed --class=PackageSeeder
```

+ Serve the application
```shell
    php artisan serve
```
+ For jobs, run the queue command
```shell
    php artisan queue:work --queue=cloud
```

### Info

+ Create an account and select a package.
+ Upload a file 
+ View your uploaded files
