<?php

namespace App\Controllers;

use App\Database\Procedures\ExecProcedure;

class LoanController
{
    public function getMoviesAvailable(): void
    {
        $execProcedure = new ExecProcedure();
        echo $execProcedure->get($_POST, 'get_movies_available')->json();
    }

    public function storeCustomerMovie(): void
    {
        $execProcedure = new ExecProcedure();
        echo $execProcedure->get($_POST, 'store_movies_customers')->json();
    }

    public function storeReturnMovie(): void
    {
        $execProcedure = new ExecProcedure();
        echo $execProcedure->get($_POST, 'store_movie_return')->json();
    }
}