<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="CMM - Centro Mario Molina">
  <meta name="DC.Title" content="CMM - Centro Mario Molina">
  <meta http-equiv="title" content="CMM - Centro Mario Molina">
  <meta name="DC.Creator" content="www.cmmolina.cl">
  <meta name="keywords" content="investigación, centro investigación,centro desarrollo, cambio climático, contaminación, ciencia, estudios, capacitaciones, talleres, publicaciones científicas, publicaciones, conferencias, internacional, mario molina, centro, energía, transporte, research, development, air pollution, climate change">
  <meta name="description" content="Nuestra misión es desarrollar capacidades para enfrentar los problemas de la contaminación del aire y el cambio climático en América Latina.">
  <meta http-equiv="description" content="Nuestra misión es desarrollar capacidades para enfrentar los problemas de la contaminación del aire y el cambio climático en América Latina.">
  <meta http-equiv="DC.Description" content="Nuestra misión es desarrollar capacidades para enfrentar los problemas de la contaminación del aire y el cambio climático en América Latina.">
  <meta name="author" content="www.cmmolina.cl">
  <meta name="DC.Creator" content="www.cmmolina.cl">
  <meta name="vw96.objectype" content="Document">
  <meta name="resource-type" content="Document">
  <meta http-equiv="Content-Type" content="ISO-8859-1">
  <meta name="distribution" content="all">
  <meta name="robots" content="INDEX,FOLLOW,ARCHIVE,ODP,SNIPPET">
  <meta name="revisit" content="15 days">
  <meta property="og:url"           content="www.cmmolina.cl" />
	<meta property="og:type"          content="Centro Mario Molina" />
	<meta property="og:title"         content="Centro Mario Molina" />
	<meta property="og:description"   content="Nuestra misión es desarrollar capacidades para enfrentar los problemas de la contaminación del aire y el cambio climático en América Latina." />
	<meta property="og:image"         content="http://cmmolina.cl/img/logo_cmm.png" />
  
 	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
  <title><?= $title  ?></title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
  
  <link rel="icon" href="<?= base_url('img/favicon.png') ?>" type="image/png">
  <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>

<!-- Barra superior teoría del color -->
<div class="color-theory-bar"></div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top navbar-apple-glass">
  <div class="container">
    
    <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>">
      <img src="<?= base_url('img/logo_cmm.png') ?>" alt="Logo CMM" style="height: 50px; width: auto;">
      </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGlass" aria-controls="navbarGlass" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-list" style="font-size: 1.6rem; color: var(--cmm-deep);"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarGlass">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link <?= (current_url() == base_url('')) ? 'active' : '' ?>" href="<?= base_url() ?>">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('quienes-somos') ?>">¿Quiénes somos?</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('nuestro-equipo') ?>">Equipo</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('proyectos') ?>">Proyectos</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('noticias') ?>">Noticias</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('transparencia') ?>">Transparencia</a></li>
      </ul>
    </div>
  </div>
</nav>