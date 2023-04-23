<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
  public function showUserName()
  {
    return "Ibrahem Mohamed Elashqar";
  }

  public function getIndex()
  {
    $data = [];
    $data['id'] = 5;
    $data['name'] = 'Ibrahem';
    return view('about', $data);
  }
}
