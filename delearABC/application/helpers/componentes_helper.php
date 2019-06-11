<?php

function asgInput($nombre, $label, $place = [], $valor='', $readonly=''){

  $placeholder ='';
  foreach ($place as $key => $value) {
    $$key = $value;
  }
  return <<<CODIGO
  <div class="form-group row">
    <label class="col-sm-3 col-form-label"><b>{$label}:</b></label>
    <div class="col-sm-7">
      <input type="text" class="form-control" placeholder="{$placeholder}" name='{$nombre}' value='{$valor}' {$readonly} required/>
    </div>
  </div>
CODIGO;
  // code...
}

function asgInputF($nombre, $valor='', $readonly=''){

  return <<<CODIGO
  <div class="form-group row">
    <div class="col-sm-7">
      <input type="file" id="customFile" class="custom-file-input" name='{$nombre}' value='{$valor}' {$readonly} required/>
    </div>
  </div>
CODIGO;
  // code...
}
 ?>
