<?php 
get_header();
?>

<div class="row">
	<div class="container">
		<?php
		#var_dump($wp_query->query_vars);
		#global $post_type;
		
		#$the_query = new WP_Query( $args );
		#$wp_query = new WP_Query($wp_query->query_vars);
		#$wp_query2->query_posts( $wp_query->query_vars );
		#global $post;
		#$category = get_the_category($post->ID);
		#var_dump($category[0]->cat_name);
		$cat_id=$wp_query->get_queried_object_id();
		$catimg = do_shortcode('[wp_custom_image_category onlysrc="false" size="full" term_id="'.$cat_id.'" alt="alt :)"]');
		?>
		<div class="row montserratregular">
			<div class="mt-0 mb-5 col-12" style="background: url('<?php echo $catimg; ?>') center center no-repeat;background-size: cover;height: 200px;">
				<p class="cat-title-template awesomeregular text-white">
					<?php echo single_cat_title(); ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-8 row">
				<?php
				if ( $wp_query->have_posts() ) :
					// Start the Loop.
					while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

					<a href="<?php the_permalink(); ?>">
					<div class="col-6 pr-4 mb-2">
						<?php 
						$theurl=get_the_post_thumbnail_url();
						if($theurl) { ?>
							<div class="row montserratregular p-5" style="background: url('<?php echo $theurl; ?>') center center no-repeat;background-size: cover;height: 400px;">
								<div class="row text-white cat-card" style="">
									<p class="text-uppercase montserratbold text-white col-7"><?php the_title(); ?></p>
									<p class="col-5 pr-4"><i class="fas fa-clock mr-2"></i> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) ?> atrás</p>
								</div>
								<div class="row text-white cat-card mt-5 pt-3 pr-5">
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>
						<?php } ?>
						<?php /* background-color: rgba(0, 0, 0, 0.8);
						<div class="row">
							<p><?php the_content(); ?></p>
						</div>
						<div class="row">
							<p><?php the_date(); ?></p>
						</div> */
						?>
						<div class="row bg-dark pt-4 pb-3 pr-5 pl-5 text-white">
							<p><i class="fas fa-user-circle fa-2x mr-2"></i> <span style="position: absolute; line-height: 34px;margin-left: 10px;">por <strong><?php the_author(); ?></strong></span></p>
						</div>
					</a>
					</div>
					<?php
					endwhile;
					endif;
					?>
			</div>
			<div class="col-4 custom-sidebar">
				<?php
				dynamic_sidebar("home_right_1");
				?>
			</div>
		</div>
		
	</div>
</div>	
<?php
/*
//
echo __('Utilizar as saídas de texto nesse formato para depois criarmos as traduções.', 'hjndi');

//
echo printf( _nx( 
	'%s ou nesse formato para plural', 
	'%s ou nesses formatos para plural', 
	$num, 
	'Context information for the translators.', 
	'hjndi' 
	), number_format_i18n( $num ) );
*/
?>
<?php
get_footer();
