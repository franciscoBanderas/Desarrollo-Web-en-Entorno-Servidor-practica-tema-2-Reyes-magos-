<?php 
    require_once('modelos/Ninos.php');
    $modeloNinos = new Ninos();
    if(!empty($_POST)){
        $datosNino = [];
        $datosNino['nombreNino'] = filter_input(INPUT_POST, 'nombreNino', FILTER_SANITIZE_STRING);
        $datosNino['apellidosNino'] = filter_input(INPUT_POST, 'apellidosNino', FILTER_SANITIZE_STRING);
        $fechainvertida = filter_input(INPUT_POST, 'fechaNacimientoNino', FILTER_SANITIZE_STRING);
        $datosNino['fechaNacimientoNino'] = date("Y-m-d", strtotime($fechainvertida));
        $datosNino['buenComportamientoNino'] = filter_input(INPUT_POST, 'buenComportamientoNino', FILTER_SANITIZE_STRING);
        $id = $modeloNinos->insertarNinos($datosNino); 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <title>Añadir niño</title>
    </head>
    <body>
        <div class="contenedor">
            <div class="fila">
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <h1>Añadir datos del Niño</h1>
                </div>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nombreNino">Nombre</label>
                            <input type="text" class="form-control mb-2" name="nombreNino" id="nombreNino" required>
                            <label for="apellidosNino">Apellido</label>
                            <input type="text" class="form-control mb-2" name="apellidosNino" id="apellidosNino" required>
                            <label for="fechaNacimientoNino">Fecha de Nacimiento</label>
                            <input type="text" class="form-control mb-2" name="fechaNacimientoNino" id="fechaNacimientoNino" placeholder="DD-MM-AAAA" required>
                            <label for="buenComportamientoNino">Ha tenido un buen comportamiento?</label>
                            <input type="text" class="form-control mb-2" name="buenComportamientoNino" id="buenComportamientoNino" placeholder="Si o No" required>
                            <button type="submit" class="btn btn-outline-info">añadir niño</button>
                            <a href="ninos.php" class="btn btn-outline-warning">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>