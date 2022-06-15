<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $archivo = $request->file('archivo');
        $carpetaPadreId = $request->input('carpetaPadreId');
        $nombreArchivo = $request->input('nombreArchivo');

        //Obtengo la extension para la parte front donde decidir que iconos colocar.
        $extensionArchivo = $archivo->extension();
        $nombreArchivo = $nombreArchivo.'.'.$extensionArchivo;

        $url = $request->file('archivo')->store('archivos');
        
        Archivo::create([
            'nombre' => $nombreArchivo,
            'url' => $url,
            'extension' => $extensionArchivo,
            'carpeta_id' => $carpetaPadreId,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
