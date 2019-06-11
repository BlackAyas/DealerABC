<?php
plantilla::aplicar();

    date_default_timezone_set('America/Santo_Domingo');

    $id_vehiculo = $this->uri->segment(3);
    $cedula = $this->uri->segment(4);

    $CI =& get_instance();

  $select = array(
        'id',
        'nombre',
        'apellido'
    );

  $cliente=$CI->db
    ->select($select)
    ->from('clientes')
    ->where('cedula', $cedula)
    ->get()
    ->result_array();

    $select = array(
        'marca',
        'modelo',
        'color',
        'anio',
        'precio'
    );

    $vehiculo = $CI->db
    ->select($select)
    ->from('vehiculos')
    ->where('id', $id_vehiculo)
    ->get()
    ->result_array();

    $descripcion = $vehiculo[0]['marca'] . ' ' . $vehiculo[0]['modelo'] . ' ' . $vehiculo[0]['anio'] . ' ' . $vehiculo[0]['color'];
    $itbis = $vehiculo[0]['precio']*0.18;
    $precio = $vehiculo[0]['precio'];

    //Guardando info factura

    $ventas['cedula'] = $cedula;
    $ventas['idVehiculos'] = $id_vehiculo;
    $fecha = date('Y-m-d H:i:s');
    $ventas['fecha'] = $fecha;
    $ventas['nombre'] = $cliente[0]['nombre'].' '.$cliente[0]['apellido'];
    $ventas['subtotal'] = $precio;
    $ventas['itbis'] = $itbis;
    $ventas['total'] = $precio+$itbis;

    $CI->db->insert('ventas', $ventas);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura Final</title>
</head>
<body class="container">
<br>
<br>
<pre>FACTURA CLIENTE
----------------------------------------------------------------------
DEALER ABC
FECHA: <?=$fecha?>
RNC: XXXXXXXXXXX
----------------------------------------------------------------------
CEDULA: <?=$cedula?>

NOMBRE: <?=$cliente[0]['nombre']?> <?=$cliente[0]['apellido']?>

----------------------------------------------------------------------
CANT	DESCRIPCION	                ITBIS	    VALOR
1       <?=$descripcion?>            <?=number_format($itbis,2)?>   <?=number_format($precio,2)?>

----------------------------------------------------------------------
                                        SUBTOTAL	<?=number_format($precio,2)?>

                                        DESC		0.0
                                        ITBIS		<?=number_format($itbis,2)?>

                                        TOTAL		<?=number_format($precio+$itbis,2)?>

----------------------------------------------------------------------</pre>
<br>

<a href='../../contrato'>Descargar contrato</a>
</body>
</html>
