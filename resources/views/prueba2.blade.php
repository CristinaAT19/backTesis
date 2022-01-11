<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Latest compiled and minified JavaScript --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
</head>

<body>
    <h2 class="text-center">Agregar Api</h2>
    <form action="{{ route('register.api') }}" method="get">
        <div class="form-row d-flex justify-content-center">
            <div class="col-md-4">

                <input class="form-control" type="text" name="name" placeholder="Nombre">
                <input class="form-control" type="url" name="route" required
                    placeholder="Ruta: htttps://ruta.com/api/entidad/algo">
                <input class="form-control" type="text" name="description" required placeholder="Descripcion">
                <select name="requirement" required class="selectpicker">
                    <option value="Ninguna">Sin token</option>
                    <option value="Bearer">Bearer</option>
                </select>

                <input class="form-control" type="text" name="fieldRequired"
                    placeholder="Campos requeridos : ex. dni,nombre">
                <select name="method" required class="selectpicker">
                    <option value="GET">GET</option>
                    <option value="POST">POST</option>
                    <option value="PUT">PUT</option>
                    <option value="DELETE">DELETE</option>
                </select>
                <textarea class="form-control" name="ejemplo" id="" cols="30" rows="10"
                    placeholder="Insertar text en formato json de ejemplo"></textarea>

            </div>
        </div>
        <button type="submit"  class="btn btn-success">Registrar API</button>

    </form>
    <h1>Apis de asistencia</h1>
    @foreach ($json_clientes['apiAsistencia'] as $cliente)
        <h3>Api</h3>
        <p><strong>Nombre : </strong> {{ $cliente->Nombre }}</p>
        <p><strong>Ruta : </strong> {{ $cliente->Ruta }}</p>
        <p><strong>Descripcion : </strong> {{ $cliente->Descripcion }}</p>
        <p><strong>Requisitos : </strong> {{ $cliente->Requisitos }}</p>
        <p><strong>Metodo : </strong> {{ $cliente->Metodo }}</p>
        <p><strong>Campos Requeridos : </strong> {{ $cliente->CamposRequeridos }}</p>
        <p><strong>Ejemplo : </strong> {{ json_encode($cliente->Ejemplo) }}</p>
        <br>
    @endforeach
</body>

</html>
