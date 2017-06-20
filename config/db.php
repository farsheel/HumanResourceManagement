<?php

$config = parse_ini_file(__DIR__ . '/../../config.ini', true);

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=hrm',
    'username' => $config['mysql_usr'],
    'password' => $config['mysql_pwd'],
    'charset' => 'utf8',
];
