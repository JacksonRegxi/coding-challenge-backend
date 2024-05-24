<?php

namespace App\Controllers;


use App\Database\Procedures\Movie;

class MovieController
{
    public function getMovies(): void
    {
        $movieProcedure = new Movie();
        echo $movieProcedure->get($_POST, 'get_movies')->json();
    }

    public function storeMovie(): void
    {
        $movieProcedure = new Movie();
        echo $movieProcedure->get($_POST, 'store_movie')->json();
    }
}