# Filters

Compatible with [Table view](/table-view), [Grid view](/grid-view), [List view](/list-view)

You can add features to filter the data in the view, when a filter is configured, a button is shown at the top right of the table displaying a dropdown with all the filers. Every filter is a PHP class where you can define the options to show and the query to be executed when the filter is enabled. The filters are registered on the view file and you can re-use them on different views.

![Filters](/img/docs/filters.png)

## Select filter

The most common filter, allows the user to choose an option from a dropdown menu.

![Select filter](/img/docs/select.png)

```bash
php artisan make:filter Filters/UsersActiveFilter
```

With this artisan command a `UsersActiveFilter.php` file will be created inside `app/Filters` directory, you can use any namespace you want. The class created has 2 methods, `apply` and `options`, with `apply` you can modify the current query with your own business logic for this filter, with the `options` method you can define the title and the values for each option, the keys in the arrey returned by the `options` method are the labels for the UI, the values are the potential values you will get when an options is selected.

```php
class UsersActiveFilter extends Filter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request)
    {
        return $query->where('active', $value);
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options()
    {
        return [
            'Active' => 1,
            'Disabled' => 0,
        ];
    }
}
```
The `apply` method receives the current `$query`, the `$value` selected by the user (defined in the `options` method) and the current `$request`, it should return the modified query

## Boolean filter
This filter allows the user to choose multiple options from a list of input check boxes.

![Boolean filter](/img/docs/boolean.png)

```bash
php artisan make:filter Filters/UsersTypeFilter --type=boolean
```

Same as select filter, the boolean filter has 2 methods, `apply` and `options`, with the `apply` method you can modify the current query with your own business logic for this filter, and with the `options` method you can define the title and the value for each option.

```php
class UsersTypeFilter extends BooleanFilter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param Array $value Associative array with the boolean value for each of the options
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request)
    {
        // $value['admin'] = true/false
        if ($value['admin']) {
            $query->where('is_admin', true);
        }
        // $value['writer'] = true/false
        if ($value['writer']) {
            $query->where('is_writer', true);
        }
        return $query;
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options()
    {
        return [
            'Administrator' => 'admin',
            'Writer' => 'writer',
        ];
    }
}
```

In this case the `apply()` method receives the current `$query` and an associative array with the boolean value for each one of the options defined and the current `$request`, it should return the modified query.

## Date filter

The date filter allows the user select the value by a date picker.

![Date filter](/img/docs/date.png)

```bash
php artisan make:filter Filters/CreatedFilter --type=date
```

The date filter only has the `apply()` method, with this method you can modify the current query with your own business logic for this filter.

```php
class CreatedFilter extends DateFilter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param Carbon $date Carbon instance with the date selected
     * @return Builder Query modified
     */
    public function apply(Builder $query, Carbon $value, $request)
    {
        // $query->where('', $value);
    }
}
```

In this case the `apply` method receives the currenct `$query` and the value selected by the user, this value is a `Carbon` instance of the date, it should return the modified query.

## Registering filters
Once you hace created your filter, you should register all the filters in your view defining a `filters` method returning an array with all the filters you want to use.

```php
protected function filters()
{
    return [
        new UsersActiveFilter,
        new CreatedFilter,
        new UsersTypeFilter
    ];
}
```

## Changing title
You can customize the title of the filter adding a public property `$title` with the title new title.

```php
public $title =  "My custom title";
```
