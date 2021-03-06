<?php
/**
* The template for displaying the post titles
*/
/*
* TODO: what to show? featured image, header image video .. ????
*/
?>
<header class="row page__header image__header entry-header" <?php czr_fn_echo('element_attributes') ?>>
  <div class="container header-content">
    <div class="header-content-inner">
    <?php if ( czr_fn_has('post_metas') && $cat = czr_fn_get( 'cat_list', 'post_metas', array( 'limit' => 3 ) ) ) : ?>
        <div class="entry-meta category-info">
          <?php echo $cat ?>
        </div>
    <?php endif; ?>
      <h1 class="entry-title"><?php the_title() ?></h1>
    <?php
        if ( czr_fn_has('edit_button') && (bool) $edit_post_link = get_edit_post_link() )
          czr_fn_render_template( 'modules/edit_button', 'edit_button', array(
              'edit_button_link'  => $edit_post_link,
          ));
    ?>
    </div>
    <div class="post-info">
        <?php
          if ( czr_fn_has('post_metas') && $pub_date = czr_fn_get( 'publication_date', 'post_metas' ) ) :
        ?>
          <div class="date-info">
            <?php echo $pub_date; ?>
          </div>
        <?php
          endif;

          if ( czr_fn_has( 'comment_info' ) ) :
            $comment_info = true;
            if ( $pub_date ):
          ?>
              <span class="v-separator">|</span>
          <?php
            endif
          ?>
          <div class="comment-info">
            <?php czr_fn_render_template( 'modules/comment_info', 'comment_info' ) ?>
          </div>
        <?php
          endif;

          if ( czr_fn_has('post_metas') && $author = czr_fn_get( 'author', 'post_metas' ) ) :
            if ( $pub_date || $comment_info ):
          ?>
            <span class="v-separator">|</span>
          <?php
            endif
          ?>
          <div class="author-info">
            <?php echo $author ?>
          </div>
        <?php endif ?>
    </div>
  </div>
</header>