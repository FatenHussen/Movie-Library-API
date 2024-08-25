<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check() && Auth::user()->is_admin == false;
    }

    public function rules()
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
            'movie_name' => 'required|string|max:255',
        ];
    }
}
