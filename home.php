<?php 
get_header();

?>
<hr style="clear: both;">
<div class="container links-darks">
	<div class="row text-uppercase montserratbold line-height40 align-middle mt-5 mb-3">
		<h3 class="float-left col-6 col-sm-4 col-md-3 col-lg-2">Vídeos</h3><div class="dropdown-divider col-6 col-sm-8 col-md-9 col-lg-10 float-right mt-3 darks"></div>
	</div>
	<div class="row">
		<div class="col-6">
		<?php
		$args_esq = array(
			'posts_per_page' => 1,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_type' => 'videos',
			'post_status' => 'publish'
		);

        $the_vides_query_lado_esquerdo = new WP_Query( $args_esq );
		if( $the_vides_query_lado_esquerdo->have_posts() ): 
			while ( $the_vides_query_lado_esquerdo->have_posts() ) : $the_vides_query_lado_esquerdo->the_post();
				$vurl = get_field('url'); ?>
				<div class="video-container mb-3"> 
					<?php echo $content = apply_filters( 'the_content', $vurl ); ?>
				</div>
				<h4><a href="<?php the_permalink(); ?>" class="montserratbold text-uppercase">
					<?php the_title(); ?>
				</a></h4>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php wp_reset_query();
		?>
		</div>

		<div class="col-6">
			<div class="row">
				<img class="pb-3 pl-3 pr-3" src="<?php bloginfo( "stylesheet_directory" ); ?>/images/banner.jpg">
			</div>
			<div class="row">
			<?php
			$args_dir = array(
				'offset' => 1,
				'numberposts' => 4,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => 'videos',
				'post_status' => 'publish'
			);

	        $the_vides_query_lado_direito = new WP_Query( $args_dir );
			if( $the_vides_query_lado_direito->have_posts() ): 
				while ( $the_vides_query_lado_direito->have_posts() ) : $the_vides_query_lado_direito->the_post();
					$vurl = get_field('url'); ?>
					<div class="col-6"> 
						<div class="video-container mb-3"> 
							<?php echo $content = apply_filters( 'the_content', $vurl ); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="montserratbold text-uppercase"><small>
							<?php the_title(); ?>
						</small></a>
					</div>
					<?php #the_excerpt(); ?>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php wp_reset_query();
			?>
			</div>
		</div>
	</div>
</div>

