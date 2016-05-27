# LocalStorage
like html5 local storage but for php.

# Installation
```
composer require mordisacks/localstorage
```

# Usage

Statically
```
LocalStorage::set('foo', 'bar');
echo LocalStorage::get('foo'); // outputs bar
```
Or via instance
```
$localStorgae = new LocalStorage();
$localStorage->foo = 'bar';
echo $localStorage->foo; // outputs bar
```

Use custom driver
```
LocalStorage::init(LocalStorageDriverInterface $driver);
```
And via instance
```
$localStorgae = new LocalStorage(LocalStorageDriverInterface $driver);
```