<?php /* Template Name: Term & Condition */
get_header();

global $post;
?>

<div class="container-small">

 	<?php while ( have_posts() ) : the_post(); ?>

			<?php echo get_the_content($post->ID); ?>

		<?php endwhile; // end of the loop. ?>

</div>


<?php get_footer(); ?>


