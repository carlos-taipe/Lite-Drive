@extends('layouts.master')

@section('main-content')
@if(count($carpeta->carpetas_hijos)  > 0 || count($carpeta->archivos) > 0)
    @if(count($carpeta->carpetas_hijos)  > 0)
        <h2 class="text-center">Carpetas</h2>
        <div class="d-flex flex-wrap w-100">
                @foreach ($carpeta->carpetas_hijos as $carpeta_hijo)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a class="text-center text-decoration-none" href="{{route('carpetas.show',$carpeta_hijo->id)}}">
                        <div class="w-100">
                            <img src="{{url('/img/folder.png')}}" alt="Imagen Folder">
                            <div class="text-dark">
                                <h5>{{$carpeta_hijo->nombre}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
        </div>
    @endif
        <hr class="my-4">
    @if(count($carpeta->archivos)  > 0)
        <h2 class="text-center">Archivos</h2>
        <div class="d-flex flex-wrap w-100">
            @foreach ($carpeta->archivos as $archivo)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a class="text-center text-decoration-none" href="{{route('archivos.show',$archivo->id)}}">
                    <div class="w-100">
                        @if($archivo->extension == 'pdf')
                        <img src="{{url('/img/pdf.png')}}" alt="Imagen Pdf">
                        @else
                        <img src="{{url('/img/image.png')}}" alt="Imagen Imagen">
                        @endif
                        <div class="text-dark">
                            <h5>{{$archivo->nombre}}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    @endif

@else
<div class="container text-center mt-5">
    <h2 >Carpeta Vacía</h2>
    <h4>Crea una carpeta o agrega un archivo</h4>
</div>
@endif
@stop