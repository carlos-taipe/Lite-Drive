<?php

namespace App\Http\Controllers;

use App\Models\Carpeta;
use Illuminate\Http\Request;

class CarpetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carpeta = Carpeta::find(1);

        return view('carpeta.show',[
            'carpeta' => $carpeta
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreCarpeta = $request->input('nombreCarpeta');
        $carpetaPadreId = $request->input('carpetaPadreId');
        
        Carpeta::create([
            'nombre' => $nombreCarpeta,
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
        $carpeta = Carpeta::find($id);

        return view('carpeta.show',[
            'carpeta' => $carpeta
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carpeta $carpeta)
    {
        $carpeta->delete();
        return redirect()->back();
    }
}
