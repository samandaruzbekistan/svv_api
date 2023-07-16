<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoliclinicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_uz' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'work_time' => 'required|string',
            'address_uz' => 'required|string',
            'address_ru' => 'required|string',
            'address_en' => 'required|string',
            'phone' => 'required|string',
            'population' => 'required|numeric',
            'longitude' => 'required',
            'latitude' => 'required',
        ];
    }
}
