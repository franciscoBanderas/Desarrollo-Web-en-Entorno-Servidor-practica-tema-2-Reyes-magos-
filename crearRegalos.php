<?php 
    require_once('modelos/Regalos.php');
    $modeloRegalos = new Regalos();
    if(!empty($_POST)){
        $datosDelRegalo = [];
        $datosDelRegalo['nombreRegalo'] = filter_input(INPUT_POST, 'nombreRegalo', FILTER_SANITIZE_STRING);
        $datosDelRegalo['precioRegalo'] = (float)str_replace(',','.',filter_input(INPUT_POST, 'precioRegalo', FILTER_SANITIZE_STRING));
        $datosDelRegalo['idReyMago'] = filter_input(INPUT_POST, 'idReyMago', FILTER_SANITIZE_STRING);
        $id = $modeloRegalos->insertarRegalos($datosDelRegalo);
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
        <title>Añadir regalos a la lista</title>
    </head>
    <body>
        <div class="contenedor">
            <div class="fila">
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <h1>Añadir Regalos a la lista</h1>
                </div>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <form action="crearRegalos.php" method="post">
                        <div class="form-group">
                            <label for="nombreRegalo">Nombre del regalo</label>
                            <input type="text" class="form-control mb-2" name="nombreRegalo" id="nombreRegalo" required>
                            <label for="precioRegalo">Precio del regalo</label>
                            <input type="text" class="form-control mb-2" name="precioRegalo" id="precioRegalo" placeholder="0.00" required>
                            <label for="idReyMago">Rey Mago </label>
                            <select class="form-select" aria-label="Default select example" name="idReyMago" id="idReyMago" required>
                                <option value="1">Melchor</option>
                                <option value="2">Gaspar</option>
                                <option value="3">Baltasar</option>
                            </select>
                        </div><br>
                        <button type="submit" class="btn btn-outline-info">añadir un regalo</button>
                            <a href="regalosNinos.php" class="btn btn-outline-warning">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>