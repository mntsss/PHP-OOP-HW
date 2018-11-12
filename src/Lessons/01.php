<?php

require __DIR__ . '/../../vendor/autoload.php';

$user = new \Visibility\VisibleToAll();
$user->setName('Darius');
$user->setSurname('Kasiulevičius');

echo sprintf(
    '<p>My name is <b>%s</b> and surname is <b>%s</b>.</p>',
    $user->getName(),
    $user->getSurname()
);

$user->name = 'Linas';

echo sprintf(
    '<p>My name is <b>%s</b> and surname is <b>%s</b>.</p>',
    $user->getName(),
    $user->getSurname()
);
