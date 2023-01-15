<?php 
    require_once('./modelos/Pedidos.php');
    require_once('./modelos/Ninos.php');
    require_once('./modelos/Regalos.php');
    
    $modeloPedidos = new Pedidos();
    $modeloNinos = new Ninos();
    $modeloRegalos = new Regalos();
    
    if(isset($_POST['id'])){
        $idNino = $_POST['id'];
    }else if(isset($_POST['idNino'])){
        $idNino = $_POST['idNino'];
    }else if(isset($_GET['idNino'])){
        $idNino = (int) filter_input(INPUT_GET, 'idNino');
    }

    if(isset($_POST['idRegalo'])){
   
        $datosPedido = [];
        $datosPedido['idNino'] = $idNino;
        $datosPedido['idRegalo'] = $_POST['idRegalo'];
        $id = $modeloPedidos->insertar($datosPedido);
        header('idNino='.$idNino);
    }

    $nino = $modeloNinos->seleccionar($idNino);
    $filas = $modeloPedidos->seleccionarPedidosDe($idNino);
    $regalos = $modeloRegalos->seleccionarTodosLosRegalos();
    $listaRegalos = [] 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Lista de Regalos </title>
</head>
<body>

    <div class="contenedor">
        <div class="fila">
            <div class="col-12 col-md-8 offset-md-2 mt-4">
         
            <h1>Lista de Regalos de <?php echo $nino['nombreNino']; ?> <?php echo $nino['apellidosNino']; ?></h1>
         
            </div>
            <?php if((int)$filas->num_rows){ ?>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="table-danger">Nombre del regalo</th>
                                <th class="table-warning">Precio del regalo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($fila = $filas->fetch_assoc()){ ?>
                              
                                <?php $listaRegalos[] = $fila['idRegalo'] ?>
                            
                                <tr>
                                    <td class="table-danger"><?php echo $fila['nombreRegalo']; ?></td>
                                    <td class="table-warning"><?php echo number_format($fila['precioRegalo'],2,',','.'); ?>€</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                <a href="busquedaNinos.php" class="btn btn-outline-warning"> Volver</a></div>
            <?php } ?> 
         
            <?php if((int)$regalos->num_rows){ ?>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <h2 class="mb-3">Otros Regalos</h2>
                    <form action="pedidosNinos.php" method="post">
                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example" name="idRegalo" id="idRegalo" required>
                                <?php while($regalo = $regalos->fetch_assoc()){ ?>
                                   
                                    <?php if(!in_array($regalo['id'], $listaRegalos)){ ?>
                                        <option value="<?php echo $regalo['id']; ?>" ><?php echo $regalo['nombreRegalo']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>

                            <input type="text" name="idNino" value="<?php echo $idNino; ?>" style="opacity: 0">

                        </div>
                            <button type="submit" class="btn btn-outline-info">Añadir Regalo</button>
                    </form>
                </div>
            <?php } ?>     
    </div>
</body>
</html>