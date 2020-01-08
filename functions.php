<?php

function mkp_style_script()
{
  if (!is_admin()) {
    wp_enqueue_style('mkp_stayle', get_template_directory_uri() . '/style.min.css', '1.0', 'all');
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,700&display=swap', null, false);
  }
}
function mkp_style_scripts()
{
  // wp_enqueue_script(mkp_style, get_template_directory_uri() . '/bulma.min.css', array(), 'all');
  // wp_enqueue_script(mkp_style, get_template_directory_uri() . '/style.min.css', array(), '1.0', 'all');
}


// add  jquery
add_action('wp_enqueue_scripts', 'mkp_style_script');

function my_init()
{
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js', false, '2.0.3', true);
    wp_enqueue_script('jquery');
  }
}
add_action('init', 'my_init');


//redirect form
add_action('wp_footer', 'redirect_cf7');

function redirect_cf7()
{
?>
  <script type="text/javascript">
    document.addEventListener('wpcf7mailsent', function(event) {
      location = window.location.href+ 'gracias';
    }, false);
  </script>
<?php
}
