<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSwordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //Mindenki frissíthet most kardot
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            "name" => ["required", "string", "max:100", "unique:swords,name,". $this->sword->id],
            //"name" => ["required", "string", "max:100", Rule::unique("swords", "name")->ignore($this->sword->id)],
            "price" => ["required", "integer"],
            "length" => ["required", "numeric", "decimal:1,2"],
            "description" => ["required", "string"],
            "release" => ["required", "date"],
            "exclusive" => ["boolean"]
        ];
    }
}
