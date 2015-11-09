<?php get_header(); ?>

<div class="main">
  <div class="wrapper">
    <div id="Container" class="singlePort">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title"><?php the_title(); ?></h1>

            <div class="entry-content">
            <?php if( have_rows('project_slider') ): ?>

              <div class="main-gallery">

                <?php while( have_rows('project_slider') ): the_row(); 
                  // vars
                  $image = get_sub_field('project_images');
                  ?>
                  <div class="gallery-cell">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                    <?php
                     echo get_post( get_post_thumbnail_id() )->post_excerpt;
                    ?>

                  </div>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
             
            </div>
              <!-- main gallery -->
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->

          <div class="entry-utility">
            <?php hackeryou_posted_in(); ?>
            <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

        <?php the_terms( $post -> ID, 'services', '',', '); ?>

        <div id="nav-below" class="navigation">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
        </div><!-- #nav-below -->

        <?php comments_template( '', true ); ?>


      <?php endwhile; // end of the loop. ?>

 
    </div> <!-- /#Container -->
  </div> <!-- /.wrapper -->
</div> <!-- /.main -->

<?php get_footer(); ?>