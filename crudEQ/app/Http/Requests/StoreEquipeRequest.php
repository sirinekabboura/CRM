<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipeRequest extends FormRequest
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
            "nom" => "required|max:70",
            "idClient" => "required",
            "membres" => "required",
            "projet" => "required",
            "pseudo" => "required",
            "code" => "required",
            "dateCreation" => "required",
        ];
    }
}
