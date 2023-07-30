<?php 

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\Customer;
use Illuminate\Support\Facades\View;


$rootPath = dirname(__DIR__, 3);
require_once $rootPath.'\config\database.php';


class CustomerController {
    public function getCustomersView(){
        $users = Customer::select('id', 'name', 'age')->get();
        $data = [
            'users' => $users
        ];
        return renderTemplate('customers', $data);

    }
}