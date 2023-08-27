<?php

//Evita que un usuario externo ejecute codigo php desde la barra del navegador
if (!defined('ABSPATH')) {
  exit;
}

// Hook Shortcode para listar post
add_shortcode('list_books', 'scantoolwp_list_book_shortcode');
function scantoolwp_list_book_shortcode() {

  $args = array(
    'post_type'      => 'book', 
    'posts_per_page' => -1,
    'publish_status' => 'published',
  );
  // Consulta para traer las entradas del custom post type 
  $query = new WP_Query($args);
  $result = '';
  $result .= '<section class="book-container-list">';
  $result .= '<div class="book-header">
    <h2>Listado de libros</h2>
    <div class="book-button">
      <button data-id="books-card" class="btn-book-general btn-current"><span>Modo Card</span></button>
      <button data-id="books-box" class="btn-book-general"><span>Modo Box</span></button>
      <button data-id="books-list"  class="btn-book-general"><span>Modo lista</span></button>
    </div>
  </div>';

  $result .= '<ul id="books-list-general" class="books-card">';

  // Loop para extraer la información del post
  if ($query->have_posts()) :
    while ($query->have_posts()) :

      $query->the_post();
      $list_genre = get_the_terms(get_the_ID(), 'genre');
      $list_writer = get_the_terms(get_the_ID(), 'writer');
      $list_date = get_the_terms(get_the_ID(), 'date');

      $result .= '<li class="book">';
      $result .= '<div class="book-image">' . get_the_post_thumbnail() . '</div>';
      $result .= '<div class="book-content"><h3>' . get_the_title() . '</h3> <div>';

        // Valida si la taxonimia es un array
        if (is_array($list_genre) || is_object($list_genre)) {
          foreach ($list_genre as $genre) {
            $result .= '<div><strong>Género:</strong> ' . $genre->name . '</div>';
          }
        }

        if (is_array($list_writer) || is_object($list_writer)) {
          foreach ($list_writer as $writer) {
            $result .= '<div><strong>Autor:</strong>' . $writer->name . '</div>';
          }
        }

        if (is_array($list_date) || is_object($list_date)) {
          foreach ($list_date as $date) {
            $result .= '<div><strong>Año de Publicación:</strong>' . $date->name . '</div>';
          }
        }

      $result .= '</div>';
      $result .= '</div>';
      $result .= '</li>';

    endwhile;
    // Restaurar datos de publicación originales
    wp_reset_postdata();

  endif;
  $result .= '</ul>';
  $result .= '</section>';

  return $result;
}
