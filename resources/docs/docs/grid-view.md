# Grid view

[See live example](/examples/grid-view)

This view creates a dynamic grid view using card data, same as a TableView this view has features like filters, pagination and, a search input, it comes with a default card ready to use with some basic data and it also can use a customized card if it is needed.


![Grid view](/img/docs/grid.png)

## Create new grid view

```bash
php artisan make:grid-view UsersGridView
```

With this artisan command a `UsersGridView.php` file will be created inside `app/Http/Livewire` directory, with this class you can customize the behavior of the grid view.

## Defining initial data

The GridView class needs a model class to get the initial data to be displayed on the view, you can define it in the `$model` property.

```php
use App\User;

protected $model = User::class;
```

If you need an specific query as initial data you can define a `repository()` method  returning an `Eloquent` query with the initial data to be displayed on the grid view, it is important to return the query, not the data collection.

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

## Defining card data

The grid view uses blade components for showing every item in the grid, that blade component gets its props defining a `card()` method, it returns an array and every item of this array will be passes as a prop to the blade component.

### Using the default card

![Default card](/img/docs/card.png)

The grid view uses a default card showing some basic data, the array returned by the `card()` method should have the `image`, `title`, `subtitle` and the `description` of the card.

```php
public function card($item)
{
    return [
        'image' => $item->photo,
        'title' => $item->name,
        'subtitle' => $item->email,
        'description' => $item->description
    ];
}
```

These are the fields by default but you can add more if you want to customize your card.

## Customizing the card

The grid view has a card component by default with some data, however, you can create your own card component and use as much data as you need in the `card` method, you just need to specify a blade file with your card component and return the data that you need in the `card()` method.

```php
public $cardComponent = 'components.my-card';

public function card($model) {
    return [
        'name' => $model->name,
        'email' => $model->email,
        'model' => $model
    ];
}
```

All the data returned in the `card` method will be received as a prop in your blade component along with these other default props that you can use based on your needs.

Name|Description|Type|Value
--|--|--|--|
withBackground|Defines if the card should have a background|Boolean|true,false
model|Model instance for this card|||
actions|Actions defined in this view class|Array
hasDefaultAction|Checks if the Grid View has defined the `onCardClick()` method|Boolean|true,false
selected|Defines if the item was selected when the grid view has bulk actions|Boolean|true,false

With all this data you can build your own card component as you need, remember to include an `actions` component.

```html
<x-lv-actions :actions="$actions" :model="$model" />
<!-- Or -->
<x-lv-actions.drop-down :actions="$actions" :model="$model" />
```


## Default card item action
You can define a default action that will be fired clicking on the card image or the card title, this action gets the model instance that fired it.

```php
public function onCardClick(User $model)
{
}
```

## Max columns

The maximun number of colums by default is 5 for xl displays, you can customize this value with a public property.

```php
public $maxCols = 3;
```

## With background
The default card doesn't have a background by default, you can customize this behavior with public property.

```php
public $withBackground = true
```

This will render the item with a white background.

![Grid card no background](/img/docs/grid-no-background.png)

## Sorting data
You can add an option to sort the items on the grid view by an specific field defining a `sortableBy` method with an array of the fields to sort by, as the grid view desn't have headers, a `Sort by` button will be displayed with a drop down with all the fields defined in this method.

```php
public function sortableBy()
{
    return [
        'Name' => 'name',
        'Email' => 'email'
    ];
}
```

## More features

In addition, this view supports more features like: [Searching data](/search), [Pagination](/pagination), [Filters](/filters), [Actions](/actions), and [UI components](/ui-components)