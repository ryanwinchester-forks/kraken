<?php namespace Kraken\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest {


    public function toCommand()
    {
        $requestClass = static::class;

        return substr_replace($requestClass, 'Command', strrpos($requestClass, 'Request'));
    }

}
