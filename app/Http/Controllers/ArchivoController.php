<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if($extensionArchivo == 'pdf'){
            $url = $request->file('archivo')->store('public/archivos/pdfs');
        }
        else{
            $url = $request->file('archivo')->store('public/archivos/images');
        }

        //Obtenemos el url para depués poder cargarlo
        $url = Storage::url($url);

        Archivo::create([
            'nombre' => $nombreArchivo,
            'url' => $url,
            'extension' => $extensionArchivo,
            'carpeta_id' => $carpetaPadreId,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        $url = str_replace('storage','public',$archivo->url);
        Storage::delete($url);

        $archivo->delete();

        return redirect()->back();
    }
}
