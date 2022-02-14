# Installation

Install this package by running:
```bash
composer require laravel-views/laravel-views
```

## Publishing assets
It is also necessary to publish some assets to your resources directory.
```bash
php artisan vendor:publish --tag=public --provider='LaravelViews\LaravelViewsServiceProvider' --force
```

## Including assets

### Dev environment
Add the following Blade directives in the *head* tag, and before the end of the *body* tag in your template.

```html
<html>
<head>
  ...
  @laravelViewsStyles
</head>
<body>
  ...
  @laravelViewsScripts
</body>
</html>
```

Laravel Views includes by default a set up using different parts of the TALL stack like the [Laravel livewire](https://laravel-livewire.com/) and [Tailwindcss](https://tailwindcss.com/) styles and scripts, it alsoincludes the [Alpine.js](https://alpinejs.dev/) script, after adding these directives you may need to clear the view cache

```bash
php artisan view:clear
```

These directives are fine for a dev environment, however, it is recommended to use your own Tailwindcss and Alpinde.js setup.

### Production environment

You can specify which assets you want to include passing a string to those directives with a list of the assets you want to include.

```php
@laravelViewsStyles(laravel-views,tailwindcss,livewire)
@laravelViewsScripts(laravel-views,livewire,alpine)
```

If you dont need to include `Tailwindcss`, `Livewire` or `Alpine` assets you can just set the `laravel-views` assets in the list.

```php
@laravelViewsStyles(laravel-views)
@laravelViewsScripts(laravel-views)
```

This is recomended for a production environment where you surely have a compile assets pipeline, like Laravel Mix, or you want to include the assets from a CDN on your own.

## Purge Tailwindcss styles
If you're using your own Tailwindcss setup you must consider `laravel-views` in your `purge` configuration, for that just add this path to the `purge` array on the `tailwind.config.js`file.

```php
"./vendor/laravel-views/**/*.php"
```
