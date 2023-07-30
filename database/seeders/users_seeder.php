<?php


$rootPath = dirname(__DIR__, 2);
require_once $rootPath.'\vendor\autoload.php';
require_once $rootPath.'\config\database.php';

use Calendar\Model\User;

$usersData = [
    ['name' => 'Ifty', 'email' => 'ifty@example.com'],
    ['name' => 'Tasnim', 'email' => 'tasnim@example.com'],
    // Add more data here as needed
];

foreach ($usersData as $userData) {
    User::create($userData);
}