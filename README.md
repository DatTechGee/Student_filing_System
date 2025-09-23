
# Student Filing System

A modern Laravel-based portal for managing student records, document requirements, and uploads. Designed for educational institutions to streamline student and admin workflows with a responsive, icon-rich UI.

## Features
- Admin and student dashboards with statistics
- Student registration, profile management, and secure login
- Bulk student upload for admins
- Document requirement setup and tracking
- Secure file uploads and storage
- Department and faculty management
- Password change enforcement for users
- Admin document resubmission/cancellation
- Responsive, modern UI with Tailwind CSS and icons

## Tech Stack
- Laravel (PHP framework)
- Blade templating
- Tailwind CSS (via app.css)
- MySQL or compatible database

## Setup Instructions

1. **Clone the repository:**
	```sh
	git clone <repo-url>
	cd student-filing-system
	```
2. **Install PHP dependencies:**
	```sh
	composer install
	```
3. **Install Node.js dependencies:**
	```sh
	npm install
	```
4. **Copy and configure environment:**
	```sh
	cp .env.example .env
	# Edit .env to set your database and mail settings
	```
5. **Generate application key:**
	```sh
	php artisan key:generate
	```
6. **Run migrations and seeders:**
	```sh
	php artisan migrate --seed
	```
7. **Build frontend assets:**
	```sh
	npm run build
	```
8. **Start the development server:**
	```sh
	php artisan serve
	```

## Usage
- Visit `http://127.0.0.1:8000/` for the home page
- Visit `/admin/login` for the admin portal
- Visit `/student/login` for the student portal
- Use seeded demo accounts or register new users

## Folder Structure
- `app/` - Laravel application code (models, controllers, etc.)
- `resources/views/` - Blade templates for all pages
- `public/` - Public assets and entry point
- `database/` - Migrations, seeders, and factories
- `routes/` - Route definitions

## Customization
- Update `resources/views/` for UI changes
- Edit `app/Http/Controllers/` for backend logic
- Add new migrations/seeders in `database/`

## Credits
Created by DatTechGee

## login Details
- admin `/admin/login` username - admin,  password- admin
- student `/student/login` username - matrci numbe rof student default password -student