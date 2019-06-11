<?php
    $id_vehiculo = $this->uri->segment(3);

    $CI =& get_instance();

    $select = array(
        'marca',
        'modelo',
        'color',
        'matricula',
        'anio',
        'precio',
        'foto'
    );

    $rs = $CI->db
    ->select($select)
    ->from('vehiculos')
    ->where('id', $id_vehiculo)
    ->group_by('modelo')
    ->get()
    ->result_array();

  /*  if($_POST){
        $cedula = $_POST['cedula'];
        if(core_dealer::verificarCedula($cedula)){
            core_dealer::vendido($id_vehiculo);
            redirect('main/ventaFinal/'. $id_vehiculo . '/' . $cedula);
        }
    }*/
    if($_POST){
          $cedula = $_POST['cedula'];
          if(core_dealer::verificarCedula($cedula)){
              core_dealer::vendido($id_vehiculo);
              redirect('main/ventaFinal/'. $id_vehiculo . '/' . $cedula);
          }else {
            echo "nothing";
          }

      }
      plantilla::aplicar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmar Venta</title>
</head>
<body>
  <div class="container">

    <br>
    <h3>Confirmación de Venta</h3>
    <h4>Información del Vehículo</h4>
    <br>
    <form method="post">
      <div class="row">
        <div class="col-sm-7">
          <div class="card">
            <div class="card-body">
              <?=asgInput('cedula', "Cedula ",['placeholder'=>'Digite la Cedula del Cliente'])?>
              <button class="btn btn-primary" type="sumbit" ><i class="fa fa-shopping-cart"></i> Venta</button><!--onclick="window.open('../../main/home')"-->
            </div>
          </div>
        </div>
    </form>

      <div class="col-sm-5">
        <div class="card">
          <div class="card-body btn-primary">
                <table class='table'>
                <?php
                echo <<<DETALLES

                <tr>
                    <th>Marca</th>
                    <td>{$rs[0]['marca']}</td>
                </tr>
                <tr>
                    <th>Modelo</th>
                    <td>{$rs[0]['modelo']}</td>
                </tr>
                <tr>
                    <th>Color</th>
                    <td>{$rs[0]['color']}</td>
                </tr>
                <tr>
                    <th>Matricula</th>
                    <td>{$rs[0]['matricula']}</td>
                </tr>
                <tr>
                    <th>Año</th>
                    <td>{$rs[0]['anio']}</td>
                </tr>
                <tr>
                    <th>Precio</th>
                    <td>{$rs[0]['precio']}</td>
                </tr>
DETALLES
                ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>

</body>
</html>
