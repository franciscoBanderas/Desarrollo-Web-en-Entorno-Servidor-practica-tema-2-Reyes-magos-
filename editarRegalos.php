<?php 
    require_once('modelos/Regalos.php');
    $modeloRegalos = new Regalos();
    $id = 0;
    if(!empty($_POST)){
        $datosRegalo = [];
        $datosRegalo['id'] = (int)filter_input(INPUT_POST, 'id');
        $datosRegalo['nombreRegalo'] = filter_input(INPUT_POST, 'nombreRegalo', FILTER_SANITIZE_STRING);
        $datosRegalo['precioRegalo'] = (float)str_replace(',','.',filter_input(INPUT_POST, 'precioRegalo', FILTER_SANITIZE_STRING));
        $datosRegalo['idReyMago'] = filter_input(INPUT_POST, 'idReyMago', FILTER_SANITIZE_STRING);
        $id = $modeloRegalos->modificarRegalos($datosRegalo);
        $id = $datosRegalo['id'];
        }  
     if(!empty($_GET)){
        $id = (int) filter_input(INPUT_GET, 'id');  
    }
    $regalo = $modeloRegalos->seleccionarRegalo($id);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <title>Modificar regalos</title>
    </head>
    <body>
        <div class="contenedor">
            <div class="fila">
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    
                    <h1>Modificar los regalos</h1> 
                </div>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <form action="editarRegalos.php" method="post">
                        <div class="form-group">
                            <label for="nombreRegalo">Nombre</label>
                            <input type="text" class="form-control mb-2" name="nombreRegalo" value="<?php echo $regalo['nombreRegalo'] ?>" id="nombreRegalo" required>
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control mb-2" name="precioRegalo" id="precioRegalo" value="<?php echo $regalo['precioRegalo'] ?>" required>
                            <label for="idReyMago">Rey Mago Asignado</label>
                            <select class="form-select" aria-label="Default select example" name="idReyMago" id="idReyMago" required>
                                <option value="1" <?php if($regalo['idReyMago'] == "1"){
                                    echo "selected";
                                } ?>>Melchor</option>
                                <option value="2" <?php if($regalo['idReyMago'] == "2"){
                                    echo "selected";
                                } ?>>Gaspar</option>
                                <option value="3" <?php if($regalo['idReyMago'] == "3"){
                                    echo "selected";
                                } ?>>Baltasar</option>
                            </select>
                   
                            <input type="hidden" name="id" value="<?php echo $regalo['id'] ?>">
                        </div><br>
                        <div class="btn-group float-end">
                        <a href="regalosNinos.php" class="btn btn-outline-warning">Volver</a>
                        <a href="crearRegalos.php" class="btn btn-outline-info">Añadir Regalo</a>
                    </div>

                        <button type="submit" class="btn btn-outline-success">Modificar los datos</button>
                      
                    </form>
                    

                </div>
            </div>
        </div>
    </body>
</html>