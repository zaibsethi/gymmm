<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeAttandanceRequest extends FormRequest
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
        return [
//            'date' => 'unique:employees',
//            'name' => 'unique:employees',

            'date' => 'unique:employees,date,' . $this->id . ',id,name,' . $this->name

        ];

//
    }

}
