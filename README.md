Persist
=====

Persist is a library intended to manage application settings.
The settings persists every request and handle multiple drivers (currently file and database).

Installation
---

Add the repository as a dependency by running:

```composer require calen/persist```

Then add the provider to the provider list in `app.php`:

```
....
App\Providers\RouteServiceProvider::class,
 
Calen\Persist\PersistServiceProvider::class,

```


You can then publish the packages configuration file by running

``` php artisan vendor:publish ```

which will create the file `persist.php` in the `config` directory.

The configuration is pretty simple:
- the driver to use (database or file)
- the file path in case of file driver
- the table name in case of database driver

The publish will also create a migration file if you need to use the database driver.

Usage
---

The settings are stored as a JSON object in either the file or the database.

*Persist* comes with a Facade. You can add this facade to the facades list in `app.php`:

```
'Persist' => Calen\Persist\Facade\Persist::class,
```

To publish a key:
 `Persist::persist('name.subname.subsubname', 'value', true);`.

The first parameter is the key to add. As the storage is JSON, the subname and subsubname are the
nest in the JSON object. If the names and subnames do not exist, they will be created.
The second parameter is the value to set to the key.
The third parameter is optional and specifies if the save should be applied. default is false

To get a key, use:
`Persist::get('name.subname.subsubname');`
 
with the path in the object.
If the path is not a leaf in the tree, it will return the tree corresponding as an array.

To forget a key, use:
`Persist:forget('name.subname.subsubname', true);`

which will simple remove the key.


Packagist
---

My packagist repo is available here : https://packagist.org/packages/calen/persist