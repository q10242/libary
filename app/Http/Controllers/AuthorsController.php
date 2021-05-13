<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorsController extends Controller
{
    public function store(Request $request){

        var_dump($request()->all(['name','bob']));
        // Author::create();
    }
}
