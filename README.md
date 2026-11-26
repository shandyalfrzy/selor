# SÉLOR

SÉLOR is a Laravel 12 fashion catalog with a public storefront and a
session-authenticated admin area.

## Local setup with Laragon

1. Start the MySQL service in Laragon and create a database named `selor_db`.
2. Configure `.env` with the MySQL connection and set `ADMIN_NAME`,
   `ADMIN_EMAIL`, and `ADMIN_PASSWORD` for the administrator account.
3. Install PHP dependencies if they are not already present:

   ```sh
   composer install
   ```

4. Create the tables and seed the catalog and admin account:

   ```sh
   php artisan migrate --seed
   ```

5. Link public file storage:

   ```sh
   php artisan storage:link
   ```

The admin sign-in route is `/admin/login`. When using Laragon's virtual host,
open the project using its configured local domain. Alternatively, Laravel's
development server can be started with `php artisan serve`.

The admin seeder reads credentials from environment variables and does not
provide a hard-coded password.
