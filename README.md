# Session
Lightweight session manager library.

Uses PHP's `$_SESSION` global with a namespace so no interference should happen with other libraries.

Session object should have `set`, `get`, `has`, `remove` and `clear` methods and implement `\ArrayAccess`. This is done by extending the `JoeBengalen\Config\AbstractConfig` class. Doing so we also get support for arrays with dot notation.

```php
<?php

$session = new \JoeBengalen\Session\Session('unique_namespace');

$session['key1.key2'] = 'value1';
$session['key1.key3'] = 'value2';

var_dump($session->get('key1'));
// -> returns ['key2' => 'value1', 'key3' => 'value2']

var_dump($session->get());
// -> returns all session data

var_dump($session->get() === $_SESSION[$session->getNamespace()]);
// -> returns true

```
