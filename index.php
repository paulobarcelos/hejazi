<?php
if(!is_user_logged_in()){
	status_header('503');
	get_template_part('maintenance');
	die;
}
?>