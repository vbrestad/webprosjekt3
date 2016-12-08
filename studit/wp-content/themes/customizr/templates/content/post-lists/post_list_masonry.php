<?php
/**
 * The template for displaying the masonry article wrapper
 *
 * In WP loop
 *
 */
?>
<?php
  if ( czr_fn_is_loop_start() ) : ?>
<div class="grid row grid-container__masonry <?php czr_fn_echo('element_class') ?>"  <?php czr_fn_echo('element_attributes') ?>>
<?php

  do_action( '__masonry_loop_start', czr_fn_get('id') );

endif ?>
  <article <?php czr_fn_echo( 'article_selectors' ) ?> >
    <div class="sections-wrapper grid__item">
    <?php
        if ( $has_post_media = czr_fn_get('has_post_media') ) {
          czr_fn_render_template( array(
            'template' => 'content/post-lists/singles/post_list_single_media',
            'model_args' => array(
                'has_post_media'           => $has_post_media,
                'is_full_image'            => czr_fn_get( 'is_full_image'  )
            )
          ));
        }
    ?>
      <section class="tc-content entry-content__holder">
        <div class="entry-content__wrapper">
        <?php
          /* header */
          czr_fn_render_template( array(
            'template'   => 'content/post-lists/singles/headings/post_list_single_header',
            'model_args' => array(
                'has_header_format_icon'  => czr_fn_get( 'has_header_format_icon' )
            )
          ));
          /* content inner */
          czr_fn_render_template( array( 'template' =>'content/post-lists/singles/contents/post_list_single_content_inner' ) );
          /* footer */
          czr_fn_render_template( array( 'template' =>'content/post-lists/singles/footers/post_list_single_footer' ) );
        ?>
        </div>
      </section>
    </div>
  </article>
<?php if ( czr_fn_is_loop_end() ) :
  do_action( '__masonry_loop_end', czr_fn_get('id') );
?>
</div>
<?php endif ?>