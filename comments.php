
<?php
	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->
<div class="comments">
	<?php if ( ! comments_open() & is_single() )  : ?><p><?php _e( 'Comments are currently closed.', 'super_light' ); ?></p><?php endif; ?>

	<?php if ($comments) : ?>
		<h3><?php comments_number(__('No Responses', 'super_light'), __('One Response', 'super_light'), '% '.__('Responses', 'super_light') );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
		<ul class="commentlist">
		<?php wp_list_comments(); ?>
		</ul>
	 <?php else : // this is displayed if there are no comments so far ?>
			<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
		<?php endif; ?>
	<?php endif; ?>

	<p><?php paginate_comments_links(); ?></p>
	<?php if ( comments_open() ) : ?><?php comment_form(); ?><?php endif; // if you delete this the sky will fall on your head ?>
</div>