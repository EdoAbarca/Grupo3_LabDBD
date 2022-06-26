<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Checkout</title>

    <!-- <link href="{{ asset('css/checkout.css') }}" rel="stylesheet"> -->
</head>

<body style="margin-bottom:22px">


    @include('includes.navbar')
    <!-- Aquí irá el form para realizar el pago de la suscripcion -->
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout</h2>
            <p class="lead">Proceda a llenar los campos del formulario para hacer efectivo el pago de la suscripción.</p>
        </div>

        <div class="row">
        <div class="col-3"></div>
        <div id="columnaCentral" class="col-6">
            <form class="row g-4" action="/receipts/create" method="POST"> <!-- Crear controlador para esto -->
                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label">Fecha</label>
                    <input id="date" name="date" type="string" class="form-control" value="{{  date('Y-m-d') }}" required style="text-align: center;" readonly="readonly">
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Monto</label>
                    <input id="amount" name="amount" type="number" class="form-control" value="2990" required style="text-align: center;" readonly="readonly">
                </div>
                <div class="col-md-4">
                    <label for="validationDefaultUsername" class="form-label">Método de pago</label>
                    <div class="input-group">
                        <select id="payment_method_id" name="payment_method_id" class="form-select" required>
                            <option value="Seleccione un método" disabled>Método de pago</option>
                            <option value="1">Débito</option>
                            <option value="2">Crédito</option>
                            <option value="3">Paypal</option> <!--Aquí hay que proporcionar los métodos de pago del usuario, entregarlos por controlador-->
                        </select>
                    </div>
                </div>
                    
                <br>
                <div class="col-12">
                    <div class="text-center">
                      <a class="btn btn-outline-success" href="/home">Cancelar</a>
                     <!--  <input id="boton-registro" class="btn btn-outline-success" type="submit" name="" value="Realizar pago">-->
                    </div>
                </div>
            </form>

        </div>
        <div class="col-6"></div>


    </div>
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
</body>

</html>