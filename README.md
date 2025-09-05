# designrush
Test assignment for DesignRush

# Service Provider Directory (Laravel 11)

## Overview
Lightweight directory for listing service providers with category filters and profile pages.  
Built with Laravel 11 + Eloquent ORM.

## Install/Setup
**Run these commmands to setup the project**
- Run `composer install`
- Run `npm install`
- Run `php artisan migrate` - It will run default migrations + project specific migrations
- Run `php artisan storage:link`
- Run `php artisan db:seed` - It will seed DB with 50 providers and 5 categories
- Run `npm run build` - It will build the assets

## Design Decisions
- **Laravel 11 + Eloquent**: Clean ORM for relationships.
- **Blade SSR**: Fast TTFB, minimal JS required.
- **Pagination**: Reduces payload and improves performance.
- **Eager Loading**: Avoids N+1 queries when fetching categories.

## Performance Optimizations
- **Eager Loading**: All providers load with their categories.
- **Pagination**: Only 20 items per request.
- **Image Optimization**: Lazy loading, WebP/AVIF recommended.
- **JS/CSS**: Defer JS, inline critical CSS for faster LCP.
- **Caching**: Redis for provider listings and categories.
- **DB Indexes**: On slug + category_id for fast lookups.

## Future Enhancements
- Full-text search (Elastic/Meilisearch).
- Admin dashboard (Laravel Nova/Filament).
- API endpoints with rate limiting.
- Continuous performance monitoring with Lighthouse CI.

## Testing
- PHPUnit feature tests included.
- Run `php artisan test` to execute the suite.

## Benchmarks
- Before/after Lighthouse results should be documented.
- Track LCP, CLS, and INP improvements over time.
