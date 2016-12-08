<?php
/**
 * The template for displaying the standard colophon
 *
 * @package Customizr
 * @since Customizr 3.5.0
 */
?>
<div id="colophon" class="colophon__row row">
  <div class="col-sm-6 col-xs-12">
    <?php if ( czr_fn_has( 'footer_credits' ) ) czr_fn_render_template( array( 'template' => 'footer/footer_credits' ) ) ?>
  </div>
  <div class="col-sm-6 col-xs-12">
    <?php
    if ( czr_fn_has( 'footer_socials' ) ) czr_fn_render_template( array(
      'template' => 'modules/social_block',
      'model_id' => 'footer_socials',
      'model_args' => array(
          'element_class' => 'socials float-sm-right'
      )
    ))
    ?>
  </div>
</div>
