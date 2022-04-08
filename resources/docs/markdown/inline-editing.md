# Inline editing

Compatible with [Table view](/table-view)

![Inline editing](/img/docs/inline-editing.png)

It is possible to edit a field on the data table inline using an `editable` component instead of plain text in the `row` method. The `editable` componet gets the instance model and the name of the field to be edited.

```php
use LaravelViews\Facades\UI;

public function row(User $user)
    {
        return [
            // ...Other fields
            UI::editable($user, 'email'),
        ];
    }
```

This component will show the current value and if you click on it, you will be able to edit it. To update the new value you should define a new method on the table view.

```php
/**
 * Method fired by the `editable` component, it
 * gets the model instance and a key value array
 * with the modified data
 */
public function update(User $user, $data)
{
}
```

The `update` method gets the model instance, and a key-value array with the modified data so you can save it directly on the model.

You also can display a feedback message as actions do, just use the `WithAlerts` trait on the view and it will have acces to the `success()` and `error()` methods.

```php
use LaravelViews\Views\Traits\WithAlerts;

/**
 * Method fired by the `editable` component, it
 * gets the model instance and a key-value array
 * with the modified dadta
 */
public function update(User $user, $data)
{
    $user->update($data);
    $this->success();
}
```
