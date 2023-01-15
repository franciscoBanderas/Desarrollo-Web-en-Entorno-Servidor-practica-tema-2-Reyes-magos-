<?php 

    require_once('modelos/Ninos.php');
    $modelNinos = new Ninos();
    $filas = $modelNinos->seleccionarTodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Niños</title>
</head>
<body>

        <div class="fila">
            <div class="col-12 col-md-8 offset-md-2 mt-4">
            <h1> Información de los niños</h1>
            </div>
            <?php if((int)$filas->num_rows){ ?>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="table-primary">ID</th>
                                <th class="table-secondary">Nombre del niño</th>
                                <th class="table-danger">Apellidos del niño</th>
                                <th class="table-warning">Fecha de Nacimiento</th>
                                <th class="table-info">Ha sido bueno?? (Si/No)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($fila = $filas->fetch_assoc()){ ?>
                                <tr>
                                    <td class="table-primary"><?php echo $fila['id']; ?></td>
                                    <td class="table-secondary"><?php echo $fila['nombreNino']; ?></td>
                                    <td class="table-danger"><?php echo $fila['apellidosNino']; ?></td>
                                    <td class="table-warning"><?php echo date("d-m-Y", strtotime($fila['fechaNacimientoNino'])); ?></td>
                                    <td class="table-info"><?php echo $fila['buenComportamientoNino']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="editarNinos.php?id=<?php echo $fila['id']; ?>" class="btn btn-outline-primary"><i class="fas fa-pen"></i> Modificar</a>
                                            <a href="borrarNinos.php?id=<?php echo $fila['id']; ?>" class="btn btn-outline-warning"><i class="fas fa-trash"></i> Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                                <div>
                            </div>      
                            <?php } ?>       
                        </tbody>  
                    </table>
                    <div class="contenedor"><a href="crearNinos.php" class="btn btn-outline-info"> añadir Niño</a><br><br>
                </div>   
            <?php } ?>        
    </div>
</body> 
</html>