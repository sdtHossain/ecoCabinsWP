<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecoCabins
 */

?>

<footer id="colophon" class="site-footer bg-primary container-fluid text-white">
  <div class="max-width-900 mx-auto">
    <div class="row align-items-center">
      <div class="col-sm-4 col-md-3">
        <div class="footer-left text-center text-sm-start">
          <p class="mb-0 fw-500 text-white-60">info@eco-cabins.com</p>
        </div>
      </div>
      <div class="col-sm-4 col-md-6">
        <div class="footer-middle text-center">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" width="135" height="26" alt="company logo">
        </div>
      </div>
      <div class="col-sm-4 col-md-3">
        <div class="footer-right text-center text-sm-end">
            <?php
            if ( has_nav_menu( 'footermenu' ) ) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'footermenu',
                        'menu_id' => 'footermenucontainer',
                        'menu_class' => 'list-inline',
                        'container'  => 'ul'
                    )
                );
            }
            ?>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
