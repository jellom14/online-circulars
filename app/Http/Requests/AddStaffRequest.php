<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=>'required|max:20', 'last_name'=>'required|max:20',
            'middle_name'=>'required|max:20', 'username'=>'required|max:20',
            'password'=>'required|max:20', 'email'=>'required|max:50',
            'role_id'=>'nullable', 'created_by_id'=>'nullable',
            'updated_by_id'=>'nullable', 'deleted_by_id'=>'nullable',
             
        ];
    }
}
