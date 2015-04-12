<?php namespace SevenShores\Kraken\Http\Requests;

use SevenShores\Kraken\Http\Requests\Request;

class StorePropertyTypeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: Authenticate...
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required',
            'element' => 'required|alpha_dash',
            'type'    => 'alpha_dash|unique:property_types',
            'is_void' => 'boolean',
        ];
    }
}
