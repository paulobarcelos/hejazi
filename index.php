<?php get_header(); ?>
<div id="home" class="content">
	<article>
		<nav>
			<ul>
				<?php $max_col = 3; ?>
				<?php $col = 0; ?>
				<?php $loop = new WP_Query( array( 'post_type' => 'projects' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php
				$details = simple_fields_get_post_group_values(get_the_ID(),"Project Details", true, 1);
				$category = $details["Category"][0];
				$fetaured_image = $details["Featured Image"][0];
				?>
				<li <?php echo ($col == ($max_col -1))? 'class="lastcol"':''?> >
					<a class="postthumb" href="<?php the_permalink(); ?>">
						<div class="postinfo">										
							<h4 class="top"><?php the_title();?></h4>
							<div class="bottom">
								<p><?php echo $category; ?></p>
							</div>
						</div>
						<div class="postimage">
							<?php $fetaured_image_src = wp_get_attachment_image_src($fetaured_image, "project-thumb"); ?> 
							<img alt="<?php the_title();?>" src="<?php echo $fetaured_image_src[0];?>" />
						</div>
					</a>
				</li>
				<?php $col++; if($col > ($max_col -1)) $col = 0; ?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</ul>				
		</nav>
	</article>			
</div>

<?php get_footer(); ?>