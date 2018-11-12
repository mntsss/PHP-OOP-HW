<?php

require __DIR__ . '/../../vendor/autoload.php';

$user = new \Visibility\UserClassForPrivate();
try {
    echo '<p>Use private setter</p>';
    $user->setDisplayName('Darius Kasiulevičius');
} catch (\Throwable $exp) {
    echo sprintf(
        '<p>Got error: <ul><li><b>Code</b> %s</li><li><b>Message</b> %s</li><li><b>Line</b> %s</li></ul></p>',
        $exp->getCode(),
        $exp->getMessage(),
        $exp->getLine()
        );
}

$user = new \Visibility\OnlyMe();
try {
    echo '<p>Use private attribute</p>';
    $user->surname = 'Kasiulevičius';
} catch (\Throwable $exp) {
    echo sprintf(
        '<p>Got error: <ul><li><b>Code</b> %s</li><li><b>Message</b> %s</li><li><b>Line</b> %s</li></ul></p>',
        $exp->getCode(),
        $exp->getMessage(),
        $exp->getLine()
    );
}

$user = new \Visibility\UserClassForPrivate();
$user->setFullName('Darius Kasiulevičius');

echo sprintf(
    '<p>You are connected as <b>%s</b>.</p>',
    $user->getDisplayName()
);
