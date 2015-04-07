# Session
Lightweight session manager library.

Uses PHP's `$_SESSION` global with a namespace so no interference should happen with other libraries.

~~Lazy initializes the session.~~ Not necessary when registering session as a service provider with DI.

Session object should has some set,get,had,remove methods and implement array access.

```php
<?php

$session1 = new \JoeBengalen\Session\Session('namespace1');
$session2 = new \JoeBengalen\Session\Session('namespace2');

```

Idea: Should arrays.as.dot.notation be possible? If so, look how to combine this with JoeBengalen\Config repo.
