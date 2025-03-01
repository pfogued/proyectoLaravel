<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Arma;

class PersonajeRequests extends FormRequest
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
            'nombre' => 'required|string|max:55',
            'tipo' => 'required|string',
            'unidad_especial' => 'required|string',
            'vida' => 'required|integer',
            'velocidad' => 'required|integer',
            'armas' => 'required|array', // Array de armas
            'armas.*.nombre' => [
                'required',
                'string',
                'max:55',
                function ($attribute, $value, $fail) {
                    // Verificamos si estamos editando un personaje existente
                    $personajeId = $this->route('personaje') ? $this->route('personaje')->id : null;

                    // Si estamos editando un arma, verificamos que no esté asignada a otro personaje
                    $armaExistente = Arma::where('nombre', $value)
                        ->whereNotNull('personaje_id') // Verificamos si está asignada a algún personaje
                        ->where('personaje_id', '!=', $personajeId) // Ignoramos el personaje que estamos editando
                        ->exists();

                    if ($armaExistente) {
                        $fail("El arma '{$value}' ya está asignada a otro personaje.");
                    }
                }
            ],
            'armas.*.tipo' => 'required|string',
            'armas.*.daño' => 'required|integer',
            'armas.*.cadencia' => 'required|integer',
    //'armas.*.personaje_id' => 'required|integer|exists:personajes,id', // con esto puedo añadir de momento
        ];
    }


    /*
     public function messages(): array{
        return [
            'nombre.required' => 'El nombre es requerido',

        ]
    }
    */
}
