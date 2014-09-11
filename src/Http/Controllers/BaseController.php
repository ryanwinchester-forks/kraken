<?php namespace Kraken\Http\Controllers;

use Illuminate\Routing\Controller;
use Laracasts\Commander\CommanderTrait;

abstract class BaseController extends Controller {

    use CommanderTrait;

}
