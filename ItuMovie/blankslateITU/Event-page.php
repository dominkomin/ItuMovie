<?php 

/*
Template Name: Event Page
 */

/* This example is for a child theme of Twenty Thirteen: 
 *  You'll need to adapt it the HTML structure of your own theme.
 */

get_header(); ?>

<!-- Rendering the front page content -->
<!--<p class="frontpage-content"> <?php echo $front_page_content; ?> </p>-->


<!-- Getting posts with a specific category "movies" -->
<?php
	$news_posts = new WP_Query( 'category_name=eventItem&posts_per_page=10&orderby=title&order=ASC' );
?>

<section class="content">

  <?php if ($news_posts->have_posts()) :
	 while ($news_posts->have_posts()): $news_posts->the_post(); ?>

  <div class="leftEvent">
    <div class="leftEventImage">
      <img src="<?php echo catch_that_image(); ?>" alt="" />
      <p><?php the_title(); ?></p>
    </div>
    <p><?php echo catch_paragraph(); ?></p>
  </div>

  <!--<?php comments_template(); ?>-->
  <?php endwhile; endif; ?>
<!--  <?php get_template_part( 'nav', 'below' ); ?>-->
</section>
<!--<?php get_sidebar(); ?>-->
<?php get_footer(); ?>