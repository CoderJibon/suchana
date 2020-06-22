<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coderjibon
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>



<ol class="comments-lists">
<?php
wp_list_comments(
	array(
		'style'      => 'ol',
		'walker'	=> new Suchana_comment_list(),
	)
);
?>
</ol>	

<div class="leave_comment">
	<?php comment_form(); ?>
</div>