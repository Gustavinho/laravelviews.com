# Table view

[See live example](/examples/table-view)

This view creates a dynamic data table with some features like filters, pagination and search input, you can customize the headers, the data to be displayed for each row.

![](/img/docs/table.png)

## Create new table view

```bash
php artisan make:table-view UsersTableView
```

With this artisan command, a `UsersTableView.php` file will be created inside the `app/Http/Livewire` directory, with this class you can customize the behavior of the table view.

## Defining initial data
The TableView class needs a model class to get the initial data to be displayed on the table, you can define it in the `$model` property.

```php
use App\User;

protected $model = User::class;
```

If you need an specific query as initial data you can define a `repository()` method  returning an `Eloquent` query with the initial data to be displayed on the table, it is important to return the query, not the data collection.

```php
use App\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * Sets a initial query with the data to fill the table
 *
 * @return Builder Eloquent query
 */
public function repository(): Builder
{
    return User::query();
}
```

If you define this method, the `$model` property is not needed anymore.

## Headers
Returns an array with all the headers you need, the easiest way to define a header is using a string with the title.

```php
public function headers(): array
{
    return ['Name', 'Email', 'Created', 'Updated'];
}
```

You could create a more complex header instead, so you can set a fixed width to the column, just use the `Header` facade instead of a string in the `headers()` method.

```php
use LaravelViews\Facades\Header;

public function headers(): array
{
    return [
        Header::title('Name')->width('20%'),
        Header::title('Email')->width('100px'),
        'Created',
    ];
}
```

## Rows
Returns an array with all the data you need for each row, this method receives an model instance for every row in the database according with the initial query and the filters activated. The easiest way to define the data is using a string value.

```php
public function row($model)
{
    return [
        $model->name,
        $model->email,
        $model->created_at,
        $model->updated_at
    ];
}
```

## Sorting data
As the table view uses headers, you can use the `sortBy()` method of the `Header` facade to set the header as sortable.

```php
use LaravelViews\Facades\Header;

public function headers(): array
{
    return [
        Header::title('Name')->sortBy('name'),
        'Email',
    ];
}
```

## More features

In addition, this view supports more features like: [Searching data](/search), [Pagination](/pagination), [Filters](/filters), [Actions](/actions), [Inline editing](/inline-editing), and [UI components](/ui-components)