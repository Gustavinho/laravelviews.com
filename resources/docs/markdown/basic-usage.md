# Basic usage

## First table view
This is a basic usage of a table view, you can [read the full table view documentation.](/table-view)

Once you have installed the package and included the assets you can start to create a basic table view by running:

```bash
php artisan make:table-view UsersTableView
```

With this artisan command a `UsersTableView.php` file will be created inside the `app/Http/Livewire` directory.

The basic usage needs a model class, headers and rows, you can customize the items, the headers, and the data for each row like this example.
```php
<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;
use App\User;

class UsersTableView extends TableView
{
    protected $model = User::class;

    public function headers(): array
    {
        return [
            'Name',
            'Email',
            'Created',
            'Updated'
        ];
    }

    public function row($model)
    {
        return [
            $model->name,
            $model->email,
            $model->created_at,
            $model->updated_at
        ];
    }
}
```

## Rendering the table view
You can render this view in the same way as you would do it for a livewire component ([Rendering components](https://laravel-livewire.com/docs/2.x/rendering-components)).
The easiest way to render the view is using the livewire tag syntax:

```html
<livewire:users-table-view />
```

You could also use the `@livewire` blade directive.
```php
@livewire('users-table-view')
```

At this point, you would be able to see a table with some data, the table view doesn't have any styled container or title, you can render the table view inside any container you want.

In the example above the view is using the `User` model created by default in every Laravel project, feel free to use any other model you want, the method `row` is getting a single model object and you can use any property or public method you have difined inside your model.

This is the basic usage of the table view, but you can customize it with more features.

[Read the full table view documentation ](/table-view)