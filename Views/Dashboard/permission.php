<?php include "Views/Templates/header.php"; ?>
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="container-xxl container-p-y">
            <div class="misc-wrapper text-center">
                <h2 class="mb-2 mx-2">No tiene permiso para acceder!</h2>
                <p class="mb-4 mx-2">No cumple con el tipo de usuario correspondiente para el acceso correspondiente</p>
                <a href="<?php echo BASE_URL; ?>" class="btn btn-primary">Regresar</a>
                <div class="mt-4">
                    <img src="<?php echo BASE_URL; ?>Assets/images/Pages/permission.png" alt="girl-doing-yoga-light" min-width="50%" max-width="80%" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>