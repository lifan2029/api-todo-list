# 🗒️ Todo List API

A simple REST API for managing tasks (todo list), built with **Laravel 10 (PHP 8.2)** and **Docker**.  
This project is a **pet project** and serves as a demonstration of REST API architecture with online **Postman documentation**.

---

## 🚀 Tech Stack

- **PHP 8.2**
- **Laravel 10**
- **Docker / Docker Compose**
- **MySQL**
- **Composer**
- **Postman** (for API documentation)

---

## 🧩 Features

- Create new tasks  
- Retrieve all tasks  
- Update and delete tasks  
- Mark tasks as completed / uncompleted  
- Filter tasks by status  

---

## ⚙️ Installation & Setup

### 1. Clone the repository

```bash
git clone https://github.com/username/todo-api.git
cd todo-api
```

### 2. Copy environment file

```bash
cp .env.example .env
```

### 3. Configure `.env` variables

```env
APP_NAME="Todo List API"
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=laravel-db
DB_PORT=3306
DB_DATABASE=api_todo_list
DB_USERNAME=todolistuser
DB_PASSWORD=ortERSAkiEntALMaXI
```

### 4. Build and start Docker containers

```bash
docker compose up -d --build
```

### 5. Install Laravel dependencies

```bash
docker compose exec laravel-php composer install
```

### 6. Generate application key

```bash
docker compose exec laravel-php php artisan key:generate
```

### 7. Run database migrations

```bash
docker compose exec laravel-php php artisan migrate
```

---

## 🧠 API Endpoints

| Method | Endpoint | Description |
|--------|-----------|-------------|
| `GET` | `/api/v1/task` | Get all tasks |
| `POST` | `/api/v1/task/store` | Create a new task |
| `PUT` | `/api/v1/task/update/{id}` | Update a task |
| `PUT` | `/api/v1/task/complete/{id}` | Complete a task |
| `DELETE` | `/api/v1/task/delete/{id}` | Delete a task |

Example request (create a task):
```json
POST /api/v1/task/store
{
  "title": "Build a demo project",
  "description": "Create an API for a todo list",
  "due_date": "01.09.2025 17:51",
  "priority_id": 1
}
```

---

## 📘 API Documentation (Postman)

The online Postman collection is available here:  
👉 [Open Postman Collection](https://www.postman.com/coreflowx/api-todo-list)

---

## 🔧 Useful Commands

```bash
docker compose exec app php artisan migrate:fresh --seed   # Recreate DB with seed data
docker compose exec app php artisan test                   # Run tests
docker compose logs -f app                                 # View container logs
```

---

## 💡 Author

**Your Name**  
📧 lifan2029@gmail.com  
🌐 [GitHub](https://github.com/lifan2029)

---

> 🧠 This project was created for learning purposes to demonstrate Laravel API development with Docker.
