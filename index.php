<?php 
get_header();
?>

<div class="row">
	<div class="container">
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
			<div class="row">
				<h2 class="text-uppercase montserratbold"><?php the_title(); ?></h2>
			</div>
			<div class="row">
				<p><?php the_content(); ?></p>
			</div>
			<div class="row">
				<p><?php the_date(); ?></p>
			</div>
			<div class="row">
				<p><?php the_author(); ?></p>
			</div>
			<?php
			endwhile;
			endif;
		?>
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
