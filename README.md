# Task Sasa Management Sys

This is a simple Task Management System built with **Laravel (backend)** and **Vue 3 + Inertia.js (frontend)**. It supports user authentication, task creation, and task status management. Admins can view all tasks and users, while regular users can only view their assigned tasks.

---

## 🚀 Features

- User authentication (Laravel Breeze with Inertia.js)
- Role-based access control (Admin & User)
- Task creation, assignment & status update
- Responsive UI with Tailwind CSS
- Admin dashboard with task summaries
- Scrollable task cards inside dashboard
- Email notifications for task updates (optional)

---

## 🛠️ Tech Stack

- Laravel 11
- Vue 3 (Composition API + `<script setup>`)
- Inertia.js
- Vite
- Pinia (state management)
- Tailwind CSS

---

## 📦 Installation

```bash
# 1. Clone the repo
git clone https://github.com/your-username/your-repo-name.git

# 2. Go into the project
cd your-repo-name

# 3. Install PHP dependencies
composer install

# 4. Install Node dependencies
npm install

# 5. Copy .env and generate app key
cp .env.example .env
php artisan key:generate

# 6. Set up your database in .env, then run:
php artisan migrate

# 7. Build frontend assets
composer run dev
```
