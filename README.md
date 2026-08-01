# Jumma Gujjar Nihari — Restaurant Website

Premium restaurant website for **Jumma Gujjar Nihari** (Liaquatabad, Karachi) built with Laravel 13, Tailwind CSS v4, and a Blade frontend. Includes a full table reservation system with live availability checking, customer accounts, and an admin panel for managing reservations, menu, tables, and customers.

See `PROJECT-PLAN.md` for the full phase-by-phase breakdown of what's built.

## Requirements
- PHP 8.2+ (Laravel 12)
- Composer
- MySQL (or SQLite for quick local testing)
- Node.js + npm (for Tailwind/Vite asset building)

## Setup

```bash
# 1. Install PHP dependencies
composer install

# 2. Install frontend dependencies
npm install

# 3. Copy environment file
cp .env.example .env

# 4. Generate app key
php artisan key:generate

# 5. Configure your database in .env
#    Default is MySQL — create a database named `jumma_gujjar_nihari`
#    (or set DB_CONNECTION=sqlite and `touch database/database.sqlite` for quick testing)

# 6. Run migrations + seed sample data (menu, tables, reviews, gallery, admin account)
php artisan migrate --seed

# 7. Link storage so uploaded menu images are publicly viewable
php artisan storage:link

# 8. Build frontend assets
npm run build
# (or `npm run dev` while actively developing)

# 9. Serve the app
php artisan serve
```

Visit `http://localhost:8000`

## Default Admin Login
- **Email:** admin@jummagujjarnihari.test
- **Password:** password

⚠️ Change this password immediately after first login (via a database update or by adding a change-password feature) before deploying live.

## Email Notifications

The site sends branded (dark + gold) emails automatically for:
- **Customer:** booking received, confirmed, rejected, cancelled
- **Admin:** a new-booking alert to `ADMIN_EMAIL` every time a reservation is placed

By default, `MAIL_MAILER=log` — emails are written to `storage/logs/laravel.log` instead of actually sending. To go live:

1. Open `.env` and fill in your SMTP provider (see the commented block above `MAIL_MAILER`), e.g. Gmail, Mailgun, or any SMTP host.
2. Set `MAIL_FROM_ADDRESS` to the "from" address you want guests to see.
3. Set `ADMIN_EMAIL` to the inbox that should receive new-booking alerts.
4. Verify it works from the **Admin → Dashboard → Email Notifications → Send Test Email** button. It sends a test email to `ADMIN_EMAIL` and reports any configuration errors on screen.

> With `MAIL_MAILER=log`, clicking **Send Test Email** writes a rendered copy of the email into `storage/logs/laravel.log` so you can preview it without SMTP.

## Project Structure Highlights
- `app/Http/Controllers` — public site controllers + `Admin/` and `Auth/` subfolders
- `app/Models` — Category, MenuItem, RestaurantTable, Reservation, Review, GalleryImage, Chef, User
- `database/seeders` — sample data (Nihari-specific menu, tables, admin account)
- `resources/views` — Blade templates (public pages, `admin/`, `auth/`, `emails/`)
- `routes/web.php` — all routes, grouped by public / guest / auth / admin

## Notes
- Food & gallery images are currently Unsplash stock placeholders — replace with real restaurant photos via the Admin → Menu panel (image upload) or by editing the seeder files.
- Online payment (Phase 7) was intentionally left out per your request — can be added later once you pick a payment provider.
