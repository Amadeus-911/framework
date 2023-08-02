<?php
// example.com/src/Calendar/Controller/LeapYearController.php

namespace Http\Controller;


use Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Dotenv\Dotenv;
use Model\User;

//$dotenv->load(__DIR__.'/.env');

$dotenv = new Dotenv();
$rootPath = dirname(__DIR__, 3);

require_once $rootPath.'\config\database.php';

$dotenv->load($rootPath.'\.env');

class LeapYearController
{
    public function index(int $year): string
    {
        $apiKey = $_ENV['API_KEY'];
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            return 'Yep, this is a leap year! ';
        }

        return 'Nope, this is not a leap year.';
    }
}