<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CurdController extends Controller
{
  public function getOffers()
  {
    return Offer::select('id', 'name')->get();
  }

  public function create()
  {
    return view('offers/create');
  }

  public function store(Request $request)
  {
    // validate date before insert to database
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:100|unique:offers,name',
      'price' => 'required|numeric',
      'photo' => 'required',
    ]);
    if ($validator->fails()) {
      return $validator->errors()->first();
    }
    // insert
    Offer::create([
      'name'  => $request->name,
      'price' => $request->price,
      'photo' => $request->photo,
    ]);
    return 'Saved successfuly';
  }
}
