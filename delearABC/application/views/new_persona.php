<?php

if($_POST){
  $clientes = $_POST;

  core_dealer::guardar('clientes', $clientes);
  redirect('main/new_persona');
}
plantilla::aplicar();
?>

<div class="container">
<br>
<h3>Agregar Cliente</h3>

<form method="post" action="">

      <div class="row">
        <div class="col-sm-7">
          <div class="card">
            <div class="card-body">
              <?= asgInput('cedula', 'Cedula', ['placeholder'=>'Digite la Cedula'])?>
              <?= asgInput('nombre', 'Nombre', ['placeholder'=>'Digite su Nombre'])?>
              <?= asgInput('apellido', 'Apellido', ['placeholder'=>'Digite su Apellido'])?>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="card">
            <div class="card-body">
              <?= asgInput('telefono', 'Telefono', ['placeholder'=>'Digite su Telefono (SIN GUIONES)']) ?>
              <?= asgInput('direccion', 'Direccion', ['placeholder'=>'Digite la Direccion']) ?>
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
<h3 class="container">Listado de Clientes Agregadas</h3>

<table class ='table container'>
  <thead>
    <tr>
      <th>ID</th>
      <th>Cedula</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Telefono</th>
      <th>Direccion</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = core_dealer::listado('clientes');
    foreach ($rs as $vehiculos) {
    /*  $urlBorrar = base_url("main/borrar/{$persona->id}");
      $urlEditar = base_url("main/editar/{$persona->id}");
      $persona->fecha = date('d/m/Y G:i', $persona->fecha);*/
      echo <<<PERSONA
    <tr>
    <td>{$vehiculos->id}</td>
    <td>{$vehiculos->cedula}</td>
    <td>{$vehiculos->nombre}</td>
    <td>{$vehiculos->apellido}</td>
    <td>{$vehiculos->telefono}</td>
    <td>{$vehiculos->direccion}</td>
    </tr>
PERSONA;
  }?>
  </tbody>
</table>

</div>
