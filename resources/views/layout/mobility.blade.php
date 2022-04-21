<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mobilidad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div id="app" class="container">
        <div class="row">
            <div class="col">
                <div class="text-center py-5">
                    <img src="/img/logo.png" alt="">
                </div>
                <h1>Tipo de movimiento: MOVILIDAD</h1>
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('mobility')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Monto:</label>
                        <input type="number" id="amount" name="amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="area">Area:</label>
                        <select name="area" class="form-control" id="area" required>
                            <option selected value="seleccione una area" disabled>seleccione una area</option>
                            <option>Sistemas</option>
                            <option>Finanzas</option>
                            <option>Contablidad</option>
                            <option>Servicio</option>
                            <option>Cocina</option>
                        </select>
                    </div>
                     <div class="form-group">
                       <label for="concept">Concepto:</label>
                       <textarea name="concept" class="form-control" required></textarea>
                     </div>
                     <h1>@{{ count }}</h1>
                     <button v-click="increment">Increment</button>


                     <button type="submit" class="btn btn-primary">Guardar e imprimir</button>
                   </form>
            </div>
        </div>
    </div>
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>