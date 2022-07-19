<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MentorRequest extends FormRequest {
    public function authorize () {
        return Auth::check() ? false : true;
    }

    public function rules () {
        return [
            'address' => 'required_if:inPerson,true|string|nullable',
            'birthday' => 'string|nullable',
            'challenge' => 'required|max:300|min:10',
            'email' => 'required|email:rfc,dns|string',
            'firstName' => 'required|string',
            'inPerson' => 'required|boolean',
            'lastName' => 'required|string',
            'password' => 'required|string|confirmed',
            'photo' => 'string|nullable',
            'price' => 'nullable|numeric',
            'pricePer' => 'required|in:hour,class',
            'priceType' => 'required|in:free,paid',
            'segments' => 'required|array',
            'solution' => 'required|string|max:600|min:10',
            'whatsapp' => 'required|string',
        ];
    }
}
