# DesignRush
Test assignment for DesignRush

# Service Provider Directory (Laravel 11)

## Overview
Lightweight directory for listing service providers with category filters and profile pages.  
Built with Laravel 11 + Eloquent ORM.

## Install/Setup
**Run these commmands to setup the project**
- Run `composer install`
- Run `npm install`
- Run `mv .env.example .env` and set `DB_*` vars properly
- Run `php artisan key:generate`
- Run `php artisan migrate` - It will run default migrations + project specific migrations
- Run `php artisan storage:link`
- Run `php artisan db:seed` - It will seed DB with 50 providers and 5 categories
- Run `npm run build` - It will build the assets

## Design Decisions
- **Laravel 11 + Eloquent**: Clean ORM for relationships.
- **Inertia.js**: Connects Laravel and Vue directly, avoiding a separate API layer and reducing boilerplate.
- **Vue 3**: Lightweight frontend framework with a strong reactivity system.
- **Tailwind CSS**: Utility-first CSS framework that ensures consistent design and fast prototyping.

## Performance Optimizations
- **Eager Loading**: Prevents N+1 issues by loading related data in fewer queries.
- **Custom Pagination**: Implements pagination logic in memory without additional database queries.
- **Image Optimization**: Lazy loading.
- **JS/CSS**: Deferring JavaScript, lazy-loading components, and minimizing critical CSS.
- **DB Indexes**: Speeds up lookups and filtering by adding indexes to key columns such as slug, name, and foreign keys.

## Future Enhancements
- **Image Optimization**: Use WebP/AVIF for smaller, faster-loading images.
- **Caching (Redis)**: Store frequently accessed queries in Redis to reduce DB load.
- **Laravel Admin Area**: Add Nova or Filament for easier CRUD management.
- **Full-text Search**: Use Elastic/Meilisearch for flexible search.
- **Multi-Category Selection/Functionality**: Connect Providers with multiple categories, filter by mutliple categories.
- **API (CRUD actions for Providers)**:  Expose providers via REST API to enable integrations and mobile apps.

## Testing
- PHPUnit unit tests included.
- Run `php artisan test` to execute the suite.
