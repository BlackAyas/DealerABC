<?php plantilla::aplicar(); ?>
<!-- Page Content -->
<div class="container">

  <br>
  <h3>Estadistica de cuantos vehiculos hay</h3>
  <table class ='table container'>
    <thead>
      <tr>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $rs = core_dealer::listHome();
      foreach ($rs as $vehiculos) {
      echo <<<PERSONA
      <tr>
      <td>{$vehiculos['marca']}</td>
      <td>{$vehiculos['modelo']}</td>
      <td>{$vehiculos['Cantidad']}</td>
      </tr>
PERSONA;
    }?>
    </tbody>
  </table>

</div>
<!-- /.container -->
