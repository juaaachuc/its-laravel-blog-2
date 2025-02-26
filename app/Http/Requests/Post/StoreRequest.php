<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:App\Models\Post,slug'],
            'description' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'is_published' => ['required', 'boolean'],
            'published_at' => ['required', 'date']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El título es requerido',
            'title.max' => 'El título no puede tener más de 255 caracteres',
            'slug.max' => 'El slug no puede tener más de 255 caracteres',
            'description.max' => 'La descripción no puede tener más de 255 caracteres',
            'slug.required' => 'El slug es requerido',
            'slug.unique' => 'El slug ya está en uso',
            'description.required' => 'La descripción es requerida',
            'content.required' => 'El contenido es requerido',
            'is_published.required' => 'El estado de la publicación es requerido',
            'published_at.required' => 'La fecha de publicación es requerida'
        ];
    }
}
