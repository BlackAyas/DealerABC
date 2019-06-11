<?php
$base = base_url('base');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Heroic Features - Start Bootstrap Template</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="<?= $base; ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= $base; ?>/css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('main/home'); ?>">Dealer ABC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('main/home'); ?>">Incio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('main/new_auto'); ?>">Agregar Vehiculo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('main/new_persona'); ?>">Agregar Cliente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('main/usuario'); ?>">Usuarios</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('main/reportes'); ?>">Reportes</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
