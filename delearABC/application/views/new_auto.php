<?php

$readonly = '';
if($_POST){
  $vehiculos = $_POST;
  $vehiculos['vendido'] = false;
  core_dealer::guardar('vehiculos',$vehiculos);
  redirect('main/new_auto');
}

$vehiculos = new stdClass;
$vehiculos->id ='';
$vehiculos->marca ='';
$vehiculos->modelo ='';
$vehiculos->color ='';
$vehiculos->matricula ='';
$vehiculos->placa ='';
$vehiculos->anio ='';
$vehiculos->precio ='';
$vehiculos->foto ='';
if (isset($id)) {
  // code...
  $rs = core_dealer::x_id($id,'vehiculos');
  $readonly = 'readonly';
  if (count($rs) > 0) {
    $vehiculos = $rs[0];
    // code...
  }
}
plantilla::aplicar();
?>

<div class="container">
<br>
<h3>Agregar vehiculos</h3>

<form method="post" action="">
  <input type="hidden" name="id" value="<?= $vehiculos->id; ?>">
      <div class="row">
        <div class="col-sm-7">
          <div class="card">
            <div class="card-body">
              <?= asgInput('marca', 'Marca', ['placeholder'=>'Digite la Marca'], $vehiculos->marca)?>
              <?= asgInput('modelo', 'Modelo', ['placeholder'=>'Digite el Modelo'], $vehiculos->modelo)?>
              <?= asgInput('color', 'Color', ['placeholder'=>'Digite el Color'], $vehiculos->color, $readonly )?>
              <?= asgInput('matricula', 'Matricula', ['placeholder'=>'Digite la Matricula'], $vehiculos->matricula, $readonly) ?>
              <?= asgInput('placa', 'Placa', ['placeholder'=>'Digite la Placa'], $vehiculos->placa, $readonly) ?>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="card">
            <div class="card-body">
              <?= asgInput('anio', 'Año', ['placeholder'=>'Digite el Año'], $vehiculos->anio, $readonly) ?>
              <?= asgInput('precio', 'Precio', ['placeholder'=>'Digite el Precio'], $vehiculos->precio, $readonly) ?>
              <div class="custom-file">
                <?= asgInputF('foto', $vehiculos->anio, $readonly);  ?>
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
          <br>
          <br>
              <button type="submit"class="btn btn-primary" >
                <i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
              <button onclick="return confirm('¿Esta seguro?');" class="btn btn-danger" type="reset" >
                <i class="fa fa-trash" aria-hidden="true"></i> Limpiar</button>
              </div>
            </div>
          </div>
        </div>
      </div>

</form>


<br>
<h3 class="container">Listado de Vehiculos Disponible</h3>

<table class ='table container'>
  <thead>
    <tr>
      <th>ID</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Color</th>
      <th>Matricula</th>
      <th>Placa</th>
      <th>Anio</th>
      <th>Precio</th>
      <th>Imagen</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = core_dealer::listado('vehiculos');
    foreach ($rs as $vehiculos) {
      $urlEditar = base_url("main/editar/{$vehiculos->id}");
      $urlVender = base_url("main/vender/{$vehiculos->id}");
      $precio = number_format($vehiculos->precio, 2);
      echo <<<PERSONA
    <tr>
    <td>{$vehiculos->id}</td>
    <td>{$vehiculos->marca}</td>
    <td>{$vehiculos->modelo}</td>
    <td>{$vehiculos->color}</td>
    <td>{$vehiculos->matricula}</td>
    <td>{$vehiculos->placa}</td>
    <td>{$vehiculos->anio}</td>
    <td>{$precio}</td>
    <td>{$vehiculos->foto}</td>
      <td>
      <a href="{$urlEditar}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
      <a href="{$urlVender}" class="btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Vender</a>
      </td>
    </tr>
PERSONA;
  }?>
  </tbody>
</table>

</div>
