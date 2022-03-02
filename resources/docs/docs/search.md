# Searching data
Compatible with [Table view](/table-view), [Grid view](/grid-view), [List view](/list-view)

You can enable a search input specifying a class property with the fields you want to search by.

## Searching single data

```php
public $searchBy = ['name', 'email'];
```

When this property is configured, a search input is shown at the top left of the table.

![](/img/docs/search.png)

## Searching related data

You can also search with relational properties, by specifying the key in the format of `$relationship.$column`.

Ex . When your `$model` has a relationship called `user`.

```php

class Review extends Model
{

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
```

You can search with any of the properties in the relationship instance

```php
public $searchBy = ['id', 'user.email'];
```
