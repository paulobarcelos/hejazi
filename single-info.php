<?php get_header(); ?>
<?php
	$details = simple_fields_get_post_group_values(get_the_ID(),"Page Details", true, 1);
	$description = $details["Description"][0];
	$portrait = $details["Portrait"][0];
	
	$contactsFields = simple_fields_get_post_group_values(get_the_ID(),"Contacts", true, 1);
	$type = $contactsFields["Type"];
	$contacts = $contactsFields["Contact"];
	$total_contacts = count($contacts);
?>
<div id="page" class="content">
	<article>
		<div class="pagecopy">
			<h2><?php the_title();?></h2>
			<p class="description"><?php echo $description; ?></p>
			<?php if($total_contacts > 0):?>
			<ul class="contacts">
				<?php for($i = 0; $i < $total_contacts; $i++):?>
				<li>
					<span class="title"><?php echo $type[$i];?></span><br>
					<span class="value"><?php echo $contacts[$i];?></li></span>
				<?php endfor; ?>
			</ul>
			<?php endif; ?>
		</div>
		<div class="pageimage">
			<?php $image = wp_get_attachment_image_src($portrait, "page-portrait"); ?> 
			<img alt="<?php bloginfo('name');?>" src="<?php echo $image[0];?>" />
		</div>				
	</article>			
</div>
<?php get_footer(); ?>