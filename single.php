<?php get_header(); ?>

<?php
//echo $post->ID;
	if (in_category(4)) {
		include ('single-skinning.php');
	} 
	else { 
		include ('single-default.php');
	}
?>
