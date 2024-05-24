<?php

namespace App\Controllers;


use App\Database\Procedures\ExecProcedure;

class CustomerController
{
    public function getCustomers(): void
    {
        $execProcedure = new ExecProcedure();
        echo $execProcedure->get($_POST, 'get_customers')->json();
    }

    public function storeCustomer(): void
    {
        $execProcedure = new ExecProcedure();
        echo $execProcedure->get($_POST, 'store_customer')->json();
    }
}