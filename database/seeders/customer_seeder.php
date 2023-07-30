<?php


$rootPath = dirname(__DIR__, 2);
require_once $rootPath.'\vendor\autoload.php';
require_once $rootPath.'\config\database.php';

use Calendar\Model\Customer;

$usersData = [
    ['name' => 'Tariq', 'age' => '23'],
    ['name' => 'Sakib', 'age' => '24'],
    // Add more data here as needed
];

foreach ($usersData as $userData) {
    Customer::create($userData);
}