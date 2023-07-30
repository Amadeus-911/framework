<?php 

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\User;
use Illuminate\Support\Facades\View;


$rootPath = dirname(__DIR__, 3);
require_once $rootPath.'\config\database.php';


class UserController {

    public function getUsers(){
        return User::select('id', 'name', 'email')->get();
    }

    public function getUsersView(){
        $users = User::select('id', 'name', 'email')->get();
        $data = [
            'users' => $users
        ];
        return renderTemplate('users', $data);

    }

    public function getName(string $name) {
        $data = [
            'name' => $name ? $name : 'World'
        ];
        return renderTemplate('index', $data);
    }
}