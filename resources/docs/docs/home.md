# Laravel views

[See live example](https://laravelviews.com)

Laravel package to create beautiful common views like data tables for the TALL stack.

<!-- ![](/img/docs/laravel-views.png) -->


## Available views
### Table view

Dynamic data table with some features like filters, pagination and search input, you can customize the headers, the data to be displayed for each row

![Table](/img/docs/table.png)

### Grid view

Dynamic grid view using card data, same as a TableView this view has features like filters, pagination and a search input, you can also customize the card data as you need

![Grid view](/img/docs/grid.png)

### List view

Dynamic list view with filters, pagination, search input, and actions by each item, it is useful for small screens, you can also customize the item compoment for each row as you need.

![List view](/img/docs/list.png)

### Detail view
Dynamic detail view to render a model attributes list with all the data you need, you can also customize the default component to create complex detail views and execute actions over the model is being used.

![Detail view](/img/docs/detail.png)

## Version compatibility
|Laravel views|Alpine|Livewire|Laravel|
|-|-|-|-|
|2.x|2.8.x, 3.x.x|2.x|7.x, 8.x, 9.x|
|1.x|2.8.x|1.x|5.x, 6.x|


## Contributing

Check the [contribution guide](CONTRIBUTING.md)

## Roadmap

Laravel Views is still under heavy development so I will be adding more awesome features and views.

Here's the plan for what's coming:

- **New form view**
- **New layout view**
- Add tooltips to actions buttons
- Add a download action
- Add translations
- Add links as a UI helpers

## Upgrade guide

### From 2.2 to 2.3
**Cached views**

The blade directives have changed, you need to clear the cached views with `php artisan view:clear`

**Public assets**

The main assets (JS and CSS files) have changed, you need to publish the public assets again with `php artisan vendor:publish --tag=public --provider='LaravelViews\LaravelViewsServiceProvider' --force`

**Publish blade componentes**

Some of the internal components have changed, if you have published these components before to customize them, you will not have them up to date, unfourtunately you need to publish them again with `php artisan vendor:publish --tag=views --provider='LaravelViews\LaravelViewsServiceProvider'` and customize them as you need.

**Method `renderIf()` in actions**

Update the renderIf() function in your action classes adding a new `$view` parameter as follows:
  ```php
  <?php

  namespace App\Actions;

  use LaravelViews\Actions\Action;
  use LaravelViews\Views\View;          // new line

  class YourAction extends Action
  {
      public function renderIf($item, View $view)       // add the view parameter
      {
          // your content
      }
  }
  ```
**Publish config file (Optional)**

Some new variants have been added to the config file, if you have published the config file before, you could publish it again so you can customize the new variants, this doesn't affect anything at all since the new variants will be taken from the default config file.

**Remove `repository` method from your views (Optional)**

If your `repository()` methods are returning a query object without any other query applied like `User::query()`, you can define a `protected $model = User::class;` instead, this is the default behavior now, the `repository()` method is still working so you don't need to change anything if you don't want to.

```php
/* Before */
public function repository(): Builder
{
    // You are using a single query
    return User::query();
}

/** After */
protected $model = User::class;
```
