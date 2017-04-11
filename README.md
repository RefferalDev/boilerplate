# Laravel/AdminLTE Boilerplate

This package is to be served as a basis for a web application. 
It allows you to access to an administration panel to manage users, 
roles and permissions.

## Features

* Backend theme [Admin LTE](https://almsaeedstudio.com/)
* Css framework [Bootstrap 3](http://getbootstrap.com/)
* Additional icons by [Font Awesome](http://fontawesome.io/)
* Role-based permissions provided by [santigarcor/laratrust](https://github.com/santigarcor/laratrust)
* Forms & Html helpers by [laravelcollective/html](https://github.com/laravelcollective/html) 
* Menu dynamically builded by [lavary/laravel-menu](https://github.com/lavary/laravel-menu)
* Menu items activated by [hieu-le/active](https://github.com/letrunghieu/active)
* Server-sided datatables methods provided by [yajra/laravel-datatables](https://github.com/yajra/laravel-datatables)
* Multi-language date support by [jenssegers/date](https://github.com/jenssegers/date)
* Localized English-French

## Installation

1. In order to install Laravel/AdminLTE Boilerplate run :

```
composer require sebastienheyd/boilerplate
```

2. Open ```config/app.php``` and add the following to the ```providers``` array :

```
Sebastienheyd\Boilerplate\BoilerplateServiceProvider::class,
```

3. Run the command below to publish assets, views, lang files, ...

```
php artisan vendor:publish
```

4. After you set your database parameters in your ```.env``` file run :

```
php artisan migrate
```

You are ready to go !

## Configuration

After `php artisan vendor:publish` you will find a folder `boilerplate` into the directory `config`.

* [`app.php`](src/config/boilerplate/app.php) : name of the application (only backend), admin panel prefix and redirection after login (see comments in file)
* [`auth.php`](src/config/boilerplate/auth.php) : overriding of `config/auth.php` to use boilerplate's models instead of default Laravel's models.
* [`laratrust.php`](src/config/boilerplate/laratrust.php) : overriding of Laratrust's (package santigarcor/laratrust) default config.
* [`menu.php`](src/config/boilerplate/menu.php) : classes to add menu items, [see below](#adding-items-to-the-main-menu).

### Adding items to the main menu

If in your application you need to add items to the main menu, for that you must declare the classes you want to use into 
the config file [`menu.php`](src/config/boilerplate/menu.php).

As you can see you have already one class declared into this file, if you check the code into [MenuComposer.php](src/ViewComposers/MenuComposer.php) you will find a method named `make(Builder $menu)`.
This is the method called to build menu items.

So, to add items : create a class, declare this class into the config file `menu.php` and add a `make(Builder $menu)` method into the class.

See [lavary/laravel-menu](https://github.com/lavary/laravel-menu) and [hieu-le/active](https://github.com/letrunghieu/active) documentations.

### Customizing views

When published by `php artisan vendor:publish` views are copied to the folder `resources/views/vendor/boilerplate`.

Error views are copied to the folder `resources/views/errors`

Every view into these folders can be modified, they will not be overwrited if you launch `php artisan vendor:publish` again. You can already delete these files to reset them if needed, just remove them and run `php artisan vendor:publish`

### Language

Language used by boilerplate is the application language declared into `config/app.php`. 
For the moment only english and french are supported.

When you run `php artisan vendor:publish`, locale files are copied to the folder `resources/lang/vendor/boilerplate`
 
NB : Dates are translated by the package [jenssegers/date](https://github.com/jenssegers/date)

### Loading plugins assets

By default, only jQuery, bootstrap 3, Font Awesome and AdminLTE scripts and css are loaded.

To "activate" and use plugins like datatable, datepicker, icheck, ... you can use "loaders". These are blade templates prepared to add the loading of scripts and styles for a plugin.

For example, you want to use a datepicker on a text field :
 
```blade
@include('boilerplate::load.datepicker')
@push('js')
    <script>
        $('.daterangepicker').daterangepicker();
        $('.datepicker').datepicker();
    </script>
@endpush
```

Here `@include('boilerplate::load.datepicker')` will load scripts and styles to allow usage of datepicker. After that you can push your scripts on the `js` stack (or styles on the `css` stack).

Available loaders are :

* [`boilerplate::load.datatables`](src/resources/views/vendor/boilerplate/load/datatables.blade.php) : [Datatables](https://www.datatables.net/) - [Example](src/resources/views/vendor/boilerplate/plugins/demo/datatables.blade.php) 
* [`boilerplate::load.datepicker`](src/resources/views/vendor/boilerplate/load/datepicker.blade.php) : [Datepicker](https://github.com/uxsolutions/bootstrap-datepicker) & [DateRangePicker](https://github.com/dangrossman/bootstrap-daterangepicker) - [Example](src/resources/views/vendor/boilerplate/plugins/demo/datepicker.blade.php)
* [`boilerplate::load.icheck`](src/resources/views/vendor/boilerplate/load/icheck.blade.php) : [iCheck](http://icheck.fronteed.com/) - [Example](src/resources/views/vendor/boilerplate/plugins/demo/icheck.blade.php)
* [`boilerplate::load.select2`](src/resources/views/vendor/boilerplate/load/select2.blade.php) : [Select2](https://select2.github.io/) - [Example](src/resources/views/vendor/boilerplate/plugins/demo/select2.blade.php)
* [`boilerplate::load.moment`](src/resources/views/vendor/boilerplate/load/moment.blade.php) : [MomentJs](http://momentjs.com/)

More will come...

Some plugins are loaded by default :

* [Bootbox](https://github.com/makeusabrew/bootbox) - [Example](src/resources/views/vendor/boilerplate/plugins/demo/bootbox.blade.php)
* [Notify](https://github.com/mouse0270/bootstrap-notify) - [Example](src/resources/views/vendor/boilerplate/plugins/demo/notify.blade.php)

You can see examples on the default dashboard.

### Updating assets

Boilerplate come with compiled assets. To do this, this package is frequently updated by using `npm` and `mix`.

If you need to update assets by yourself, remove the file `webpack.mix.js` at the root of your Laravel project and do a `php artisan vendor:publish`. The file from this package will be automatically copied to this location.

You can already replace by yourself the file with the file [`webpack.mix.js`](src/webpack.mix.js) from this package.
 
After that, at the root of your project, run `npm update` and `npm run dev` (or `npm run production`).

[See Laravel `Mix` documentation](https://laravel.com/docs/5.4/mix)

## License

This package is free software distributed under the terms of the [MIT license](LICENSE.md).