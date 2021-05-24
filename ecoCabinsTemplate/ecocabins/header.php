<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecoCabins
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- Site preloader -->
  <div id="preloader">
    <div class="site-spinner"></div>
  </div>
  <!-- End Site preloader -->

<header id="masthead"  class="site-header">
  <nav class="navbar navbar-expand-lg navbar-dark eco-cabins-navbar fixed-top w-100">
    <div class="container">
      <a class="navbar-brand" href="<?php echo esc_url(site_url()); ?>">
        <img
          src="<?php
            if (current_theme_supports("custom-logo")) {
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                echo $image[0];
            } else {
              echo get_template_directory_uri() . "/img/logo.png";
            }
          ?>"
          width="135"
          height="26"
          alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileMenu" aria-controls="navbarMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMobileMenu">

          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'topmenu',
                'menu_id' => 'topmenucontainer',
                'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center',
                'container'  => 'ul'
            )
          )
          ?>
      </div>
    </div>
  </nav>
</header>
