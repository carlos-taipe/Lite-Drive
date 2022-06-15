@extends('layouts.master')

@section('main-content')
@if(count($carpeta->carpetas_hijos)  > 0 || count($carpeta->archivos) > 0)
    @if(count($carpeta->carpetas_hijos)  > 0)
        <h2 class="text-center">Carpetas</h2>
        <div class="d-flex flex-wrap w-100">
                @foreach ($carpeta->carpetas_hijos as $carpeta_hijo)
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <a class="text-center text-decoration-none" href="{{route('carpetas.show',$carpeta_hijo->id)}}">
                    <div class="w-100">
                        <img src="{{url('/img/folder.png')}}" alt="Imagen Folder">
                        <div class="text-dark">
                            <h5>{{$carpeta_hijo->nombre}}</h5>
                        </div>
                    </div>
                    </a>
                    <div class="d-flex justify-content-evenly">
                        <form action="{{route('carpetas.destroy',$carpeta_hijo)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" onClick="return mensajeConfirmacion(false)"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
        </div>
    @endif
        <hr class="my-4">
    @if(count($carpeta->archivos)  > 0)
        <h2 class="text-center">Archivos</h2>
        <div class="d-flex flex-wrap w-100">
            @foreach ($carpeta->archivos as $archivo)
            <div class="col-6 col-sm-4 col-md-3 col-xl-2 text-center">
                <div class="w-100">
                    @if($archivo->extension == 'pdf')
                    <img src="{{url('/img/pdf.png')}}" alt="Imagen Pdf">
                    @else
                    <!-- <img src="{{url('/img/image.png')}}" alt="Imagen Imagen"> -->
                    <img src="{{asset($archivo->url)}}" alt="Imagen Imagen" width="100" height="100" style="object-fit:cover">
                    @endif
                    <div class="text-dark">
                        <h5>{{$archivo->nombre}}</h5>
                    </div>
                </div>
                <div class="d-flex justify-content-evenly">
                        <a class="btn btn-primary" target="_blank" href="{{asset($archivo->url)}}"><i class="fa-solid fa-eye"></i></a>
                        <form action="{{route('archivos.destroy',$archivo)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onClick="return mensajeConfirmacion(true)"><i class="fa-solid fa-trash"></i></button>
                        </form>
                </div>
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
@endsection
@section('scripts')
    <script>
        function mensajeConfirmacion(esArchivo){
            let mensaje = "";

            if(esArchivo == true){
                mensaje = "el archivo.";
            }
            else{
                mensaje = "la carpeta.";
            }

            return window.confirm('Estas seguro de eliminar '+mensaje);
            
        }
        

    </script>
@endsection