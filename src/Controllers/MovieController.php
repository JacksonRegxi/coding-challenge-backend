<?php

namespace App\Controllers;


use App\Database\Procedures\Movie;

class MovieController
{
    public function getMovies(): string
    {
        $movieProcedure = new Movie();
        $value = $movieProcedure->get($_POST)->json();
        echo $value;
        return $value;
    }
}