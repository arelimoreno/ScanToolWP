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
    <div class="col-6">
      <div class="stwp-card">
        <div class="stwp-card-head">
          <h2 class="stwp-card-title">Información general</h2>
        </div>
        <div class="stwp-card-body">
          <h3 class="stwp-name-site">
            <?php echo get_bloginfo('name'); ?>
          </h3>
          <ul class="stwp-card-detail">
            <li>Url instalación <strong><?php echo get_bloginfo('url') ?></strong></li>
            <li>Url de WordPress <strong><?php echo get_bloginfo('wpurl') ?></strong></li>
            <li>Versión WordPress: <strong><?php echo get_bloginfo('version') ?></strong></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Numero paginas -->
    <div class="col-2">
      <div class="stwp-card">
        <div class="stwp-card-body center">
          <img src="<?php echo URL_SCAN; ?>/admin/images/page.svg" alt="pages" class="stwp-card-icon">
          <h3 class="stwp-card-count">
            <?php
            // Total de páginas publicadas
            $count_pages = wp_count_posts('page');
            $total_pages = $count_pages->publish;
            echo $total_pages;
            ?>
            <span class="stwp-card-title">Páginas publicadas</span>
          </h3>
        </div>
      </div>
    </div>

    <!-- Numero post -->
    <div class="col-2">
      <div class="stwp-card">
        <div class="stwp-card-body center">
          <img src="<?php echo URL_SCAN; ?>/admin/images/post.svg" alt="posts" class="stwp-card-icon">
          <h3 class="stwp-card-count">
            <?php
            // Total de páginas publicadas
            $count_post = wp_count_posts('post');
            $total_post = $count_post->publish;
            echo $total_post;
            ?>
            <span class="stwp-card-title">Post publicadas</span>
          </h3>
        </div>
      </div>
    </div>

    <!-- Numero libros -->
    <div class="col-2">
      <div class="stwp-card">
        <div class="stwp-card-body center">
          <img src="<?php echo URL_SCAN; ?>/admin/images/book.svg" alt="books" class="stwp-card-icon">
          <h3 class="stwp-card-count">
            <?php
            // Total de libros publicados
            $count_book = wp_count_posts('book');
            $total_book = $count_book->publish;
            echo $total_book;
            ?>
            <span class="stwp-card-title">Libros publicados</span>
          </h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Seccion status -->
  <div class="row">
    <!-- informacion plugin -->
    <div class="col-8">
      <div class="stwp-card">
        <div class="stwp-card-head">

          <?php
          // Valida que la funcion get_pluguin este habilitada 
          if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
          }

          $plugins = get_plugins();
          ?>
          <h2 class="stwp-card-title">Plugins (<?php echo count($plugins); ?>)</h2>
        </div>
        <div class="stwp-card-body">
          <!-- Listado plugins del sitio -->
          <ul class="stwp-list-plugin">

            <?php
            foreach ($plugins as $plugin_file => $plugin_data) {
              //Detecta los plugins activos e inactivos
              $plugin_active = false;
              if (is_plugin_active($plugin_file)) {
                $plugin_active = true;
              }
            ?>

              <li class="stwp-list-plugin-item <?php echo ($plugin_active) ? 'status-active' : 'status-inactive'; ?>">
                <h2><?php echo $plugin_data['Name']; ?></h2>
                <p><?php echo $plugin_data['Version']; ?></p>
                <span class="stwp-list-plugin-status">
                  <?php echo ($plugin_active) ? 'Activo' : 'Inactivo'; ?>
                </span>
              </li>

            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Informacio componentes theme y post -->
    <div class="col-4">
      <!-- Información theme -->
      <div class="stwp-card">
        <div class="stwp-card-head">

          <?php
          // Valida que la funcion wp_get_themes este habilitada 
          if (!function_exists('wp_get_themes(')) {
            require_once ABSPATH . 'wp-includes/theme.php';
          }

          $all_themes = wp_get_themes();
          $current_theme = wp_get_theme();

          ?>
          <h2 class="stwp-card-title">Temas (<?php echo count($all_themes); ?>)</h2>
        </div>
        <div class="stwp-card-body">
          <!-- Listado plugins del sitio -->
          <ul class="stwp-list-theme">
            <?php
            foreach ($all_themes as $theme) {
            ?>

              <li class="stwp-list-theme-item <?php echo ($current_theme == $theme['Name']) ? 'status-active' : ''; ?>">
                <h2><?php echo $theme['Name']; ?></h2>
                <p><?php echo $theme['Version']; ?></p>
                <p><?php echo $theme['Author']; ?></p>
              </li>

            <?php
            }
            ?>
          </ul>
        </div>
      </div>

      <!-- Modo uso shortcode -->
      <div class="stwp-card stwp-card-shortcode">
        <div class="stwp-card-head">

          <h2 class="stwp-card-title">Listar libros</h2>
        </div>
        <div class="stwp-card-body">
          <p class="intro">Para mostrar el listado de los libros en cualquier lugar del sitio, existen 2 opciones:</p>
          <h3>1.Editor de WordPress</h3>
          <p>Agregar en la página con el editor de contenido</p>
          <code>[list_books]</code>
          <hr>
          <h3>2.Archivo template </h3>
          <p>Agregar directamente en el php </p>
          <code> echo do_shortcode('[list_books]');</code>
        </div>
      </div>
    </div>

  </div>

</div>