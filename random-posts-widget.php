<?php

// Widget title
Echo $this->get_option('widget_title');

While (have_posts()): the_post(); ?>
<div class="random-post">

  <?php If ($this->get_option('show_title')) : ?>
  <h3 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title(); ?></a></h3>
  <?php EndIf; ?>
  
  <?php If ($this->get_option('show_date')) : ?>
  <span class="post-date"><?php Echo get_the_date(); ?></span>
  <?php EndIf; ?>
  
  <?php If ($this->get_option('show_author')) : ?>
  <span class="post-author"><?php PrintF(__('by %s'), $this->get_author_posts_link()); ?></a></span>
  <?php EndIf; ?>
  
  
  <?php If ($this->get_option('show_content') != 'full_content') : ?>
  
    <?php If ($this->get_option('show_thumbnail') && $thumb = $this->get_post_thumbnail( get_the_id() )) : ?>
    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="post-thumb">
      <img src="<?php Echo $thumb[1] ?>" class="thumbnail wp-thumb-<?php Echo $thumb[0] ?> align<?php Echo $this->get_option('thumb_adjustment') ?>" alt="<?php the_title() ?>" />
    </a>
    <?php EndIf; ?>
    
    <?php If ($this->get_option('show_content') == 'excerpt') : ?>
    <div class="excerpt">
      <?php the_excerpt(); ?>
    </div>
    <?php EndIf; ?>
  
  <?php ElseIf ($this->get_option('show_content') == 'full_content') : ?>
    <div class="content">
      <?php the_content() ?>
    </div>
    
  <?php EndIf; ?>

  <div class="clear"></div>
  
  <?php If ($this->get_option('show_more_link')) : ?>
  <div class="more-link">
    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="more-link">
      <?php Echo $this->t('To the post') ?> &raquo;
    </a>
  </div>
  <?php EndIf; ?>

</div>
<?php EndWhile;