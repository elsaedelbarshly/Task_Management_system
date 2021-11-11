<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipRequest extends FormRequest
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
            'name' =>'required|unique:memberships|max:255',
            'price' =>'required|alpha_num',
            'description' =>'required',
            'duration' =>'required|date',
            'status' =>'nullable|in:0,1',
        ];
    }
}
