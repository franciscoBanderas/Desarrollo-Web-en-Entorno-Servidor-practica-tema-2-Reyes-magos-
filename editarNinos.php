<?php 
    require_once('modelos/Ninos.php');

    $modeloNinos = new Ninos();
    $id = 0;


    if(!empty($_POST)){
        $datosNino = [];
        $datosNino['id'] = (int)filter_input(INPUT_POST, 'id');
        $datosNino['nombreNino'] = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $datosNino['apellidosNino'] = filter_input(INPUT_POST, 'apellidosNino', FILTER_SANITIZE_STRING);
        $fechainvertida = filter_input(INPUT_POST, 'fechaNacimientoNino', FILTER_SANITIZE_STRING);
        $datosNino['fechaNacimientoNino'] = date("Y-m-d", strtotime($fechainvertida));
        $datosNino['buenComportamientoNino'] = filter_input(INPUT_POST, 'buenComportamientoNino', FILTER_SANITIZE_STRING);
        
    
            $id = $modeloNinos->modificarNinos($datosNino);
           
        } 

       

        else if(!empty($_GET)){
            $id = (int) filter_input(INPUT_GET, 'id');
    }

    $nino = $modeloNinos->seleccionar($id);
 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <title>Modificar Niños</title>
     
    </head>
    
    <body>
    
        <div class="contenedor">
            <div class="fila">
            
           
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                <h1>Modificar datos del niño</h1>
                    <form  method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control mb-2" name="nombre" value="<?php echo $nino['nombreNino'] ?>" id="nombreNino" required>
                            <label for="apellido">Apellidos</label>
                            <input type="text" class="form-control mb-2" name="apellidosNino" id="apellidosNino" value="<?php echo $nino['apellidosNino'] ?>" required>
                            <label for="fechaNacimientoNino">Fecha de Nacimiento</label>
                            <input type="text" class="form-control mb-2" name="fechaNacimientoNino" id="fechaNacimientoNino" value="<?php echo date("d-m-Y", strtotime($nino['fechaNacimientoNino'])) ?>" required>
                            <label for="buenComportamiento">Ha sido bueno?</label>
                            <input type="text" class="form-control mb-2" name="buenComportamientoNino" id="buenComportamientoNino" value="<?php echo $nino['buenComportamientoNino'] ?>" required>

                            <input type="hidden" name="id" value="<?php echo $nino['id'] ?>">
                        </div>
                        <div class="btn-group float-end">
                        <a href="ninos.php" class="btn btn-outline-warning">Volver</a>
                        <a href="crearNinos.php" class=" btn btn-outline-info">Añadir niño</a>
                    </div>
                        <button type="submit" class="btn btn-outline-success">Modificar los datos</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>