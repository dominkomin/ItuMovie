<?php 

/*
    Template Name: Events Page
 */


get_header(); ?>

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

  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>