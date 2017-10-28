<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
  function index()
  {
    $data = ['id'=>'hoge', 'pass' => 'pass'];
    return view('hello.index', $data);
  }
}
