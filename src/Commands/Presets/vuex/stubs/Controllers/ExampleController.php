<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    public function example()
    {
        return response()->json('It is example data', 200);
    }
}
