<!DOCTYPE html>
<html <?php language_attributes();?> class="no-js">  
<head>
	<base href="" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php 
	wp_head(); 	
	?>

	<!-- Metas tags
	================================================== 
	-->
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index, follow">         
	<meta name="googlebot" content="index, follow">
	 
	<!-- Mobile Metas
	================================================== 
	-->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">

	<!-- Favicons
	================================================== 
	-->
	<link rel="icon" type="image/png" sizes="192x192"  	href="<?php bloginfo('template_url')?>/images/fav-icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" 	href="<?php bloginfo('template_url')?>/images/fav-icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" 	href="<?php bloginfo('template_url')?>/images/fav-icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" 	href="<?php bloginfo('template_url')?>/images/fav-icon/favicon-16x16.png">

	<!-- Fonts
	================================================== 
	-->
</head>


<body <?php body_class(); #jumbotron ?> >

<div class="bg-cover <?php if(!is_home()) echo 'bg-cover-short'; else echo 'bg-cover-full' ?>">
<div class="container">
	<div class="row">
		<div class="container-fluid">
		<nav class="navbar navbar-expand-md navbar-dark bg-faded text-uppercase font-weight-bold montserratregular">
			<a class="navbar-brand" href="/" alt="Home">
				<img src="<?php bloginfo( "stylesheet_directory" ); ?>/images/logo-menu.png" id="top-menu-logo">
			</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar-top-menu" aria-controls="bs4navbar-top-menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			wp_nav_menu([
			'menu'            => 'top-menu',
			'theme_location'  => 'top-menu',
			'container'       => 'div',
			'container_id'    => 'bs4navbar-top-menu',
			'container_class' => 'collapse navbar-collapse',
			'menu_id'         => false,
			'menu_class'      => 'navbar-nav mr-auto',
			'depth'           => 2,
			'fallback_cb'     => 'bs4navwalker::fallback',
			'walker'          => new bs4navwalker()
			]);
			?>
		</nav>
		</div>	
	</div>
	<div class="row my-5 d-none d-md-block"></div>

	<?php if(is_home()) { ?>

	<div class="row ">
			<div class="col-md-6 justify-content-center">
				<div class="row justify-content-center mb-5">
					<a href="/" alt="Home"><img src="<?php bloginfo( "stylesheet_directory" ); ?>/images/logo-home.png"></a>
				</div>
				<div class="row justify-content-center mb-4">
					<i class="fab fa-instagram fa-lg px-2"></i>
					<i class="fab fa-youtube fa-lg px-2"></i>
					<i class="fab fa-facebook-f fa-lg px-2"></i>
				</div>
				<div class="dropdown-divider col-md-6 mx-auto"></div>
				<div class="row justify-content-center text-uppercase montserratbold mt-3">
					<h4>Aqui é vida real!</h4>
				</div>
				<div class="row my-3 "></div>
			</div>
			<div class="col-md-6 bg-white text-dark">
				<?php #style="position: absolute;right: 5%;" ?>
				<div class="row">
					<img class="p-3" src="<?php bloginfo( "stylesheet_directory" ); ?>/images/banner.jpg">
				</div>
				<div class="row ">
					<div class="col-6 text-uppercase montserratbold line-height40 align-middle">
						<span class="col-5">Apoio</span><div class="darks dropdown-divider col-7 float-right mt-3 "></div>
					</div>
					<div class="col-6"><?php require('searchform.php'); ?></div>
				</div>
				<div class="row">
					<?php
					$args_cards = array(
						'posts_per_page' => 2,
						'orderby' => 'post_date',
						'order' => 'DESC',
						'post_status' => 'publish'
					);

			        $cards_query = new WP_Query( $args_cards );
			        $card=1;
					if( $cards_query->have_posts() ): 
					while ( $cards_query->have_posts() ) : $cards_query->the_post(); 
						?>
						<div class="col-6 card-container <?php echo 'card-container'.$card;  ?>"><?php require('bs4card.php'); 
						$card++;
						?></div>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query();	?>
				</div>
			</div>
	</div>
	<?php } ?>
</div>
</div> <!--bgcover-->
