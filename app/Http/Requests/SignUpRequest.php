<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sentinel;
class SignUpRequest extends FormRequest
{

    public const MAX_NAME=225;
    public const MAX_EMAIL=225;
    public const MAX_PASS=225;
    public const MIN_PASS=6;
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
            'name' => "required|max:".self::MAX_NAME,
            'email' => "unique:users|email|required|max:".self::MAX_EMAIL,
            'password' => "required|min:".self::MIN_PASS."|max:".self::MAX_PASS,
            'repeat_password' => "required|max:".self::MAX_PASS,
        ];
    }
}
