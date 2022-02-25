# First Deploy

```bash
composer install
composer run-script post-root-package-install
php artisan key:generate
```

Fill .env

Create OAuth Client on Auth Server

Redirect URL should be like:
<http://passport-resource-server.test/auth/callback>

```bash
php artisan migrate --force

npm i
npm run production
```
