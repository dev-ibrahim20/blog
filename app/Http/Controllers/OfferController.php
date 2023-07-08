<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
  public function create()
  {
    // view from to add this offer
    return view('ajaxtable');
  }

  public function store()
  {
    // save offer into DB using AJAX
  }
}
