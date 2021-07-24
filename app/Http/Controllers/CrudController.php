<?php

namespace App\Http\Controllers;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{

    /**
     *
     */


    public function create() {

        return view('offers.create');

    }

    /**
     * @param Request $req
     * @return string
     */
    public function store(OfferRequest $req) {
        //validate data before insert to  database
       /* $ruols = [

            'name' => 'required',
            'price' => 'required',
            'details' => 'required'
       ];*/

        //$message = $this->getMessage();

        //$validator = Validator::make($req->all(), $ruols, $message);

        /*if ($validator) {

            return redirect()->back()->withErrors($validator)->withInputs($req->all());
        }
        */ //insert

        Offer::create([

            "name" => $req->name,
            "price" => $req->price,
            "details" => $req->details,
        ]);



        return "Sava Successfully ";


    }
/*
    protected function getMessage() {

        return  $message  = [

            'name.required' => __('measseg.offer name required'),
            'name.unique' => __('measseg.offer name  unique'),
            'price.required' => 'السعر مطلوب',
            'details.required' => ' التافصيل مطلوبه',
        ];
    }
*/
}
