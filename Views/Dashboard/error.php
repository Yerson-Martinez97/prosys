<!DOCTYPE html>

<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <title>404 - No encontrada</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL; ?>Assets/images/logo/favicon.ico" />

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
</head>

<body>
    <div class="row content-error">
        <div class="col-md-12 mx-auto">
            <div class="container-xxl container-p-y">
                <div class="misc-wrapper">
                    <h2 class="mb-2 mx-2">Página no encontrada :(</h2>
                    <p class="mb-4 mx-2" draggable="false">Oops! 😖 La URL solicitada no se encontró en este servidor.</p>
                    <a href="<?php echo BASE_URL; ?>" class="btn btn-primary" draggable="false">Volver</a>
                    <div class="mt-3 text-center">
                        <img src="<?php echo BASE_URL; ?>Assets/images/pages/404.png" width="60%" height="100%" class="img-fluid" data-app-light-img=" images/not_found.png" draggable="false" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>