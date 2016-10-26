<?php

namespace App\Http\Requests;

use App\Flyer;
use Illuminate\Foundation\Http\FormRequest;

class AddPhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize()
    {
        return Flyer::where([
            'zip' => $this->zip,
            'street' => $this->street,
            'user_id' => $this->user()->id
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'required|mimes:png,jpg,bmp,jpeg'
        ];
    }
}
