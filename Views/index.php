<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>Inicio de Sesión</title>
  <meta name="Management System" content="login" />

  <link rel="icon" type="image/x-icon" href="<?= BASE_URL; ?>Assets/images/company/favicon.ico" />
  <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/fonts/boxicons-2.1.4/css/boxicons.css" />
  <!-- CORE CSS -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <!-- VENDORS CSS -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/vendor/css/pages/page-auth.css" />
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card">
          <div class="card-body">
            <div class="app-brand justify-content-center my-3">
              <h3 class="font-weight-bold">Iniciar Sesión</h3>
            </div>
            <div class="login-box">
              <form class="mb-3" id="frmLogin">
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="userName">Usuario</label>
                    </div>
                    <div class="input-group input-group-merge">
                      <input type="text" class="form-control" id="userName" name="userName" placeholder="usuario-123" autocomplete="off" />
                      <span class="input-group-text" id="basic-addon_userName">
                        <i id="adv_userName" title="Ingrese su usuario"></i>
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <div class="form-password-toggle">
                      <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Contraseña</label>
                      </div>
                      <div class="input-group input-group-merge" id="inp_password">
                        <span class="input-group-text cursor-pointer" id="lblpassword"><i class="bx bx-hide"></i></span>
                        <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" autocomplete="off" />
                        <span class="input-group-text" id="basic-addon_password">
                          <i id="adv_password" title="Ingrese su constraseña"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 mx-auto text-center">
                    <button class="btn btn-primary" type="submit" onclick="handleFormLogin(event)">Ingresar</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 mx-auto">
                    <p class="my d-none" id="msg"></p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  const base_url = '<?= BASE_URL; ?>';
</script>

<script src="<?= BASE_URL; ?>Assets/js/sweetalert2.all.min.js"></script>

<script src="<?= BASE_URL; ?>Assets/js/utilities/general.js"></script>
<script src="<?= BASE_URL; ?>Assets/js/generalAlerts/<?= $controllerName . "/" . $view ?>.js"></script>

<script src="<?= BASE_URL; ?>Assets/js/functions/patternInputs.js"></script>
<script src="<?= BASE_URL; ?>Assets/js/functions/inputFields.js"></script>
<script src="<?= BASE_URL; ?>Views/<?= $view ?>.js"></script>

</html>