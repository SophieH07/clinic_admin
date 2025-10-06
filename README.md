# clinic_admin — Local setup

## Prerequisites

- Git
- PHP
- Composer
- Node.js and npm
- A database server (MySQL) for quick local development

Quick checks (PowerShell):

```powershell
php -v
composer -V
node -vc
npm -v
git --version
```

## Step-by-step setup (PowerShell)

1. Clone the repository and change into it

```powershell
git clone https://github.com/SophieH07/clinic_admin.git
cd clinic_admin
```

2. Install PHP dependencies (Composer)

```powershell
composer install
```

3. Install Node dependencies and build assets

```powershell
npm install
# For development (hot reload with Vite)
npm run dev
# For production build
npm run build
```

4. Create the environment file & Create or configure the database

MySQL:

```powershell
# Create database (replace credentials as needed)
mysql -u root -p -e "CREATE DATABASE {DB_NAME} OR clinic_admin_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

Then edit `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 / {DB_PORT} ~if it runs on different port
DB_DATABASE={DB_NAME} / clinic_admin_db
DB_USERNAME={USER_NAME}
DB_PASSWORD={PASSWORD}
```

6. Generate application key and clear caches - OPTIONAL

```powershell
php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

7. Run migrations and seeders

```powershell
php artisan migrate
# or to refresh and seed
php artisan migrate:fresh --seed
```

If you are running this in a non-interactive environment or CI for production, add `--force`.

8. Create storage symlink - OPTIONAL

```powershell
php artisan storage:link
```

9. Start the application

```powershell/terminal
php artisan serve
# open http://127.0.0.1:8000

composer run dev
```
