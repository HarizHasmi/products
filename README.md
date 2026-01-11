Products API

**Installation & Setup**

1. Clone the repository
    git clone https://github.com/HarizHasmi/products.git
    cd products

2. Install dependencies
    composer install

3. Create .env file
    cp .env.example .env

4. Configure database (PostgreSQL)
    Update your .env file with the following values:

    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=product_db
    DB_USERNAME=postgres
    DB_PASSWORD=your_password

5. Generate application key
    php artisan key:generate

**Database Migration & Seeding (IMPORTANT)**

This project uses Spatie Laravel Permission for role-based access control.

To create all database tables and seed roles, permissions, users, and products, run:

php artisan migrate:fresh --seed

This command will:

- Run all migrations
- Create permission-related tables
- Seed roles: admin, staff, viewer
- Seed permissions:
    - products-view
    - products-create
    - products-update
    - products-delete
- Assign permissions to roles
- Create sample users and products

WARNING:
migrate:fresh will delete all existing data.
Use only in development.

**Reset Permission Cache (REQUIRED)**

Spatie caches roles and permissions.
After seeding, always reset the permission cache:

php artisan permission:cache-reset

If the cache is not cleared, permission checks may fail.

**Default Seeded Users**

Admin
Email: admin@gmail.com
Password: password

Staff
Email: staff@gmail.com
Password: password

Viewer
Email: viewer@gmail.com
Password: password

**Start the Server**

If using Laravel Herd, access the project at:
http://products.test

Otherwise, run:
php artisan serve

**Authentication Endpoints**

All authentication routes are prefixed with /api/auth

POST /api/auth/login
Login and receive an authentication token

POST /api/auth/register
Register a new user (default role: viewer)

GET /api/auth/me
Get authenticated user details (requires token)

POST /api/auth/logout
Logout the authenticated user (requires token)

Authorization Header Format:
Authorization: Bearer {token}

**API Endpoints (Products)**

All product endpoints:

- Require authentication
- Enforce permissions using Spatie Laravel Permission

1. GET /api/products
    List all products
    Permission required: products-view
    
    Response: 200 OK

2. GET /api/products/{id}
    Get a single product
    Permission required: products-view
    
    Responses:
    - 200 OK
    - 404 Not Found

3. POST /api/products
    Create a new product
    Permission required: products-create

    Request body example:
    {
    "name": "Laptop",
    "description": "High performance",
    "price": 1999.99,
    "stock": 10
    }

    Responses:
    - 201 Created
    - 422 Validation Error

4. PUT /api/products/{id}
    Update an existing product
    Permission required: products-update

    Responses:
    - 200 OK
    - 404 Not Found
    - 422 Validation Error

5. DELETE /api/products/{id}
    Delete a product
    Permission required: products-delete

    Responses:
    - 200 OK
    - 404 Not Found

**Testing the API**

You can test the API using Bruno:
http://products.test/api/products

Steps:

1. Login to get a token
2. Copy the token
3. Add Authorization header to requests

**Notes**
- User roles are stored in the model_has_roles table
- Role definitions are stored in the roles table
- Permissions are cached by Spatie
- user_id on products is enforced (NOT NULL)
- PostgreSQL is the recommended database


























<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
