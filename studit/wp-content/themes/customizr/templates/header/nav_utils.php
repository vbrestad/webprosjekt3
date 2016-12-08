<?php
/**
 * The template for displaying the primary navbar utils.
 * Contains:
 * Search Button
 * ( Woocommerce Cart Icon )
 * (Socials)
 */
?>
<div class="primary-nav__utils" <?php czr_fn_echo('element_attributes') ?>>
  <ul class="nav navbar-nav utils inline-list">
    <?php czr_fn_render_template( array( 'template' =>'header/nav_search') ) ?>
    <?php if ( czr_fn_has( 'woocommerce_cart', null, $only_registered = true ) ) : ?>
      <li class="primary-nav__woocart hidden-md-down">
        <?php czr_fn_render_template( array( 'template' =>'header/woocommerce_cart') ) ?>
      </li>
    <?php endif ?>
  </ul>
  <?php
    if ( ! ( czr_fn_has('navbar_secondary_menu') ) )
      czr_fn_render_template( array(
          'template'   => 'modules/social_block',
          'model_id'   => 'header_socials',
          'model_args' => array(
          'element_class' => 'nav navbar-nav socials'
        )
      ));
  ?>
</div>

