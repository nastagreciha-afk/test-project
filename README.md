## 📂 Structure
app/
├─ Domain/
│   └─ Users/
│       ├─ DTO/
│       │   └─ UserData.php              # DTO: data transfer object
│       │
│       ├─ Contracts/
│       │   └─ UserRepositoryInterface.php  # Interface: defines user repo methods
│       │
│       ├─ Repositories/
│       │   └─ EloquentUserRepository.php   # Implementation of repository using Eloquent ORM
│       │
│       └─ Services/
│           └─ UserService.php           # Service layer: business logic
│
└─ Filament/
└─ Admin/
└─ Resources/
└─ Users.php                 # Filament Resource: defines fields, forms, tables
├─ Pages/
│   ├─ CreateUser.php    # Page: create user
│   ├─ EditUser.php      # Page: edit user
│   ├─ ListUsers.php     # Page: list users
│   └─ ViewUser.php      # Page: view single user
│
└─ UserResource.php      # Main Filament resource


## 🚀 Quick Start

docker compose up -d --build          # Start containers
docker exec -it laravel_app bash      # Enter app container
composer install                      # Install PHP deps
php artisan key:generate      # Generate APP_KEY
php artisan migrate           # Run migrations
php artisan db:seed           # Run seed

# внутри контейнера:
npm install
npm run build

# admin
composer require filament/filament:"~4.0"
php artisan filament:install --panels
fix-panels if it need
php artisan make:filament-user
