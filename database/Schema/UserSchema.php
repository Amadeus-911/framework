<?php


$rootPath = dirname(__DIR__, 2);
require_once $rootPath.'\vendor\autoload.php';
require_once $rootPath.'\config\database.php';


use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;


// Dropping a table
Capsule::schema()->dropIfExists('users');


// Creating a table
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email');
    $table->timestamps();
});

// Modifying a table (adding a new column)
// Capsule::schema()->table('table_name', function (Blueprint $table) {
//     $table->string('email')->after('name');
// });