<div class="row bg-darkBLACK text-white mt-4">
	<div class="container">
		<div class="row text-uppercase montserratbold line-height40 align-middle mt-5 mb-3">
			<h3 class="float-left col-6 col-sm-4 col-lg-3">Categorias</h3><div class="dropdown-divider col-6 col-sm-8 col-lg-9 float-right mt-3 darks"></div>
		</div>
		<!--div class="row">			      
			<div class="col-md-6">			          
				<img src="http://hjndi.local/wp-content/uploads/2018/06/cat-viaja.jpg" alt="test" class="img-responsive rounded-circle opacity50" height="220" width="220">
				<p class="cat-title awesomeregular">Example headline.</p>
			</div>
		</div-->
			  
		<div class="row">
		<?php
		foreach( get_categories(['hide_empty' => false]) as $category) {
			#var_dump($category);
			#echo $term_link = get_term_by('id',$category->term_id, "category");die;
			$sl = $category->slug;
			#var_dump($sl);die;
			#$term_link = get_term_link( $sl );
			$term_link = "/categoria/".$sl;
			#var_dump($term_link);
			#die;
			?>
				      
				<div class="col-4 p-5">
					<a href="<?php echo esc_url( $term_link ); ?>" class="links-white">	          
					<img src="<?php echo do_shortcode(sprintf('[wp_custom_image_category  onlysrc="true" term_id="%s"]',$category->term_id)); ?>" alt="test" class="img-responsive rounded-circle opacity50" height="220" width="220">
					<p class="cat-title awesomeregular">
						
							<?php echo $category->name; ?>
						
					</p>
					</a>
				</div>
			
		<?php } ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="container">
		<div class="row text-uppercase montserratbold line-height40 align-middle mt-5 mb-5">
			<h3 class="float-left col-6 col-sm-4 col-lg-3">Parceiros</h3><div class="dropdown-divider col-6 col-sm-8 col-lg-9 float-right mt-3 darks"></div>
		</div>
		<div class="row">
			<div class="col-7">
				<div class="row">
				<?php
				$args_par = array(
					'numberposts' => 4,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'post_type' => 'parceiro',
					'post_status' => 'publish'
				);

		        $parceiros_query = new WP_Query( $args_par );
				if( $parceiros_query->have_posts() ): 
				while ( $parceiros_query->have_posts() ) : $parceiros_query->the_post();
				?>
					<div class="col-6 text-center links-darks pb-3">
						<a href="<?php the_permalink(); ?>" class="montserratbold text-uppercase">
						<div>
						<?php 
						the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive rounded-circle img-fluid w-50 border  border-secondary', 'title' => 'Feature image']);
						#the_post_thumbnail(); 
						?>
						</div>
						<p class="pt-3 pb-1 m-0">
							<?php the_title(); ?>
						</p>
						
							<?php 
							$face = get_field('facebook'); 
							if($face) { ?>
								<a href="<?php echo $face?>"><i class="fab fa-facebook-f fa-lg ml-2 mr-2"></i><a>
							<?php } ?>

							<?php 
							$inst = get_field('instagram'); 
							if($inst) { ?>
								<a href="<?php echo $inst?>"><i class="fab fa-instagram fa-lg ml-2 mr-2"></i><a>
							<?php } ?>

							<?php 
							$site = get_field('facebook'); 
							if($site) { ?>
								<a href="<?php echo $site?>"><i class="fas fa-globe fa-lg ml-2 mr-2"></i><a>
							<?php } ?>
						
						</a>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
				</div>
			</div>
			<div class="col-5">
				<div class="row">
				<img class="pb-3" src="<?php bloginfo( "stylesheet_directory" ); ?>/images/banner-parceiros.jpg">
				<button class="big-black text-uppercase montserratbold">SEJA UM PARCEIRO</button>
				<button class="big-black text-uppercase montserratbold">ANUNCIE</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row bg-darkBLACK text-white links-white mt-4 pb-5">
	<div class="container">
		<div class="row mt-5 mb-5">
			<img class="pb-3 pl-3 pr-3 img-fluid w-100" src="<?php bloginfo( "stylesheet_directory" ); ?>/images/banner.jpg">
		</div>
		<div class="container">
			<div class="row text-uppercase montserratbold line-height40 align-middle mt-5 mb-5">
				<h3 class="float-left col-3 col-sm-3 col-lg-2">Nós</h3><div class="dropdown-divider col-9 col-sm-9 col-lg-10 float-right mt-3 darks"></div>
			</div>
		</div>
		<div class="row ">
			<?php
			$args_equ = array(
				'numberposts' => 3,
				'orderby' => 'post_date',
				'order' => 'ASC',
				'post_type' => 'equipe',
				'post_status' => 'publish'
			);

	        $equipe_query = new WP_Query( $args_equ );
			if( $equipe_query->have_posts() ): 
			while ( $equipe_query->have_posts() ) : $equipe_query->the_post();
			?>
				<div class="col-4 text-center links-white pb-3">
					<a href="<?php the_permalink(); ?>" class="montserratbold text-uppercase">
					<div>
					<?php 
					the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive rounded-circle img-fluid w-50 border  border-secondary', 'title' => 'Feature image']);
					#the_post_thumbnail(); 
					?>
					</div>
					<p class="pt-3 pb-0 m-0">
						<?php the_title(); ?>
					</p>
					<p>
						<?php 
						$cargo = get_field('cargo'); 
						if($cargo) {
							echo "<small class='montserratregular p-0 m-0' style='font-size:10px;'>".$cargo."</small>";
						} ?>
					</p>

						<?php 
						$face = get_field('facebook'); 
						if($face) { ?>
							<a href="<?php echo $face?>"><i class="fab fa-facebook-f fa-lg ml-2 mr-2"></i><a>
						<?php } ?>

						<?php 
						$inst = get_field('instagram'); 
						if($inst) { ?>
							<a href="<?php echo $inst?>"><i class="fab fa-instagram fa-lg ml-2 mr-2"></i><a>
						<?php } ?>

						<?php 
						$site = get_field('website'); 
						if($site) { ?>
							<a href="<?php echo $site?>"><i class="fas fa-globe fa-lg ml-2 mr-2"></i><a>
						<?php } ?>
					
					</a>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</div>

<div class="row" id="footer-map">
	<div class="col-8 col-md-4 bg-white" id="form-on-map">
		<div class="row bg-darkBLACK text-white links-white montserratbold p-3">
			Avenida 9 de Julho, 3575 - Sala 716 <br />
			MAXIME OFFICE TOWER
		</div>
		<div class="row p-4 styled-form">
			<?php echo do_shortcode('[contact-form-7 id="6" title="Formulário de contato 1"]') ?>
		</div>
	</div>
</div>

<div class="row">

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

</div>
<?php 
get_footer();
