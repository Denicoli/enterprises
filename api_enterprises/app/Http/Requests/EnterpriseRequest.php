<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterpriseRequest extends FormRequest
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
        $userRules = (new UserRequest())->rules();

        return array_merge($userRules, [
            'enterprise_name' => ['required', 'min:3', 'max:20', 'string'],
            'description' => ['required', 'min:3', 'max:30', 'string'],
            'city' => ['required', 'min:2', 'max:10', 'string'],
        ]);
    }
}
