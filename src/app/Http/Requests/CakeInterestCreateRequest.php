<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CakeInterestCreateRequest extends Base
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
            'email'   => ['required', 'string', 'email', Rule::unique('cake_interests')->where(function($query) {
                $query->where('status', '=', 'pending')
                      ->where('cake_id', '=', $this->request->get('cake_id'));
            })],
            'status'  => ['required', 'in:pending']
        ];

        return $rules;
    }
}
