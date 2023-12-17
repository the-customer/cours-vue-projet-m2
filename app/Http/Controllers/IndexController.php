<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // return "Index";
        $nom = "Breukh";
        return inertia("Index/Index",[
            "message"   => "Voici un petit message",
            "name"      => $nom,
            "age"       => 23,
            "sexe"  => "1",
        ]);
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}
