<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;


class CakeStockCreateRequest extends Base
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'cake_id' => ['required', 'exists:cakes,id'],
            'weight'  => ['required', 'integer'],
            'price'   => ['required', 'integer'],
            'status'  => ['required', 'in:available,sold,pending']
        ];

        return $rules;
    }
}
