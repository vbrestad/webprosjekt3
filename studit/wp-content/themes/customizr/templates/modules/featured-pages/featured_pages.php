<?php
/**
 * The template for displaying the featured pages wrapper
 */
?>
<div class="container marketing" <?php czr_fn_echo('element_attributes') ?>>
  <?php
    do_action( '__before_fp' );
    while ( $featured_page = czr_fn_get( 'featured_page' ) ) {
      if ( czr_fn_has( 'featured_page' ) )
        czr_fn_render_template( array(
          'template' => 'modules/featured-pages/featured_page',
          'model_args' => $featured_page
        ));
    }
    do_action( '__after_fp' );
  ?>
</div>
