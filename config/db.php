<?php

$config = parse_ini_file(__DIR__ . '/../../config.ini', true);

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=hrm',
<<<<<<< HEAD
    'username' => $config['mysql_usr'],
    'password' => $config['mysql_pwd'],
=======
    'username' => 'root',
    'password' => '123',
>>>>>>> c665aaabbd4672b2a8e94fb1fa3b171cd7b90c30
    'charset' => 'utf8',
];
