<?php 
require_once('modelos/Ninos.php');
require_once('modelos/Reyes.php');

$modeloNinos = new Ninos();
$modeloReyes = new Reyes();

$filas = $modeloNinos->seleccionarBuenos();
$ninosBuenos = [];

while($fila = $filas->fetch_assoc()){
    $ninosBuenos[$fila['id']] = $fila['nombreNino'].' '.$fila['apellidosNino']; 
};

$filasMelchor = $modeloReyes->seleccionarPedidosReyMago(1);
$filasGaspar = $modeloReyes->seleccionarPedidosReyMago(2);
$filasBaltasar = $modeloReyes->seleccionarPedidosReyMago(3);

$totalMelchor = 0;
$totalGaspar = 0;
$totalBaltasar = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Reyes Magos</title>
</head>
<body>

    <div class="contenedor">
        <div class="fila">
            <div class="col-12 col-md-8 offset-md-2 mt-4 my=10px">

            <h1 align="center" class="mb-5 ">Información de los Reyes Magos</h1><br><br>
            </div>
            
           <h2 align="center"> Melchor</h2>
            
            <?php if((int)$filasMelchor->num_rows){ ?>
                <div class="col-12 col-md-8 offset-md-2 mt-2">
                    <table class="table table-striped mb-5">
                        <thead>
                            <tr>
                                <th class="table-primary">Regalos</th>
                                <th class="table-danger">Niños</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($fila = $filasMelchor->fetch_assoc()){ ?>
                                
                                <?php if(array_key_exists($fila['idNino'], $ninosBuenos)){ ?>
                               
                                    <tr>
                                        <td class="table-primary"><?php echo $fila['nombreRegalo']; ?></td>
                                        <td class="table-danger"><?php echo $ninosBuenos[$fila['idNino']]; ?></td>
                                    </tr>
                                  
                                    <?php $totalMelchor += (float) $fila['precioRegalo']; ?>
                                <?php } ?>
                            <?php } ?>
                            <tr>
                                <td class="table-primary"><strong> Dinero Gastado en los regalos</strong></td>
                                <td class="table-danger"><strong><?php echo $totalMelchor; ?> €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?> 
           
            <h2 align="center">Gaspar</h2>
            <?php if((int)$filasGaspar->num_rows){ ?>
                <div class="col-12 col-md-8 offset-md-2 mt-2">
                    <table class="table table-striped mb-5">
                        <thead>
                            <tr>
                                <th class="table-primary">Regalos</th>
                                <th class="table-danger">Niños</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($fila = $filasGaspar->fetch_assoc()){ ?>
                     
                                <?php if(array_key_exists($fila['idNino'], $ninosBuenos)){ ?>
                  
                                    <tr>
                                        <td class="table-primary"><?php echo $fila['nombreRegalo']; ?></td>
                                        <td class="table-danger"><?php echo $ninosBuenos[$fila['idNino']]; ?></td>
                                    </tr>
                              
                                    <?php $totalGaspar += (float) $fila['precioRegalo']; ?>
                                <?php } ?>
                            <?php } ?>
                            <tr>
                                <td class="table-primary"><strong>Dinero gastado en los regalos</strong></td>
                                <td class="table-danger"><strong><?php echo $totalGaspar; ?> €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?> 
        
            <h2 align="center"> Baltasar</h2>
            <?php if((int)$filasBaltasar->num_rows){ ?>
                <div class="col-12 col-md-8 offset-md-2 mt-2">
                    <table class="table table-striped mb-5">
                        <thead>
                            <tr>
                                <th class="table-primary">Regalos</th>
                                <th class="table-danger">Niños</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($fila = $filasBaltasar->fetch_assoc()){ ?>
                        
                                <?php if(array_key_exists($fila['idNino'], $ninosBuenos)){ ?>
                                  
                                    <tr>
                                        <td class="table-primary"><?php echo $fila['nombreRegalo']; ?></td>
                                        <td class="table-danger"><?php echo $ninosBuenos[$fila['idNino']]; ?></td>
                                    </tr>
                                  
                                    <?php $totalBaltasar += (float) $fila['precioRegalo']; ?>
                                <?php } ?>
                            <?php } ?>
                            <tr>
                                <td class="table-primary"><strong> Dinero Gastado en los regalos</strong></td>
                                <td class="table-danger"><strong><?php echo $totalBaltasar; ?> €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>  
    </div>
</body>
</html>