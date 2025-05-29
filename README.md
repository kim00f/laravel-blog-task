# Laravel Blog Task

This is a simple blog system built with Laravel. It supports user registration, login, and full blog post CRUD (create, read, update, delete).

---

## Features
- User authentication
- Add, edit, delete blog posts
- Each post has title, content, and timestamps

---

## Setup Instructions

1. **Clone the project**:
```bash
git clone https://github.com/kim00f/laravel-blog-task.git
cd laravel-blog-task
```

2. **Install dependencies**:
```bash
composer install
```

3. **Set up environment**:
```bash
cp .env.example .env
php artisan key:generate
```

4. **Set database info in `.env`**

5. **Run migrations and seeders**:
```bash
php artisan migrate --seed
```

6. **Run the server**:
```bash
php artisan serve
```
Visit [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Demo Login
- Email: `test@example.com`
- Password: `password`

---

## Seeder
Seeds 1 demo user and some posts.

---

## Notes
- Only authenticated users can manage their posts
- CSRF protection enabled in forms
