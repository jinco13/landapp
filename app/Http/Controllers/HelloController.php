<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
  function index(Request $request)
  {
    $data = ['id'=>$request->id, 'pass' => $request->id];
    return view('hello.index', $data);
  }
}
