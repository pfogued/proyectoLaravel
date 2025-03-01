<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonajeRequests;
use App\Models\Personaje;
use App\Models\Arma;

class PersonajeController extends Controller
{
    public function index()
    {
        $personajes = Personaje::with('armas')->get();
        return view('personajes.index', compact('personajes'));
    }

    public function create()
    {
        return view('personajes.create');
    }

    public function store(PersonajeRequests $request)
    {
        // Crear el personaje con los datos validados
        $personaje = Personaje::create($request->validated());

        // Crear las armas asociadas
        foreach ($request->armas as $armaData) {
            $personaje->armas()->create($armaData);
        }

        return redirect()->route('personajes.index')->with('success', 'Personaje creado con éxito.');
    }

    public function edit(Personaje $personaje)
    {
        return view('personajes.edit', compact('personaje'));
    }

    public function update(PersonajeRequests $request, Personaje $personaje)
    {
        // Actualizar personaje
        $personaje->update($request->validated());

        foreach ($request->armas as $armaData) {
            if (isset($armaData['id'])) {
                $arma = Arma::find($armaData['id']);
                if ($arma) {
                    // Permitir que el personaje mantenga su propia arma sin considerarla duplicada
                    if ($arma->nombre !== $armaData['nombre']) {
                        $armaExistente = Arma::where('nombre', $armaData['nombre'])
                            ->whereNotNull('personaje_id')
                            ->exists();

                        if ($armaExistente) {
                            return redirect()->back()->withErrors(["El arma '{$armaData['nombre']}' ya está asignada a otro personaje."]);
                        }
                    }

                    $arma->update($armaData);
                }
            } else {
                // Verificar si el arma ya está asignada a otro personaje antes de añadirla
                $armaExistente = Arma::where('nombre', $armaData['nombre'])
                    ->whereNotNull('personaje_id')
                    ->exists();

                if (!$armaExistente) {
                    $personaje->armas()->create($armaData);
                } else {
                    return redirect()->back()->withErrors(["El arma '{$armaData['nombre']}' ya está asignada a otro personaje."]);
                }
            }
        }

        return redirect()->route('personajes.index')->with('success', 'Personaje actualizado con éxito.');
    }




    public function destroy(Personaje $personaje)
    {
        // Eliminar las armas asociadas antes de eliminar el personaje
        $personaje->armas()->delete();
        $personaje->delete();

        return redirect()->route('personajes.index')->with('success', 'Personaje eliminado.');
    }
}
