<?php namespace Kraken\Models;

use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model {

    use EventGenerator;

} 