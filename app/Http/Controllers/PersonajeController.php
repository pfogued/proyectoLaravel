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

        // Actualizar las armas
        foreach ($request->armas as $armaData) {
            // Si el arma tiene un ID (ya existe en la base de datos)
            if (isset($armaData['id'])) {
                // Buscar el arma existente
                $arma = Arma::find($armaData['id']);
                if ($arma) {
                    // Si el nombre del arma no ha cambiado, no hacemos validación de duplicado
                    if ($arma->nombre != $armaData['nombre']) {
                        // Verificamos que no exista otro personaje con el mismo nombre de arma
                        $armaExistente = Arma::where('nombre', $armaData['nombre'])
                            ->whereNotNull('personaje_id')
                            ->first();

                        if ($armaExistente) {
                            // Si existe otro personaje con ese nombre de arma, ignoramos el cambio
                            continue;
                        }
                    }

                    // Actualizamos el arma solo si pasa las validaciones
                    $arma->update($armaData);
                }
            } else {
                // Si no existe el ID, creamos un nuevo arma
                // Verificamos que no exista un arma con el mismo nombre asignada a otro personaje
                $armaExistente = Arma::where('nombre', $armaData['nombre'])
                    ->whereNotNull('personaje_id')
                    ->first();

                if (!$armaExistente) {
                    // Si no existe, la creamos y la asociamos al personaje
                    $personaje->armas()->create($armaData);
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
