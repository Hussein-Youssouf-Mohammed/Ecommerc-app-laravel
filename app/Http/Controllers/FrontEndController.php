<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index() {
         return view('index', [
             'products' => Product::paginate(6)
         ]);
    }

    public function singale($id) {

        return view('singale', [

            'product' => Product::find($id)
        ]);
    }
}
