<?php 
    require_once('modelos/Regalos.php');
    $modeloRegalos = new Regalos();
    $filas = $modeloRegalos->seleccionarTodosLosRegalos();
    $reyesMagos = [1 => "Melchor", 2 => "Gaspar", 3 => "Baltasar"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Regalos de los niños</title>
</head>
<body>
    <div class="contenedor">
        <div class="fila">
            <div class="col-12 col-md-8 offset-md-2 mt-4">
            <h1>Lista de regalos</h1>
            </div>
            <?php if((int)$filas->num_rows){ ?>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="table-primary">ID</th>
                                <th class="table-secondary">Nombre del regalo</th>
                                <th class="table-danger">Precio del regalo</th>
                                <th class="table-warning">Rey Mago </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($fila = $filas->fetch_assoc()){ ?>
                                <tr>
                                    <td class="table-primary"><?php echo $fila['id']; ?></td>
                                    <td class="table-secondary"><?php echo $fila['nombreRegalo']; ?></td>
                                    <td class="table-danger"><?php echo number_format($fila['precioRegalo'],2,',','.'); ?>€</td>
                                    <td class="table-warning"><?php echo $reyesMagos[$fila['idReyMago']]; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="editarRegalos.php?id=<?php echo $fila['id']; ?>" class="btn btn-outline-primary"><i class="fas fa-pen"></i> Modificar</a>
                                            <a href="borrarRegalos.php?id=<?php echo $fila['id']; ?>" class="btn btn-outline-warning"><i class="fas fa-trash"></i> Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="crearRegalos.php" class="btn btn-outline-info"><i class="fas fa-plus"></i> Añadir un regalo</a>
                </div>
            <?php } ?>       
    </div>
</body>
</html>