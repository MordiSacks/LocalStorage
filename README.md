# LocalStorage
like html5 local storage but for php.

# Installation
```bash
composer require mordisacks/localstorage
```

# Usage

Statically
```php
LocalStorage::set('foo', 'bar');
echo LocalStorage::get('foo'); // outputs bar
```
Or via instance
```php
$localStorage = new LocalStorage();
$localStorage->foo = 'bar';
echo $localStorage->foo; // outputs bar
```

Use custom driver
```php
LocalStorage::init(LocalStorageDriverInterface $driver);
```
And via instance
```php
$localStorage = new LocalStorage(LocalStorageDriverInterface $driver);
```