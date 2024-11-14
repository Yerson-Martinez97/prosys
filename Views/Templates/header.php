<!DOCTYPE html>

<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">
<?php

$isAdmin = $isManager = $isTechnical = false;
if (isset($data['user_roles']) && is_array($data['user_roles'])) {
    $userRoles = $data['user_roles'];
    if (!empty($userRoles) && is_array($userRoles) && isset($userRoles[0]['name'])) {
        $roleNames = array_column($userRoles, 'name');
        $isAdmin = in_array("administrador", $roleNames);
        $isManager = in_array("encargado", $roleNames);
        $isTechnical = in_array("tecnico", $roleNames);
    }
}

$username = (isset($data['user'])) ? $data['user']['username'] : "usuario";
$fullname = (isset($data['user'])) ? ucwords($data['user']['firstName'] . ' ' . $data['user']['middleName'] . ' ' . $data['user']['paternalSurname'] . ' ' . $data['user']['maternalSurname']) : "usuario";

$avatar = (isset($data['user']) && file_exists($data['user']['avatar'])) ? $data['user']['avatar'] : "Assets/images/users/user_default.webp";
$portada = (isset($data['user']) && $data['user']['gender'] == 'm') ? "Assets/images/dashboard/dashboard_man.webp" : "Assets/images/dashboard/dashboard_woman.webp";

$nameCompany = $data['company']['name'];
$shortNameCompany = $data['company']['shortName'];
$iconCompany = $data['company']['icon'];
$logoCompany = $data['company']['logo'];

if (!file_exists($portada))
    $portada = 'Assets/images/dashboard/dashboard_man.png';
?>

<head>
    <meta charset="utf-8" />
    <meta name="author" content="<?= $data['company']['shortName'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

    <title><?= $nameCompany ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL . $iconCompany; ?>" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/vendor/fonts/boxicons.css" />
    <!-- <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/css/estilos.css" /> -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- <link rel="stylesheet" href="<?php //echo BASE_URL;
                                        ?>Assets/vendor/libs/apex-charts/apex-charts.css" /> -->
    <!-- <link rel="stylesheet" href="<?php //echo BASE_URL;
                                        ?>Assets/css/msg-error.css" /> -->

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= BASE_URL; ?>Assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= BASE_URL; ?>Assets/js/config.js"></script>

    <link href="<?= BASE_URL; ?>Assets/css/datatables.min.css" rel="stylesheet" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .content-error {
            /* Safari 3.1+*/
            -webkit-user-select: none;
            /* Firefox 1.0+ */
            -moz-user-select: none;
            /* Internet Explorer 10+ */
            -ms-user-select: none;
            /* Standard syntax */
            user-select: none;
            /* Disable callout on iOS */
            -webkit-touch-callout: none;
        }

        .icon-filled {
            fill: #F4A261;
            stroke: #F4A261;
            stroke-width: 2;
            stroke-linejoin: round;
        }

        .icon-void {
            fill: none;
            stroke: #F4A261;
            stroke-width: 2;
            stroke-linejoin: round;
            stroke-linecap: round;
        }

        .icon-extra {
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            stroke-linejoin: round;
            stroke-linecap: round;
        }

        .vb48 {
            margin-right: 10px;
        }
    </style>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo px-2">
                    <a href="<?php echo BASE_URL; ?>Dashboard/" class="app-brand-link">
                        <img src="<?= BASE_URL . $logoCompany ?>" width="50">
                        <h4 class="fw-bolder ms-2 text-uppercase" style="word-wrap: break-word; width: 250px; color:#024CAA;"><?= $shortNameCompany ?></h4>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-4">
                    <!-- Dashboard -->
                    <li class="menu-item active-0">
                        <a href="<?php echo BASE_URL; ?>Dashboard/" class="menu-link">
                            <i class="fa-solid fa-house fa-2xl text-primary"></i>
                            <div class="h5 m-0 px-2">Panel</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <?php
                                if ($data['user_roles']) {
                                    foreach ($data['user_roles'] as $role) {
                                ?>
                                        <span class='badge mx-1' style='background:<?= $role['colorTag'] ?>; border: 1px #fff solid;'><?= $role['name'] ?></span>
                                <?php
                                    }
                                } ?>

                            </div>
                        </div>
                        <!-- /Search -->
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= BASE_URL . $avatar; ?>" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="<?= BASE_URL; ?>User/profile">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= BASE_URL . $avatar; ?>" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">
                                                        <?= $username; ?>
                                                    </span>
                                                    <small class="text-muted"></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= BASE_URL; ?>Dashboard/exit">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Cerrar Sesión</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <script>
                            const id = <?php echo $_SESSION['user_id'] ?>;
                            const base_url = '<?php echo BASE_URL; ?>';
                        </script>