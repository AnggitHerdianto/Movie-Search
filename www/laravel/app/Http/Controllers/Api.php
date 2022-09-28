<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class Api extends Controller
{
    public function index()
    {
        echo 'The Movie API';
    }

    public function search($search = NULL, $page = 1)
    {
        $url    = "https://www.omdbapi.com/?apikey=5a3fafcb&s={$search}&page={$page}";
        $json   = file_get_contents($url);

        echo $json;
    }

    public function detail($id = NULL)
    {
        $url    = "https://www.omdbapi.com/?apikey=5a3fafcb&i={$id}";
        $json   = file_get_contents($url);

        echo $json;
    }
}
