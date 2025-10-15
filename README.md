# Test Magang Javan

> RESTful API sederhana menggunakan **Laravel 12**, dibuat untuk keperluan test magang di **Javan Technology**.

## Demo
🔗 **Demo Website:** [https://testmagangjavan.v-project.my.id](https://testmagangjavan.v-project.my.id)

## ⚙️ Tech Stack
- **Laravel 12** (Framework Backend)
- **MySQL** (Database)
- **RESTful API** (JSON)
- **Postman** (Testing)
- **PHP 8.3+**

## Cara Menjalankan Project (Local)

# 1. Clone repository
> git clone https://github.com/oliv-e/testmagangjavan.git
> cd testmagangjavan

# 2. Install dependencies
> composer install

# 3. Copy environment file
> cp .env.example .env

# 4. Konfigurasi database di file .env
> DB_DATABASE=nama_database
> DB_USERNAME=root
> DB_PASSWORD=

# 5. Generate app key & migrate database
> php artisan key:generate
> php artisan migrate

# 6. Jalankan server lokal
> php artisan serve

## Endpoint
> GET base_url/api/users (data user)
> POST base_url/api/users (tambah data user)
> GET base_url/api/users/{id} (data user spesifik)
> PUT / PATCH base_url/api/users/{id} (mengubah data user spesifik)
> DELETE base_url/api/users/{id} (menghapus user)

## Contoh Request

# Create User (POST)
> Endpoint POST : /api/users

# Header
> Accept: application/json
> Content-Type: application/json

# Body
---
{
    "name": "Test",
    "email": "test@gmail.com",
    "password": "12341234"
}
---
