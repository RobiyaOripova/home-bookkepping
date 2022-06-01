<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class AccountingRequest extends FormRequest
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

            "date"=>"required|string",
            "type" => "required|string",
            "categories" => "required|string",
            "money" => "required",
            "comment" => "required",


        ];
    }

    public function messages()
    {
        return [
            "date"=>"Date is required",
            'type.required' => "Comment is required",
            'categories.required' => "description is required",
            "money.required" => " money is required",
            "comment.required" => " comment is required",
        ];
    }
}
