<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <title>Laravel CRUD Tutorial</title>
</head>
@include('includes.navbar')

<body style="margin-bottom:22px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="display-3">Boletas</h1>
                <div>
                    <a href="/crud/receipt_crud/receipt_create" class="btn btn-primary mb-3">Crear Boleta</a>
                </div>

                <div class="alert alert-success">

                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>ID usuario asociado</td>
                            <td>Fecha</td>
                            <td colspan=2>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($receipts as $receipt)
                        <tr>
                            <td>{{$receipt->id}}</td>
                            <td>{{$receipt->name}}</td>
                            <td>{{$receipt->user_id}}</td>
                            <td>{{$receipt->payment_date}}</td>
                            <td>
                                <form action="/receipts/edit/{{$receipt->id}}" method="GET">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                            </td>

                            <td>
                                <form action="/receipts/{{$receipt->id}}" method="GET">
                                    <button type="submit" class="btn btn-primary">Ver</button>
                                </form>
                            </td>
                            <td>

                                <form action="/receipts/delete/{{$receipt->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                </div>
            </div>
            <script src="{{ asset('js/app.js') }}" type="text/js"></script>


            <!-- Aquí irá la vista que mostrará los resultados de la busqueda realizada -->
            @include('includes.footer')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>