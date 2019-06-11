<?php
plantilla::aplicar();
$totalInvertido = core_dealer::TotalInvertido()['total'];
$total = core_dealer::Total()['total'];
$total_contad = core_dealer::Total()['cont'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes</title>
</head>
<body>
  <div class="container">
    <br>
    <h3>Ventas</h3>
    <br>
    <table class='table'>
        <thead>
            <tr>
                <th></th>
                <th>Total</th>
                <th>1 mes</th>
                <th>6 meses</th>
                <th>1 año</th>
                <th>2 años</th>
                <th>5 años</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>RD$</th>
                <td><?=number_format($total, 2)?></td>
                <td><?=core_dealer::meses(1)['rds']?></td>
                <td><?=core_dealer::meses(6)['rds']?></td>
                <td><?=core_dealer::meses(12)['rds']?></td>
                <td><?=core_dealer::meses(24)['rds']?></td>
                <td><?=core_dealer::meses(60)['rds']?></td>
            </tr>
            <tr>
                <th>Cantidad</th>
                <td><?=$total_contad?></td>
                <td><?=core_dealer::meses(1)['cant']?></td>
                <td><?=core_dealer::meses(6)['cant']?></td>
                <td><?=core_dealer::meses(12)['cant']?></td>
                <td><?=core_dealer::meses(24)['cant']?></td>
                <td><?=core_dealer::meses(60)['cant']?></td>
            </tr>

        </tbody>
    </table>

    <br>
    <h3>Ventas</h3>
    <br>
    <table class='table'>
        <thead>
            <tr>
              <th></th>
                <th>Total Invertido</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>RD$</th>
                <td><?=number_format($totalInvertido, 2)?></td>

            </tr>
        </tbody>
    </table>


  </div>
</body>
</html>
