# LocalStorage
like html5 local storage but for php.

# Usage

Statically
```
LocalStorage::set('foo', 'bar');
LocalStorage::get('foo'); // outputs bar
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