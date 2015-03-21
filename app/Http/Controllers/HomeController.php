<?php namespace SevenShores\Kraken\Http\Controllers;

use SevenShores\Kraken\Http\Requests;
use SevenShores\Kraken\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
    {
        return view('dashboard');
    }
}
