<!DOCTYPE html>
<html lang="es" class="h-100"> <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('img/favicon.png') ?>" type="image/png">
    <title><?= $title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    
    <style>
        /* Flexbox para empujar el footer */
        body {
            background-color: #f4f7f6;
            display: flex;
            flex-direction: column;
        }

        /* El main ocupará todo el espacio disponible */
        main {
            flex-shrink: 0;
            flex-grow: 1;
        }

        .navbar-brand img {
            max-height: 50px;
        }

        .card-img-top {
            height: 200px;
            object-fit: contain;
        }
    </style>
</head>
<body class="h-100"> <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('img/logo_cmm.png') ?>" alt="Logo CMM"> 
        </a>

        <div class="ms-auto">
            <a href="<?= url_to('logout') ?>" class="btn btn-outline-danger btn-sm fw-bold">
                <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
            </a>
        </div>
    </div>
</nav>