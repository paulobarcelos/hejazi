<?php get_header(); ?>
<?php
	$details = simple_fields_get_post_group_values(get_the_ID(),"Project Details", true, 1);
	$description = $details["Description"][0];
	
	$credits = simple_fields_get_post_group_values(get_the_ID(),"Credits", true, 1);
	$categories = $credits["Category"];
	$names = $credits["Name"];	
	$total_credits = count($categories);
	
	$video_gallery = simple_fields_get_post_group_values(get_the_ID(),"Video Gallery", true, 1);
	$embeds = $video_gallery["Embed Code"];
	$total_embeds = count($embeds);
	
	$image_gallery = simple_fields_get_post_group_values(get_the_ID(),"Image Gallery", true, 1);
	$images = $image_gallery["File"];
	$total_images = count($images);
?>
<div  id="post" class="content">
	<article>
		<h2><?php the_title();?></h2>
		<p class="description"><?php echo $description; ?></p>
		
		<?php if($total_credits > 0):?>
		<ul class="credits">
			<?php for($i = 0; $i < $total_credits; $i++):?>
			<li><?php echo $categories[$i];?> : <?php echo $names[$i];?></li>
			<?php endfor; ?>
		</ul>
		<?php endif; ?>
		
		<?php if($total_embeds > 0):?>
		<ul class="gallery">
			<?php for($i = 0; $i < $total_embeds; $i++):?>
			<li><?php echo $embeds[$i];?></li>
			<?php endfor; ?>
		</ul>
		<?php endif; ?>
		
		<?php if($total_images > 0):?>
		<ul class="gallery">
			<?php for($i = 0; $i < $total_images; $i++):?>
			<?php $image = wp_get_attachment_image_src( $images[$i], "project-gallery"); ?> 
			<li><img src="<?php echo $image[0];?>" /></li>
			<?php endfor; ?>
		</ul>
		<?php endif; ?>				
	</article>			
</div>
<?php get_footer(); ?>