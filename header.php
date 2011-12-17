<!doctype html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
				
		<?php 
		if (is_single() || is_page()) {
			$title = get_the_title ();
		} else {
			$title = "Not Found";
		}
		?>
		<?php if (is_home()) { ?>
		<title><?php bloginfo('name'); ?></title>
		<?php } else {?>
		<title><?php echo $title;?> - <?php bloginfo('name'); ?></title>
		<?php } ?>
		
		<?php 
		$meta;
		if (is_home()) {
			$loop = new WP_Query( array( 'post_type' => 'info' ) );
			while ( $loop->have_posts() ) : $loop->the_post();
			if(get_the_title() == 'About / Contact'){
				$aboutID = get_the_id();
				break;
			}
			endwhile;				
			$details = simple_fields_get_post_group_values($aboutID,"Page Details", true, 1);
			$meta = $details["Site Description"][0];
		} elseif (is_single() || is_page()){
			if(get_post_type() == 'info') $fields = 'Page Details';
			if(get_post_type() == 'projects') $fields = 'Project Details';
				
			$details = simple_fields_get_post_group_values(get_the_ID(),$fields, true, 1);
			$meta = $details["Description"][0];	
		} else {
			$hideMeta = 1;
		}
		?>
		<?php if($hideMeta != 1) {?>		
		<meta name="description" content ="<?php echo $meta;?>"/>
		<?php } ?>
		
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory');?>/img/favicon.ico">
		<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon.png">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/style.css?v=2">

		<script src="<?php bloginfo('stylesheet_directory');?>/js/libs/modernizr-1.7.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body>
	<div id="container">
		<header id="mainheader">
			<h1 class="logo">
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name');?>" ><span class="visuallyhidden">Paulina Hejazi - Stylist & Designer</span></a>
			</h1>
		</header>
		
		<div id="main" role="main">
			<div class="sidebar">
				<?php $current_id = get_the_id(); ?>
				<nav>
					<ul id="posts" class="menu">
					<?php $loop = new WP_Query( array( 'post_type' => 'projects' ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<li <?php echo ($current_id == get_the_id()) ?	 'class="current"':''; ?>><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>			
					<?php endwhile; ?>
					</ul>
					<ul id="pages" class="menu">
					<?php $loop = new WP_Query( array( 'post_type' => 'info' ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<li <?php echo ($current_id == get_the_id()) ?	 'class="current"':''; ?>><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>			
					<?php endwhile; ?>
					</ul>
					<?php wp_reset_query(); ?>
				</nav>
			</div>