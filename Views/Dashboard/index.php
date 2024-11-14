<?php include "Views/Templates/header.php"; ?>

<style>
    .content-wrap .info-boxes {
        padding: 0em 0 2em;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        grid-gap: 2em;
    }

    .content-wrap .info-boxes .info-box {
        background: #fff;
        height: 160px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 0 3em;
        border: 1px solid #ede8f0;
        border-radius: 5px;
        -webkit-box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.23);
        -moz-box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.23);
        box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.23);
    }

    .content-wrap .info-boxes .info-box .box-icon svg {
        display: block;
        width: 48px;
        height: 48px;
    }

    .content-wrap .info-boxes .info-box .box-icon svg path,
    .content-wrap .info-boxes .info-box .box-icon svg circle {
        fill: none;
        stroke: #F4A261;
        stroke-width: 1.5;
    }

    .content-wrap .info-boxes .info-box .box-content {
        padding-left: 1.25em;
        white-space: nowrap;
    }

    .content-wrap .info-boxes .info-box .box-content .big {
        display: block;
        font-size: 2em;
        line-height: 150%;
        color: #1b253d;
    }
</style>

<div class="app-title">
    <div>
        <h1>
            <i class="fa-solid fa-house"></i>
            Panel de Administración
        </h1>
    </div>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""><?= ($controllerName) ? $controllerName : "*"; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <a href=""><? //= ($view) ? $view : ""; 
                        ?></a>
        </li>
    </ol>
</nav>
<div class="col-lg-12 mb-4 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-7 my-auto">
                <div class="card-body">
                    <h3 class="card-title text-primary">
                        <span>
                            <?= ($data['user']['gender'] == "m") ? "Bienvenido" : "Bienvenida"; ?>
                        </span>
                        <span class="text-secondary">
                            <?= ucfirst($fullname) ?>
                        </span>
                    </h3>
                </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img src="<?= BASE_URL . $portada; ?>" height="250" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-wrap">
    <!-- <h4>Persona</h4> -->
    <?php
    if ($isAdmin) {
    ?>
        <h4>Gestión Usuarios</h4>
        <section class="info-boxes">
            <a href="<?= BASE_URL; ?>User/users" class="info-box">
                <div class="box-icon">
                    <i class="fa-solid fa-users fa-2xl text-primary"></i>
                </div>
                <div class="box-content">
                    <span>Usuarios</span>
                    <span id="totalUsers" class="big">0</span>
                </div>
            </a>
        </section>
    <?php } ?>
</div>

<?php
$script = $view;
$scriptFile = $controllerName;
include "Views/Templates/footer.php";
?>