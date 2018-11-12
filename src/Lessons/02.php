<?php

require __DIR__ . '/../../vendor/autoload.php';

$user = new \Visibility\MeAndSubClasses();
try {
    echo '<p>Use protected setter</p>';
    $user->setName('Darius');
} catch (\Throwable $exp) {
    echo sprintf(
        '<p>Got error: <ul><li><b>Code</b> %s</li><li><b>Message</b> %s</li><li><b>Line</b> %s</li></ul></p>',
        $exp->getCode(),
        $exp->getMessage(),
        $exp->getLine()
        );
}

try {
    echo '<p>Use protected attribute</p>';
    $user->surname = 'Kasiulevičius';
} catch (\Throwable $exp) {
    echo sprintf(
        '<p>Got error: <ul><li><b>Code</b> %s</li><li><b>Message</b> %s</li><li><b>Line</b> %s</li></ul></p>',
        $exp->getCode(),
        $exp->getMessage(),
        $exp->getLine()
    );
}

$user = new \Visibility\UserClassForProtected();
$user->setDisplayName('Darius Kasiulevičius');



echo sprintf(
    '<p>You are connected as <b>%s</b>.</p>',
    $user->getDisplayName()
);
