<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Models\Video;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CurdController extends Controller
{
  public function getOffers()
  {
    return Offer::select('id', 'name', 'price')->get();
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

  public function getVideo()
  {

    $video = Video::first();
    event(new VideoViewer($video)); // fire event
    return view('video')->with('video', $video);
  }
}
