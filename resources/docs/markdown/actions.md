# Actions

Compatible with [Table view](/table-view), [Grid view](/grid-view), [List view](/list-view), [Detail view](/detail-view)

Some of the views can perform actions to the data that is being displayed, whether indiviadually or to a set of items, each one of the action is a single PHP class where you can define the behavior, they are registered by each view and you can re-use them on different views.

## Actions by item

![Actions by item](/img/docs/actions.png)

```bash
php artisan make:action Actions/ActivateUserAction
```

With this artisan command, an `ActivateUserAction.php` file will be created inside the `app/Actions` directory, you can use any namespace you want. With this class you can customize how the action should behave, it has 2 public properties to customize the title and the icon, it is important to specify a valid [Feather icon](https://feathericons.com/), the `handle` method receives the model corresponding to the row where the action was executed, and the current view where the action was executed from, you can write your own business logic inside this method.

The icon buttons in the table and detail view are responsive, the view will show a dropdown menu on small screens, this dropdown is the default behavior for grid and list view.

```php
class ActivateUserAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Activate user";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "unlock";


    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $model->active = true;
        $model->save();
    }
}
```

## Bulk actions

![Bulk actions](/img/docs/bulk-actions.png)

Adding the `--bulk` option to the `make:action` command will generate a bulk action file.

```bash
php artisan make:action Actions/ActivateUserAction --bulk
```

Bulk actions are executed on a set of items selected from the UI. If you register bulk actions in a view, a checkbox input will be displayed for each item to select or unselect it.

Unlike the actions by item, bulk actions get an array with the ID's of the selected items.

```php
class ChangeUsersAsAdmin extends Action
{
    use Confirmable;

    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Change as admin";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "shield";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param Array $selectedModels Array with all the id of the selected models
     * @param $view Current view where the action was executed from
     */
    public function handle($selectedModels, View $view)
    {
        User::whereKey($selectedModels)->update([
            'type' => 'admin'
        ]);
    }
}
```

> Note: Bulk actions are not compatible with the detail view since it has only one item

## Registering actions
You can register all the actions you want in the `TableView` class defining a `actionsByRow` method with all the actions you want to use

```php
/** For actions by item */
protected function actionsByRow()
{
    return [
        new ActivateUserAction,
    ];
}

/** For bulk actions */
protected function bulkActions()
{
    return [
        new ActivateUsersAction,
    ];
}
```

> Note: To register actions in the detail view, yo should use the `actions()` method instead of the `actionsByRow()` method.


## Showing feedback messages
To display a success alert message after an action is completed, you can execute the `succes()` method of the action at the end of the handle method, an alert message will be displayed at the top right of the screen, on small screens, the message will be displayed at the bottom.


```php
public function handle($model, View $view)
{
    $model->active = true;
    $model->save();

    $this->success();
}
```

![Success message](/img/docs/success.png)

You can customize the message passing it as a param

```php
$this->success('My custom message');
```

To display an error message just execute `error` instead of `success`

```php
$this->error();
```

![Error message](/img/docs/error.png)

## Hiding actions
You can choose if the action will be shown or hidden for an specific row defining a `renderIf()` method and returning a boolean value, if you don't define this method the action will be shown always.

```php
public function renderIf($model, View $view)
{
    return !$model->active;
}
```

## Confirmation message
Some actions might need to be confirmed before the its execution, just add the `Confirmable` trait.

```php
use LaravelViews\Actions\Confirmable;

class ActivateUserAction extends Action
{
    use Confirmable;
}
```

![Confirmation message](/img/docs/confirmation-message.png)

To customize the message just overwrite the `getConfirmationMessage()` method returning your custom message. You also have access to the model the action will be executed with.

```php
public function getConfirmationMessage($item = null)
{
    return 'My custom confirmation message';
}
```

## Redirect action
This package has a defined action to redirect the user to a named route related to your model, you can use it directly on the `actionsByRow()` method.

```php
use LaravelViews\Actions\RedirectAction;

protected function actionsByRow()
{
    return [
        // Will redirect to `route('user', $user->id)`
        new RedirectAction('user', 'See user', 'eye'),
    ];
}
```

The first param is the name of the route to be redirected, it is important to be a named route, the `RedirectAction` will inject the model id to that route. This is great for CRUD modules.