<?php

namespace App\Controllers;


use App\Database\Procedures\ExecProcedure;

class MovieController
{
    public function getMovies(): void
    {
        $movieProcedure = new ExecProcedure();
        echo $movieProcedure->get($_POST, 'get_movies')->json();
    }

    public function storeMovie(): void
    {
        $movieProcedure = new ExecProcedure();
        echo $movieProcedure->get($_POST, 'store_movie')->json();
    }
}