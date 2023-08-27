<?php

//Evita que un usuario externo ejecute codigo php desde la barra del navegador
if (!defined('ABSPATH')) {
  exit;
}
?>

<!-- Logo marca -->
<div class="logo">
  <img src="<?php echo IMG_SCAN; ?>" alt="logo ScanTool">
</div>

<div class="container">

  <!-- Seccion información general -->
  <div class="row">
    <!-- Numero informacion general -->
    <div class="col-12">
      <div class="stwp-card">
        <div class="stwp-card-head center">
          <h2 class="stwp-card-title">About</h2>
        </div>
        <div class="stwp-card-body center">
          <h2> Autor: Luz areli Moreno Murillo</h2>
          <p>Version 1.1</p>
          <ul class="stwp-card-follow">
            <li>
              <a href="https://www.facebook.com/nativapps" target="_blank">
                <img src="<?php echo URL_SCAN; ?>/admin/images/facebook.svg" alt="">
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/nativapps/" target="_blank">
                <img src="<?php echo URL_SCAN; ?>/admin/images/instagram.svg" alt="">
              </a>
            </li>
            <li>
              <a href="https://www.linkedin.com/company/nativapps-inc/" target="_blank">
                <img src="<?php echo URL_SCAN; ?>/admin/images/linkedin.svg" alt="">
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>