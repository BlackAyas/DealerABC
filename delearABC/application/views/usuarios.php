<?php

$readonly = 'readonly';

if($_POST){
  $usuarios = $_POST;
  core_dealer::guardar('usuarios',$usuarios);
  redirect('main/usuario');
}

$usuarios = new stdClass;
$usuarios->id = '';
$usuarios->nombre = '';
$usuarios->usuarios = '';
$usuarios->pass = '';
if (isset($id)) {
  $readonly = '';
  $rs = core_dealer::x_id($id,'usuarios');
  if (count($rs) > 0) {
    $usuarios = $rs[0];
    // code...
  }
}

plantilla::aplicar();
?>

<div class="container">
<br>
<h3>Editar Usuario</h3>

<form method="post" action="">

      <div class="row">
        <input type="hidden" name="id" value="<?= $usuarios->id; ?>">

        <div class="col-sm-7">
          <div class="card">
            <div class="card-body">
              <?= asgInput('nombre', 'Nombre', ['placeholder'=>'Digite su Nombre'], $usuarios->nombre, $readonly )?>
              <?= asgInput('usuarios', 'Usuario', ['placeholder'=>'Digite su Usuario'], $usuarios->usuarios, $readonly )?>
              <?= asgInput('pass', 'Contraseña', ['placeholder'=>'Digite su Contraseña'], $usuarios->pass, $readonly ) ?>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="card">
            <div class="card-body">
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
<h3 class="container">Listado de Usuarios Agregadas</h3>

<table class ='table container'>
  <thead>
    <tr>
      <th>ID</th>
      <th>nombre</th>
      <th>usuarios</th>
      <th>pass</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = core_dealer::listado('usuarios');
    foreach ($rs as $usuarios) {
      $urlEditar = base_url("main/editarU/{$usuarios->id}");
    /*  $urlBorrar = base_url("main/borrar/{$persona->id}");
      $persona->fecha = date('d/m/Y G:i', $persona->fecha);*/
      echo <<<PERSONA
    <tr>
    <td>{$usuarios->id}</td>
    <td>{$usuarios->nombre}</td>
    <td>{$usuarios->usuarios}</td>
    <td>{$usuarios->pass}</td>
      <td>
      <a href="{$urlEditar}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>

      </td>
    </tr>
PERSONA;
  }?>
  </tbody>
</table>

</div>
