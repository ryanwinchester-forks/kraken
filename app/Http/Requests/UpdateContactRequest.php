<?php namespace SevenShores\Kraken\Http\Requests;

use SevenShores\Kraken\Http\Requests\Request;

class UpdateContactRequest extends Request
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
            'email' => 'email|unique:contacts'
        ];
    }
}
