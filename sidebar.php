<div class="sidebar">
	<ul class="xoxo">
		<?php  dynamic_sidebar( 'primary-widget-area' ); ?>
	</ul>


	
	<!-- //list terms in a given taxonomy using wp_list_categories
	// This is created for services
 -->
	 <?php
		$args = array(
		    'orderby'           => 'name', 
		    'order'             => 'DESC',
		    'hide_empty'        => false, 
		); 

		$terms = get_terms( 'services', $args );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		    echo '<h3>Services</h3><div><button class="filter" data-filter="all">All</button>';
		    foreach ( $terms as $term ) {
		      echo '<button class="filter" data-filter=".' . $term->slug . '">' . $term->name . '</button>';
		       
		    }
		    echo '</div>';
		}
	 ?>
	<!-- This is created for 'That in Which'
	||||||||||||||||||||||||||||||||||||||| -->

	 <?php
		$args = array(
		    'orderby'           => 'name', 
		    'order'             => 'DESC',
		    'hide_empty'        => false, 
		); 

		$terms = get_terms( 'thatinwhich', $args );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		    echo '<h3>That in Which...</h3><ul>';
		    foreach ( $terms as $term ) {
		      echo '<button class="filter" data-filter=".' . $term->slug . '">' . $term->name . '</button>';
		    }
		    echo '</ul>';
		}
	 ?>
</div>