<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use function MongoDB\BSON\toJSON;

class ShippingAddressController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request, $user_id)
    {
        $request->validate([
            'country' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'email' => 'required | email'
        ]);

        if (ShippingAddress::where('user_id', $user_id)->first()) {
            return response([
                "message" => "You can not entry duplicate address. You may better update your existing address."
            ]);
        }

        return $request->user()->shippingAddress()->create([
            'country' => $request->country,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'email' => $request->email,
        ]);
    }


    public function show($user_id)
    {
        return ShippingAddress::where("user_id", $user_id)->get();
    }


    public function update(Request $request, $user_id)
    {
        $shippingAddress = ShippingAddress::where("user_id", $user_id)->first();
        return $shippingAddress->update($request->all());

    }

    public function destroy(ShippingAddress $shippingAddress)
    {
        //
    }
}
