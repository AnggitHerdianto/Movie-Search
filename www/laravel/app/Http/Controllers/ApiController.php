<?php

namespace App\Http\Controllers;

use App\Models\Api;

class ApiController extends Controller
{
    public function index()
    {
        echo 'The Movie API';
    }

    public function search($search = NULL, $page = 1)
    {
        $url    = "https://www.omdbapi.com/?apikey=5a3fafcb&s={$search}&page={$page}";
        $hash   = sha1($url);

        $query = Api::where('hash', $hash);

        if($query->exists()){
            $row = $query->first();

            $json = $row['json'];
        } else {
            $json   = file_get_contents($url);

            Api::create([
                'hash'  => $hash,
                'json'  => $json,
            ]);
        }
        
        echo $json;
    }

    public function detail($id = NULL)
    {
        $url    = "https://www.omdbapi.com/?apikey=5a3fafcb&i={$id}";
        $hash   = sha1($url);

        $query = Api::where('hash', $hash);

        if($query->exists()){
            $row = $query->first();

            $json = $row['json'];
        } else {
            $json   = file_get_contents($url);

            Api::create([
                'hash'  => $hash,
                'json'  => $json,
            ]);
        }

        echo $json;
    }
}
