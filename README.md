# Delivery

Веб‑приложение для управления доставкой заказов (курьеры, заказы, статусы, маршруты) на **Laravel 12** с админ‑панелью на **Filament 5**.

Приложение рассчитано на использование в роли внутренней панели для операторов и администраторов службы доставки (управление заказами, пользователями, справочниками и т.д.).

### Основные возможности

- **Управление заказами**: создание и редактирование заказов, смена статусов.
- **Пользователи/курьеры**: управление пользователями системы и доступами.
- **Админ‑панель Filament**: удобный интерфейс для операционных задач.
- **Фоновая обработка задач**: очереди Laravel (Redis) для долгих операций.

## Стек технологий

- **Язык / фреймворк**: PHP 8.5, Laravel 12, Eloquent
- **Админ‑панель**: Filament 5 (панель по пути `/admin`)
- **Фронтенд**: Vite, TailwindCSS
- **Инфраструктура (dev)**: Docker Compose (nginx + php-fpm + MySQL 8 + Redis 7)

## Требования

### Для запуска в Docker (рекомендуется)

- Docker + Docker Compose
- Node.js + npm (на хосте, для сборки фронта)

### Для локального запуска без Docker

- PHP **8.5**
- Composer
- Node.js + npm (Node LTS 20+)
- MySQL 8
- Redis

## Быстрый старт в Docker

### 1. Поднять контейнеры

```bash
docker compose up -d --build
```

### 2. Настроить окружение

```bash
cp .env.example .env
```

Откройте `.env` и проверьте как минимум:

- `APP_URL=http://localhost`
- `DB_HOST=db`
- `DB_PORT=3306`
- `REDIS_HOST=redis`

### 3. Установить зависимости и прогнать миграции

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

### 4. Собрать фронтенд‑ассеты

Node не установлен в `app`‑контейнере, поэтому сборка выполняется на хосте, из корня проекта:

```bash
npm install
npm run build
```

### 5. Доступ к сервисам

- **Web**: `http://localhost`
- **Admin (Filament)**: `http://localhost/admin`
- **MySQL (порт на хосте)**: `127.0.0.1:3307`
- **Redis (порт на хосте)**: `127.0.0.1:6379`

## Локальный запуск (без Docker)

### 1. Установка зависимостей и базовая настройка

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Настройка БД и Redis

В `.env` укажите свои настройки, например:

- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `REDIS_HOST=127.0.0.1`

Затем примените миграции:

```bash
php artisan migrate
```

### 3. Запуск dev‑среды одной командой

В проекте есть удобный скрипт, который поднимает все нужные процессы:

```bash
composer run dev
```

Он одновременно запускает:

- `php artisan serve` — HTTP‑сервер приложения
- `php artisan queue:listen --tries=1` — обработчик очередей
- `php artisan pail --timeout=0` — просмотр логов в реальном времени
- `npm run dev` — Vite с hot‑reload фронтенда

## Быстрая установка (локально, один шаг)

Для первичной настройки проекта можно использовать:

```bash
composer run setup
```

Скрипт выполняет:

- `composer install`
- создание `.env` (если его нет)
- генерацию ключа приложения
- применение миграций
- установку npm‑зависимостей
- сборку фронтенда

## Админ‑панель Filament

- **URL**: `/admin`
- **Провайдер панели**: `app/Providers/Filament/AdminPanelProvider.php`

Создать администратора (один из вариантов, зависит от версии Filament и доступных команд):

```bash
php artisan make:filament-user
```

Если команда отличается, посмотрите список доступных команд:

```bash
php artisan list
```

## Полезные artisan‑команды

- **Очистка кешей**:

```bash
php artisan optimize:clear
```

## Частые проблемы

- **403 / ошибки записи в `storage` / `bootstrap/cache` в Docker** — контейнер при старте выставляет права на эти папки (см. `entrypoint.sh`). Если вы меняли владельца файлов на хосте, пересоберите контейнер и перезапустите:
  - `docker compose down`
  - `docker compose up -d --build`
- **Приложение не открывается в браузере** — убедитесь, что порт `80` свободен. При необходимости измените проброс порта в `docker-compose.yml` и перезапустите контейнеры.
