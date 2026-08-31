<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Required meta tags -->
		<meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Novo site da Prefeitura Municipal de Caraguatatuba">
    <meta name="author" content="André Timóteo do Rozário">

	  <!-- Bootstrap CSS -->
    <link 
    	rel="stylesheet" 
    	href="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link 
    	rel="stylesheet" 
    	href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/fancybox/jquery.fancybox.min.css">

		<?php wp_head(); ?>

		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/template.min.css">

		<!-- Wordpress style -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

		<!-- Favicon -->
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png"/>

		<!-- ODS CSS -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/ods.css">
		
	</head>



<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D83F1R7LRN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D83F1R7LRN');
</script>



	<body id="body">
	

		<header id="header" class="striped-detail__top">

			<div class="container">

				<?php get_template_part('bars/top-navbar'); ?>

	      <?php get_template_part('bars/icon-navbar'); ?>

	    </div>

    </header>