<?php

namespace App\Http\Requests;

use App\Models\Sword;
use Illuminate\Foundation\Http\FormRequest;

class StoreSwordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('create', Sword::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //Ha itt valami nem felel meg, vissza küld arra az oldalra ahonnan a kérés érkezett
        return [
            "name" => ["required", "string", "max:100", "unique:swords,name"],
            "price" => ["required", "integer"],
            "length" => ["required", "numeric", "decimal:1,2"],
            "description" => ["required", "string"],
            "release" => ["required", "date"],
            "exclusive" => ["boolean"],
            "image" => ["image", "max:40000", "mimes:png,jpg,jpeg"]
        ];
    }
    //A név mező required validációjának üzenetét felül lehet írni
    public function messages() {
        return [
            "name.required" => "A név mező kitöltése kötelező.",
            "price.integer" => "Az ár csak egész, valós szám lehet."
        ];
    }
}
