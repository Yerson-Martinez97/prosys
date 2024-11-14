</div>
</div>
<?php
if (isset($scriptFile)) {
?>
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
                Copyright © <span id="currentYear"></span>,
                <a href="" target="_blank" class="footer-link fw-bolder"><?= $nameCompany ?></a>. Todos los derechos reservados
            </div>
            <div>
                <a href="mailto:" target="_blank" class="footer-link me-4">Soporte</a>
            </div>
        </div>
    </footer>
    <script>
        var currentYearElement = document.getElementById('currentYear');
        var currentYear = new Date().getFullYear();
        currentYearElement.textContent = currentYear;
    </script>
<?php
} ?>

<script src="<?= BASE_URL; ?>Assets/js/sweetalert2.all.min.js"></script>
<script src="<?= BASE_URL; ?>Assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= BASE_URL; ?>Assets/vendor/js/bootstrap.js"></script>
<script src="<?= BASE_URL; ?>Assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= BASE_URL; ?>Assets/vendor/js/menu.js"></script>
<script src="<?= BASE_URL; ?>Assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>Assets/js/datatables.min.js"></script>
<script src="<?= BASE_URL; ?>Assets/js/utilities/general.js"></script>

<!--  -->

<!-- <script src="<?= BASE_URL; ?>Assets/js/utilities/<?= $scriptFile . "/" . $script ?>.js"></script> -->
<script src="<?= BASE_URL; ?>Assets/js/generalAlerts/<?= $scriptFile . "/" . $script ?>.js"></script>

<script src="<?= BASE_URL; ?>Assets/js/functions/validateFields.js"></script>
<script src="<?= BASE_URL; ?>Assets/js/functions/patternInputs.js"></script>
<script src="<?= BASE_URL; ?>Assets/js/functions/inputFields.js"></script>
<?php
if (isset($scriptFile)) {
?>
    <script src="<?= BASE_URL; ?>Views/<?= $scriptFile . "/" . $script ?>.js"></script>
<?php
} else {
?>
    <script src="<?= BASE_URL; ?>Views/<?= $script ?>.js"></script>

<?php
}
?>
</body>

</html>