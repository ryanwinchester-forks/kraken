<?php namespace SevenShores\Kraken\Http\Controllers;

use Illuminate\Http\Request;
use SevenShores\Kraken\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function index()
    {
        return view('dashboard');
    }
}
