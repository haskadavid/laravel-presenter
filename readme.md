Laravel presenter package
============

Informations
---

## Usage

The first step is to store your presenters somewhere - anywhere. These will be simple objects that do nothing more than format data, as required.

Here's an example of a presenter.

```php
use Haska\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function fullName()
    {
        return $this->first . ' ' . $this->last;
    }

    public function accountAge()
    {
        return $this->created_at->diffForHumans();
    }

}
```

Next, on your entity, pull in the `Haska\Presenter\PresentableTrait` trait, which will automatically instantiate your presenter class.

Here's an example - maybe a Laravel `User` model.

```php
<?php

use Haska\Presenter\PresentableTrait;

class User extends \Eloquent {

    use PresentableTrait;

    protected $presenter = 'UserPresenter';

}
```

That's it! You're done. Now, within your view, you can do:

```php
    <h1>Hello, {{ $user->present()->fullName }}</h1>
```

Notice how the call to the `present()` method (which will return your new or cached presenter object) also provides the benefit of making it perfectly clear where you must go, should you need to modify how a full name is displayed on the page.