<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lite Drive</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <div class="p-4 bg-dark">
                    <a class="navbar-brand" href="/">
                        <img src="https://img.icons8.com/doodle/48/undefined/apple-files.png" width="30" height="30" class="d-inline-block align-top" alt="logo-icono">
                        <strong class="text-white">Lite Drive</strong> 
                    </a>
            </div>
        </header>
        
        <!-- Botones de acción -->
        <div class="text-center my-4">
            <button class="btn btn-primary mx-5" type="button" data-bs-toggle="modal" data-bs-target="#nuevaCarpetaModal">
                Crear Carpeta
            </button>
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#subirArchivoModal">
                Subir Archivo
            </button>
        </div>

        <!-- Contenedor Principal -->
        <div class="container">
            @yield('main-content')
        </div>

        <!-- Nueva Carpeta Modal -->
        <div class="modal fade" id="nuevaCarpetaModal" tabindex="-1" role="dialog" aria-labelledby="nuevaCarpetaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST" action="{{route('carpetas.store')}}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="nuevaCarpetaLabel">Nueva Carpeta</h5>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <input type="hidden" name="carpetaPadreId" value="{{$carpeta->id}}">
                                <div class="form-group">
                                    <label for="carpetaName" class="col-form-label">Nombre de Carpeta:</label>
                                    <input type="text" class="form-control" id="carpetaName" name="carpetaName">
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Subir Archivo Modal -->
        <div class="modal fade" id="subirArchivoModal" tabindex="-1" role="dialog" aria-labelledby="subirArchivoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="GET" action="{{route('carpetas.index')}}">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="nuevaCarpetaLabel">Subir Archivo</h5>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        
                                <div class="mb-3">
                                    <label for="file" class="col-form-label">Seleccionar archivo:</label>
                                    <input type="file" class="form-control" id="file" accept="image/png, image/jpg, image/jpeg, image/webp, image/svg,.pdf">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>