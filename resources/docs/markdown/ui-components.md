# Showing UI components

In adition to display plain text, you can also display some UI components like avatars, badges or icons, some of these components have different variants, you can customize these varians with the `laravel-views.php` config file.

## Avatar

![Avatar](/img/docs/ui/avatar.png)

Shows an 32x32 rounded image

```php
use LaravelViews\Facades\UI

public function row($model)
{
    return [
        UI::avatar($model->avatar_url)
    ];
}
```

## Badges

![Badges](/img/docs/ui/badge.png)

Shows a colored badge with a text, it is gray by default

```php
UI::badge('My title');
UI::badge('My title', 'info');
UI::badge('My title', 'success');
UI::badge('My title', 'warning');
UI::badge('My title', 'danger');
```

## Link

![Link](/img/docs/ui/link.png)

Shows a simple link to navigate to another route.

```php
UI::link('My link title', 'my-route-to-navigate');
```

## Icons

![Icons](/img/docs/ui/icon.png)

Shows a feather icon with a custom variant, it is important to set a valid [feather icon.](https://feathericons.com/)

```php
UI::icon('check');
UI::icon('check', 'info');
UI::icon('check', 'success');
UI::icon('check', 'danger');
UI::icon('check', 'warning');
```