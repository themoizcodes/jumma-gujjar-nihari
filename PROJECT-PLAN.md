# Jumma Gujjar Nihari — Project Plan

## Phase 1: Project Planning (✅ Completed)

### Restaurant Identity
| Item | Detail |
|---|---|
| **Name** | Jumma Gujjar Nihari |
| **Logo** | Text-based logo (styled wordmark, no image logo yet) |
| **Brand Theme** | Luxury / Modern — dark background with gold accents |
| **Target Customers** | All — locals + food tourists/foodies across Karachi |
| **Location** | Liaquatabad (B Area), Karachi |
| **Contact** | +92 304 1300535 |
| **Specialty** | Nihari with Desi Ghee ka Tarka, Nalli & Maghaz options |
| **Opening Hours** | Placeholder: Daily 7:00 AM – 1:00 AM *(confirm exact hours with restaurant owner — update in Phase 3 contact section)* |

### Brand Colors (Luxury/Modern — Dark + Gold)
| Token | Hex | Usage |
|---|---|---|
| `--color-bg-dark` | `#0D0D0D` | Primary background |
| `--color-bg-dark-2` | `#1A1512` | Section backgrounds |
| `--color-gold` | `#C9A24B` | Primary accent (headings, buttons, borders) |
| `--color-gold-light` | `#E4C87E` | Hover states, highlights |
| `--color-cream` | `#F5EFE6` | Text on dark backgrounds |
| `--color-maroon` | `#4A0E0E` | Secondary accent (nods to nihari/desi roots) |

### Typography
- **Headings:** Playfair Display (serif — luxury feel)
- **Body:** Poppins (clean, modern, readable)

### Tech Stack
- Laravel 13 (backend + Blade views)
- Tailwind CSS v4 (styling)
- SQLite/MySQL (DB — menu items, categories)
- Vite (asset bundling)

### Note on Environment
This project was scaffolded from the official Laravel GitHub skeleton since the coding sandbox can't reach Packagist directly. Once you receive the final folder, run:
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run build
php artisan serve
```

---
## Phase 2: Customer-Facing Website (✅ Completed)

### Pages Built
- **Home** (`/`) — Hero, intro, featured dishes, chef intro, reviews, gallery, hours & location
- **About Us** (`/about`) — Story, philosophy, history, kitchen team, awards, values
- **Digital Menu** (`/menu`) — Category-tabbed menu (Nihari, Paya, Siri, Naan & Bread, Desserts, Beverages)
- **Table Reservation** (`/reservation`) — Live availability check + booking form
- **Booking Confirmation** (`/reservation/confirmation/{ref}`) — Shows Booking ID (e.g. `#RSV-1025`)

### Reservation System Logic
1. Guest selects date, time, guest count → "Check Availability"
2. AJAX call finds tables with sufficient capacity not already booked for that exact date/time
3. If available, shows table number + status, reveals contact details form
4. On submit, re-checks for race-condition double-booking, then creates the reservation
5. Redirects to a confirmation page with a generated Booking ID (`RSV-` + 1000 + reservation ID)

### Database (seeded data)
- 6 categories, ~19 menu items (Nihari-specific), 12 tables (capacity 2–8), 4 reviews, 6 gallery images, 2 team members

### Still using placeholder food/gallery images (Unsplash stock, brand-colored)
Replace with real restaurant photos before going live — see `database/seeders/MenuItemSeeder.php`, `GalleryImageSeeder.php`, `ChefSeeder.php`.

---
## Phases 3–9: Admin Panel, Auth, Notifications, Security (✅ Mostly Completed)

### Phase 3 — Reservation Management (Admin)
- View all bookings with filter tabs (Pending / Confirmed / Rejected / Cancelled / Completed)
- Change status via dropdown → auto re-checks table availability logic
- Email sent to customer on status change (if mail configured)

### Phase 3 — Menu Management (Admin)
- Add / Edit / Delete food items, upload real image files (stored via Laravel Storage, `public` disk)
- Change price, toggle featured/available
- Manage categories (add/delete, with protection against deleting non-empty categories)

### Phase 3 — Table Management (Admin)
- Add / Edit / Delete tables, set capacity, toggle Active/Inactive status
- Protected from deleting a table with active reservations

### Phase 3 — Customer Management (Admin)
- View all registered customers: name, phone, email, full booking history

### Phase 5 — Authentication
- Customer: Register / Login / Logout / Profile / My Reservations
- Admin: separate role-based access via `role` column + `EnsureUserIsAdmin` middleware
- Session-based Laravel Auth (built-in, no external package needed — see note below)
- **Default admin login (change after first run):** `admin@jummagujjarnihari.test` / `password`

### Phase 6 — Notifications
- Email on reservation received, confirmed, rejected, cancelled (customer)
- Email to admin (`ADMIN_EMAIL` in `.env`) on new booking
- Defaults to `MAIL_MAILER=log` (writes to `storage/logs/laravel.log`) until real SMTP is configured — nothing will break, emails just won't actually send until you add SMTP credentials

### Phase 7 — Online Payment
**Not implemented — deferred as requested ("baad mein add karenge").** Can be added later (e.g. via a payment gateway) once you decide on a provider (JazzCash, Easypaisa, Stripe, etc.)

### Phase 8 — Responsive Design
All pages (public + admin) built mobile-first with Tailwind responsive utilities (`sm:`, `md:`, `lg:`) — tested visually across breakpoints in the code structure.

### Phase 9 — Security
- CSRF protection on all forms (`@csrf`)
- Password hashing via `Hash::make()` / Laravel's `hashed` cast
- Form validation on every input (server-side)
- SQL injection protection via Eloquent ORM (parameterized queries)
- Admin routes protected by `auth` + `admin` middleware
- Login attempts throttled (`throttle:5,1`)

### Important note on package installation
Since this coding sandbox can't reach Packagist, authentication was hand-built using Laravel's **built-in** `Auth`, `Hash`, and `Validator` facades (no Breeze/Jetstream/Sanctum package needed for this session-based setup) — so it works with a plain `composer install` of the base `laravel/framework`, no extra `composer require` needed.

### Setup reminder for image uploads
After `composer install`, run:
```bash
php artisan storage:link
```
This lets uploaded menu images (via Admin → Menu → Add/Edit) be publicly viewable.

---
## Remaining
- Phase 7 (Payment) — deferred, not built
- Phase 10 (DB Design) — already reflected in the actual schema (see migrations)
- Testing & Deployment (Steps 18–19 from your dev order) — not yet done; let me know when you're ready for that

## Upcoming Phases (awaiting your roadmap)
- Anything else you'd like refined or added
