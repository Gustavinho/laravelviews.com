# Customization

These views are build with [Tailwind CSS](https://tailwindcss.com/) and you can either change the colors of the components following tailwindcss utilities or fully customize all the html of the components

## Component variants using tailwindcss
You can customize some of the components styles (like the color) for each one of the variants using the config file.

```bash
php artisan vendor:publish --tag=config
```
or you can specify the provider
```bash
php artisan vendor:publish --tag=config --provider='LaravelViews\LaravelViewsServiceProvider'
```

Inside this config file you can change the colors for each component variant. If you are updating this package you might need to republish this config file.

## Components full customization

If you are not using taildwindcss, or if you want to have a full customization over the components, you can publish all the blade files used for these views.

```bash
php artisan vendor:publish --tag=views
```
or you can specify the provider
```bash
php artisan vendor:publish --tag=views --provider='LaravelViews\LaravelViewsServiceProvider'
```

After publishing the components, you will have a `vendor/laravel-views` in your resources folder with all the component files used in the different views.

If you are updating this package you might need to republish these views.