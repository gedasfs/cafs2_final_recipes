# Recipes app
This is a recipes website app, build as a final project for CAFS2 course (2022).

## Installation (w/ Docker Compose)
- Have Docker set up and configured. Docker Desktop recommended;
- Get App (`git clone ... `);
- Set database connection parameters in .env files (docker/.env/env and src/.env)
- Run docker compose (`docker compose up`);
- Inside container, install composer dependencies (`composer install`);
- Generate app key (`php artisan key:generate`);
- Run migrations (`php artisan migrate`);
- Create symlink for images (`php artisan storage:link`);
- Inside src, install npm dependencies (`npm install`);
- Build app: `npm run dev` or `npm run build`;
- View the app. Might get an error about permissions to write inside src/storage. Change/give permissions.
