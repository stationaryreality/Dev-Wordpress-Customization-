<?php if (is_search()) : ?>
  <div class="tag-post-item">
    <a href="<?php the_permalink(); ?>" class="tag-post-thumbnail">
      <?php 
      if (has_post_thumbnail()) : 
        // Use custom size or fallback to 'thumbnail'
        $thumb_url = get_the_post_thumbnail_url(null, 'custom-featured') ?: get_the_post_thumbnail_url(null, 'thumbnail');
      ?>
        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>">
      <?php endif; ?>
    </a>
    <a href="<?php the_permalink(); ?>" class="tag-post-title"><?php the_title(); ?></a>
    <p class="tag-post-excerpt"><?php the_excerpt(); ?></p>
  </div>
<?php else : ?>
  <!-- Keep the original archive layout for other pages -->
  <div <?php post_class(); ?>>
    <?php do_action('archive_post_before'); ?>
    <?php ct_author_featured_image(); ?>
    <article>
      <div class="post-header">
        <h2 class="post-title">
          <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
        </h2>
        <?php get_template_part('content/post-meta'); ?>
      </div>
      <div class="post-content">
        <?php ct_author_excerpt(); ?>
        <?php get_template_part('content/comments-link'); ?>
      </div>
    </article>
    <?php do_action('archive_post_after'); ?>
  </div>
<?php endif; ?>
