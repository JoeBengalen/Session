<?php

require_once 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$session = new \JoeBengalen\Session\Session('blah');

$session['key1.key2'] = 'value1';
$session['key1.key3'] = 'value2';

$session->set('key1_duplicate', $session->get('key1'));

var_dump($session->get());
// -> returns all session data

var_dump($session->get() === $_SESSION[$session->getNamespace()]);
// -> returns true