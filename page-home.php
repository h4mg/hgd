<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>


 		<div id="Container">
			<!-- Writing a custom query -->
			<!-- assigning variable to the query -->
			<?php $portfolioCard = new WP_Query(
				array(
					'post_per_page' => '-1',
					'post_type' => 'portfolio',
					'order' =>'ASC'
					)
				); ?>
			
			<!-- Adding classes and terms to the div -->
			<?php if ( $portfolioCard -> have_posts()): ?>
				<?php while ( $portfolioCard -> have_posts()): $portfolioCard -> the_post(); ?>
					<?php $category_classes = ''; ?>
						<?php $categories = get_the_terms($post->ID , array('services', 'thatinwhich')); ?>
						<?php if($categories){
							foreach($categories as $category){
								$category_classes .= ' '.$category->slug;
							};
						}; ?>
					
					<a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
          			
					<div class="mix<?php echo $category_classes; ?>">
					<!-- div title -->
					<h4><?php the_title(); ?></h4>
					<!-- div year -->
					<h5 class="projYear"><?php the_field('project_year'); ?></h5>
					<!-- div featured image -->
					<div class="featImg"><?php the_post_thumbnail(); ?></div>
					<!-- div short description -->
					<p><?php the_field('short_desc'); ?></p>
					<!-- div listing terms -->
					<?php the_terms( $post -> ID, 'services', '',', '); ?>
					<!-- div checking featured project -->
					<?php
					if( get_field('featured_project')==true )
					{
					    echo '<h6 class="featureProj">Done at HackerYou</h6>';
					}
					else
					{};
					?>
					</div></a>
					<!-- Portfolio cards show here -->
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					<?php else: ?>
				<!-- Stuff that happens when there are not any portfolio items -->
			<?php endif; ?>

    </div> <!--/.container -->
  </div> <!-- /.wrapper -->
</div> <!-- /.main -->

<?php get_footer(); ?>