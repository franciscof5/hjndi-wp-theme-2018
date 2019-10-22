<?php 
get_header();
?>

<div class="row">
	<div class="container">
		<div class="row mt-3">
			<div class="col-8  border  border-secondary mb-5">
				<?php
				#var_dump($wp_query->query_vars);
				#global $post_type;
				#var_dump($post_type);
				#$the_query = new WP_Query( $args );
				#$wp_query = new WP_Query($wp_query->query_vars);
				#$wp_query2->query_posts( $wp_query->query_vars );
				if ( $wp_query->have_posts() ) :
					// Start the Loop.
					while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php 
					$theurl=get_the_post_thumbnail_url();
					if($theurl) { ?>
						<div class="row montserratregular">
							<div class="mt-0 col-12" style="background: url('<?php echo $theurl; ?>') center center no-repeat;background-size: cover;height: 200px;">
							&nbsp;
							</div>
						</div>
					<?php } ?>
					<div class="row p-5">
						<div class="row w-100 mb-3">
							<div class="col-7">
								<h2 class="montserratbold"><?php the_title(); ?></h2>
							</div>
							<div class="col-5 text-right text-uppercase  montserratbold">
								<p class="row m-0 p-0" style="line-height: 18px;">
									<span style="display: block;float: right;width: 100%;">
										<i class="fas fa-user-circle mr-2"></i><?php the_author(); ?>
									</span>
									
									<br>
									<span class="montserratregular" style="display: block;float: right;width: 100%;"><?php the_date(); ?></span>
									<br>
									<span style="display: block;float: right;width: 100%;">
										<?php
											$categories = get_the_category(); 
											echo $cat_name = $categories[0]->cat_name;
										?>	
									</span>
									
								</p>
							</div>
						</div>
						<div class="row two-col" >
							<?php the_content(); ?>
						</div>
						
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
