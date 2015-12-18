<?php 

/*
Template Name: Contact Page
 */

/* This example is for a child theme of Twenty Thirteen: 
 *  You'll need to adapt it the HTML structure of your own theme.
 */

get_header(); ?>
<section class="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="contact">
				<?php the_content(); ?>
            </div>
		</article>
	<!--<?php //if ( ! post_password_required() ) comments_template( '', true ); ?>-->
<?php endwhile; endif; ?>
</section>
<!--<?php get_sidebar(); ?>-->
<?php get_footer(); ?>